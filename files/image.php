<?php
header("Content-type: image/png");
error_reporting(0);
// error_reporting(E_ALL | E_STRICT);
// ini_set('display_errors', 'Off');

include('set.php');
include($ROOT_PATH . 'utils/fonction.php');
include($ROOT_PATH . 'utils/traitement_1.php');

$test = 0;

$notesDuFichierAbc=$_POST['tab'];
$notesDuFichierAbc=preg_replace('$"$','\\"',$notesDuFichierAbc);

	
$largeur=$Xmax;
$pieddepage=200;	

if(!isset($parole)) $parole=0;
$longueur=(($nombreDeSystemes*500)+150+(count((array)$parole)*40))*$coefficient;
	

// ********************************************************************************************
// ********************************************************************************************
//création de l'image	
		
$image = imagecreate($largeur,$longueur);
			
//couleurs
if(isset($_POST['R']) && isset($_POST['G']) && isset($_POST['B']) && isset($_POST['R2']) && isset($_POST['G2']) && isset($_POST['B2'])){
	if($_POST['R']>255 || $_POST['G']>255 || $_POST['B']>255 || $_POST['R']<0 || $_POST['G']<0 || $_POST['B']<0){
		$_POST['R']=255;
		$_POST['G']=255;
		$_POST['B']=255;
	}
	if($_POST['R2']>255 || $_POST['G2']>255 || $_POST['B2']>255 || $_POST['R2']<0 || $_POST['G2']<0 || $_POST['B2']<0){
		$_POST['R2']=0;
		$_POST['G2']=0;
		$_POST['B2']=0;
	}
	$couleur1=$_POST['R'];
	$couleur2=$_POST['G'];
	$couleur3=$_POST['B'];
	$couleur4=$_POST['R2'];
	$couleur5=$_POST['G2'];
	$couleur6=$_POST['B2'];
}//isset fin	
else{
	$couleur1=255;
	$couleur2=255;
	$couleur3=255;
	$couleur4=0;
	$couleur5=0;
	$couleur6=0;
}

$blanc = imagecolorallocate($image, $couleur1, $couleur2, $couleur3);
$jaunepal=imagecolorallocate($image,229,239,237);
$vert=imagecolorallocate($image,159,216,26);

$grisclair=imagecolorallocate($image,243,243,243);
$grisBA= imagecolorallocate($image, $couleur4, $couleur5,$couleur6);
$grisclair2=imagecolorallocate($image,230,230,230);
$grey = imagecolorallocate($image, 128, 128, 128);
$noir = imagecolorallocate($image, $couleur4, $couleur5,$couleur6);

$police=$ROOT_PATH .'statique/verdana.ttf';
$police2=$ROOT_PATH .'statique/Gabrielle.ttf';
$angle=0;
$taille=16*$coefficient;


if(isset($_POST['parto']) && $_POST['parto']=='non') $partition=1;
else if(isset($_POST['lare']) && $_POST['lare']=='lare2')  $partition=1;
else $partition=0;



//--------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------
//------------------------Titre-----------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------
if(!isset($titre)){
	$titre='titre inconnu';
}

$placeTitre=54*$coefficient;
$sizeTitre=30*$coefficient;
$bbox = imagettfbbox($sizeTitre,0, $police, $titre);

$hauteurTitre = ceil(($largeur - $bbox[2]) / 2);
imagettftext($image,$sizeTitre,0,$hauteurTitre+(2*$coefficient),$placeTitre+(2*$coefficient),$grey,$police,$titre);
imagettftext($image,$sizeTitre,0,$hauteurTitre,$placeTitre,$noir,$police,$titre);
$placeTitre=$placeTitre+(100*$coefficient);



//Tonalité K
$nombreMystere=75*$coefficient;
if(isset($tonalite) && $afficheTon==0){
	include($ROOT_PATH . 'utils/afficheTonalite.php');
	imagettftext($image,13*$coefficient,0,20,120,$noir,$police,'Tonique : '.$tonique);
	imagettftext($image,13*$coefficient,0,20,140,$noir,$police,'Mode : '.$mode);
}

if(isset($Z)){
	$transABC='Tablature à partir d\'un fichier ABC transcrit par : '.$Z;
	imagettftext($image,10,0,15,20,$noir,$police,$transABC);
}

//compositeur C
if(isset($compositeur)){
	$compositeur='Compositeur : '.$compositeur;
	$arrayCompo=imagettfbbox($taille, $angle , $police , $compositeur );
	$longueurComp=$largeur-60-$arrayCompo[2]-$arrayCompo[0];
	imagettftext($image,13*$coefficient,0,$longueurComp,120,$noir,$police,$compositeur);
}


