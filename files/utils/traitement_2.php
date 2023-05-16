<?php
//supprimer indications de rythme des ornements
$chaine=preg_replace('#\{([\^_=]?[a-gA-Gz]{1}[\',]?)\/([\^_=]?[a-gA-Gz]{0,1}[\',]?)/\}#',' {$1} {$2} ',$chaine);

//Regex des notes
$chaine=preg_replace('#([\^_=]?)([a-gA-Gz]{1}[\',]?[02345678\/]?\/?[24]?)#',' $1$2 ',$chaine);

//ornements
$chaine=preg_replace('#\{\s?([\^_=]?[a-gA-Gz]{1}[\',]?)\s{0,2}([\^_=]?[a-gA-Gz]{0,2}[\',]?)\s?\}#',' {$1} {$2} ',$chaine);
$chaine=preg_replace('#\{\}#','',$chaine);   //les ornements vides {}

//points : remplace
$chaine=str_replace('.','',$chaine);		
$chaine=preg_replace('#"\(?\s?([A-Ga-g]{1})\s?([\#]{0,1})([mMr]{0,2})([0-9]{0,1})\s?\)?"#',' "%$1$2$3$4" ',$chaine);
$chaine=preg_replace('#"\*?\s{1}([A-Ga-g]{1}[0-9]{0,2})\s{1}"#',' "%*$1" ',$chaine);
				
//harmonie
$chaine=preg_replace('#"\s?([A-Ga-g]{1})\s?([0-9]{0,1})([\#b/]{0,2})\s?/?\s?([A-Ga-g]{1})\s?([\#b]{0,1})([mMr]{0,1})\s?([0-9]{0,1})\s?"#','"%$1$2$3$4$5$6$7" ',$chaine);
												
//délimiteur @ pour les mesures
$chaine=preg_replace('#([:\|\[]{0,1})([:\|]{1})([:\|12]{0,1})([:\|12\]]{0,1})#',' @$1$2$3$4 ',$chaine);

//triolets
$chaine=preg_replace('#\(3\s{0,2}([\^_=]{0,1}[a-gA-Gz]{1}[\',]{0,1})\s?(\/?)\s{0,2}([\^_=]{0,1}[a-gA-Gz]{1}[\',]{0,1})\s?(\/?)\s{0,2}([\^_=]{0,1}[a-gA-Gz]{1}[\',]{0,1})\s?(\/?)#','(3 $1$2-0 $3$4-0 $5$6-0 ',$chaine);
		
//gestion <  et >
$chaine=preg_replace('#([a-gA-Gz]{1}[\',]{0,1})\s{1,}>\s{1,}([a-gA-Gz]{1}[\',]{0,1})#','$1-3/2 $2-/2',$chaine);
$chaine=preg_replace('#([a-gA-Gz]{1}[\',]{0,1})\s{1,}<\s{1,}([a-gA-Gz]{1}[\',]{0,1})#','$1-/2 $2-3/2',$chaine);
$chaine=preg_replace('#-/([24]{0,1})#','-/$1',$chaine);    //je remplace / par /2 ou /4
$chaine=str_replace('-','',$chaine);

//remplacer, au cas où, les espaces multiples
$chaine=preg_replace('#\s{1,}#',' ',$chaine);
$chaine=preg_replace('#\]\[#','] [',$chaine);
				
//accords   //enlever les silences (pour 2 notes puis pour 3 notes)
$chaine=preg_replace('#\[\s?([\^=_]?[A-Ga-g][\',]?)[23468]?\s?([\^=_]?[A-Ga-g][\',]?[23468]?)\s?]#','[$1$2]',$chaine);
$chaine=preg_replace('#\[\s?([\^=_]?[A-Ga-g][\',]?)[23468]?\s?([\^=_]?[A-Ga-g][\',]?)[23468]?\s?([\^=_]?[A-Ga-g][\',]?[23468]?)\s?\]#','[$1$2$3]',$chaine);
				
//bug avec t'20...???
$chaine=preg_replace('#t\'#','t',$chaine);
//bug avec >]
$chaine=str_replace('>]',']',$chaine);
					
//tout est en chaine (et en ligne, avec le for de la page traitement.php
//les symboles sont regroupés, et séparés par un blanc

//--------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------transformer les lettres en chiffres----------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------
//découpage de la chaine avec le délimiteur ' ' ; mise en array "symboles"
$symboles=explode(' ',$chaine);  
						
//réutilisation du nom $chaine pour la variable qui contiendra tous les symboles traités.
$chaine=array();

