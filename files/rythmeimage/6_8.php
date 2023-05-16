<?php

if(preg_match('#jig#i',$_POST['tab'])){

	if($signe[0]=='1' ||$signe[0]=='3' ||$signe[0]=='5'){
				
		if($duree==40 || $duree==60){
			$abs3=$x+$decalageTraitNote;
			$abs4=$x+(40*$coefficient*2)-($duree/5); //40 pour la durée d'une noire
			$y2=$lBa-(8*$coefficient);
			$signe=preg_replace('#[13]{1}-(.*)#','$1',$signe);
			imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
			imageLine($image,$abs3,$y2,$abs4,$y2,$noir);
		}
		else{ 
			$signe=preg_replace('#[13]{1}-(.*)#','$1',$signe);
			imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
		}
	}
	else if($signe[0]=='2' ||$signe[0]=='4' ||$signe[0]=='6'){
		$signe=preg_replace('#[24]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}
else if(preg_match('#gavotte#i',$_POST['tab']) && isset($erwan) && $erwan=='Erwan Tanguy'){
		
	if($signe[0]=='1'){
		$signe=preg_replace('#[1]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
	}
	else if($signe[0]=='3'){
		$signe=preg_replace('#[23568]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-8]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"");
	}	
}
else{

	if($signe[0]=='1' ||$signe[0]=='3' ||$signe[0]=='5'){
		$signe=preg_replace('#[135]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
	}
	else if($signe[0]=='2' ||$signe[0]=='4' ||$signe[0]=='6'){
		$signe=preg_replace('#[246]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}

?>