<?php  

if(isset($metrique) && isset($danse)){
	
	if($metrique=='3_4' && preg_match('#hante.*dro#i',$danse)){
		$metrique=$metrique.'hanterdro';
	}
	
	if($metrique=='3_8' && preg_match('#bour.*temps#i',$danse)){
		$metrique=$metrique.'bourree';
	}
}

if(isset($metrique) && $metrique=='3_8' && preg_match('#bourr[ée]{1}.*#i',$_POST['tab'])){
	$metrique=$metrique.'bourree';
}

if(isset($metrique) && $metrique=='3_8' && preg_match('#valse#i',$_POST['tab'])){
	$metrique=$metrique.'bourree';
}

?>