<?php
if(!isset($_POST['optimTona'])) $_POST['optimTona']='oui';
if(!isset($_POST['optim'])) $_POST['optim']='oui';
$_POST['tab']=htmlspecialchars($_POST['tab'],false);

if(isset($_POST['corg']) && $_POST['corg']=='corgeron') $corgeron=1;
else $corgeron=0;

$_POST['tab']=nl2br($_POST['tab']);
$_POST['tab']=preg_replace('#\\\<br>#','',$_POST['tab']);
$KnombreDePassages=0;
$acc=0;
$verifMetrique=0;
 
include($ROOT_PATH . 'utils/interdits.php');

function b($var){
	echo $var.'<br>';
}

function c($var){
	echo $var.'<br><br>';
}

$NotesAbcLigne=0;
$ABCparLignes=array();
$ArrayLargeurDeLaLigne=array();

$aremp=array(
	'&gt;',
	'&lt;',
	'::',
	'|1,3',
	'|2,4',
	'\"'
);

$remp=array(
	'>',
	'<',
	':|:',
	'|1',
	'|2',
	'"'
);

$_POST['tab']=str_replace($aremp,$remp,$_POST['tab']);	
$_POST['tab']=preg_replace('#\![a-zA-Z]{1,14}\!#','',$_POST['tab']);
$PostParLignes=explode('<br />',$_POST['tab']);
										
for($abcdef=0;$abcdef<count($PostParLignes);$abcdef++){  //debut for
	
	$chaine=ltrim($PostParLignes[$abcdef]);
																									
	if(isset($chaine[0]) && isset($chaine[1]))	$DebutLigne=$chaine[0].$chaine[1];
	else continue;

	//j'enlève les commentaires % en milieu de ligne
	if($chaine[0]=='%') continue;
	if(preg_match('#%#',$chaine)){
		$chi=strpos($chaine,'%');
		$sepas=$chaine[0];

		for($k=1;$k<$chi;$k++){
			$sepas=$sepas.$chaine[$k];
		}
		$chaine=$sepas;
	}
		
	if(preg_match('#[ABDEFGHIJNPQSUVVXY%]{1}:{1}#',$DebutLigne)) continue;						

	if($DebutLigne=='Z:'){
		$Z=str_replace($DebutLigne,'',$chaine);
		if($Z=='Erwan Tanguy') $erwan='Erwan Tanguy';
		continue;
	}

	if($DebutLigne=='@:'){
		$harmonie=str_replace($DebutLigne,'',$chaine);
		continue;
	}
	if($DebutLigne=='C:'){
		$compositeur=str_replace($DebutLigne,'',$chaine);
		continue;
	}
	if($DebutLigne=='O:'){
		$origine=str_replace($DebutLigne,'',$chaine);
		continue;
	}
	if($DebutLigne=='1:'){
		$soustitre=str_replace($DebutLigne,'',$chaine);
		continue;
	}
	if($DebutLigne=='2:'){
		$clavier=str_replace($DebutLigne,'',$chaine);
		continue;
	}
	if($DebutLigne=='K:'){
		$tonalite=str_replace($DebutLigne,'',$chaine);
		$tonalite=str_replace(' ','',$tonalite);
		$pourTrouveTonalite=$tonalite; 
		$KnombreDePassages++;
		include($ROOT_PATH . 'includes/tonalite.php');

		if($_POST['optimTona']!='non'){
			if($KnombreDePassages==1) include($ROOT_PATH . 'utils/trouvetonalite.php');
		} 
		continue;
	}
	else if($DebutLigne=='M:'){
		$metrique=str_replace($DebutLigne,'',$chaine);
		$metrique=preg_replace('#\s#','',$metrique);
		
		if($metrique=='C' || $metrique=='C|'){
			$metrique='4_4';
		}
		else if($metrique=='2/2' || $metrique=='6/4'){
			$metrique='4_4';
		}
		else if($metrique=='5/4'){
			$verifMetrique='5_4';
			$metrique='4_4';
		}
		else if($metrique=='4_4' && preg_match('#polka#iU',$_POST['tab'])){
			$metrique='2_4';
		}
		else{
			$metrique=str_replace('/','_',$metrique);
			if($metrique=='3_2'){
				$image = imagecreate(700,200);
				$blanc = imagecolorallocate($image, 255, 255, 255);
				$vert=imagecolorallocate($image,159,216,26);
				imagettftext($image,12,0,30,100,$vert,$police,'Métrique non prise en charge, désolé !');
				imagepng($image);
				imagedestroy($image);
				exit;
			}
		}
		continue;
	}								
	else if($DebutLigne=='T:'){
		$titre=str_replace($DebutLigne,'',$chaine);
		continue;
	}		
	else if($DebutLigne=='L:'){
		$Ltest=str_replace($DebutLigne,'',$chaine);
		$Ltest=ltrim($Ltest);
		if($Ltest=='1/8') $L=1;
		else if($Ltest=='1/4') $L=2;
		else if($Ltest=='1/16') $L=0.5;
		else if($Ltest=='1/2') $L=4;
		else $L=1;
		continue;
	}				
	else if($DebutLigne=='R:'){
		$danse=str_replace($DebutLigne,'',$chaine);
		continue;
	}	
	else if($DebutLigne=='W:'){
		$parole[]=$chaine;
		$NotesAbcLigne=0;
		continue;
	}																		
	else $NotesAbcLigne=1;

	if(isset($danse)){
		if(preg_match('#reel#i',$danse) || preg_match('#jig#i',$danse) || preg_match('#hornpipe#i',$danse) || preg_match('#slide#i',$danse)) $rollMordant=0;
		else $rollMordant=1;
	}
	else $rollMordant=1;

	if($NotesAbcLigne==1){
		if(!isset($L)) $L=1;
		if(!isset($metrique)) $metrique='4_4';
		include($ROOT_PATH . 'utils/danse.php');
		include($ROOT_PATH . 'utils/traitement_2.php');
		$NotesAbcLigne=0;
	}

	$chaine=preg_replace('#^\|#','',$chaine);
	$chaine=preg_replace('#^\s{1,}#','',$chaine);
	$chaine=ltrim($chaine);
	$ABCparLignes[]=$chaine;
	$metriqueArray[]=$metrique;
	$ArmureArray[]=$armure;

} //fin for principal (par ligne)

$nombreDeSystemes=count($ABCparLignes);

if(count($ArrayLargeurDeLaLigne)<1){
	$ArrayLargeurDeLaLigne[]=1000;
}

if(!isset($coefficient)) $coefficient=1;
$Xmax=(max($ArrayLargeurDeLaLigne))+(20*$coefficient);

//traitement du multi-tonalité, je vais éviter d'indiquer les tonalités
if(!isset($ArmureArray)) $ArmureArray=array();
if(count($ArmureArray)<1) $ArmureArray[]=1;
if(max($ArmureArray)!=min($ArmureArray)) $afficheTon=1;
else $afficheTon=0;

?>