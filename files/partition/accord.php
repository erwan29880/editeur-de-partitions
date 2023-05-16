<?php

if($accordAprs==1){
	imageBoldLine($image, $notesParto["absc"][$bo]+$oordo, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$oordo, $notesParto["ordo"][$bo-1], $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	$accordAprs=0;
}	

if($notesParto["duree"][$bo+1]==0){
 $accordAprs=1;
 $oordo=$lEllipse;
}
	
if($notesParto["duree"][$bo+1]==0) include($ROOT_PATH . 'partition/accord.php');
	
?>