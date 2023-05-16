<?php
$passage=0;
$explo=explode('@',$chaine);
$position=array();
$mesureReconstituee=array();
$chaine='';  //initialisation, chaine sera le regroupement de toutes les mesures en fin d'algorithme
$mesureProv='';
$chaineArray=array();


for($b=0;$b<count($explo);$b++){   //découpage en mesures

	$mesure=trim($explo[$b]);
	$mesure=ltrim($explo[$b]);
				
	//gérer les silences involontaires dans la mesure ou en fin de mesure
	$mesure=preg_replace('#\s{1,}#',' ',$mesure);
	$mesure=preg_replace('#\s$#','',$mesure);

	if($passage==0 && isset($erwan) && $erwan=='Erwan Tanguy'){		
		
		//traitement du note à note
		$note=explode(' ',$mesure);
		$chercheTemps=0;
		for($i=0;$i<count($note);$i++){    //compter la durée d'une note
	
			if(preg_match('#[\|:N\(~]{1,}#',$note[$i]) || preg_match('#\{#',$note[$i]) ) $position[]=$note[$i];
			else if(preg_match('#"%[A-Za-z\#/0-9\(\)]{1,6}"#',$note[$i])) $position[]=$note[$i];
			else if(preg_match('#[pt]{1}#',$note[$i])){
				$qsd=preg_replace('#([pt]{1})#','$1@',$note[$i]);
				$qsd=str_replace('@_','_',$qsd);
				$qsd=str_replace(']','',$qsd);
				$rythme=explode('@',$qsd);
				
				if($chercheTemps==0){
					$position[]='1-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
					$increm=1;
				}
				elseif($chercheTemps==180){
					$position[]='2-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
					$increm++;
				}
				elseif($chercheTemps==360){
					$position[]='3-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
					$increm++;
				}
				elseif($chercheTemps==540){
					$position[]='4-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				else{
					$position[]=$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
	
			}
			else $ejdshfbcdxaqks=0;
		
			if(isset($increm) && $increm>2){
				$passage++;
		 		unset($increm);
			}
		}  //fin par signe
	} //fin if passage=0
	else if($passage==1){		
		
		//traitement du note à note
		$note=explode(' ',$mesure);
		$chercheTemps=0;
		for($i=0;$i<count($note);$i++){    //compter la durée d'une note
		
			if(preg_match('#[\|:N\(~]{1,}#',$note[$i])) $position[]=$note[$i];
			else if(preg_match('#"%[A-Za-z\#/0-9\(\)]{1,6}"#',$note[$i])) $position[]=$note[$i];
			else if(preg_match('#[pt]{1}#',$note[$i])){
				$qsd=preg_replace('#([pt]{1})#','$1@',$note[$i]);
				$rythme=explode('@',$qsd);

				if($chercheTemps==0){
					$position[]='5-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==180){
					$position[]='6-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==360){
					$position[]='7-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==540){
					$position[]='8-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				else{
					$position[]=$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
	
			}
			else $ejdshfbcdxaqks=0;
			
			$passage=0;
		}  //fin par signe
	} //fin if passage=1
	else{		
		
		//traitement du note à note
		$note=explode(' ',$mesure);
		$chercheTemps=0;
		
		for($i=0;$i<count($note);$i++){    //compter la durée d'une note
		
			if(preg_match('#[\|:N\(~]{1,}#',$note[$i])) $position[]=$note[$i];
			else if(preg_match('#"%[A-Za-z\#/0-9\(\)]{1,6}"#',$note[$i])) $position[]=$note[$i];
			else if(preg_match('#[pt]{1}#',$note[$i])){
				$qsd=preg_replace('#([pt]{1})#','$1@',$note[$i]);
				$rythme=explode('@',$qsd);
	
				if($chercheTemps==0){
					$position[]='1-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==180){
					$position[]='2-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==360){
					$position[]='3-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==540){
					$position[]='4-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				else{
					$position[]=$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
	
			}
			else $ejdshfbcdxaqks=0;
			
		}  //fin par signe
	} //fin else


	//je remets les mesures en chaine... 
	for($g=0;$g<count($position);$g++){
		if(preg_match('#120#',$position[$g])){
			$pos=120*$coefficient;
			$truc=$position[$g][0];
			$truc++;
			$position[$g]=$position[$g].' '.$truc.'-'.$pos.'L';
		}
		else $hsfdgoah=0;
	
		$mesureProv=$mesureProv.' '.$position[$g];
	}
			
	$chaineArray[]=$mesureProv;  //...puis dans un array....
			
	//je réinitialise les variables pour la boucle suivante		
	$position=array();    
	$mesureProv='';
	
}  //fin boucle 

//... pour gérer les mesures d'anachrouse
for($g=0;$g<count($chaineArray);$g++){
		
	if(!preg_match('#[234]{1}-#',$chaineArray[$g])){
			
		if(preg_match('#1-[0-9\'"]{1,3}[pt]20#',$chaineArray[$g])) $chaineArray[$g]=preg_replace('#1-#','',$chaineArray[$g]);
		else $chaineArray[$g]=preg_replace('#1-#','4-',$chaineArray[$g]);
	}
		
	$chaine=$chaine.' '.$chaineArray[$g];
	
}

$chaine=preg_replace('#\s{1,}#',' ',$chaine);

?>