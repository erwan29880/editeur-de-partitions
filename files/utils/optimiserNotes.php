<?php

//7p 7't 9p ==> 7 8 9 p      SURTOUT EN SOL MAJEUR
$chaine=preg_replace('#(7p)([0-9]{1,2})\s{1,2}(7\'t)([0-9]{1,2})\s{1,2}(9p)([0-9]{1,2})#','$1$2 8p$4 $5$6',$chaine);

//8p 7p 6p 6p 7t 7p
$chaine=preg_replace('#7\'t([0-9]{1,2})\s{1,2}6\'t([0-9]{1,2})\s{1,2}5\'p([0-9]{1,2})\s{1,2}5\'p([0-9]{1,2})\s{1,2}5\'t([0-9]{1,2})\s{1,2}6\'t([0-9]{1,2})#','8p$1 7p$2 6p$3 6p$4 7t$5 7p$6',$chaine);

//8 7 6 6 p
$chaine=preg_replace('#7\'t([0-9]{1,2})\s{1,2}6\'t([0-9]{1,2})\s{1,2}5\'p([0-9]{1,2})\s{1,2}5\'p#','8p$1 7p$2 6p$3 6p',$chaine);

//7 6 7t
$chaine=preg_replace('#6\'t([0-9]{1,2})\s{1,2}5\'p([0-9]{1,2})(\s{0,2}@?\|?\s{0,2}["%A-Ga-gmM0-9]{2,8})\s?5\'t([0-9]{1,2})#','7p$1 6p$2 $3 7t$4',$chaine);

//8 7 7p 6p 7t
$chaine=preg_replace('#(8t[0-9]{1,2}\s{1,2}7t[0-9]{1,2})\s{1,2}6\'t([0-9]{1,2})\s{1,2}6p([0-9]{1,2}\s{1,2}7t)#','$1 7p$2 6p$3',$chaine);

//8p 7t 8p 7t --> 7' 7 7' 7
$chaine=preg_replace('#8p([0-9]{1,2}\s{1,2}7t[0-9]{1,2})\s{1,2}8p([0-9]{1,2}\s{1,2}7t)#','7\'t$1 7\'t$2',$chaine);

//7p 7't 7p ==> 7 8 7 p     SURT0UT EN RE MAJEUR
$chaine=preg_replace('#(7p)([0-9]{1,2})\s{1,2}(7\'t)([0-9]{1,2})\s{1,2}(7p)([0-9]{1,2})#','$1$2 8p$4 $5$6',$chaine);

//7't 7t 6t 3't ==> 7' 5' 6 3' p    SURTOUT EN RE MAJEUR, MI DORIEN
$chaine=preg_replace('#(7\'t)([0-9]{1,2})\s{1,2}(7t)([0-9]{1,2})\s{1,2}(6t)([0-9]{1,2})\s{1,2}(3\'t)([0-9]{1,2})#','$1$2 5\'t$4 $5$6 $7$8',$chaine);

//4' 7 4' 8 4'     SURT0UT EN RE MAJEUR
$chaine=preg_replace('#(4\'p)([0-9]{1,2})\s{1,2}(7p)([0-9]{1,2})\s{1,2}(4\'p)([0-9]{1,2})\s{1,2}(7\'t)([0-9]{1,2})\s{1,2}(4\'p)([0-9]{1,2})#','$1$2 $3$4 $5$6 8p$8 $9$10',$chaine);

//6p 4't| 7t      SURTOUT EN SOL MAJEUR
$chaine=preg_replace('#(6p[0-9]{1,2})\s{1,2}(5t)([0-9]{1,2})\s{0,2}(@\|{1})\s{0,2}(7t)#','$1 4\'p$3 $4 $5',$chaine);

if($tonalite=="Amin") $chaine=preg_replace('#(4\'t[0-9]{1,2})(\s{0,2}@?\|?\s{0,2})5t#','$1 $2 4\'p',$chaine);

