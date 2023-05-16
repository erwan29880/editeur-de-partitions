<?php
header('Content-Type: text/xml'); 
echo "<?xml version=\"1.0\"?>\n";
$erreurVide=0;
$verifX=0;
$verifT=0;
$verifM=0;
$verifK=0;
$pbTonalite=0;
$pbentete=0;
$arrayLongueur=array();
$nombreMesures=array();

if(isset($_POST['variable'])){ 
	$chaine = $_POST['variable'];
	echo "<exemple>\n";

	$problemeCouleur=0;
	if($_POST['red']>256 || $_POST['red']<0) $problemeCouleur=1;
	if($_POST['yellow']>256 || $_POST['yellow']<0) $problemeCouleur=1;
	if($_POST['blue']>256 || $_POST['blue']<0) $problemeCouleur=1;
	if($_POST['red2']>256 || $_POST['red']<0) $problemeCouleur=1;
	if($_POST['yellow2']>256 || $_POST['yellow']<0) $problemeCouleur=1;
	if($_POST['blue2']>256 || $_POST['blue']<0) $problemeCouleur=1;
	
	if($problemeCouleur==1){
		echo '<donnee>Les couleurs renseignées ne sont pas au format RVB !</donnee>';
	}

	if($chaine==''){
		$erreurVide=1;
	}
	if(preg_match('#X:#',$chaine)){
		$verifX=1;
	}
	if(preg_match('#T:#',$chaine)){
		$verifT=1;
	}
	if(preg_match('#M:#',$chaine)){
		$verifM=1;
	}
	if(preg_match('#K:#',$chaine)){
		$verifK=1;
	}

	if($verifX==1 && $verifT==1 && $verifM==1 && $verifK==1){
		
		$chaine=nl2br($chaine,false);
		$PostParLignes=explode('<br>',$chaine);
			
		for($abcdef=0;$abcdef<count($PostParLignes);$abcdef++){  //debut for
			$chaineParLigne=ltrim($PostParLignes[$abcdef]);
			if(preg_match('#K:#',$chaineParLigne)) $ligneK=$abcdef+1;
			if(preg_match('#M:#',$chaineParLigne)) $ligneM=$abcdef;
		} //fin for
		
		if(isset($ligneM)){
			
			$ProvM=$PostParLignes[$ligneM];
			$ProvM=preg_replace('#M:\s?#','',$ProvM);
			$ProvM=str_replace('/','',$ProvM);
			
			if(preg_match('#C#',$PostParLignes[$ligneM])) $ProvM=1;	
			else if($ProvM=='44' || $ProvM=='24' ||$ProvM=='34' ||$ProvM=='64' ||$ProvM=='38' ||$ProvM=='68' ||$ProvM=='98' ||$ProvM=='128'||$ProvM=='54') $ProvM=1;	
			else if($ProvM=='22'){
				echo '<donnee>La métrique 2/2 n\'est pas prise en charge !</donnee>';
				echo '<donnee>Elle sera remplacée automatiquement par 4/4 !</donnee>';
			}
			else{
				echo '<donnee>La métrique n\'est pas prise en charge !</donnee>';
				$pbentete=1;
			}			
			
			if(preg_match('#polka#i',$_POST['variable']) && preg_match('#44#',$ProvM)){
				echo '<donnee>Les polkas s\'écrivent le plus souvent en 2/4. Si vous conservez la métrique 4/4, les basses et accords ne seront pas correctement placés.Je vous conseille de mettre une rythmique en 2/4, et donc d\'ajouter des barres de mesures ! </donnee>';
			}
			
		}  //isset ligneM
													
		if(isset($ligneK)){
			$pourLaTonalite=$PostParLignes[$ligneK-1];
			$tonalite=str_replace('K:','',$pourLaTonalite);
			$tonalite=str_replace(' ','',$tonalite);	
			$toutesLesTonalites = array(
				'#Cmaj#i',
				'#Gmaj#i',
				'#Dmaj#i',
				'#Amaj#i',
				'#Fmaj#i',
				'#C#i',
				'#G#i',
				'#D#i',
				'#A#i',
				'#F#i',
				'#CM#i',
				'#GM#i',
				'#DM#i',
				'#AM#i',
				'#FM#i'
			);
			
			if(preg_match('#[CGDAFB]{1}maj#i',$tonalite)) $pbTonalite=0;
			else if(preg_match('#Edor?#i',$tonalite)) $pbTonalite=0;
			else if(preg_match('#Cdor#i',$tonalite)){
				echo '<donnee>La tonalité indiquée dans le fichier abc n\'est pas prise en charge, désolé !</donnee>';
				$pbTonalite=1;
			}
			else if(preg_match('#Aphr#i',$tonalite)) $pbTonalite=0;
			else if(preg_match('#[DBFEGA]{1}dor#i',$tonalite)) $pbTonalite=0;
			else if(preg_match('#[ACDEFG]{1}mix#i',$tonalite)) $pbTonalite=0;
			else if(preg_match('#[CGDAFB]{1}M?#',$tonalite)) $pbTonalite=0;
			else if(preg_match('#[GDAEB]{1}mi?n?#',$tonalite)) $pbTonalite=0;
			else{
				echo '<donnee>La tonalité indiquée dans le fichier abc n\'est pas prise en charge, désolé !</donnee>';
				$pbTonalite=1;
			}
			
			//notes abc par ligne
			for($abcdef=$ligneK;$abcdef<count($PostParLignes);$abcdef++){  //debut for
			
				if(strlen($PostParLignes[$abcdef])>7 && !preg_match('#[WMK]:#',$PostParLignes[$abcdef])) $arrayLongueur[]=strlen($PostParLignes[$abcdef]);
									
				if(!preg_match('#W:#',$PostParLignes[$abcdef])){
					if(preg_match('#[CDEF]{1},#U',$PostParLignes[$abcdef]))  echo '<donnee>Des notes semblent être trop graves par rapport à la tessiture de l\'instrument.</donnee>';
					if(preg_match('#[CDEFGAB]{1},{2}#U',$PostParLignes[$abcdef]))  echo '<donnee>Des notes semblent être trop graves par rapport à la tessiture de l\'instrument.</donnee>';
					if(preg_match('#[fgab]{1}\'#U',$PostParLignes[$abcdef]))  echo '<donnee>Des notes semblent être trop aigues par rapport à la tessiture de l\'instrument.</donnee>';
					if(preg_match('#[cdefgab]{1}\'{2}#U',$PostParLignes[$abcdef]))  echo '<donnee>Des notes semblent être trop aigues par rapport à la tessiture de l\'instrument.</donnee>';
				}
						
			} 
						
			//par lignes puis comptage de mesures								
			for($abcdef=$ligneK;$abcdef<count($PostParLignes);$abcdef++){  //debut for
				$PostParLignes[$abcdef]=preg_replace('#([:\|\[]{0,1})([:\|]{1})([:\|12]{0,1})([:\|12\]]{0,1})#',' @$1$2$3$4 ',$PostParLignes[$abcdef]);
				$nombreMesures[]=substr_count($PostParLignes[$abcdef],'@');
			} 
						
			if(max($arrayLongueur)>(min($arrayLongueur)*2)) echo '<donnee>Les lignes des notes ne sont pas de longueurs homogènes, peut-être devriez vous ré-organiser le fichier abc afin que l\'aspect graphique de la tablature soit de meilleure qualité !</donnee>';
									
			if(preg_match('#gavotte#i',$chaine) && preg_match('#3\/2#',$chaine)) echo '<donnee>Votre fichier Abc ne semble pas écrit correctement, il est possible que le rythme soit à ré-écrire.</donnee>';
						
			if(preg_match('#gavotte#i',$chaine) && preg_match('#M:6\/8#',$chaine)) echo '<donnee>La métrique des gavottes est généralement 12/8, je vous conseille de ré-organiser le fichier !</donnee>';
			else if(preg_match('#larid#i',$chaine) && preg_match('#M:6\/8#',$chaine)) echo '<donnee>La métrique des laridés est généralement 12/8 ou 4/4, je vous conseille de ré-organiser le fichier !</donnee>';
			else $rien=0;
		}  //isset ligneK						
	} //if verif K==1
	else{
		if($erreurVide==1){
			echo '<donnee>Pas de fichier abc ! </donnee>';	
			$pbentete=1;
		}
		else if($verifX==0 && $verifT==0 && $verifM==0 && $verifK==0){
			echo '<donnee>Le fichier abc n\'a pas un en-tête valide ! </donnee>';	
			$pbentete=1;
		}
		else if($verifT==0){
			echo '<donnee>Veuillez renseigner la ligne de titre !</donnee>';
			$pbentete=1;
		}
		else if($verifM==0){
			echo '<donnee>Veuillez renseigner la métrique !</donnee>';
			$pbentete=1;
		}
		else if($verifM==2){
			echo '<donnee>La métrique n\'est pas prise en charge !</donnee>';
			$pbentete=1;
		}
		else if($verifK==0){
			echo '<donnee>Veuillez renseigner la tonalité !</donnee>';
			$pbentete=1;
		}
		else echo '<donnee>Problème inconnu.</donnee>';
	}


	if($pbTonalite==1 || $pbentete==1 || $problemeCouleur==1 ) echo '<donnee>1</donnee>';
	else echo '<donnee>2</donnee>';

} //fin isset

echo "</exemple>\n";
 
?>