for($j=0;$j<count($symboles);$j++){
	$signe=$symboles[$j]; 
			
	//si le symbole est entre guillemets, ne pas le remplacer
	if(isset($signe[0]) && $signe[0]=='"'){
		$chaine[]=$signe;
	} //on transforme les notes
	else if(isset($_POST['lare']) && $_POST['lare']=='lare2'){
		include($ROOT_PATH . 'includes/transpoLARE.php');
 
		if($tonalite=='Dmaj') include($ROOT_PATH . 'includes/Cmaj.php');
		else if($tonalite=='Emin')	include($ROOT_PATH . 'includes/Dmin.php');
		else if($tonalite=='Gmaj')	include($ROOT_PATH . 'includes/Fmaj.php');
		else if($tonalite=='Amin')	include($ROOT_PATH . 'includes/Gmin.php');
		else if($tonalite=='Bmin')	include($ROOT_PATH . 'includes/Amin.php');
		else if($tonalite=='Cmaj')	include($ROOT_PATH . 'includes/Bbmaj.php');
		else{
			$image = imagecreate(1000,700);
			$blanc = imagecolorallocate($image, 255, 255, 255);
			$vert=imagecolorallocate($image,159,216,26);
			imagepng($image);
			imagedestroy($image);
			Header("Location: ".$ROOT_PATH."utils/page.php?a=4");
			exit;
		}
								
		$chaine[]=$signe;
	}
	else{
		include($ROOT_PATH . 'includes/'.$tonalite.'.php');
		$signe=preg_replace('#=#','',$signe);
		$chaine[]=$signe;
	}
}

//contrôle visuel
//chaine est un array contenant tous les symboles
for($i=0;$i<count($chaine);$i++){
	//ajout du délimiteur - pour séparer la hauteur de la durée
	$chaine[$i]=preg_replace('#([ptz]{1})([0-9\/]{1})#','$1-$2',$chaine[$i]);		
}

//fin tonalité
		
//-------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------gestion du rythme : décalages etc--------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------

//coefficient d'aggrandissement pour la longueur des traits, ou l'espace pour la note suivante. Il y aura par la suite un autre décalage 
//pour uniformiser les décalages, $x varie juste en fonction de la durée de la note.
//ex:croche=20   noire=40 etc
$x=20;   
$signeETduree=array();
$decalage=0;

//la variable bid représentera par exemple 7p30 ; le séparateur sera p ou t
//passage en revue des différents symboles

for($j=0;$j<count($chaine);$j++){

	//simplification du nom du tableau
	$note=$chaine[$j];

	//gestion des barres de mesure, des points de reprise ou des accords entre guillemets
	if(preg_match('#\]#',$note)){    //accords
		$note=preg_replace('#([pt])-?2\]#','$1 40]',$note);
		$note=preg_replace('#([pt])\]#','$1 20]',$note);
		$note=preg_replace('#([pt])-?4\]#','$1 80]',$note);
		$note=preg_replace('#([pt])-?6\]#','$1 120]',$note);
		$note=preg_replace('#([pt])-?8\]#','$1 160]',$note);
		$note=preg_replace('#([pt])-?3\]#','$1 60]',$note);
		
		$note=preg_replace('#\s#','',$note);
		$bid=preg_replace('#-#','_',$note);
	}
	else if(preg_match('#^@[:\[]{0,1}\|[\|12:]{0,1}[\|12:]{0,1}#',$note) || $note=='~' || $note=='(3' || preg_match('"%\*?[A-Za-z\#/0-9\(\)]{1,6}"',$note) || $note=='[' || $note==']'){
		$decalage=0;
		$bid=$note;
	}
	else if(preg_match('#\{#',$note)){
		$bid=$note;
		$decalage=0;
	}
	else if(preg_match('#-#U',$note)){    //si la note a une indication de rythme
		$noteExplosee=explode('-',$note);
		if($noteExplosee[1]=='3/2')  $duree=1.5*$L; //pour les noires pointées
		else if($noteExplosee[1]=='/2' ||$noteExplosee[1]=='/')  $duree=0.5*$L;  //pour les doubles-croches
		else if($noteExplosee[1]=='3/4')  $duree=0.75*$L;  //pour les doubles-croches
		else if($noteExplosee[1]=='/4')  $duree=0.25*$L;  //pour les doubles-croches
		else  $duree=(intval($noteExplosee[1]))*$L;//pour toutes les autres durées (8, 6 etc...)
							
		$decalage=$x*$duree;  
		//remise en chaine du symbole sous la forme 7p40
		$bid=$noteExplosee[0].$decalage;
	}
	else if(preg_match('#[0-9]{1,2}[\',"]{0,1}t|p#',$note) || $note=="z"){    //gestion des croches
		$decalage=$x*$L;
		$bid=$note.$decalage;
	}
	else $decalage=0;//une action par défaut au cas où
				
		//on place les symboles $bid dans un array
		if(isset($bid))	$signeETduree[]=$bid; 
		unset($bid);
}  //fin de la boucle for
	
	
//boucle pour remettre les symboles en chaine (par ligne)
$chaine=$signeETduree[0];
//chaine est un array contenant tous les symboles
for($i=1;$i<count($signeETduree);$i++){
	$chaine=$chaine.' '.$signeETduree[$i];
}
		

