<?php
if($croche==40){

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
else if($noire==1 || $croche==0){

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
	$noire=0;
}
else if($noire==3){

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
		$noire=1;
}
else if($croche==101){
	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2])/3;

	if($aver<$hParto+(2.5*$decalageLignes)){					
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		$difference=-7;
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo-1]+$lEllipse-(($notesParto["absc"][$bo-1]-$notesParto["absc"][$bo-2])/4), $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imagefilledellipse($image, $notesParto["absc"][$bo-2]+$hEllipse+6, $notesParto["ordo"][$bo-2], (6*$coefficient), (6*$coefficient), $noir);
	}
	else{
		$difference=7;
		$xTotal=min($array)-$hqueue;		
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo-1]+$lEllipse-(($notesParto["absc"][$bo-1]-$notesParto["absc"][$bo-2])/4), $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');	
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imagefilledellipse($image, $notesParto["absc"][$bo-2]+$hEllipse+6, $notesParto["ordo"][$bo-2], (6*$coefficient), (6*$coefficient), $noir);
	}
			
	include($ROOT_PATH . 'utils/diese.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese2.php');		
	$lEllipse=$hEllipse/1.3;			
	unset($xTotal);
	unset($xArc);
	unset($array);
	unset($aver);
	$croche=0;
	unset($difference);
}
else if($croche==600){
	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2])/3;

	if($aver<$hParto+(2.5*$decalageLignes)){
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		$difference=-7;
				//reliure
				imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
				imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
				//troisième
				imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');						
				//deuxième
				imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');			
				//première
				imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{
		$difference=7;
		$xTotal=min($array)-$hqueue;				
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');						
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');		
	}
			
	include($ROOT_PATH . 'utils/diese.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese2.php');			
	$lEllipse=$hEllipse/1.3;			
	unset($xTotal);
	unset($xArc);
	unset($array);
	unset($aver);
	$croche=0;
	unset($difference);
}
else if($croche==200){

	$array[]=$notesParto["ordo"][$bo-3];
	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2]+$notesParto["ordo"][$bo-3])/4;

	if($aver<$hParto+(2.5*$decalageLignes)){		
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		$difference=-7;
								
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		}
		else{
			$difference=7;
			$xTotal=min($array)-$hqueue;

				//reliure
				imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
				imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
				//troisième
				imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
				//deuxième
				imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
				//première
				imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
				imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');		
		}
			
		include($ROOT_PATH . 'utils/diese.php');
		include($ROOT_PATH . 'utils/diese1.php');
		include($ROOT_PATH . 'utils/diese2.php');
		include($ROOT_PATH . 'utils/diese3.php');				
		$lEllipse=$hEllipse/1.3;			
		unset($xTotal);
		unset($xArc);
		unset($array);
		unset($aver);
		$croche=0;
		unset($difference);
}
else if($croche==900){

	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2])/3;

	if($aver<$hParto+(2.5*$decalageLignes)){		
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		$difference=-7;
								
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');	
	}
	else{
		$difference=7;
		$xTotal=min($array)-$hqueue;			
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
			
	include($ROOT_PATH . 'utils/diese.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese2.php');
	$lEllipse=$hEllipse/1.3;			
	unset($xTotal);
	unset($xArc);
	unset($array);
	unset($aver);
	$croche=0;
	unset($difference);
}
else if($croche==102){

	$array[]=$notesParto["ordo"][$bo-3];
	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2]+$notesParto["ordo"][$bo-3])/4;

	if($aver<$hParto+(2.5*$decalageLignes)){
						
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		$difference=-7;

		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imagefilledellipse($image, $notesParto["absc"][$bo-3]+$hEllipse+6, $notesParto["ordo"][$bo-3], (6*$coefficient), (6*$coefficient), $noir);
	}
	else{
		$difference=7;
		$xTotal=min($array)-$hqueue;

		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');					
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imagefilledellipse($image, $notesParto["absc"][$bo-3]+$hEllipse+6, $notesParto["ordo"][$bo-3], (6*$coefficient), (6*$coefficient), $noir);
	}
			
	include($ROOT_PATH . 'utils/diese.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese2.php');
	include($ROOT_PATH . 'utils/diese3.php');				
	$lEllipse=$hEllipse/1.3;			
	unset($xTotal);
	unset($xArc);
	unset($array);
	unset($aver);
	$croche=0;
	unset($difference);
}
else if($croche==300){

	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2])/3;

	if($aver<$hParto+(2.5*$decalageLignes)){
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		$difference=-7;		
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse-(($notesParto["absc"][$bo]-$notesParto["absc"][$bo-1])/4), $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imagefilledellipse($image, $notesParto["absc"][$bo-1]+$hEllipse+6, $notesParto["ordo"][$bo-1], (6*$coefficient), (6*$coefficient), $noir);
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{
		$difference=7;
		$xTotal=min($array)-$hqueue;			
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse-(($notesParto["absc"][$bo]-$notesParto["absc"][$bo-1])/4), $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imagefilledellipse($image, $notesParto["absc"][$bo-1]+$hEllipse+6, $notesParto["ordo"][$bo-1], (6*$coefficient), (6*$coefficient), $noir);
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
			
	include($ROOT_PATH . 'utils/diese.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese2.php');
	$lEllipse=$hEllipse/1.3;			
	unset($xTotal);
	unset($xArc);
	unset($array);
	unset($aver);
	$croche=0;
	unset($difference);
}
else if($croche==103){

	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2])/3;

	if($aver<$hParto+(2.5*$decalageLignes)){					
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		$difference=-7;
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo-1]+$lEllipse-(($notesParto["absc"][$bo-1]-$notesParto["absc"][$bo-2])/4), $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;		
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imagefilledellipse($image, $notesParto["absc"][$bo-2]+$hEllipse+6, $notesParto["ordo"][$bo-2], (6*$coefficient), (6*$coefficient), $noir);		
	}
	else{
		$difference=7;
		$xTotal=min($array)-$hqueue;			
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo-1]+$lEllipse-(($notesParto["absc"][$bo-1]-$notesParto["absc"][$bo-2])/4), $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imagefilledellipse($image, $notesParto["absc"][$bo-2]+$hEllipse+6, $notesParto["ordo"][$bo-2], (6*$coefficient), (6*$coefficient), $noir);
	}
			
	include($ROOT_PATH . 'utils/diese.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese2.php');			
	$lEllipse=$hEllipse/1.3;			
	unset($xTotal);
	unset($xArc);
	unset($array);
	unset($aver);
	$croche=0;
	unset($difference);
}
else if($croche==110){

	$array[]=$notesParto["ordo"][$bo-4];
	$array[]=$notesParto["ordo"][$bo-3];
	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2]+$notesParto["ordo"][$bo-3]+$notesParto["ordo"][$bo-4])/5;

	if($aver<$hParto+(2.5*$decalageLignes)){
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		$difference=-7;		
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-4]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');			
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $notesParto["absc"][$bo-4]+$lEllipse, $notesParto["ordo"][$bo-4], $notesParto["absc"][$bo-4]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{
		$difference=7;
		$xTotal=min($array)-$hqueue;			
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-4]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');		
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $notesParto["absc"][$bo-4]+$lEllipse, $notesParto["ordo"][$bo-4], $notesParto["absc"][$bo-4]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
			
	include($ROOT_PATH . 'utils/diese.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese2.php');
	include($ROOT_PATH . 'utils/diese3.php');
	include($ROOT_PATH . 'utils/diese4.php');			
	$lEllipse=$hEllipse/1.3;			
	unset($xTotal);
	unset($xArc);
	unset($array);
	unset($aver);
	$croche=0;
	unset($difference);
}
else if($croche==500){

	$array[]=$notesParto["ordo"][$bo-4];
	$array[]=$notesParto["ordo"][$bo-3];
	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2]+$notesParto["ordo"][$bo-3]+$notesParto["ordo"][$bo-4])/5;

	if($aver<$hParto+(2.5*$decalageLignes)){
						
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;
		$difference=-7;				
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-4]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-4]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');		
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $notesParto["absc"][$bo-4]+$lEllipse, $notesParto["ordo"][$bo-4], $notesParto["absc"][$bo-4]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{
		$difference=7;
		$xTotal=min($array)-$hqueue;			
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-4]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $xTotal+$difference, $notesParto["absc"][$bo]+$lEllipse, $xTotal+$difference, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');				
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $notesParto["absc"][$bo-3]+$lEllipse, $notesParto["ordo"][$bo-3], $notesParto["absc"][$bo-3]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		imageBoldLine($image, $notesParto["absc"][$bo-4]+$lEllipse, $notesParto["ordo"][$bo-4], $notesParto["absc"][$bo-4]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
			
	include($ROOT_PATH . 'utils/diese.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese2.php');
	include($ROOT_PATH . 'utils/diese3.php');
	include($ROOT_PATH . 'utils/diese4.php');			
	$lEllipse=$hEllipse/1.3;			
	unset($xTotal);
	unset($xArc);
	unset($array);
	unset($aver);
	$croche=0;
	unset($difference);
}
else{

	$array[]=$notesParto["ordo"][$bo-2];
	$array[]=$notesParto["ordo"][$bo-1];
	$array[]=$notesParto["ordo"][$bo];
	$aver=($notesParto["ordo"][$bo]+$notesParto["ordo"][$bo-1]+$notesParto["ordo"][$bo-2])/3;

	if($aver<$hParto+(2.5*$decalageLignes)){
						
		$xTotal=max($array)+$hqueue;
		$lEllipse=-2;				
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine') ;
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
	else{			
		$xTotal=min($array)-$hqueue;		
		//reliure
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $xTotal, $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//troisième
		imageBoldLine($image, $notesParto["absc"][$bo]+$lEllipse, $notesParto["ordo"][$bo], $notesParto["absc"][$bo]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//deuxième
		imageBoldLine($image, $notesParto["absc"][$bo-1]+$lEllipse, $notesParto["ordo"][$bo-1], $notesParto["absc"][$bo-1]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
		//première
		imageBoldLine($image, $notesParto["absc"][$bo-2]+$lEllipse, $notesParto["ordo"][$bo-2], $notesParto["absc"][$bo-2]+$lEllipse, $xTotal, $noir, $BoldNess=$epaisseur, $func='imageLine');
	}
			
	include($ROOT_PATH . 'utils/diese.php');
	include($ROOT_PATH . 'utils/diese1.php');
	include($ROOT_PATH . 'utils/diese2.php');		
	$lEllipse=$hEllipse/1.3;			
	unset($xTotal);
	unset($xArc);
	unset($array);
	unset($aver);
	$croche=0;
}

?>