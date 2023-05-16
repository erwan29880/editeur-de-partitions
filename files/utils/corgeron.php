<?php   

if(preg_match('#\'#',$signe)){
	$y=$lp;	
	$signe=preg_replace('#\'#','',$signe);
	if($tiret==1) imageline($image,$x,$y+4,$x+$taille-3,$y+4,$noir);
}
else if(preg_match('#"#',$signe)){
	$y=$lp-50;	
	$signe=preg_replace('#"#','',$signe);
	if($tiret==1) imageline($image,$x,$y+4,$x+$taille-3,$y+4,$noir);
}
else{
	$y=$lt;
	if($tiret==1) imageline($image,$x,$y+4,$x+$taille-3,$y+4,$noir);
}
imagettftext($image,$taille,$angle,$x,$y,$noir,$police,$signe);  //j'écris la note

?>