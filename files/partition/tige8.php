<?php
if($notesParto["duree"][$bo]==40 && $noire==1){

	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}

	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	include($ROOT_PATH . 'utils/diese.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;
	$noire++;	
}
else if($notesParto["duree"][$bo]==40 && $noire==2){

	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}

	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	include($ROOT_PATH . 'utils/diese.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;
	$noire=3;
}
else if($notesParto["duree"][$bo]==40){

	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}

	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	include($ROOT_PATH . 'utils/diese.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;
	$noire=1;

	if($croche==1){
		if($notesParto["ordo"][$bo-1]<$hParto+(2.5*$decalageLignes)){	
			$lEllipse=-2;
			$hqueue=-$hqueue;
			imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
			crocheBas($image,$noir,$notesParto["absc"][$bo-1],$notesParto["ordo"][$bo-1]);
		}
		else{
			imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
			crocheHaut($image,$noir,$notesParto["absc"][$bo-1],$notesParto["ordo"][$bo-1]);		
		}

	include($ROOT_PATH . 'utils/diese.php');
	$croche=0;
	$noire=0;
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	
	}	
}
else if($notesParto["duree"][$bo]==60 || $notesParto["duree"][$bo]==120)
{

	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)) {	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}

	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
	include($ROOT_PATH . 'utils/diese.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;
}		
else $pddsfc=0;

?>