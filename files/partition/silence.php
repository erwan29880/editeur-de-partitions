<?php
$noire=0;
if($notesParto["duree"][$bo]==40){
	$noiree=imagecreatefrompng('image/noire.png');
	imagecopymerge($image,$noiree,$notesParto["absc"][$bo],$notesParto["ordo"][$bo],0,0,13,31,100);
	imagedestroy($noiree);
	
	if(preg_match('#_8#',$metrique)) $noire=1;
}

if($notesParto["duree"][$bo]==60){
	$noiree=imagecreatefrompng('image/noire.png');
	imagecopymerge($image,$noiree,$notesParto["absc"][$bo],$notesParto["ordo"][$bo],0,0,13,31,100);
	imagedestroy($noiree);
	imagefilledellipse($image, $notesParto["absc"][$bo]+17, $notesParto["ordo"][$bo]+26, (6*$coefficient), (6*$coefficient), $noir);
}
else if($notesParto["duree"][$bo]==20){

	if(preg_match('#_8#',$metrique) && count($notesParto["duree"])<$bo+1 && $notesParto["duree"][$bo+1]==20) $noire=0;
	else if($croche==1){
		if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
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
		$hqueue=38;
		$lEllipse=$hEllipse/1.3;	
	}
	else{
		$croche=2;
	}
							
	$crochee=imagecreatefrompng('image/croche.png');
	imagecopymerge($image,$crochee,$notesParto["absc"][$bo],$notesParto["ordo"][$bo],0,0,12,21,100);
	imagedestroy($crochee);
}
else if($notesParto["duree"][$bo]==10){
	$doublecroche=imagecreatefrompng('image/doublecroche.png');
	imagecopymerge($image,$doublecroche,$notesParto["absc"][$bo],$notesParto["ordo"][$bo],0,0,13,27,100);
	imagedestroy($doublecroche);
}
else if($notesParto["duree"][$bo]==80){
	imagefilledrectangle ($image , $notesParto["absc"][$bo]-10, $hParto+(2*$decalageLignes) ,$notesParto["absc"][$bo]+10 , $hParto+(2*$decalageLignes)-($decalageLignes*2/3) ,$noir );
}
else{
	$noire=imagecreatefrompng('image/noire.png');
	imagecopymerge($image,$noire,$notesParto["absc"][$bo],$notesParto["ordo"][$bo],0,0,13,31,100);
	imagedestroy($noire);
}


?>