//877 977 puis 766 866
if($tonalite=="Cmaj") $chaine=preg_replace('#6\'p([0-9]{1,2})\s{1,2}5\'t([0-9]{1,2})\s{1,2}5\'t#','8t$1 7t$2 7t',$chaine);
if($tonalite=="Cmaj") $chaine=preg_replace('#7\'p([0-9]{1,2})\s{1,2}5\'t([0-9]{1,2})\s{1,2}5\'t#','9t$1 7t$2 7t',$chaine);
if($tonalite=="Cmaj") $chaine=preg_replace('#6\'t([0-9]{1,2})\s{1,2}5\'p([0-9]{1,2})\s{1,2}5\'p#','7p$1 6p$2 6p',$chaine);
if($tonalite=="Cmaj") $chaine=preg_replace('#7\'t([0-9]{1,2})\s{1,2}5\'p([0-9]{1,2})\s{1,2}5\'p#','8p$1 6p$2 6p',$chaine);

if($tonalite=="Edor" || $tonalite=="Emin"){
	$chaine=preg_replace('#3\'t([0-9]{1,2})\s{1,2}4\'p([0-9]{1,2})\s{1,2}6t([0-9]{1,2})\s{1,2}3\'t([0-9]{1,2})\s{1,2}4\'p#','3\'t$1 5t$2 6t$3 3\'t$4 4\'p',$chaine);
	$chaine=preg_replace('#9\'t([0-9]{1,2})\s{1,2}10t([0-9]{1,2})\s{1,2}7\'p([0-9]{1,2})\s{1,2}3"t#','9\'t$1 10t$2 9t$3 3"t',$chaine);
}

