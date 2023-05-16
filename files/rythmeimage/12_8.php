<?php

if(isset($erwan) && preg_match('#Laridé 8 temps#',$_POST['tab']))	
{
	if($signe[0]=='1' ||$signe[0]=='3' ||$signe[0]=='2'||$signe[0]=='4'||$signe[0]=='5'||$signe[0]=='6'||$signe[0]=='7'||$signe[0]=='8'){
		$signe=preg_replace('#[12345678]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
		imageLine ($image, $x, $lBa-2, $x+$taille-3,$lBa-$taille+2, $noir);
	}
	else{
		$signe=preg_replace('#[0-8]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}
else if(preg_match('#gavotte du bas#i',$_POST['tab']) && isset($erwan) && $erwan=='Erwan Tanguy'){
	if($signe[0]=='1' ||$signe[0]=='3' || $signe[0]=='5' ||$signe[0]=='7'){
		$signe=preg_replace('#[1357]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
	}
	else if($signe[0]=='2' ||$signe[0]=='4' || $signe[0]=='6' ||$signe[0]=='8' ){
		$signe=preg_replace('#[2468]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}
else if(preg_match('#gavotte#i',$_POST['tab']) && isset($erwan) && $erwan=='Erwan Tanguy'){
		
	if($signe[0]=='1' ||$signe[0]=='4' || $signe[0]=='7'){
		$signe=preg_replace('#[147]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
	}
	else if($signe[0]=='2' || $signe[0]=='3' || $signe[0]=='5' || $signe[0]=='6' || $signe[0]=='8'){
		$signe=preg_replace('#[23568]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}	
}
else{
	if($signe[0]=='1' ||$signe[0]=='3' || $signe[0]=='5' ||$signe[0]=='7'){
		$signe=preg_replace('#[1357]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
	}
	else if($signe[0]=='2' ||$signe[0]=='4' || $signe[0]=='6' ||$signe[0]=='8'){
		$signe=preg_replace('#[2468]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}

?>