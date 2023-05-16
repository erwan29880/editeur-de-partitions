<?php

//---------------------------------------------------------------------------------------------------------------------------------
//---------------algo pour changer la tonalité pour les @*!^ qui ne savent pas la renseigner---------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------
$chaineprovisoire2=str_replace(' ','',$_POST['tab']);
$pourTrouveTonalite='K:'.$pourTrouveTonalite;
$rempPar=$pourTrouveTonalite.'@';
$chaineProvisoire=str_replace($pourTrouveTonalite,$rempPar,$chaineprovisoire2);
$chaineProvisoire=strstr($chaineProvisoire,'@');
$chaineProvisoire=str_replace('<br/>','',$chaineProvisoire);
$chaineProvisoire=preg_replace('#[^a-gA-GW]#','',$chaineProvisoire);
$chaineProvisoire=preg_replace('#([a-gA-G]{1,})W.*#','$1',$chaineProvisoire);

if($tonalite=='Cmaj'){
	$a=substr_count(strtoupper($chaineProvisoire),'A');
	$c=substr_count(strtoupper($chaineProvisoire),'C');
	if(strtoupper($chaineProvisoire[0])=='A' && strtoupper($chaineProvisoire[strlen($chaineProvisoire)-1])=='A') $tonalite='Amin';
	if(strtoupper($chaineProvisoire[0])=='E' && strtoupper($chaineProvisoire[strlen($chaineProvisoire)-1])=='A') $tonalite='Amin';
	if(strtoupper($chaineProvisoire[0])=='E' && strtoupper($chaineProvisoire[strlen($chaineProvisoire)-1])=='E') $tonalite='Amin';
	if(strtoupper($chaineProvisoire[0])=='C' && strtoupper($chaineProvisoire[strlen($chaineProvisoire)-1])=='A'){
		if($c>$a) $tonalite='Cmaj';
		else $tonalite='Amin';
	}	
} 


if($tonalite=='Gmaj'){
	$e=substr_count(strtoupper($chaineProvisoire),'E');
	$g=substr_count(strtoupper($chaineProvisoire),'G');
	if(strtoupper($chaineProvisoire[0])=='E' && strtoupper($chaineProvisoire[strlen($chaineProvisoire)-1])=='E') $tonalite='Emin';
	if(strtoupper($chaineProvisoire[0])=='B' && strtoupper($chaineProvisoire[strlen($chaineProvisoire)-1])=='E') $tonalite='Emin';
	if(strtoupper($chaineProvisoire[0])=='B' && strtoupper($chaineProvisoire[strlen($chaineProvisoire)-1])=='B') $tonalite='Emin';
	if(strtoupper($chaineProvisoire[0])=='G' && strtoupper($chaineProvisoire[strlen($chaineProvisoire)-1])=='E'){
		if($g>$e) $tonalite='Gmaj';
		else $tonalite='Emin';
	}
} 
unset($chaineProvisoire);
unset($pourTrouveTonalite);
unset($rempPar);

?>