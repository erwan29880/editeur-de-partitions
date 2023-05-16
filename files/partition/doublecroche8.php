<?php	
$array[]=$notesParto["ordo"][$bo-3];
$array[]=$notesParto["ordo"][$bo-2];
$array[]=$notesParto["ordo"][$bo-1];
$array[]=$notesParto["ordo"][$bo];
$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2]+$notesParto["ordo"][$bo-3])/4;

if($aver<$hParto+(2.5*$decalageLignes)){
				
	$xTotal=max($array)+$hqueue;
	$lEllipse=-2;		
	//reliure
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	//quatrième
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');				
	//troisième
	imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	//deuxième
	imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	//première
	imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	$bas=1;
}
else{
		
	$xTotal=min($array)-$hqueue;
	//reliure
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	//quatrième
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	//troisième
	imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	//deuxième
	imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	//première
	imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	$bas=0;
}
	
	
if($croche==12){
	if($bas==1){
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal-7, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	}
	else{
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal+7, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	}
}
else if($croche==22){
	if($bas==1){
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal-7, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	}
	else{
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal+7, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	}
}
else{
	if($bas==1){
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal-7, $notesParto["absc"][$bo]+$lEllipse, $xTotal-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	}
	else{
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal+7, $notesParto["absc"][$bo]+$lEllipse, $xTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	}
}

include($ROOT_PATH . 'utils/diese3.php');
include($ROOT_PATH . 'utils/diese2.php');
include($ROOT_PATH . 'utils/diese1.php');
include($ROOT_PATH . 'utils/diese.php');
unset($bas);
$hqueue=38;
$lEllipse=$hEllipse/1.3;		
unset($xTotal);
unset($array);
unset($aver);	
$croche=0;