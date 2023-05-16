<?php 

$clefsol=imagecreatefrompng('image/clef.png');
imagecopymerge($image,$clefsol,$a+10,$hParto-(0.6*$decalageLignes),0,0,37,70,100);
							
//métrique
$a=$a+60;
if(isset($metriqueGavotte) && $metriqueGavotte=='6_8') $metrique='6_8';
if($verifMetrique!=0) $metrique=$verifMetrique;
$metrique2=(preg_replace('#([0-9]{1,2}_[48]{1}).*#','$1',$metrique));
$metriqueA=explode('_',$metrique2);

if(isset($metriqueA[0]) && isset($metriqueA[1])){
	if(strlen($metriqueA[0])==2) imagettftext($image,$taille,0,$a-6,$hParto+(1.75*$decalageLignes),$noir,$police,$metriqueA[0]);
	else imagettftext($image,$taille,0,$a,$hParto+(1.75*$decalageLignes),$noir,$police,$metriqueA[0]); 
	imagettftext($image,$taille,0,$a,$hParto+(3.5*$decalageLignes),$noir,$police,$metriqueA[1]);
}
$a=$a-60;

//armure
$a=$a+75;
if($armure==1){
	imagettftext($image,$taille+2,8,$a+10,$hParto+(1*$decalageLignes),$noir,$police,'#');
}
else if($armure==2){
	imagettftext($image,$taille+2,8,$a+10,$hParto+(1*$decalageLignes),$noir,$police,'#');
	imagettftext($image,$taille+2,8,$a+24,$hParto+(2.5*$decalageLignes),$noir,$police,'#');
}
else if($armure==3){
	imagettftext($image,$taille+2,8,$a+30,$hParto+(0.5*$decalageLignes),$noir,$police,'#');
	imagettftext($image,$taille+2,8,$a+10,$hParto+(1*$decalageLignes),$noir,$police,'#');
	imagettftext($image,$taille+2,8,$a+24,$hParto+(2.5*$decalageLignes),$noir,$police,'#');
}
else if($armure==4){
	imagettftext($image,$taille+2,8,$a+30,$hParto+(0.5*$decalageLignes),$noir,$police,'#');
	imagettftext($image,$taille+2,8,$a+10,$hParto+(1*$decalageLignes),$noir,$police,'#');
	imagettftext($image,$taille+2,8,$a+24,$hParto+(2.5*$decalageLignes),$noir,$police,'#');
	imagettftext($image,$taille+2,8,$a+5,$hParto+(3.5*$decalageLignes),$noir,$police,'#');
}
else if($armure==8){
	imagettftext($image,$taille+5,0,$a+10,$hParto+(2.5*$decalageLignes),$noir,$police2,'b');
}
else if($armure==9){
	imagettftext($image,$taille+5,0,$a+10,$hParto+(2.5*$decalageLignes),$noir,$police2,'b');
	imagettftext($image,$taille+5,0,$a+20,$hParto+(1*$decalageLignes),$noir,$police2,'b');
}
else if($armure==10){
	imagettftext($image,$taille+5,0,$a+10,$hParto+(2.5*$decalageLignes),$noir,$police2,'b');
	imagettftext($image,$taille+5,0,$a+20,$hParto+(1*$decalageLignes),$noir,$police2,'b');
	imagettftext($image,$taille+5,0,$a+24,$hParto+(3*$decalageLignes),$noir,$police2,'b');
}
else $zyjsdfcjzasdh=0;

$a=$a-75;

?>