<?php
		
if($signe[0]=='1'){
	$signe=preg_replace('#[1]{1}-(.*)#','$1',$signe);
	imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
}
else if($signe[0]=='2' ||$signe[0]=='3'){
	$signe=preg_replace('#[23]{1}-(.*)#','$1',$signe);
	imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
}
else{
	$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
	imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
}

?>