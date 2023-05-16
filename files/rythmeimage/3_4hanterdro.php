<?php
				
if($signe[0]=='1' || $signe[0]=='3' || $signe[0]=='5'){
	$signe=preg_replace('#[135]{1}-(.*)#','$1',$signe);
	imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
}
else if($signe[0]=='2' ||$signe[0]=='4' || $signe[0]=='6'){
	$signe=preg_replace('#[246]{1}-(.*)#','$1',$signe);
	imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
}
else{
	$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
	imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
}

?>