<?php
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
	
	include($ROOT_PATH . 'utils/diese1.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;		
}

if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
	$lEllipse=-2;
	$hqueue=-$hqueue;
}

imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;

if($notesParto["duree"][$bo]==60){
	imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
	if($croche==1) $croche=0;  //syncopes, la croche avant la noire pointée
	else $croche=2;
}

if($notesParto["duree"][$bo]==120){
	imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
}

include($ROOT_PATH . 'utils/diese.php');
$hqueue=38;
$lEllipse=$hEllipse/1.3;

?>