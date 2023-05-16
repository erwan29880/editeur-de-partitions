<?php
if($notesParto["duree"][$bo]==20){
	
	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheBas($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
	else{
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheHaut($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
		
	include($ROOT_PATH . 'utils/diese.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	
}
else if($notesParto["duree"][$bo]==30){
	
	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheBas($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
	else{
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheHaut($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
			
	imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);				
	include($ROOT_PATH . 'utils/diese.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	
}
else if($notesParto["duree"][$bo]==60 || $notesParto["duree"][$bo]==120){
	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}

	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
	include($ROOT_PATH . 'utils/diese.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;
}
else if($notesParto["duree"][$bo]==40 || $notesParto["duree"][$bo]==80){
	
	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}

	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	include($ROOT_PATH . 'utils/diese.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;
}
else if($notesParto["duree"][$bo]==10){
	doubleCrocheBas($image,$noir,$notesParto["absc"][$bo]+$lEllipse,$notesParto["ordo"][$bo]-$hqueue*2);
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	include($ROOT_PATH . 'utils/diese.php');
}
else $kjsq=0;

?>