if($_POST['optim']!='non') include($ROOT_PATH . 'utils/optimiserNotes.php');

//pour éviter les bugs avec les silences, je rajoute un 'p'
$chaine=preg_replace('#z(-{0,1}[0-9]{0,3})#','zp$1',$chaine);

//pour l'écriture des polkas...
$arrayPourCompter=array();
$exploRythme=explode('@',$chaine);

if(count($exploRythme)>5) $leNombre=4;
else $leNombre=count($exploRythme);

for($rrr=0;$rrr<$leNombre;$rrr++){
	$exploRythme[$rrr]=preg_replace('#[0-9]{1,2}[\'"]?[pt]{1}#','',$exploRythme[$rrr]);	
	$compte=explode(' ',$exploRythme[$rrr]);
	$addi=0;
			
	for($ttt=0;$ttt<count($compte);$ttt++){
		$addi=$addi+(int)$compte[$ttt];
	}
	$arrayPourCompter[]=$addi;
}

if(preg_match('#polka#iU',$_POST['tab']) && $metrique=='2_4' && max($arrayPourCompter)>90) $metrique='4_4';

//------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------je vais marquer les temps !----------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------

$coefficient=1;
if(!preg_match('#\*#',$PostParLignes[$abcdef])) include($ROOT_PATH . 'rythme/'.$metrique.'.php');

//-------double-notes--------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------

$chaine=preg_replace('#\[([0-9]{1,2}[\'"]{0,1}[pt]{1})_([0-9]{1,2}[\'"]{0,1}[pt]{1}[0-9]{2,3})\]#','$1 _$2',$chaine);
$chaine=preg_replace('#\[([0-9]{1,2}[\'"]?[pt])(_[0-9]{1,2}[\'"]?[pt])(_[0-9]{1,2}[\'"]?[pt][0-9]{2,3})\]#','$1 $2 $3',$chaine);

//-------triolets----------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------

$chaine=preg_replace('#([pt]{1})0#','$1-13',$chaine);
$chaine=str_replace('-13','13',$chaine);

//--------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------
//---------------------------durée...calculer la largeur de la page------------------------------------------------------------------------

$truc=explode(' ',$chaine);  //array  par symbole
$a=10;        //abscisse de départ
$apresBarreOuPoint=12*$coefficient;	//décalage après une barre de mesure ou deux points
$decalageTraitNote=22*$coefficient;   //décalage entre la note et le trait de durée	
$x=150*$coefficient;

for($j=0;$j<count($truc);$j++){   //array des symboles
	//on change l'ordonnée en fonction du poussé tiré, et on extrait la durée--------------------------------------------
			
	if(preg_match('#p#',$truc[$j])){
		$provisoire=explode('p',$truc[$j]);
		$duree=intval($provisoire[1]);
		$signe=$provisoire[0];
		}
	else if(preg_match('#t#',$truc[$j])){
		$provisoire=explode('t',$truc[$j]);
		$duree=intval($provisoire[1]);
		$signe=$provisoire[0];
	}
	else if(preg_match('#z#',$truc[$j])){
		$duree=preg_replace('#z([0-9]{1,2})#','$1',$truc[$j]);
		$signe=' ';
	}
	else if(preg_match('#"[a-zA-Z]{1,8}"#',$truc[$j])){
		unset($duree);
		$signe=preg_replace('#"#','',$truc[$j]);
	}
	else if(preg_match('#L#',$truc[$j])){
		unset($duree);
		$signe=$truc[$j];
	}
	else if(preg_match('#~#',$truc[$j])){
		unset($duree);
		$signe=$truc[$j];
	}
	else{
		unset($duree);  //!!autrement ça bug	
		$provisoire=explode(' ',$truc[$j]);
		$signe=$provisoire[0];
	}
			
	if(isset($duree)) $notesuivante=$duree*$coefficient*2;
	else $notesuivante=0;	
	
	//--------je place le chiffre----------------------------------------------------------------------------------------------------	
	//---------je trace un trait-----------------------------------------------------------------------------------------------------
	if(isset($duree)){
		$x=$x+$notesuivante;
	}// fin isset durée  //début Signes.........................................................................................
	else if(preg_match('#\|#',$signe)){
		$x=$x+$apresBarreOuPoint+10;			
	}
	else if($signe==':'){
		$x=$x+4;
	}
	else{
		$x=$x+$notesuivante;
	}	
}
$ArrayLargeurDeLaLigne[]=$x;

?>