if(isset($danse)){
	if(isset($origine)) $a_ecrire='Danse : '.$danse.'  -   Origine : '.$origine;
	else $a_ecrire='Danse : '.$danse;

	$placeTitre=$placeTitre-(70*$coefficient);
	$sizeTitre=13*$coefficient;
	$bbox = imagettfbbox($sizeTitre,0, $police, $a_ecrire);
	$hauteurTitre = ceil(($largeur - $bbox[2]) / 2);
	imagettftext($image,$sizeTitre,0,$hauteurTitre,$placeTitre,$noir,$police,$a_ecrire);
	$placeTitre=$placeTitre+(70*$coefficient);
}


if(isset($harmonie) && $harmonie!='root') imagettftext($image,10,0,10,($placeTitre-(30*$coefficient)),$grisBA,$police,$harmonie);

//--------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------
//------------------------Copyright-----------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------

if($largeur<(500*$coefficient)) $tailleCopy=20*$coefficient;
else $tailleCopy=50*$coefficient;

$copyright='www.erwan-diato.fr&#169; - '.date("Y");
$bbox2 = imagettfbbox($tailleCopy,45, $police, $copyright);
$largeur2 = ceil(($largeur - $bbox2[2]) / 2);
$hauteur2 = ceil(($longueur - $bbox2[3] - $bbox2[1]) / 2);
imagettftext($image,$tailleCopy,45,$largeur2,$hauteur2,$grisclair,$police,$copyright);

//--------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------
//------------------------Tablature-----------------------------------------------------------------------------------------------------
//---> bouclages sur les notes, mesures etc----------------------------------------------------------------------------------------------

$ligne=$ABCparLignes;

//si c'est de la gavotte, je marque juste les temps à la main gauche
if(preg_match('#gavotte#i',$_POST['tab'])){
	if($metrique!='4_4'){
		$metriqueGavotte='6_8';
		if($metrique=='12_8') $metriqueGavotte='12_8';
		$metrique='gavotte';
	}
}



