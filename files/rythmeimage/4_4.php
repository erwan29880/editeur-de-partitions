<?php

if($verifMetrique=='5_4'){

	if($signe[0]=='1' ||$signe[0]=='3' ){
		$signe=preg_replace('#[13]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
	}
	else if($signe[0]=='2' ||$signe[0]=='4' ||$signe[0]=='5'){
		$signe=preg_replace('#[245]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}
else if(preg_match('#rondeau#i',$_POST['tab']))	{

	if($signe[0]=='1'){
		$signe=preg_replace('#1-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
	}
	else if($signe[0]=='2' ||$signe[0]=='4' ||$signe[0]=='6'){
		$signe=preg_replace('#[246]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"-");
	}
}
else if(preg_match('#reel#i',$_POST['tab']) && !preg_match('#reel\s[qd]#',$_POST['tab'])){
	
	if($signe[0]=='1' ||$signe[0]=='3'){
			
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
		$signe=preg_replace('#[246]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"-");
	}
}
else if(isset($erwan) && preg_match('#scottish#i',$_POST['tab'])){
	
	if($signe[0]=='1'){
		$signe=preg_replace('#[1]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
		if(!isset($increm))$increm=0;
		else $increm++;
		imageLine ($image, $x, $lBa+5, $x+$taille-3,$lBa+5, $grisBA);
	}
	else if($signe[0]=='2'){
		$signe=preg_replace('#[2]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
		$increm++;
		if($increm==1 || $increm==5) imageLine ($image, $x, $lBa+5, $x+$taille-3,$lBa+5, $grisBA);
	}
	else if($signe[0]=='3'){
		$signe=preg_replace('#[3]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
		$increm++;
		imageLine ($image, $x, $lBa+5, $x+$taille-3,$lBa+5, $grisBA);
	}
	else if($signe[0]=='4'){
		$signe=preg_replace('#[4]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
		$increm++;
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
	
	if($increm==15) unset($increm);
}
else if(isset($erwan) && preg_match('#an\s?dro#i',$_POST['tab'])){

	if($signe[0]=='1' ||$signe[0]=='3'){
		$signe=preg_replace('#[13]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
		imageLine ($image, $x, $lBa+5, $x+$taille-3,$lBa+5, $grisBA);
	}
	else if($signe[0]=='2'){
		$signe=preg_replace('#[2]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
		ImageLine ($image, $x, $lBa+5, $x+$taille-4,$lBa+5, $grisBA);
	}
	else if($signe[0]=='4'){
		$signe=preg_replace('#[4]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}
else if(isset($erwan) && preg_match('#Kas a Barh#i',$_POST['tab']))	{

	if($signe[0]=='1' ||$signe[0]=='3'){
		$signe=preg_replace('#[13]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
		imageLine ($image, $x, $lBa+5, $x+$taille-3,$lBa+5, $grisBA);
	}
	else if($signe[0]=='2'){
		$signe=preg_replace('#[2]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
		imageLine ($image, $x, $lBa+5, $x+$taille-4,$lBa+5, $grisBA);
	}
	else if($signe[0]=='4'){
		$signe=preg_replace('#[4]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}
else if(isset($erwan) && preg_match('#plinn?#i',$_POST['tab']))	{

	if($signe[0]=='1' ||$signe[0]=='3' ||$signe[0]=='2'||$signe[0]=='4'){
		$signe=preg_replace('#[1234]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
		imageLine ($image, $x, $lBa-2, $x+$taille-3,$lBa-$taille+2, $noir);
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}
else if(isset($erwan) && preg_match('#hanter\s?dro#i',$_POST['tab']))	{

	if($signe[0]=='1' ||$signe[0]=='3' ||$signe[0]=='5'){
		$signe=preg_replace('#[135]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"B");
		imageLine ($image, $x, $lBa+5, $x+$taille-3,$lBa+5, $grisBA);
	}
	else if($signe[0]=='2'){
		$signe=preg_replace('#[2]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
		imageLine ($image, $x, $lBa+5, $x+$taille-4,$lBa+5, $grisBA);
	}
	else if($signe[0]=='4' ||$signe[0]=='6'){
		$signe=preg_replace('#[46]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"a");
	}
	else{
		$signe=preg_replace('#[0-6]{1}-(.*)#','$1',$signe);
		imagettftext($image,$taille,$angle,$x,$lBa,$grisBA,$police,"|");
	}
}
else if(preg_match('#bourr#i',$_POST['tab'])){

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