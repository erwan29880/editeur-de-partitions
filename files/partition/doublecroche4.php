<?php	
if($doublecroche==3){
	$aver=($notesParto["ordo"][$bo-3]+$notesParto["ordo"][$bo-2]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo])/4;

	if($aver<$hParto+(2.5*$decalageLignes)) $lEllipse=-2;

	$x1=$notesParto["absc"][$bo-3]+$lEllipse;
	$x2=$notesParto["absc"][$bo-2]+$lEllipse;
	$x3=$notesParto["absc"][$bo-1]+$lEllipse;
	$x4=$notesParto["absc"][$bo]+$lEllipse;
	$y1=$notesParto["ordo"][$bo-3];
	$y2=$notesParto["ordo"][$bo-2];
	$y3=$notesParto["ordo"][$bo-1];
	$y4=$notesParto["ordo"][$bo];
	$array[]=$y1;
	$array[]=$y2;
	$array[]=$y3;
	$array[]=$y4;
	$yTotal=max($array);
	$difference=min($array);

	if($aver<$hParto+(2.5*$decalageLignes)){
		$difference=$yTotal+$hqueue;
		//reliure
		imageBoldLine($image, $x1,$difference, $x4, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x1, $difference-7, $x4, $difference-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première
		imageBoldLine($image, $x1, $y1, $x1, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x2, $y2, $x2, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x3, $y3, $x3, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x4, $y4, $x4, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{	
		$yTotal=$difference-$hqueue;
		//reliure
		imageBoldLine($image, $x1, $yTotal, $x4, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x1, $yTotal+7, $x4, $yTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première
		imageBoldLine($image, $x1, $y1, $x1, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x2, $y2, $x2, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x3, $y3, $x3, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x4, $y4, $x4, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	include($ROOT_PATH . 'utils/diese3.php');
	include($ROOT_PATH . 'utils/diese2.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');
	$doublecroche=0;
}

if($doublecroche==79){
	$aver=($notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo])/2;

	if($aver<$hParto+(2.5*$decalageLignes)) $lEllipse=-2;
	$x3=$notesParto["absc"][$bo-1]+$lEllipse;
	$x4=$notesParto["absc"][$bo]+$lEllipse;	
	$y3=$notesParto["ordo"][$bo-1];
	$y4=$notesParto["ordo"][$bo];
	$array[]=$y3;
	$array[]=$y4;
	$yTotal=max($array);
	$difference=min($array);

	if($aver<$hParto+(2.5*$decalageLignes)){			
		$difference=$yTotal+$hqueue;
		//reliure
		imageBoldLine($image, $x3,$difference, $x4, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x3, $difference-7, $x4, $difference-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première	
		imageBoldLine($image, $x3, $y3, $x3, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x4, $y4, $x4, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{
		//problème différence hauteur en notes, allongement de hqueue
		if($yTotal-$difference>$hqueue/2) $hauteurTige=$hqueue+$yTotal-$difference;
		else $hauteurTige=$hqueue;

		$yTotal=$yTotal-$hauteurTige;
		//reliure
		imageBoldLine($image, $x3, $yTotal, $x4, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x3, $yTotal+7, $x4, $yTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première	
		imageBoldLine($image, $x3, $y3, $x3, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x4, $y4, $x4, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
				
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');
	$doublecroche=0;
}
else if($doublecroche==2){

	$aver=($notesParto["ordo"][$bo-2]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo])/3;
	if($aver<$hParto+(2.5*$decalageLignes)) $lEllipse=-2;

	$x1=$notesParto["absc"][$bo-2]+$lEllipse;
	$x2=$notesParto["absc"][$bo-1]+$lEllipse;
	$x3=$notesParto["absc"][$bo]+$lEllipse;
	$y1=$notesParto["ordo"][$bo-2];
	$y2=$notesParto["ordo"][$bo-1];
	$y3=$notesParto["ordo"][$bo];
	$array[]=$y1;
	$array[]=$y2;
	$array[]=$y3;
	$yTotal=max($array);
	$difference=min($array);

	if($aver<$hParto+(2.5*$decalageLignes)){
		
		$difference=$yTotal+$hqueue;
		//reliure
		imageBoldLine($image, $x1,$difference, $x3, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x1, $difference-7, $x2, $difference-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première
		imageBoldLine($image, $x1, $y1, $x1, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x2, $y2, $x2, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x3, $y3, $x3, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');				
	}
	else{
		$yTotal=$difference-$hqueue;
		//reliure
		imageBoldLine($image, $x1, $yTotal, $x3, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x1, $yTotal+7, $x2, $yTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première
		imageBoldLine($image, $x1, $y1, $x1, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x2, $y2, $x2, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x3, $y3, $x3, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	include($ROOT_PATH . 'utils/diese2.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');
}
else if($DbleCrDble==1){

	$aver=($notesParto["ordo"][$bo-2]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo])/3;
	if($aver<$hParto+(2.5*$decalageLignes)) $lEllipse=-2;

	$x1=$notesParto["absc"][$bo-2]+$lEllipse;
	$x2=$notesParto["absc"][$bo-1]+$lEllipse;
	$x3=$notesParto["absc"][$bo]+$lEllipse;
	$y1=$notesParto["ordo"][$bo-2];
	$y2=$notesParto["ordo"][$bo-1];
	$y3=$notesParto["ordo"][$bo];
	$array[]=$y1;
	$array[]=$y2;
	$array[]=$y3;
	$yTotal=max($array);
	$difference=min($array);
		 
	if($aver<$hParto+(2.5*$decalageLignes)){

		$difference=$yTotal+$hqueue;
		//reliure
		imageBoldLine($image, $x1,$difference, $x3, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x1, $difference-7, $x1+($x2-$x1)/2, $difference-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x3, $difference-7, $x3-($x2-$x1)/2, $difference-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première
		imageBoldLine($image, $x1, $y1, $x1, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x2, $y2, $x2, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x3, $y3, $x3, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{
		$yTotal=$difference-$hqueue;
		//reliure
		imageBoldLine($image, $x1, $yTotal, $x3, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x1, $yTotal+7, $x1+($x2-$x1)/2, $yTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x3, $yTotal+7, $x3-($x2-$x1)/2, $yTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première
		imageBoldLine($image, $x1, $y1, $x1, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x2, $y2, $x2, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x3, $y3, $x3, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		}
		include($ROOT_PATH . 'utils/diese2.php');
		include($ROOT_PATH . 'utils/diese1.php');
		include($ROOT_PATH . 'utils/diese.php');	
}
else if($DbleCrDble==2){
	$aver=($notesParto["ordo"][$bo-2]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo])/3;
	if($aver<$hParto+(2.5*$decalageLignes)) $lEllipse=-2;

	$x1=$notesParto["absc"][$bo-2]+$lEllipse;
	$x2=$notesParto["absc"][$bo-1]+$lEllipse;
	$x3=$notesParto["absc"][$bo]+$lEllipse;
	$y1=$notesParto["ordo"][$bo-2];
	$y2=$notesParto["ordo"][$bo-1];
	$y3=$notesParto["ordo"][$bo];
	$array[]=$y1;
	$array[]=$y2;
	$array[]=$y3;
	$yTotal=min($array);
	$difference=max($array);

	if($aver<$hParto+(2.5*$decalageLignes)){
		$difference=$difference+$hqueue;
		//reliure
		imageBoldLine($image, $x1,$difference, $x3, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x2, $difference-7, $x3, $difference-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première
		imageBoldLine($image, $x1, $y1, $x1, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x2, $y2, $x2, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x3, $y3, $x3, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{ 
		//problème différence hauteur en notes, allongement de hqueue
		if($yTotal-$difference>$hqueue/2) $hauteurTige=$hqueue+$yTotal-$difference;
		else $hauteurTige=$hqueue;

		$yTotal=$yTotal-$hauteurTige;
		//reliure
		imageBoldLine($image, $x1, $yTotal, $x3, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x2, $yTotal+7, $x3, $yTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première
		imageBoldLine($image, $x1, $y1, $x1, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x2, $y2, $x2, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x3, $y3, $x3, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}

	include($ROOT_PATH . 'utils/diese2.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');
}
else if($croche==60){
	
	if($notesParto["ordo"][$bo-2]<$hParto+(2.5*$decalageLignes)){	
		$lEllipse=-2;
		$hqueue=-$hqueue;
	}

	imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2]-$hqueue, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
	imagefilledellipse($image, $notesParto["absc"][$bo-2]+$hEllipse+6, $notesParto["ordo"][$bo-2], (6*$coefficient), (6*$coefficient), $noir);
	include($ROOT_PATH . 'utils/diese2.php');
	$hqueue=38;
	$lEllipse=$hEllipse/1.3;
	$aver=($notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo])/2;

	if($aver<$hParto+(2.5*$decalageLignes)) $lEllipse=-2;

	$x3=$notesParto["absc"][$bo-1]+$lEllipse;
	$x4=$notesParto["absc"][$bo]+$lEllipse;		
	$y3=$notesParto["ordo"][$bo-1];
	$y4=$notesParto["ordo"][$bo];
	$array[]=$y3;
	$array[]=$y4;
	$yTotal=max($array);
	$difference=min($array);

	if($aver<$hParto+(2.5*$decalageLignes)){			
		$difference=$yTotal+$hqueue;
		//reliure
		imageBoldLine($image, $x3,$difference, $x4, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x3, $difference-7, $x4, $difference-7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première	
		imageBoldLine($image, $x3, $y3, $x3, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x4, $y4, $x4, $difference, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{
		//problème différence hauteur en notes, allongement de hqueue
		if($yTotal-$difference>$hqueue/2) $hauteurTige=$hqueue+$yTotal-$difference;
		else $hauteurTige=$hqueue;

		$yTotal=$yTotal-$hauteurTige;
		//reliure
		imageBoldLine($image, $x3, $yTotal, $x4, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $x3, $yTotal+7, $x4, $yTotal+7, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//première					
		imageBoldLine($image, $x3, $y3, $x3, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $x4, $y4, $x4, $yTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
				
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese.php');
}
else $qsdfdsqd=0;

$hqueue=38;
$lEllipse=$hEllipse/1.3;
unset($array);		
unset($yTotal);
unset($difference);
unset($x1);
unset($x2);
unset($x3);
unset($x4);
unset($y1);
unset($y2);
unset($y3);
unset($y4);
unset($hauteurTige);
$DbleCrDble=0;
$doublecroche=0;
$croche=0;

?>