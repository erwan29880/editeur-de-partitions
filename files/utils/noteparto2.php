<?php

$anachrouse=0;

for($bo=0;$bo<count($notesParto["absc"]);$bo++){

	if($aaccord==1){
		$xellipse=$notesParto["absc"][$bo]+($lEllipse/2);
		
		if($notesParto["duree"][$bo+1]>60){
			rotatedellipse($image, $xellipse, $notesParto["ordo"][$bo], $hEllipse, $lEllipse, 150, $noir, false);
		}
		else{
			rotatedellipse($image, $xellipse, $notesParto["ordo"][$bo], $hEllipse, $lEllipse, 150, $noir, true);
		}
		
		if($notesParto["duree"][$bo+1]==60 || $notesParto["duree"][$bo+1]==120){
			imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
		} 
		
		$aaccord=0;		
	}
	else if($notesParto["silence"][$bo]==0){
			//ellipse pleine ou vide
		$xellipse=$notesParto["absc"][$bo]+($lEllipse/2);
		
		if($notesParto["duree"][$bo]>60){
			rotatedellipse($image, $xellipse, $notesParto["ordo"][$bo], $hEllipse, $lEllipse, 150, $noir, false);
		}
		else{
			rotatedellipse($image, $xellipse, $notesParto["ordo"][$bo], $hEllipse, $lEllipse, 150, $noir, true);
		}
	}
	else $ok=0;


	if(preg_match('#_4#',$metrique)){
	
		if($notesParto["duree"][$bo]==0){
			$accordAprs=1;
			$tour=$bo+1;
		}
	
		if(count($notesParto["absc"])==1) include($ROOT_PATH . 'partition/anachrouse.php');
		else{
		
			if($notesParto["silence"][$bo]==1) include($ROOT_PATH . 'partition/silence.php');
			else if($notesParto["duree"][$bo]==20 && isset($notesParto["silence"][$bo+1]) && $notesParto["silence"][$bo+1]==1){
				if($doublecroche==2) include($ROOT_PATH . 'partition/doublecroche4.php');
				else{
					$croche=79;
					include($ROOT_PATH . 'partition/croche4.php');
				}
			}
			else if($notesParto["duree"][$bo]==10 && $doublecroche==3) include($ROOT_PATH . 'partition/doublecroche4.php');
			else if($notesParto["duree"][$bo]==20 && $croche==2) include($ROOT_PATH . 'partition/croche4.php');	
			else if($notesParto["duree"][$bo]==40  && $croche==1 && $bo==count($notesParto["absc"])-1){
				$croche=800;
				include($ROOT_PATH . 'partition/croche4.php');	
			}
			else if($croche==60 && $doublecroche==1) include($ROOT_PATH . 'partition/doublecroche4.php');
			else if($notesParto["duree"][$bo]==10  && $doublecroche==1 && $bo==count($notesParto["absc"])-1){
				$doublecroche=79;
				include($ROOT_PATH . 'partition/doublecroche4.php');
			}
			else if($notesParto["duree"][$bo]==40 && $croche==1) $CrNoireCr=1;	
			else if($croche==60 && $doublecroche==1) include($ROOT_PATH . 'partition/doublecroche4.php');
			else if($croche==60 && $notesParto["duree"][$bo]==10) $doublecroche=1;	
			else if($notesParto["duree"][$bo]==60 && $croche==1)  include($ROOT_PATH . 'partition/croche4.php');	
			else if($croche==60)  include($ROOT_PATH . 'partition/croche4.php');	
			else if($notesParto["duree"][$bo]==60 && $bo==count($notesParto["absc"])-1){
				$croche=700;
				include($ROOT_PATH . 'partition/croche4.php');	
			}
			else if($notesParto["duree"][$bo]==60) $croche=60;
			else if($notesParto["duree"][$bo]==20 && $CrNoireCr==1) include($ROOT_PATH . 'partition/croche4.php');		
			else if($notesParto["duree"][$bo]>39 && $notesParto["duree"][$bo]<160) include($ROOT_PATH . 'partition/tige4.php'); //nre bl(noire pointée->croche=2)
			else if($notesParto["duree"][$bo]==20 && $doublecroche==2) include($ROOT_PATH . 'partition/doublecroche4.php');  //dbl dbl cr
			else if($notesParto["duree"][$bo]==20 && $doublecroche==1) $DbleCrDble=1;							//dbl cr dbl
			else if($doublecroche==10)  include($ROOT_PATH . 'partition/croche4.php');	
			else if($notesParto["duree"][$bo]==10 && $DbleCrDble==1) include($ROOT_PATH . 'partition/doublecroche4.php');    //dbl cr dbl
			else if($notesParto["duree"][$bo]==10 && $DbleCrDble==2) include($ROOT_PATH . 'partition/doublecroche4.php');    //cr dbl dbl
			else if($notesParto["duree"][$bo]==10 && $croche==1) $DbleCrDble=2;									//cr dbl dbl
			else if($croche==1 && $notesParto["duree"][$bo]==20) include($ROOT_PATH . 'partition/croche4.php');				//deuxième croche
			else if($notesParto["duree"][$bo]==20 && $croche==0 && $bo==count($notesParto["absc"])-1){
				$croche=79;
				include($ROOT_PATH . 'partition/croche4.php');	
			}
			else if($notesParto["duree"][$bo]==20 && $croche==0) $croche=1;	
			else if($notesParto["duree"][$bo]==30 && $doublecroche==1) include($ROOT_PATH . 'partition/croche4.php');	
			else if($notesParto["duree"][$bo]==30 && $bo==count($notesParto["absc"])-1 && $doublecroche==0){
				$croche=600;
				include($ROOT_PATH . 'partition/croche4.php');	
			}
			else if($notesParto["duree"][$bo]==30) $doublecroche=10;
			else if($notesParto["duree"][$bo]==10 && $doublecroche==1 && $bo==count($notesParto["absc"])-1){
				$doublecroche=79;
				include($ROOT_PATH . 'partition/doublecroche4.php');	
			}
			else if($notesParto["duree"][$bo]==10 && $doublecroche==2) $doublecroche=3;
			else if($notesParto["duree"][$bo]==10 && $doublecroche==1) $doublecroche=2;
			else if($notesParto["duree"][$bo]==10 && $doublecroche==0) $doublecroche=1;
			else if($notesParto["duree"][$bo]==13 && isset($triolett) && $triolett==2)  include($ROOT_PATH . 'partition/croche4.php');
			else if($notesParto["duree"][$bo]==13 && isset($triolett) && $triolett==1) $triolett=2;
			else if($notesParto["duree"][$bo]==13) $triolett=1;
			else $erreur=0;
		}
	}
	else if(preg_match('#_8#',$metrique) || $metriqueGavotte=='6_8'){

		if($notesParto["silence"][$bo]==1) include($ROOT_PATH . 'partition/silence.php');
		else if($nombreTest<3 && $notesParto["duree"][$bo]==20){  //les croches seules, mesures incomplètes
			$croche=40;	
			include($ROOT_PATH . 'partition/croche8.php');
		}
		else if($notesParto["duree"][$bo]==20 && $croche==2) include($ROOT_PATH . 'partition/croche8.php');
		else if($notesParto["duree"][$bo]==10 && $croche==10 && $bo==count($notesParto["absc"])-1){  //pour deux double-croches
			$doublecroche=79;
			include($ROOT_PATH . 'partition/doublecroche4.php');	
			$croche=0;
		}
		else if($notesParto["duree"][$bo]==10 && $croche==11 && $bo==count($notesParto["absc"])-1){  //pour deux double-croches
			$croche=600;
			include($ROOT_PATH . 'partition/croche8.php');	
		}
		else if($croche==101 && $notesParto["duree"][$bo]==20){
		$croche=103;
		include($ROOT_PATH . 'partition/croche8.php');
		}
		else if($notesParto["duree"][$bo]==10 && $croche==21 && $bo==count($notesParto["absc"])-1){
			$croche=900;
			include($ROOT_PATH . 'partition/croche8.php');
		}
		else if($croche==102 && $notesParto["duree"][$bo]==10) include($ROOT_PATH . 'partition/croche8.php');
		else if($croche==101 && $notesParto["duree"][$bo]==10) $croche=102;
		else if($notesParto["duree"][$bo]==10 && $croche==100) $croche=101;	
		else if($notesParto["duree"][$bo]==30 && $croche==1) $croche=300;
		else if($notesParto["duree"][$bo]==30) $croche=100;	
		else if($notesParto["duree"][$bo]==10 && $croche==300) include($ROOT_PATH . 'partition/croche8.php');	
		else if($notesParto["duree"][$bo]==10 && $croche==32) include($ROOT_PATH . 'partition/doublecroche8.php');
		else if($notesParto["duree"][$bo]==10 && $croche==2) $croche=32;	
		else if($notesParto["duree"][$bo]==20 && $croche==12) include($ROOT_PATH . 'partition/doublecroche8.php');
		else if($notesParto["duree"][$bo]==10 && $croche==500) include($ROOT_PATH . 'partition/croche8.php');
		else if($notesParto["duree"][$bo]==10 && $croche==12) $croche=500;
		else if($notesParto["duree"][$bo]==20 && $croche==22) include($ROOT_PATH . 'partition/doublecroche8.php');
		else if($notesParto["duree"][$bo]==10 && $croche==110) include($ROOT_PATH . 'partition/croche8.php');
		else if($notesParto["duree"][$bo]==10 && $croche==22) $croche=110;
		else if($notesParto["duree"][$bo]==10 && $croche==21) $croche=22;	
		else if($notesParto["duree"][$bo]==10 && $croche==1) $croche=21;	
		else if($notesParto["duree"][$bo]==20 && $croche==11) $croche=12;
		else if($notesParto["duree"][$bo]==10 && $croche==200) include($ROOT_PATH . 'partition/croche8.php');
		else if($notesParto["duree"][$bo]==10 && $croche==11) $croche=200;
		else if($notesParto["duree"][$bo]==10 && $croche==10) $croche=11;
		else if($notesParto["duree"][$bo]==10 && $croche==0) $croche=10;	
		else if($notesParto["duree"][$bo]==40 && $noire==1) include($ROOT_PATH . 'partition/tige8.php');
		else if($notesParto["duree"][$bo]==40) include($ROOT_PATH . 'partition/tige8.php');
		else if($notesParto["duree"][$bo]==20 && $noire==3) include($ROOT_PATH . 'partition/croche8.php');
		else if($notesParto["duree"][$bo]==20 && $noire==1) include($ROOT_PATH . 'partition/croche8.php');
		else if($notesParto["duree"][$bo]==20 && $croche==1) $croche=2;
		else if($notesParto["duree"][$bo]==20 && $croche==0 && $bo==count($notesParto["absc"])-1) include($ROOT_PATH . 'partition/croche8.php');	
		else if($notesParto["duree"][$bo]==20 && $croche==0) $croche=1;	
		else if($notesParto["duree"][$bo]>40) include($ROOT_PATH . 'partition/tige8.php');
		else $erreur=0;

	}
	else $poiuytrez=0;

}//fin for


unset($notesParto);
?>