for($i=0;$i<count($ligne);$i++){
	
	$metrique=$metriqueArray[$i];
	$armure=$ArmureArray[$i];
		
	if(preg_match('#"%\*[A-Ga-g]{1}"#',$ligne[$i])) $acc=1;
	else $acc=0;

    //décalage de la première note
	$a=10*$coefficient;        //abscisse de départ
	$placeTitre=$placeTitre+200;
	if($partition==0) $b=$placeTitre+($i*230*$coefficient);	
	else $b=$placeTitre+($i*80*$coefficient);			//ordonnée de départ, et incrémentation
	$lp=$b+(35*$coefficient);   //lettre poussée
	$lt=$b+(85*$coefficient);   //lettre tirée
	$lBa=$b+(135*$coefficient);   //lettre basses et accords
	$apresBarreOuPoint=6*$coefficient;	//décalage après une barre de mesure ou deux points
	$decalageTraitNote=22*$coefficient;   //décalage entre la note et le trait de durée	
	$x=150*$coefficient;
	$hParto=$b-130;
	$decalageLignes=12;
	$RelieCroche=0;
	$triolet=0;
	$trioletArcParto=array();
	$relieCrPntDble=0;
	$diese=0;
	$ligneplus=0;
	$silence=0;
	$doublecroche=0;
	$doubleNote=0;
	$yBasQueue=0;
	$plusieursOrnements=0;
	$aaccord=0;
	$aaccord2=0;
	$accordAprs=0;
	$nombreTest=0;
	$ornement=0;
	$debutBarre=0;

	$notesParto = array(
		"absc" => array(),
		"ordo" => array(),
		"duree" => array(),
		"silence" => array(),
		"ligne" => array(),
		"diese" => array()
	);



	//gestion des espaces en début et fin de chaine
	$ligne[$i]=preg_replace('#^\s{1,}#','',$ligne[$i]);
	$ligne[$i]=preg_replace('#\s{1,}$#','',$ligne[$i]);
	$ligne[$i]=preg_replace('#\s{1,}#',' ',$ligne[$i]);
	$ligne[$i]=preg_replace('#([:\|\[]{0,1})([:\|]{1})([:\|12]{0,1})([:\|12\]]{0,1})#',' @$1$2$3$4 ',$ligne[$i]);
	$mesures=explode('@',$ligne[$i]);  //array par ligne ET par mesure

	for($kk=0;$kk<count($mesures);$kk++){

		$nbreP=substr_count($mesures[$kk],'p');
		$nbreT=substr_count($mesures[$kk],'t');
		$nombreTest=$nbreP+$nbreT;
		$truc=explode(' ',$mesures[$kk]);  //array par ligne, mesure ET par symbole

		for($j=0;$j<count($truc);$j++){					
			$noire=0;
			$croche=0;	
			$doublecroche=0;
			$DbleCrDble=0;
			$CrNoireCr=0;
			//on change l'ordonnée en fonction du poussé tiré, et on extrait la durée					
							
			if(preg_match('#L#',$truc[$j])){
				unset($duree);
				$signe=$truc[$j];
			}
			else if(preg_match('#p$#',$truc[$j]) && !preg_match('#_#',$truc[$j])){
				$yRectificationAccord=$lp;
				$y=$lp-10;
				$provisoire=explode('p',$truc[$j]);
				$duree=0;
				$signe=$provisoire[0];
				$signeNote=$signe.'p';
				$signeNote=preg_replace('#[1-8]{1}-(.*)#','$1',$signeNote);
				$tiret=0;
			}
			else if(preg_match('#t$#',$truc[$j]) && !preg_match('#_#',$truc[$j])){
				$yRectificationAccord=$lt;
				$y=$lt-10;
				$provisoire=explode('t',$truc[$j]);
				$duree=0;
				$signe=$provisoire[0];
				$signeNote=$signe.'t';
				$signeNote=preg_replace('#[1-8]{1}-(.*)#','$1',$signeNote);
				$tiret=1;
			}
			else if($aaccord2==1 && preg_match('#_[0-9]{1,2}[\'"]{0,1}p#',$truc[$j])){
				$aaccord2=2;
				$y=$lp;
				$yRectificationAccord=$lp;
				$truc[$j]=preg_replace('#\_#','',$truc[$j]);
				$provisoire=explode('p',$truc[$j]);
				$duree=intval($provisoire[1]);
				$signe=$provisoire[0];
				$signeNote=$signe.'p';
				$signeNote=preg_replace('#[1-8]{1}-(.*)#','$1',$signeNote);
				$aaccord=1;  //pour la partition					
			}
			else if($aaccord2==1 && preg_match('#_[0-9]{1,2}[\'"]{0,1}t#',$truc[$j])){
				$aaccord2=2;
				$y=$lt;
				$yRectificationAccord=$lt;
				$truc[$j]=preg_replace('#\_#','',$truc[$j]);
				$provisoire=explode('t',$truc[$j]);
				$duree=intval($provisoire[1]);
				$signe=$provisoire[0];
				$signeNote=$signe.'t';
				$signeNote=preg_replace('#[1-8]{1}-(.*)#','$1',$signeNote);
				$aaccord=1;  //pour la partition						
			}
			else if(preg_match('#_[0-9]{1,2}[\'"]{0,1}p#',$truc[$j])){						
				$y=$lp+10;
				$yRectificationAccord=$lp;
				$truc[$j]=preg_replace('#\_#','',$truc[$j]);
				$provisoire=explode('p',$truc[$j]);
				$duree=intval($provisoire[1]);
				$signe=$provisoire[0];
				$signeNote=$signe.'p';
				$signeNote=preg_replace('#[1-8]{1}-(.*)#','$1',$signeNote);
				$aaccord=1;  //pour la partition
				$aaccord2=1;
			}
			else if(preg_match('#_[0-9]{1,2}[\'"]{0,1}t#',$truc[$j])){
				$y=$lt+10;
				$yRectificationAccord=$lt;
				$truc[$j]=preg_replace('#\_#','',$truc[$j]);
				$provisoire=explode('t',$truc[$j]);
				$duree=intval($provisoire[1]);
				$signe=$provisoire[0];
				$signeNote=$signe.'t';
				$signeNote=preg_replace('#[1-8]{1}-(.*)#','$1',$signeNote);
				$aaccord=1;  //pour la partition
				$aaccord2=1;
			}
			else if(preg_match('#z#',$truc[$j])){
				$y=($lp+$lt)/2;
				$provisoire=explode('p',$truc[$j]);
				$duree=intval($provisoire[1]);
				$signe=$provisoire[0];
				$signeNote='z';
			}
			else if(preg_match('#p\}#',$truc[$j])){
				$plusieursOrnements++;
				$y=$lp-19;
				$signe=preg_replace('#\{([0-9\'"]{1,3})p\}#','$1',$truc[$j]);
				$ornement=1;
			}
			else if(preg_match('#t\}#',$truc[$j])){
				$plusieursOrnements++;
				$y=$lt-19;
				$signe=preg_replace('#\{([0-9\'"]{1,3})t\}#','$1',$truc[$j]);
				$ornement=1;
			}
			else if(preg_match('#p#',$truc[$j])){
				$y=$lp;
				$provisoire=explode('p',$truc[$j]);
				$duree=intval($provisoire[1]);
				$signe=$provisoire[0];
				$signeNote=$signe.'p';
				$signeNote=preg_replace('#[1-8]{1}-(.*)#','$1',$signeNote);
				$tiret=0;
			}
			else if(preg_match('#t#',$truc[$j])){
				$y=$lt;
				$provisoire=explode('t',$truc[$j]);
				$duree=intval($provisoire[1]);
				$signe=$provisoire[0];
				$signeNote=$signe.'t';
				$signeNote=preg_replace('#[1-8]{1}-(.*)#','$1',$signeNote);
				$tiret=1;
			}
			else if(preg_match('"%[A-Za-z\#/0-9\(\)]{1,6}"',$truc[$j])){ 
				unset($duree);
				$signe=preg_replace('#"#','',$truc[$j]);
				$signe=preg_replace('#%#U','',$truc[$j]);
			}
			else if(preg_match('#~#',$truc[$j])){
				unset($duree);
				$signe=$truc[$j];
			}
			else{
				unset($duree);  //!!autrement ça bug
				$y=$b;	
				$provisoire=explode(' ',$truc[$j]);
				//$duree=intval($provisoire[1]);
				$signe=$provisoire[0];
			}
							
			if(isset($duree)) $notesuivante=$duree*$coefficient*2;
			else $notesuivante=0;	

			//--------je place le chiffre------------------------------------------------------------------------------------------------	
			//---------je trace un trait-------------------------------------------------------------------------------------------------
			
			if($ornement==1 && $plusieursOrnements==1){
				if(strlen($signe)>2) $pluplu=20;
				else $pluplu=12;
				$x=$x-$pluplu;
				imagettftext($image,$taille-7,$angle,$x,$y,$noir,$police,$signe);
				$x=$x+$pluplu;
				$ornement=0;
			}
			else if($ornement==1 && $plusieursOrnements==2){
				if(strlen($signe)>2) $pluplu=10;
				else $pluplu=5;
				$x=$x-$pluplu;
				imagettftext($image,$taille-7,$angle,$x,$y,$noir,$police,$signe);
				$x=$x+$pluplu;
				$ornement=0;
				$plusieursOrnements=0;
			}
			else if(isset($duree)){  // ! début d'un long bloc de conditions
				if($acc==0){
					if(preg_match('#[0-8]{1}-#',$signe)){
						if(isset($_POST['maing']) && $_POST['maing']=='non'){
							$signe=preg_replace('#[0-9]{1}-(.*)#','$1',$signe);
						}
						else include($ROOT_PATH . 'rythmeimage/'.$metrique.'.php');
					}
				}
				else{
					$signe=preg_replace('#[1-8]-#','',$signe);
				}
			
				if($signe=='z'){
					if($duree==40){
						$noire=imagecreatefrompng('image/noire.png');
						imagecopymerge($image,$noire,$x,$lp,0,0,13,31,100);
						imagedestroy($noire);
					}
					else if($duree==60){
						$noire=imagecreatefrompng('image/noire.png');
						imagecopymerge($image,$noire,$x,$lp,0,0,13,31,100);
						imagedestroy($noire);
						imagefilledellipse($image, $x+17, $lt-22, (5*$coefficient), (5*$coefficient), $noir);
					}							
					else if($duree==20){
						$croche=imagecreatefrompng('image/croche.png');
						imagecopymerge($image,$croche,$x,$lp,0,0,12,21,100);
						imagedestroy($croche);
					}
					else if($duree==10){
						$doublecroche=imagecreatefrompng('image/doublecroche.png');
						imagecopymerge($image,$doublecroche,$x,$lp,0,0,13,27,100);
						imagedestroy($doublecroche);
					}
					else if($duree==80){
						$x=$x+($notesuivante/2);
						imagefilledrectangle ($image , $x-10 ,$b+(50*$coefficient) ,$x+10 , $b+(40*$coefficient) ,$noir );
					}
					else{
						$noire=imagecreatefrompng('image/noire.png');
						imagecopymerge($image,$noire,$x,$lp,0,0,13,31,100);
						imagedestroy($noire);
					}
				
					include($ROOT_PATH . 'utils/noteparto.php');
					if($duree==80)	$x=$x-($notesuivante/2);
				}
				else{
					if($corgeron==1) include($ROOT_PATH . 'utils/corgeron.php');
					else{
						if(preg_match('#[0-9]{2}#',$signe)){  //décalage pour les 10, 11...
							$x=$x-10;
							imagettftext($image,$taille,$angle,$x,$y,$noir,$police,$signe);
							$x=$x+10;
						}
						else{
							if($aaccord2==2) $x=$x+12;
							imagettftext($image,$taille,$angle,$x,$y,$noir,$police,$signe);  //j'écris la note
							if($aaccord2==2){
								$x=$x-12;
								$aaccord2=0;
							}
						}
					}
					include($ROOT_PATH . 'utils/noteparto.php');
				} 
			
				$abs1=$x+$decalageTraitNote;
				$abs2=$x+$notesuivante-($duree/5);
							
				if($aaccord!=0) $y=$yRectificationAccord;
				$y=$y-(8*$coefficient);
				
				$x=$x+$notesuivante;
					
				if($signe=='z') $ohdbckjds=0;
				else if(isset($erwan) && preg_match('#an\s?dro#i',$_POST['tab'])){
					if($duree==60*$L || $duree==80*$L || $duree>=120*$L  ){
						if(!preg_match('#z#',$signe)) imageline($image,$abs1,$y,$abs2,$y,$noir);
					}
				}	
				else if($metrique=='3_8bourree' && $L==0.5){
					if($duree>79*$L){
						if(!preg_match('#z#',$signe)) imageline($image,$abs1,$y,$abs2,$y,$noir);
					}
				}				
				else if(isset($erwan) && preg_match('#hanter\s?dro#i',$_POST['tab'])){
					if($duree==60*$L || $duree==80*$L || $duree>=120*$L){
						if(!preg_match('#z#',$signe)) imageline($image,$abs1,$y,$abs2,$y,$noir);
					}
				}	
				else if($metrique=='gavotte'){
					if( $duree==60*$L || $duree==80*$L || $duree>=120*$L){
						if(!preg_match('#z#',$signe)) imageline($image,$abs1,$y,$abs2,$y,$noir);
					}
				}	
				else if($metrique=='3_4'){
					if($duree==40*$L || $duree==60*$L || $duree==80*$L || $duree>=120*$L){
						if(!preg_match('#z#',$signe)) imageline($image,$abs1,$y,$abs2,$y,$noir);
					}
					else if($L==2 && $duree==60) imageline($image,$abs1,$y,$abs2,$y,$noir);
					else $ojjz=0;	
				}	
				else if($metrique=='2_4'){
					if($L==0.5 && $duree>39) imageline($image,$abs1,$y,$abs2,$y,$noir);
				}	
				else if($metrique=='6_8'){
					if($L==0.5 && $duree>39) imageline($image,$abs1,$y,$abs2,$y,$noir);
					else if($duree>29) imageline($image,$abs1,$y,$abs2,$y,$noir);
					else $ooooz=0;
				}	
				else{
					if($duree==30*$L || $duree==40*$L || $duree==60*$L || $duree==80*$L || $duree>=120*$L){
						if(!preg_match('#z#',$signe)) imageline($image,$abs1,$y,$abs2,$y,$noir);
					}
					else if($L==4 && $duree>40) imageline($image,$abs1,$y,$abs2,$y,$noir);
					else $ojjz=0;
				}		
			}// fin isset durée		
			else if(preg_match('#\|#',$signe)){   // début signes
				$signe=ltrim($signe);
				$signe=trim($signe);
				$finBarre=0;
								
				for($q=0;$q<strlen($signe);$q++){
					if($corgeron==1) $yy2=$hParto-45;
					else $yy2=$hParto;
											
					if(preg_match('#[0-9]{1}#',$signe[$q])){
						$x=$x-$apresBarreOuPoint-10; //pour revenir à la dernière position
						if($partition==0) imageline($image,$x,$hParto,$x+(30*$coefficient),$hParto-(30*$coefficient),$noir);   //ligne sur le côté parto
						if($corgeron==0){ 
							imageline($image,$x,$y,$x+(30*$coefficient),$y-(30*$coefficient),$noir);   //ligne sur le côté
							imagettftext($image,$taille,$angle,$x,$b-(15*$coefficient),$noir,$police,$signe[$q]);
						}
						if($partition==0) imagettftext($image,$taille,$angle,$x,$hParto-(15*$coefficient),$noir,$police,$signe[$q]); //parto
						$x=$x+$apresBarreOuPoint;
					}
					else if(strlen($signe)==4 && $signe[$q]==':'){
						$x=$x-6;
						//parto
						if($partition==0)	imagefilledellipse($image, $x, $hParto+(1.5*$decalageLignes), (4*$coefficient), (4*$coefficient), $noir);
						if($partition==0)	imagefilledellipse($image, $x, $hParto+(2.5*$decalageLignes), (4*$coefficient), (4*$coefficient), $noir);
							//tab
						imagefilledellipse($image, $x, $lp+(5*$coefficient), (4*$coefficient), (4*$coefficient), $noir);
						imagefilledellipse($image, $x, $lp+(25*$coefficient), (4*$coefficient), (4*$coefficient), $noir);
						$x=$x+8;
					}
					else if($signe[$q]==':'){
						if($x<270) $x=$x-6;
						else $x=$x+2;
						//parto
						if($partition==0)	imagefilledellipse($image, $x, $hParto+(1.5*$decalageLignes), (4*$coefficient), (4*$coefficient), $noir);
						if($partition==0)	imagefilledellipse($image, $x, $hParto+(2.5*$decalageLignes), (4*$coefficient), (4*$coefficient), $noir);
							//tab
						imagefilledellipse($image, $x, $lp+(5*$coefficient), (4*$coefficient), (4*$coefficient), $noir);
						imagefilledellipse($image, $x, $lp+(25*$coefficient), (4*$coefficient), (4*$coefficient), $noir);
						if($x>200) $x=$x+8;
						else $x=$x+14;
					}
					else if($signe[$q]=='[' && $x<80){
						$x=($a+45)*$coefficient;
						imageline($image,$x,$b+(150*$coefficient),$x+(15*$coefficient),$b+(165*$coefficient),$grisBA);
						imageline($image,$x,$y,$x+(15*$coefficient),$y-(15*$coefficient),$noir);
						imageline($image,$x,$y,$x,$y+(150*$coefficient),$noir); //ligne verticale
						if($partition==0) imageline($image,$x,$hParto,$x,$hParto+(4*$decalageLignes),$noir); //ligne verticale parto
						$x=$x+$apresBarreOuPoint;
					}
					else if($signe[$q]==']'){
						imageline($image,$x,$b+(150*$coefficient),$x-(15*$coefficient),$b+(165*$coefficient),$grisBA);
						imageline($image,$x,$y,$x-(15*$coefficient),$y-(15*$coefficient),$noir);
						if($partition==0) imageline($image,$x,$hParto,$x,$hParto+(4*$decalageLignes),$noir); //ligne verticale parto
						imageline($image,$x,$y,$x,$y+(150*$coefficient),$noir); //ligne verticale
						$x=$x+$apresBarreOuPoint;
					}
					else if($signe[$q]=='|' && $debutBarre==1 && !preg_match('#\[#',$signe)){
						if($partition==0) imageline($image,$x,$hParto,$x,$hParto+(4*$decalageLignes),$noir); //ligne verticale parto
						if($corgeron==1) imageline($image,$x,$hParto,$x,$y+(150*$coefficient),$noir); //ligne verticale
						else imageline($image,$x,$y,$x,$y+(150*$coefficient),$noir); //ligne verticale
						$x=$x+$apresBarreOuPoint+10;
						$debutBarre=0;
					}		
					else if($signe[$q]=='|' && $x<151 && !preg_match('#\[#',$signe)){
						$x=$x-9;
						$debutBarre=1;
					}
					else if($signe[$q]=='|' && $finBarre==1){
						$x=$x-8;
						if($partition==0)	imageline($image,$x,$hParto,$x,$hParto+(4*$decalageLignes),$noir); //ligne verticale parto
						if($corgeron==1) imageline($image,$x,$hParto,$x,$y+(150*$coefficient),$noir); //ligne verticale
						else imageline($image,$x,$y,$x,$y+(150*$coefficient),$noir); //ligne verticale
							$x=$x+10+$apresBarreOuPoint;
					}
					else{
						if($partition==0) imageline($image,$x,$hParto,$x,$hParto+(4*$decalageLignes),$noir); //ligne verticale parto
						if($corgeron==1) imageline($image,$x,$hParto,$x,$y+(150*$coefficient),$noir); //ligne verticale
						else  imageline($image,$x,$y,$x,$y+(150*$coefficient),$noir); //ligne verticale
						$x=$x+$apresBarreOuPoint+10;
						$finBarre=1;
					}	// fin if preg match $signe
																				
				} // fin boucle for $signe

				//gestion des erreurs d'écriture de notes partition
				$RelieCroche=0;
				$relieCrPntDble=0;
				$ReliedoubleCroche=0;
				$abscisse=array();
				$ordonnee=array();
				$ordonneeBas=array();
				$ordonneehaut=array();
				$ordonneebas=array();
				$trioletArcParto=array();
				$proviArrayY=array();
				$triolet=0;
				}  // fin else if(preg_match('#\|#',$signe))
			else if(preg_match('#L#',$signe)){
				$xDecale=intval(preg_replace('#[1-8]{0,1}-{0,1}([0-9]{1,3})L#','$1',$signe));
				$x=$x-($xDecale*$coefficient);	
				if($acc==0) include($ROOT_PATH . 'rythmeimage/'.$metrique.'.php');	
				$x=$x+($xDecale*$coefficient);	
			}
			else if($signe=='(3'){
				//tab
				if($corgeron==0){
				imagearc($image,$x+(35*$coefficient),$b-(5*$coefficient),(70*$coefficient),(30*$coefficient),190,350,$noir);
				imagettftext($image,$taille-(6*$coefficient),$angle,$x+(31*$coefficient),$b-(27*$coefficient),$noir,$police,'3');
				}
			}
			else if($signe=='~'){
				if($rollMordant==0){								
					if(preg_match('#p#',$truc[$j+1])) imagettftext($image,$taille,$angle,$x-2,$lp-20,$noir,$police,'~');
					else imagettftext($image,$taille,$angle,$x-2,$lt-20,$noir,$police,'~');
				}
				else{
					if(preg_match('#p#',$truc[$j+1])){
					$mordant=imagecreatefrompng('image/mordant.png');
					imagecopymerge($image,$mordant,$x-1,$lp-30,0,0,18,7,100);
					imagedestroy($mordant);
					}
					else{
					$mordant=imagecreatefrompng('image/mordant.png');
					imagecopymerge($image,$mordant,$x-1,$lt-30,0,0,18,7,100);
					imagedestroy($mordant);
					}
				}
			}
			else if(preg_match('#[A-Ga-gmM\#\(\)0-9]{1,6}#',$signe)){    //pour les indication d'accords 
				if($acc==6){
					$signe=preg_replace('#"([a-zA-Z0-9/\#\(\)]{1,8})"#','$1',$signe);
					if(preg_match('#[0-9]#',$signe)){
						$signe=preg_replace('#([A-Ga-g]{1})([0-9]{1,2})#','$1 $2',$signe);
						$noteMainGauche=explode(' ',$signe);
						imagettftext($image,$taille-(3*$coefficient),$angle,$x,$lBa,$grisBA,$police,$noteMainGauche[0]);
						$notesuivante=$noteMainGauche[1]*$coefficient*2*20;
						$abs1=$x+$decalageTraitNote;
						$abs2=$x+$notesuivante-($notesuivante/5);
						$y=$lBa-(8*$coefficient);
						imageline($image,$abs1,$y,$abs2,$y,$noir); 
					}
					else imagettftext($image,$taille-(3*$coefficient),$angle,$x,$lBa,$grisBA,$police,$signe);
				}
				else if(preg_match('#"%\*[A-Ga-g]{1}[\#b]{0,1}[0-9]{0,1}"#',$signe)){
					$signe=preg_replace('#"%\*([A-Ga-g]{1}[\#b]{0,1}[0-9]{0,1})"#','$1',$signe);						
					if(preg_match('#[0-9]#',$signe)){
						$signe=preg_replace('#([A-Ga-g]{1})([0-9]{1,2})#','$1 $2',$signe);
						$noteMainGauche=explode(' ',$signe);
						imagettftext($image,$taille-(3*$coefficient),$angle,$x,$lBa,$grisBA,$police,$noteMainGauche[0]);
						$notesuivante=$noteMainGauche[1]*$coefficient*2*20;
						$abs1=$x+$decalageTraitNote;
						$abs2=$x+$notesuivante-($notesuivante/5);
						$y=$lBa-(8*$coefficient);
						imageline($image,$abs1,$y,$abs2,$y,$noir);
					}
					else{
						$signe=preg_replace('#([A-Ga-g]{1}[\#b]{0,1})[0-9]{0,1}#','$1',$signe);
						imagettftext($image,$taille-(3*$coefficient),$angle,$x,$lBa,$grisBA,$police,$signe);
					}
				}
				else{
					$signe=preg_replace('#"([a-zA-Z0-9/\#\(\)]{1,8})"#','$1',$signe);
					if(preg_match('#[CGF]M#',$signe)) $signe=preg_replace('#([CGF])M#','$1',$signe);
					if($corgeron==1) imagettftext($image,$taille-(3*$coefficient),$angle,$x,$lBa+(45*$coefficient),$grisBA,$police,$signe);
					else imagettftext($image,$taille-(3*$coefficient),$angle,$x,$b-(10*$coefficient),$grisBA,$police,$signe);				
				}
				$x=$x+0;
			}
			else{
				$x=$x+$notesuivante;
			}
				
		}//fin for par explode " "  --> for($j=0;$j<count($truc);$j++){
 
		// $nombreTest=$kk;
		if($partition==0 && isset($notesParto))	include($ROOT_PATH . 'utils/noteparto2.php');
		$noire=0;
		$accordAprs=0;
		$croche=0;	
		$doublecroche=0;
		$plusieursOrnements=0;
		$aaccord=0;
		$aaccord2=0;
	}//fin for mesure (boucle 2)


	$x=$x-$apresBarreOuPoint-10; 
	$a2=$a+75;
	if($corgeron==1){
		imagettftext($image,$taille,$angle,$a2+10,$lp-45,$noir,$police,"Alt");
		imagettftext($image,$taille,$angle,$a2+(15*$coefficient),$lp,$noir,$police,"C");
		imagettftext($image,$taille,$angle,$a2+(15*$coefficient),$lt,$noir,$police,"G");
	}
	else{
		imagettftext($image,$taille,$angle,$a2+(15*$coefficient),$lp,$noir,$police,"P");
		imagettftext($image,$taille,$angle,$a2+(15*$coefficient),$lt,$noir,$police,"T");
	}

	if($corgeron==1) imagettftext($image,$taille-4,$angle,$a+35,$lBa+(45*$coefficient),$grisBA,$police,'Harmonie');
	else  imagettftext($image,$taille-4,$angle,$a+35,$b-(10*$coefficient),$grisBA,$police,'Harmonie');
	imagettftext($image,$taille-4,$angle,$a+(5*$coefficient),$lBa,$grisBA,$police,"Basse accord");
	imageline($image,$a+3,$lBa+2,$a+$taille,$lBa+2,$noir);
	imageline($image,$a+60,$lBa+2,$a+70,$lBa+2,$noir);

	if($partition==0) imageline($image,$a2+(45*$coefficient),$hParto,$a2+(45*$coefficient),$hParto+(4*$decalageLignes),$noir); //ligne parto verticale
	if($corgeron==1) imageline($image,$a2+(45*$coefficient),$hParto,$a2+(45*$coefficient),$b+(150*$coefficient),$noir); //ligne PT BA verticale
	else imageline($image,$a2+(45*$coefficient),$b,$a2+(45*$coefficient),$b+(150*$coefficient),$noir);

	imageline($image, $a, $b+(50*$coefficient), $x, $b+(50*$coefficient), $noir); //ligne médiane

	if($corgeron==1) imageline ($image, $a, $b, $x, $b, $noir); 
	else imageline ($image, $a, $b, $x, $b, $noir); 
	
	imageline ($image, $a, $b+(100*$coefficient), $x, $b+(100*$coefficient), $noir); //ligne du bas
	imageline ($image, $a, $b+(150*$coefficient), $x, $b+(150*$coefficient), $noir); //ligne du bas MG

	if($partition==0){
		for($iparto=0;$iparto<5;$iparto++){
			imageline($image,$a,$hParto+($iparto*$decalageLignes),$x,$hParto+($iparto*$decalageLignes),$noir);
		}
		include($ROOT_PATH . 'utils/armure.php');
	}


}  //fin for retour à la ligne (boucle 1)




