<?php

if(preg_match('#bourr#i',$_POST['tab'])){
	if($signe[0]=='1'){
		$signe=preg_replace('#[13]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
	}
	else if($signe[0]=='2' ||$signe[0]=='4'){
		$signe=preg_replace('#[24]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"-");
	}
}
else if(preg_match('#polka#',$_POST['tab'])){
	if($signe[0]=='1' ||$signe[0]=='3' ||$signe[0]=='5' ||$signe[0]=='7'){
		$signe=preg_replace('#[1357]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
		imageline ($image, $x, $lBa+5, $x+$taille-3,$lBa+5, $grisBA);
	}
	else if($signe[0]=='2' || $signe[0]=='6'){
		$signe=preg_replace('#[26]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
		imageline ($image, $x, $lBa+5, $x+$taille-3,$lBa+5, $grisBA);
	}
	else if($signe[0]=='4' || $signe[0]=='8'){
		$signe=preg_replace('#[48]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-9]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}
else{
	if($signe[0]=='1' ||$signe[0]=='3'){
		$signe=preg_replace('#[13]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
	}
	else if($signe[0]=='2' ||$signe[0]=='4' ){
		$signe=preg_replace('#[24]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}

?>