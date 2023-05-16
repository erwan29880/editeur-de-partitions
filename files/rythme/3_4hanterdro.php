<?php

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
			}
			elseif($chercheTemps==60){
				$position[]='2-'.$note[$i];
				if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
				else $chercheTemps=$chercheTemps+($rythme[1])*3;		
			}
			elseif($chercheTemps==120){
				$position[]='3-'.$note[$i];
				if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
				else $chercheTemps=$chercheTemps+($rythme[1])*3;		
			}
			elseif($chercheTemps==180){
				$position[]='4-'.$note[$i];
				if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
				else $chercheTemps=$chercheTemps+($rythme[1])*3;		
			}
			elseif($chercheTemps==240){
				$position[]='5-'.$note[$i];
				if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
				else $chercheTemps=$chercheTemps+($rythme[1])*3;		
			}					
			elseif($chercheTemps==300){
				$position[]='6-'.$note[$i];
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
	
	//je remets les mesures en chaine... 
	for($g=0;$g<count($position);$g++){
			
		if(preg_match('#40#',$position[$g])){
			$truc=$position[$g][0];
			$truc++;
			$position[$g]=$position[$g].' '.$truc.'-40L';
		}
		else if(preg_match('#30#',$position[$g])){
			$truc=$position[$g][0];
			$truc++;
			$position[$g]=$position[$g].' '.$truc.'-50L';
		}
		else if(preg_match('#60#',$position[$g])){
			$truc=$position[$g][0];
			$truc++;
			$position[$g]=$position[$g].' '.$truc.'-65L';
			$truc++;
			$position[$g]=$position[$g].' '.$truc.'-35L';		
		}
		else if(preg_match('#80#',$position[$g])){
			$truc=$position[$g][0];
			$truc++;
			$position[$g]=$position[$g].' '.$truc.'-90L';
			$truc++;
			$position[$g]=$position[$g].' '.$truc.'-60L';
			$truc++;
			$position[$g]=$position[$g].' '.$truc.'-30L';		
		}
		else $dfg=0;
			
		$mesureProv=$mesureProv.' '.$position[$g];
	}
			
	$chaineArray[]=$mesureProv;  //...puis dans un array....
			
	//je réinitialise les variables pour la boucle suivante		
	$position=array();    
	$mesureProv='';
	
}  //fin boucle 

//... pour gérer les mesures d'anachrouse
for($g=0;$g<count($chaineArray);$g++){

	if(!preg_match('#[23456]{1}-#',$chaineArray[$g]))	$chaineArray[$g]=preg_replace('#1-#','6-',$chaineArray[$g]);
		$chaine=$chaine.' '.$chaineArray[$g];
	}

	$chaine=preg_replace('#\s{1,}#',' ',$chaine);

?>