//--------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------
//------------------------Paroles-------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------
if(!isset($b)) $b=100;
$paroll=0;
$ccccc=0;
$cyy=0;
$placeTitre=$b+220*$coefficient;

if(gettype($parole)=="array"){
	for($pppooo=0;$pppooo<count((array)$parole);$pppooo++){
		$copy=(preg_replace('#W:#','',(string)$parole[$pppooo]));
		$sizeTitre=12*$coefficient;
		$bbox = imagettfbbox($sizeTitre,0, $police, $copy);
		$hauteurTitre = ceil(($largeur - $bbox[2]) / 2);
		imagettftext($image,$sizeTitre,0,$hauteurTitre+(1*$coefficient),$placeTitre+(1*$coefficient),$grey,$police,$copy);
		imagettftext($image,$sizeTitre,0,$hauteurTitre,$placeTitre,$noir,$police,$copy);
		$placeTitre=$placeTitre+(30*$coefficient);
		$paroll=1;
	}
}

if($paroll==1) $placeTitre=$placeTitre+(30*$coefficient);

//--------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------
//------------------------enregsitrement------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------

// test sans enregistrement en base et redirection :
if($test == 1){
	imagepng($image);
}
else{
include($ROOT_PATH . 'statique/pdo.php');
$date = date_create();
$date2 = date_timestamp_get($date);
$sql = 'INSERT INTO `images`(lien,tonalite,titre,notes, largeur, hauteur, idid) VALUES(?,?,?,?,?,?,?)';
$req =  $bdd->prepare($sql);
$req->execute([$date2, $tonalite, $titre, $_POST['tab'], 0, 0, 0]);
imagepng($image,'enregistrement/'.$date2.'.png');
Header("Location: edition.php");
}
imagedestroy($image);

?>