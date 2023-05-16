<?php
function rotatedellipse($im, $cx, $cy, $width, $height, $rotateangle, $colour, $filled=false) {
 
  $width=$width/2;
  $height=$height/2;

  // This affects how coarse the ellipse is drawn.
  $step=3;

  $cosangle=cos(deg2rad($rotateangle));
  $sinangle=sin(deg2rad($rotateangle));

  // $px and $py are initialised to values corresponding to $angle=0.
  $px=$width * $cosangle;
  $py=$width * $sinangle;
  
  for ($angle=$step; $angle<=(180+$step); $angle+=$step) {
    
    $ox = $width * cos(deg2rad($angle));
    $oy = $height * sin(deg2rad($angle));
    
    $x = ($ox * $cosangle) - ($oy * $sinangle);
    $y = ($ox * $sinangle) + ($oy * $cosangle);

    if ($filled) {
      triangle($im, $cx, $cy, $cx+$px, $cy+$py, $cx+$x, $cy+$y, $colour);
      triangle($im, $cx, $cy, $cx-$px, $cy-$py, $cx-$x, $cy-$y, $colour);
    } else {
      imageline($im, $cx+$px, $cy+$py, $cx+$x, $cy+$y, $colour);
      imageline($im, $cx-$px, $cy-$py, $cx-$x, $cy-$y, $colour);
    }
    $px=$x;
    $py=$y;
  }
}

function triangle($im, $x1,$y1, $x2,$y2, $x3,$y3, $colour) {
   $coords = array($x1,$y1, $x2,$y2, $x3,$y3);
   imagefilledpolygon($im, $coords, 3, $colour);
}

function imageBoldLine($resource, $x1, $y1, $x2, $y2, $Color, $BoldNess=2, $func='imageLine'){ 
	$center = round($BoldNess/2); 
	
	for($i=0;$i<$BoldNess;$i++){  
  		$a = $center-$i; if($a<0){$a -= $a;} 
  		
		for($j=0;$j<$BoldNess;$j++){ 
			$b = $center-$j; if($b<0){$b -= $b;} 
			$c = sqrt($a*$a + $b*$b); 
   		
			if($c<=$BoldNess){ 
    			$func($resource, $x1 +$i, $y1+$j, $x2 +$i, $y2+$j, $Color); 
   			} 
  		} 
	}         
} 

//-------fonctions graphisme note----------------------------------------------------------------------

function crocheBas($im,$couleur,$XC,$YC){
	$YC=$YC+38;
	$values = array($XC,  $YC,  
		$XC+6,  $YC-12, 
		$XC+10,  $YC-21,
		$XC+8,  $YC-27,
		$XC+9,  $YC-21,  
		$XC+5,  $YC-12,  
		$XC,  $YC-11,  
	);
	imagefilledpolygon($im, $values, 7, $couleur);
}


function crocheHaut($im,$couleur,$XC,$YC){
	$XC=(13/1.3)+$XC;
	$YC=$YC-38;
	$values = array($XC,  $YC,  
		$XC+6,  $YC+12, 
		$XC+10,  $YC+21,
		$XC+8,  $YC+27,
		$XC+9,  $YC+21,  
		$XC+5,  $YC+12,  
		$XC,  $YC+11,  
	);
	imagefilledpolygon($im, $values, 7, $couleur);
}


function doubleCrocheBas($im,$couleur,$XC,$YC){
	$YC=$YC+38;
	$values = array(
		$XC,  $YC,  
		$XC+2,  $YC+2, 
		$XC+4,  $YC+6,
		$XC+5,  $YC+10,
		$XC+6,  $YC+13,
		$XC+7,  $YC+16,
		$XC+2,  $YC+4,
		$XC,  $YC+2,  
	);
	imagefilledpolygon($im, $values, 8, $couleur);

	$YC=$YC+10;
	$values2 = array(
		$XC,  $YC,  
		$XC+2,  $YC+2, 
		$XC+4,  $YC+6,
		$XC+5,  $YC+10,
		$XC+6,  $YC+13,
		$XC+7,  $YC+16,
		$XC+2,  $YC+4,
		$XC,  $YC+2,  
	);
	imagefilledpolygon($im, $values2, 8, $couleur);
}

?>