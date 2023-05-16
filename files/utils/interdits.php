<?php  

$chaineprovisoire2=preg_replace('#W:.*<br />#','',$_POST['tab']);

$chaineprovisoire2=str_replace(' ','',$chaineprovisoire2);
$pourTrouveTonalite='K:';
$rempPar=$pourTrouveTonalite.'@';
$chaineProvisoire=str_replace($pourTrouveTonalite,$rempPar,$chaineprovisoire2);
$chaineProvisoire=strstr($chaineProvisoire,'@');

$interdit=0;

if(preg_match('#,,#',$chaineProvisoire)) $interdit=1;
else if(preg_match('#\'\'#',$chaineProvisoire)) $interdit=1;
else if(preg_match('#[CDEF],#',$chaineProvisoire)) $interdit=1;
else if(preg_match('#[fgab]\'#',$chaineProvisoire)) $interdit=1;
else $interdit=0;

if($interdit==1){
	$image = imagecreate(700,200);
	$blanc = imagecolorallocate($image, 255, 255, 255);
	$vert=imagecolorallocate($image,159,216,26);
	imagepng($image);
	imagedestroy($image);
	Header("Location: ".$ROOT_PATH."utils/page.php?a=1");
	exit;
}


















?>