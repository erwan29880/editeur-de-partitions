<?php

$tonalite=preg_replace('#major#i','maj',$tonalite);
$tonalite=preg_replace('#minor#i','min',$tonalite);
$tonalite=preg_replace('#phr[yi]g[iy]en#','phr',$tonalite);
$tonalite=preg_replace('#[dD]{1}[oO]{1}[rR]{1}.*#','dor',$tonalite);
$tonaliteAfficheFin=$tonalite;

if($tonalite=='C' ||$tonalite=='CM' ||$tonalite=='Ddor'||$tonalite=='Cmaj'){
	$tonalite='Cmaj';
	$armure=0;
}
else if($tonalite=='Gmix'){
	$tonalite='Gmix';
	$armure=0;
}
else if($tonalite=='D' ||$tonalite=='DM' ||$tonalite=='Amix'||$tonalite=='DMaj' ||$tonalite=='Dmaj' ){
	$tonalite='Dmaj';
	$armure=2;
}
else if($tonalite=='E' ||$tonalite=='EM' ||$tonalite=='Bmix' ||$tonalite=='F#dor'||$tonalite=='Emaj' ){
	$tonalite='Emaj';
	$armure=4;
}
else if($tonalite=='F' ||$tonalite=='FM' ||$tonalite=='Cmix' ||$tonalite=='Gdor'||$tonalite=='Fmaj' ){
	$tonalite='Fmaj';
	$armure=8;
}
else if($tonalite=='G' ||$tonalite=='Ador'||$tonalite=='Gmaj' || $tonalite=='Dmix'){
	$tonaliteOpti="Ador";
	$tonalite='Gmaj';
	$armure=1;
}
else if($tonalite=='A' ||$tonalite=='AM' ||$tonalite=='Emix' ||$tonalite=='Bdor'||$tonalite=='Amaj' ){
	$tonalite='Amaj';
	$armure=3;
}
else if($tonalite=='Eb' ||$tonalite=='EbM' ||$tonalite=='Bbmix' ||$tonalite=='Fdor'||$tonalite=='Ebmaj' ){
	$tonalite='Ebmaj';
	$armure=10;
}
else if($tonalite=='Bb' ||$tonalite=='BbM' ||$tonalite=='Fmix' ||$tonalite=='Cdor'||$tonalite=='Bbmaj' ||$tonalite=='Gm' ||$tonalite=='Gmin'){
	$tonalite='Bbmaj';
	$armure=9;
}
else if($tonalite=='Gm' ||$tonalite=='Gmin'){
	$tonalite='Gmin';
	$armure=9;
}
else if($tonalite=='Dm' || $tonalite=='Aphr' || $tonalite=='Dmin'){
	$tonalite='Dmin';
	$armure=8;
}
else if($tonalite=='Am' || $tonalite=='Amin'){
	$tonalite='Amin';
	$armure=0;
}
else if($tonalite=='Bm' || $tonalite=='Bmin' ){
	$tonalite='Bmin';
	$armure=2;
}
else if($tonalite=='Em' || $tonalite=='Emin' ){
	$tonalite='Emin';
	$armure=1;
}
else if($tonalite=='Edor' ){
	$tonalite='Edor';
	$armure=3;
}
else if(preg_match('#HP#i',$tonalite)){
	$image = imagecreate(700,200);
	$blanc = imagecolorallocate($image, 255, 255, 255);
	$vert=imagecolorallocate($image,159,216,26);
	imagepng($image);
	imagedestroy($image);
	Header("Location: ".$ROOT_PATH."utils/page.php?a=2");
	exit;
}
else{
	$image = imagecreate(1000,700);
	$blanc = imagecolorallocate($image, 255, 255, 255);
	$vert=imagecolorallocate($image,159,216,26);
	imagepng($image);
	imagedestroy($image);
	Header("Location: ".$ROOT_PATH."utils/page.php?a=2");
	exit;
}
?>