<?php

$explo=explode('@',$chaine);
$position=array();
$mesureReconstituee=array();
$chaine='';  //initialisation, chaine sera le regroupement de toutes les mesures en fin d'algorithme
$mesureProv='';
$chaineArray=array();
$arrayComptage=array();


for($b=0;$b<count($explo);$b++){   //découpage en mesures
	
	$mesure=trim($explo[$b]);
	$mesure=ltrim($explo[$b]);
	
	//gérer les silences involontaires dans la mesure ou en fin de mesure
	$mesure=preg_replace('#\s{1,}#',' ',$mesure);
	$mesure=preg_replace('#\s$#','',$mesure);
	$mesureComptage=(preg_replace('#[0-9\'"]{1,3}[pt]{1}([0-9]{2,3})#','$1',$mesure));
	$mesureComptage=(preg_replace('#[\|:]#','',$mesureComptage));			
	$noteComptage=explode(' ',$mesureComptage);
	$totalComptage=0;
	
	for($i=0;$i<count($noteComptage);$i++){	
		$totalComptage=$totalComptage+(int)$noteComptage[$i];
	}
		
	if($totalComptage!=0) $arrayComptage[]=$totalComptage;	
}


$tempsMesure=array_sum($arrayComptage)/count($arrayComptage);


if($tempsMesure==160){  //en 4/4...
	
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
			else if(preg_match('#[ptz]{1}#',$note[$i])){
				$qsd=preg_replace('#([pt]{1})#','$1@',$note[$i]);
				$qsd=str_replace('@_','_',$qsd);
				$qsd=str_replace(']','',$qsd);
				$rythme=explode('@',$qsd);
					
				if($chercheTemps==0){
					$position[]='1-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;						
				}
				elseif($chercheTemps==120){
					$position[]='2-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==240){
					$position[]='3-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==360){
					$position[]='4-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==480){
					$position[]='5-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i]))	$chercheTemps=$chercheTemps+40;
					else $chercheTemps=$chercheTemps+($rythme[1])*3;
				}
				elseif($chercheTemps==600){
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
			
			if(preg_match('#160#',$position[$g])){
				$pos1=240*$coefficient;
				$pos2=160*$coefficient;
				$pos3=80*$coefficient;
				$truc=$position[$g][0];
				$truc++;
				$position[$g]=$position[$g].' '.$truc.'-'.$pos1.'L';
				$truc++;
				$position[$g]=$position[$g].' '.$truc.'-'.$pos2.'L';
				$truc++;
				$position[$g]=$position[$g].' '.$truc.'-'.$pos3.'L';
			}	
			else if(preg_match('#60#',$position[$g])){
				$pos=40*$coefficient;
				$truc=$position[$g][0];
				$truc++;
				$position[$g]=$position[$g].' '.$truc.'-'.$pos.'L';
			}
			else if(preg_match('#80#',$position[$g])){
				$pos=80*$coefficient;
				$truc=$position[$g][0];
				$truc++;
				$position[$g]=$position[$g].' '.$truc.'-'.$pos.'L';
			}
			else if(preg_match('#120#',$position[$g])){
				$pos1=160*$coefficient;
				$pos2=80*$coefficient;
				$truc=$position[$g][0];
				$truc++;
				$position[$g]=$position[$g].' '.$truc.'-'.$pos1.'L';
				$truc++;
				$position[$g]=$position[$g].' '.$truc.'-'.$pos2.'L';
			}	
			else{
				$khkgfijkhf=0;
			}
	
			$mesureProv=$mesureProv.' '.$position[$g];
		}
			
		$chaineArray[]=$mesureProv;  //...puis dans un array....
			
		//je réinitialise les variables pour la boucle suivante		
		$position=array();    
		$mesureProv='';
	
	}  //fin boucle 

	//... pour gérer les mesures d'anachrouse
	for($g=0;$g<count($chaineArray);$g++){
		$chaineArray[$g]=preg_replace('#(1-[0-9]{1,2}[\'"]{0,1}[pt]{1}20\s{1,2}[0-9]{1,2}[\'"]{0,1}[pt]{1}60)\s{1,2}[0-9]{1,2}-40L#','$1 2-80L',$chaineArray[$g]);
		//croche noire croche
		$chaineArray[$g]=preg_replace('#(1-[0-9]{1,2}[\'"]{0,1}[pt]{1}20)\s{1,2}([0-9]{1,2}[\'"]{0,1}[pt]{1}40)\s{1,2}([0-9]{1,2}[\'"]{0,1}[pt]{1}20)#','$1 $2 2-40L $3',$chaineArray[$g]);
		//exception Z 40 20 esperanza par ex
		$chaineArray[$g]=preg_replace('#(1-zp20\s{1,2}[0-9]{1,2}[\'"]{0,1}[pt]{1}40)\s{1,2}([0-9]{1,2}[\'"]{0,1}[pt]{1}20)#','$1 2-40L $2 ',$chaineArray[$g]);
		
		if(!preg_match('#[23456]{1}-#',$chaineArray[$g])){
			$chaineArray[$g]=preg_replace('#1-#','4-',$chaineArray[$g]);
			$chaineArray[$g]=preg_replace('#4-([0-9]{1,2}[\'"]{0,1}[pt]{1}20)#','$1',$chaineArray[$g]);
		}

		if(preg_match('#rondeau#i',$_POST['tab'])){
			if(!preg_match('#[34]{1}-#',$chaineArray[$g]) && preg_match('#[12]{1}-#',$chaineArray[$g])){
				$chaineArray[$g]=preg_replace('#1-#','3-',$chaineArray[$g]);
				$chaineArray[$g]=preg_replace('#2-#','4-',$chaineArray[$g]);
			}
		}
		
		$chaine=$chaine.' '.$chaineArray[$g];
	
	}

	$chaine=preg_replace('#\s{1,}#',' ',$chaine);
	
	
}
else{
	
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
		
			if(preg_match('#[\|:N\(~]{1,}#',$note[$i]) || preg_match('#\{#',$note[$i]) ){
				$position[]=$note[$i];
			}
			else if(preg_match('#"%\*?[A-Za-z\#/0-9\(\)]{1,6}"#',$note[$i])) $position[]=$note[$i];
			else if(preg_match('#[pt]{1}#',$note[$i])){
				$qsd=preg_replace('#([pt]{1})#','$1@',$note[$i]);
				$rythme=explode('@',$qsd);
					
				if($chercheTemps==0){
					$position[]='1-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i])){
						$chercheTemps=$chercheTemps+40;
					}
					else{
						$chercheTemps=$chercheTemps+($rythme[1])*3;
					}	
				}
				elseif($chercheTemps==60){
					$position[]='2-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i])){
						$chercheTemps=$chercheTemps+40;
					}
					else{
						$chercheTemps=$chercheTemps+($rythme[1])*3;
					}
								
				}
				elseif($chercheTemps==120){
					$position[]='3-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i])){
						$chercheTemps=$chercheTemps+40;
					}
					else{
						$chercheTemps=$chercheTemps+($rythme[1])*3;
					}			
				}
				elseif($chercheTemps==180){
					$position[]='4-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i])){
						$chercheTemps=$chercheTemps+40;
					}
					else{
						$chercheTemps=$chercheTemps+($rythme[1])*3;
					}
				}
				elseif($chercheTemps==240){
					$position[]='5-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i])){
						$chercheTemps=$chercheTemps+40;
					}
					else{
						$chercheTemps=$chercheTemps+($rythme[1])*3;
					}
				}
				elseif($chercheTemps==300){
					$position[]='6-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i])){
						$chercheTemps=$chercheTemps+40;
					}
					else{
						$chercheTemps=$chercheTemps+($rythme[1])*3;
					}
				}
				elseif($chercheTemps==360){
					$position[]='7-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i])){
						$chercheTemps=$chercheTemps+40;
					}
					else{
						$chercheTemps=$chercheTemps+($rythme[1])*3;
					}
				}
				elseif($chercheTemps==420){
					$position[]='8-'.$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i])){
						$chercheTemps=$chercheTemps+40;
					}
					else{
						$chercheTemps=$chercheTemps+($rythme[1])*3;
					}
				}
				else{
					$position[]=$note[$i];
					if(preg_match('#[pt]{1}0#',$note[$i])){
						$chercheTemps=$chercheTemps+40;
					}
					else{
						$chercheTemps=$chercheTemps+($rythme[1])*3;
					}
				}
			}
			else{
				$ejdshfbcdxaqks=0;
			}
			
		}  //fin par signe
	
	//je remets les mesures en chaine... 
		for($g=0;$g<count($position);$g++){
				
			if(preg_match('#[1357]{1}-#',$position[$g]) && preg_match('#10#',$position[$g])){
				if(isset($position[$g+1]) && preg_match('#30#',$position[$g+1])){
					$truc=$position[$g][0];
					$truc++;
					$mesureProv=$mesureProv.' '.$position[$g].' '.$position[$g+1].' '.$truc.'-40L';
					$g++;
					continue;
				}
			}
		
				
			if(preg_match('#[1-8]{1}-#',$position[$g])){
				if(preg_match('#30#',$position[$g])){
					$pos=20*$coefficient;
					$truc=$position[$g][0];
					$truc++;
					$position[$g]=$position[$g].' '.$truc.'-'.$pos.'L';
				}
				else if(preg_match('#40#',$position[$g])){
					$pos=40*$coefficient;
					$truc=$position[$g][0];
					$truc++;
					$position[$g]=$position[$g].' '.$truc.'-'.$pos.'L';
				}
				else if(preg_match('#80#',$position[$g])){
					$pos1=120*$coefficient;
					$pos2=80*$coefficient;
					$pos3=40*$coefficient;
					$truc=$position[$g][0];
					$truc++;
					$position[$g]=$position[$g].' '.$truc.'-'.$pos1.'L';
					$truc++;
					$position[$g]=$position[$g].' '.$truc.'-'.$pos2.'L';
					$truc++;
					$position[$g]=$position[$g].' '.$truc.'-'.$pos3.'L';
				}
				else if(preg_match('#60#',$position[$g])){
					$pos1=80*$coefficient;
					$pos2=40*$coefficient;
					$truc=$position[$g][0];
					$truc++;
					$position[$g]=$position[$g].' '.$truc.'-'.$pos1.'L';
					$truc++;
					$position[$g]=$position[$g].' '.$truc.'-'.$pos2.'L';
					}
				else{
					$sdgsdf=0;
				}
			}
					
			$mesureProv=$mesureProv.' '.$position[$g];
		}
				
		$chaineArray[]=$mesureProv;  //...puis dans un array....
				
		//je réinitialise les variables pour la boucle suivante		
		$position=array();    
		$mesureProv='';
		
	}  //fin boucle 

	//... pour gérer les mesures d'anachrouse
	for($g=0;$g<count($chaineArray);$g++){
		if(!preg_match('#[2]{1}-#',$chaineArray[$g])){
			$chaineArray[$g]=preg_replace('#1-#','4-',$chaineArray[$g]);
		}
				
		$chaine=$chaine.' '.$chaineArray[$g];
		
	}

		$chaine=preg_replace('#\s{1,}#',' ',$chaine);
}



?>