if(preg_match('#"#',$chaine)){
	$parMesures=explode('%',$chaine);
	$chaine='';

	for($pm=0;$pm<count($parMesures);$pm++){

		if(preg_match('#[EC]{1}7?"#',$parMesures[$pm])){
			$aremp=array(
				'#4t#',
				'#5t#',
				'#8t#',
				'#9t#',
				'#2\'t#',
				'#6\'t#',
				'#10\'t#',
				'#3\'t#',
				'#7\'t#',
				'#9p#',
				'#11t#'
			);
				
			$rempPar=array(
				'3\'p',
				'4\'p',
				'6\'p',
				'7\'p',
				'4p',
				'7p',
				'10p',
				'5p',
				'8p',
				'8\'p',
				'9\'t'
			);
			
			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#G"#',$parMesures[$pm]) && $tonalite=='Amin'){
			
			$aremp=array(
				'#4t#',
				'#5t#',
				'#8t#',
				'#9t#',
				'#2\'t#',
				'#6\'t#',
				'#10\'t#',
				'#3\'t#',
				'#7\'t#'
			);
				
			$rempPar=array(
				'3\'p',
				'4\'p',
				'6\'p',
				'7\'p',
				'4p',
				'7p',
				'10p',
				'5p',
				'8p'
			);
		
			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#G"#',$parMesures[$pm]) && $tonalite=='Cmaj'){
			
			$aremp=array(
				'#4p#',
				'#7p#',
				'#10p#',
				'#5p#',
				'#8p#',
				'#6p#',
				'#9p#'
			);
				
			$rempPar=array(
				'2\'t',
				'6\'t',
				'10\'t',
				'3\'t',
				'7\'t',
				'5\'p',
				'8\'p'
			);
				
			$parMesures[$pm]=preg_replace('#Gr"#','G"',$parMesures[$pm]);
			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#G[234568]?"#',$parMesures[$pm])){
			
			$aremp=array(
				'#4t#',
				'#5t#',
				'#8t#',
				'#9t#',
				'#2\'t#',
				'#6\'t#',
				'#10\'t#',
				'#3\'t#',
				'#7\'t#'
			);
				
			$rempPar=array(
				'3\'p',
				'4\'p',
				'6\'p',
				'7\'p',
				'4p',
				'7p',
				'10p',
				'5p',
				'8p'
			);

			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#G"#',$parMesures[$pm]) && $tonalite=='Edor'){
			
			$aremp=array(
				'#4t#',
				'#5t#',
				'#8t#',
				'#9t#',
				'#2\'t#',
				'#6\'t#',
				'#10\'t#',
				'#3\'t#',
				'#7\'t#'
			);
			
			$rempPar=array(
				'3\'p',
				'4\'p',
				'6\'p',
				'7\'p',
				'4p',
				'7p',
				'10p',
				'5p',
				'8p'
			);

			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#G"#',$parMesures[$pm]) && isset($tonaliteOpti) && $tonaliteOpti=='Ador'){
		
			$aremp=array(
				'#4t#',
				'#5t#',
				'#8t#',
				'#9t#',
				'#2\'t#',
				'#6\'t#',
				'#10\'t#',
				'#3\'t#',
				'#7\'t#'
			);
			
			$rempPar=array(
				'3\'p',
				'4\'p',
				'6\'p',
				'7\'p',
				'4p',
				'7p',
				'10p',
				'5p',
				'8p'
			);
		
			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#Em"#',$parMesures[$pm])  || preg_match('#\*[EGC]{1}[234568]?"#',$parMesures[$pm])){
			
			$aremp=array(
				'#4t#',
				'#5t#',
				'#8t#',
				'#9t#',
				'#2\'t#',
				'#6\'t#',
				'#10\'t#',
				'#3\'t#',
				'#7\'t#'
			);
			
			$rempPar=array(
				'3\'p',
				'4\'p',
				'6\'p',
				'7\'p',
				'4p',
				'7p',
				'10p',
				'5p',
				'8p'
			);

			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#Dm"#',$parMesures[$pm])){
			
			$aremp=array(
				'#4p#',
				'#7p#',
				'#10p#',
				'#3\'p#',
				'#6\'p#',
				'#5p#',
				'#8p#',
				'#4\'p#',
				'#7\'p#',
				'#5\'t#',
				'#11t#'
			);
				
			$rempPar=array(
				'2\'t',
				'6\'t',
				'10\'t',
				'4t',
				'8t',
				'3\'t',
				'7\'t',
				'5t',
				'9t',
				'7t',
				'9\'t'
			);
			
			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#[FD]{1}"#',$parMesures[$pm]) || preg_match('#\*[ADFda]{1}[234568]?"#',$parMesures[$pm])){
				
			$aremp=array(
				'#4p#',
				'#7p#',
				'#10p#',
				'#3\'p#',
				'#6\'p#',
				'#5p#',
				'#8p#',
				'#4\'p#',
				'#7\'p#',
				'#5\'t#',
				'#11t#',
				'#9p#'
				);
				
			$rempPar=array(
				'2\'t',
				'6\'t',
				'10\'t',
				'4t',
				'8t',
				'3\'t',
				'7\'t',
				'5t',
				'9t',
				'7t',
				'9\'t',
				'8\'p'
			);
			
			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#Am"#',$parMesures[$pm]) && $tonalite=='Cmaj'){
			
			$aremp=array(
				'#4p#',
				'#7p#',
				'#10p#',
				'#3\'p#',
				'#6\'p#',
				'#5p#',
				'#8p#',
				'#4\'p#',
				'#7\'p#',
				'#5\'t#'
			);
				
			$rempPar=array(
				'2\'t',
				'6\'t',
				'10\'t',
				'4t',
				'8t',
				'3\'t',
				'7\'t',
				'5t',
				'9t',
				'7t'
			);
			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#A"#',$parMesures[$pm]) || preg_match('#[FD]{1}"#',$parMesures[$pm])){
				
			$aremp=array(
				'#4p#',
				'#7p#',
				'#10p#',
				'#3\'p#',
				'#6\'p#',
				'#5p#',
				'#8p#',
				'#4\'p#',
				'#7\'p#',
				'#5\'t#'
			);
				
			$rempPar=array(
				'2\'t',
				'6\'t',
				'10\'t',
				'4t',
				'8t',
				'3\'t',
				'7\'t',
				'5t',
				'9t',
				'7t'
			);
			
			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else if(preg_match('#Gr"#',$parMesures[$pm]) && $tonalite=='Gmaj'){
			
			$aremp=array(
				'#4p#',
				'#7p#',
				'#10p#',
				'#3\'p#',
				'#6\'p#',
				'#5p#',
				'#8p#',
				'#4\'p#',
				'#7\'p#',
				'#5\'t#',
				'#6p#',
				'#9p#'
			);
				
			$rempPar=array(
				'2\'t',
				'6\'t',
				'10\'t',
				'4t',
				'8t',
				'3\'t',
				'7\'t',
				'5t',
				'9t',
				'7t',
				'5\'p',
				'8\'p'
			);
				
			$parMesures[$pm]=preg_replace('#Gr"#','G"',$parMesures[$pm]);
			$parMesures[$pm]=preg_replace($aremp,$rempPar,$parMesures[$pm]);
		}
		else $erdfszesdfs=0;

		$parMesures[$pm]=preg_replace("#r#","",$parMesures[$pm]);

		if($pm==0) $chaine=$parMesures[$pm];
		else $chaine=$chaine.'%'.$parMesures[$pm];
	}




} //fin preg_match "

$chaine=preg_replace('#(7t[0-9]{1,2})\s{1,2}6\'t([0-9]{1,2}\s{1,2}"%E"\s{1,2}2"p)#','$1 7p$2',$chaine);
$chaine=preg_replace('#(G")\s{0,2}8p([0-9]{1,2})\s{1,2}(8\'t[0-9]{1,2}\s{1,2}9\'t[0-9]{1,2})#','$1 7\'t$2 $3',$chaine);
$chaine=preg_replace('#(Dm")\s{0,2}(3\'t[0-9]{1,2}\s{1,2}4\'t[0-9]{1,2})\s{1,2}7t#','$1 $2 5\'t',$chaine);
if($tonalite=='Amin') $chaine=preg_replace('#(6\'t[0-9]{1,2})\s{1,2}7t([0-9]{1,2}\s{1,2}4\'t)#','$1 5\'t$2',$chaine);
if($tonalite=='Amin') $chaine=preg_replace('#(F")\s{0,2}8t([0-9]{1,2})\s{1,2}6\'t([0-9]{1,2})\s{0,2}8t([0-9]{1,2})\s{1,2}7\'t([0-9]{1,2})#','$1 6\'p$2 7p$3 6\'p$4 8p$5',$chaine);
if($tonalite=='Amin') $chaine=preg_replace('#(F")\s{0,2}8t([0-9]{1,2})\s{1,2}6\'t([0-9]{1,2})\s{0,2}8t([0-9]{1,2})\s{1,2}9t([0-9]{1,2})#','$1 6\'p$2 7p$3 6\'p$4 7\'p$5',$chaine);

//8 7 7p 6p 7t
if($tonalite=='Amin') $chaine=preg_replace('#(8t[0-9]{1,2}\s{1,2}7t[0-9]{1,2})\s{1,2}6\'t([0-9]{1,2})\s{1,2}6p([0-9]{1,2}\s{1,2}7t)#','$1 7p$2 6p$3',$chaine);
if($tonalite=="Amin") $chaine=preg_replace('#(G")\s{0,2}(8\'t[0-9]{1,2})\s{0,2}7\'p([0-9]{1,2})\s{0,2}8p#','$1 $2 9t$3 7\'t',$chaine);
$chaine=preg_replace('#(8\'t[0-9]{1,2})\s{0,2}9p([0-9]{1,2})\s{0,2}(8\'t)#','$1 8\'p$2 $3',$chaine);
$chaine=preg_replace('#(8\'t[0-9]{1,2})\s{0,2}("?%?[A-Ga-gmM]{0,6}"?)\s{0,2}9p([0-9]{1,2})\s{0,2}(8\'t)#','$1 $2 8\'p$3 $4',$chaine);
$chaine=preg_replace('#7\'p(1?0)\s{0,2}(10t1?0\s{0,2}9p2?0)#','9t$1 $2',$chaine);
$chaine=preg_replace('#(7p1?0\s{0,2})8t(1?0\s{0,2}8p2?0)#','$1 6\'p$2',$chaine);

//ornements
if(preg_match('#\{#',$chaine)){   

	$EXPLO=explode(' ',$chaine);
	$chaine='';
	
	for($expl=0;$expl<count($EXPLO);$expl++){

		if($EXPLO[$expl][0]=='{' && $EXPLO[$expl+1][0]=='{'){
		
			if(preg_match('#t#',$EXPLO[$expl+2])){

				$aremp=array(
					'#4p#',
					'#7p#',
					'#10p#',
					'#3\'p#',
					'#6\'p#',
					'#5p#',
					'#8p#',
					'#4\'p#',
					'#7\'p#',
					'#5\'t#'
				);
				
				$rempPar=array(
					'2\'t',
					'6\'t',
					'10\'t',
					'4t',
					'8t',
					'3\'t',
					'7\'t',
					'5t',
					'9t',
					'7t'
				);
				$EXPLO[$expl]=preg_replace($aremp,$rempPar,$EXPLO[$expl]);
				$EXPLO[$expl+1]=preg_replace($aremp,$rempPar,$EXPLO[$expl+1]);
				
					
			}
			else{			
				
				$aremp=array(
					'#4t#',
					'#5t#',
					'#8t#',
					'#9t#',
					'#2\'t#',
					'#6\'t#',
					'#10\'t#',
					'#3\'t#',
					'#7\'t#'
				);
								
				$rempPar=array(
					'3\'p',
					'4\'p',
					'6\'p',
					'7\'p',
					'4p',
					'7p',
					'10p',
					'5p',
					'8p'
				);
				$EXPLO[$expl]=preg_replace($aremp,$rempPar,$EXPLO[$expl]);
				$EXPLO[$expl+1]=preg_replace($aremp,$rempPar,$EXPLO[$expl+1]);		
			}
			
			if(preg_match('#p#',$EXPLO[$expl]) && preg_match('#p#',$EXPLO[$expl+1]) && preg_match('#p#',$EXPLO[$expl+2])) $ok=1;
			else if(preg_match('#t#',$EXPLO[$expl]) && preg_match('#t#',$EXPLO[$expl+1]) && preg_match('#t#',$EXPLO[$expl+2])) $ok=1;
			else $EXPLO[$expl]='';
			unset($ok);		
		}
		else if($EXPLO[$expl][0]=='{'){
		
			if(preg_match('#p#',$EXPLO[$expl])){

				if(preg_match('#t#',$EXPLO[$expl+1])){
					$aremp=array(
						'#4p#',
						'#7p#',
						'#10p#',
						'#3\'p#',
						'#6\'p#',
						'#5p#',
						'#8p#',
						'#4\'p#',
						'#7\'p#',
						'#5\'t#'
					);
					
					$rempPar=array(
						'2\'t',
						'6\'t',
						'10\'t',
						'4t',
						'8t',
						'3\'t',
						'7\'t',
						'5t',
						'9t',
						'7t'
					);

				$EXPLO[$expl]=preg_replace($aremp,$rempPar,$EXPLO[$expl]);
				}
			}
			else{
				
				if(preg_match('#p#',$EXPLO[$expl+1])){
					$aremp=array(
						'#4t#',
						'#5t#',
						'#8t#',
						'#9t#',
						'#2\'t#',
						'#6\'t#',
						'#10\'t#',
						'#3\'t#',
						'#7\'t#'
					);
						
					$rempPar=array(
						'3\'p',
						'4\'p',
						'6\'p',
						'7\'p',
						'4p',
						'7p',
						'10p',
						'5p',
						'8p'
					);
					$EXPLO[$expl]=preg_replace($aremp,$rempPar,$EXPLO[$expl]);
				}
			}
		
			if(preg_match('#p#',$EXPLO[$expl]) && preg_match('#p#',$EXPLO[$expl+1])) $ok=1;
			else if(preg_match('#t#',$EXPLO[$expl]) && preg_match('#t#',$EXPLO[$expl+1])) $ok=1;
			else $EXPLO[$expl]='';
			unset($ok);
		
		}
		else $poipolipoi=0;
		
		$chaine=$chaine.' '.$EXPLO[$expl];

	} //for

}  //si 

?>