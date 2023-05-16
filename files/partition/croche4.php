<?php	
if($CrNoireCr==1){

	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheBas($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
	else{
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheHaut($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
	include($ROOT_PATH . 'utils/diese.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	
				
	if($notesParto["ordo"][$bo-2]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheBas($image,$noir,$notesParto["absc"][$bo-2],$notesParto["ordo"][$bo-2]);
	}
	else{
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheHaut($image,$noir,$notesParto["absc"][$bo-2],$notesParto["ordo"][$bo-2]);
	}
	include($ROOT_PATH . 'utils/diese2.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	

	if($notesParto["ordo"][$bo-1]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}

	imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	include($ROOT_PATH . 'utils/diese1.php');
	$CrNoireCr=0;
	$croche=0;
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	
}
else if($croche==800){
	if($notesParto["ordo"][$bo-1]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheBas($image,$noir,$notesParto["absc"][$bo-1],$notesParto["ordo"][$bo-1]);
	}
	else{
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheHaut($image,$noir,$notesParto["absc"][$bo-1],$notesParto["ordo"][$bo-1]);
	}
	include($ROOT_PATH . 'utils/diese1.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	

	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	include($ROOT_PATH . 'utils/diese.php');
	$croche=0;
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;			
}
else if($croche==1 && $notesParto["duree"][$bo]==60){
	if($notesParto["ordo"][$bo-1]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheBas($image,$noir,$notesParto["absc"][$bo-1],$notesParto["ordo"][$bo-1]);
	}
	else{
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheHaut($image,$noir,$notesParto["absc"][$bo-1],$notesParto["ordo"][$bo-1]);
	}
	include($ROOT_PATH . 'utils/diese1.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	

	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}

	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
	include($ROOT_PATH . 'utils/diese.php');
	$croche=0;
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;			
}
else if($croche==79 || $croche==600){
	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheBas($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
		if($croche==600) imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
	}
	else{
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheHaut($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
		if($croche==600) imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
	}
	include($ROOT_PATH . 'utils/diese.php');
	$croche=0;
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	
}
else if($croche==700){
	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
	}
	else{
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
	}
	include($ROOT_PATH . 'utils/diese.php');
	$croche=0;
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;	
}
else if($croche==1){
	//sens des tiges
	$decalage2=$decalageLignes/2;
	//tiges vers le bas
	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes) && $notesParto["ordo"][$bo]-1<$hParto+(2.5*$decalageLignes)){	
		$x2=$notesParto["absc"][$bo]-2;
		$x1=$notesParto["absc"][$bo-1]-2;
		$y2=$notesParto["ordo"][$bo-1]+$hqueue;
		$y4=$notesParto["ordo"][$bo]+$hqueue;
	
		if(abs($notesParto["ordo"][$bo]-$notesParto["ordo"][$bo-1])>$decalageLignes/2){
			//deuxième croche plus basse
			if($notesParto["ordo"][$bo]>$notesParto["ordo"][$bo-1])	$y2=$y4-$decalage2;
			//première croche plus basse
			else $y4=$y2-$decalage2;
		}
	}
	else{
		$x2=$notesParto["absc"][$bo]+$lEllipse;
		$x1=$notesParto["absc"][$bo-1]+$lEllipse;
		$y2=$notesParto["ordo"][$bo-1]-$hqueue;
		$y4=$notesParto["ordo"][$bo]-$hqueue;
		if(abs($notesParto["ordo"][$bo]-$notesParto["ordo"][$bo-1])>$decalageLignes/2){
			//première croche plus haute
			if($notesParto["ordo"][$bo]>$notesParto["ordo"][$bo-1])	$y4=$y2+$decalage2;
			//deuxième croche plus haute
			else $y2=$y4+$decalage2;
		}
	}
	$y1=$notesParto["ordo"][$bo-1];
	$y3=$notesParto["ordo"][$bo];
	//reliure
	imageBoldLine($image, $x2, $y4, $x1, $y2, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	//deuxième
	imageBoldLine($image, $x2, $y3, $x2, $y4, $noir, $BoldNess=$epaisseur, $func='imageLine');
	//première
	imageBoldLine($image, $x1, $y1, $x1, $y2, $noir, $BoldNess=$epaisseur, $func='imageLine');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');
	$croche=0;
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;		
}
else if($croche==2){
	
	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheBas($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
	else{
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheHaut($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
	include($ROOT_PATH . 'utils/diese.php');	
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;		
	$croche=0;
}
else if(isset($triolett) && $triolett==2){
	
	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$xTotal=min($array)-$hqueue;
	//reliure
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	//troisième
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');	
	//deuxième
	imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	//première
	imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	imagearc($image,$notesParto["absc"][$bo-2]+(35*$coefficient),$xTotal,(70*$coefficient),(30*$coefficient),190,350,$noir);
	imagettftext($image,$taille-(6*$coefficient),$angle,$notesParto["absc"][$bo-2]+(31*$coefficient),$xTotal-(27*$coefficient),$noir,$police,'3');
	include($ROOT_PATH . 'utils/diese2.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');
	unset($xTotal);
	unset($xArc);
	unset($array);
	$triolett=0;
}
else if($doublecroche==10){


	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1])/2;

	if($aver<$hParto+(2.5*$decalageLignes)){
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');						
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		$bas=1;				
		$xdouble=($notesParto["absc"][$bo]-$notesParto["absc"][$bo-1])/4;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal-8, $notesParto["absc"][$bo]+$lEllipse-$xdouble, $xTotal-8, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imagefilledellipse($image, $notesParto["absc"][$bo-1]+$hEllipse+6, $notesParto["ordo"][$bo-1], (6*$coefficient), (6*$coefficient), $noir);
	}
	else{			
		$xTotal=min($array)-$hqueue;		
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//quatrième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');	
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		$bas=0;
		$xdouble=($notesParto["absc"][$bo]-$notesParto["absc"][$bo-1])/4;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal+8, $notesParto["absc"][$bo]+$lEllipse-$xdouble, $xTotal+8, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imagefilledellipse($image, $notesParto["absc"][$bo-1]+$hEllipse+6, $notesParto["ordo"][$bo-1], (6*$coefficient), (6*$coefficient), $noir);
	}
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');	
	unset($bas);
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;		
	unset($array);
	unset($aver);	
	$croche=0;
	$doublecroche=0;
	unset($yTotal);
	unset($xdouble);
}
else if($croche==60){

	if($notesParto["ordo"][$bo-1]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}
	imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	imagefilledellipse($image, $notesParto["absc"][$bo-1]+$hEllipse+6, $notesParto["ordo"][$bo-1], (6*$coefficient), (6*$coefficient), $noir);
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;

	if($notesParto["ordo"][$bo]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheBas($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
	else{ //haut
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		crocheHaut($image,$noir,$notesParto["absc"][$bo],$notesParto["ordo"][$bo]);
	}
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');		
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;		
	$croche=0;
}
else if($notesParto["duree"][$bo]==30 && $doublecroche==1){

	if($notesParto["ordo"][$bo]>$notesParto["ordo"][$bo-1]) $yTotal=$notesParto["ordo"][$bo-1]-$hqueue;
	else $yTotal=$notesParto["ordo"][$bo]-$hqueue;
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse,$yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse,$yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $yTotal, $notesParto["absc"][$bo-1]+$lEllipse,$yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	$xdouble=($notesParto["absc"][$bo]-$notesParto["absc"][$bo-1])/2;
	imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $yTotal+8, $notesParto["absc"][$bo-1]+$lEllipse+$xdouble,$yTotal+8, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	imagefilledellipse($image, $notesParto["absc"][$bo]+$hEllipse+6, $notesParto["ordo"][$bo], (6*$coefficient), (6*$coefficient), $noir);
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');
	$doublecroche=0;
	unset($yTotal);
	unset($xdouble);
}
else $eeee=0;

?>