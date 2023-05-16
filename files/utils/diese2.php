<?php 
$DMoins=6;
$DPlus=15;
if ($bo>=2){

	if($notesParto["diese"][$bo-2]==1){
			imagettftext($image,$taille,8,$notesParto["absc"][$bo-2]-$dieseBefore,$notesParto["ordo"][$bo-2]+$taille/2,$noir,$police,'#');	
	}
		
	if($notesParto["diese"][$bo-2]==2){
			imagettftext($image,$taille,0,$notesParto["absc"][$bo-2]-$dieseBefore,$notesParto["ordo"][$bo-2]+$taille/2,$noir,$police2,'b');
	}

	if($notesParto["diese"][$bo-2]==3){	
			imagettftext($image,$taille,0,$notesParto["absc"][$bo-2]-$dieseBefore,$notesParto["ordo"][$bo-2]+$taille/2,$noir,$police2,'q');
			imagettftext($image,$taille,0,$notesParto["absc"][$bo-2]-$dieseBefore,$notesParto["ordo"][$bo-2]+$taille/2,$noir,$police2,'b');
	}
		
	if($notesParto["ligne"][$bo-2]==1){
			imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]+$hEllipse/2,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]+$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo-2]==2){
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2],$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2],$noir);
	}

	if($notesParto["ligne"][$bo-2]==3){
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]+$hEllipse,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]+$hEllipse,$noir);
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2],$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2],$noir);
	}

	if($notesParto["ligne"][$bo-2]==4){
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]+$hEllipse*3/2,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]+$hEllipse*3/2,$noir);
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]+$hEllipse/2,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]+$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo-2]==5){
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]+$hEllipse*2,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]+$hEllipse*2,$noir);
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]+$hEllipse,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]+$hEllipse,$noir);
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2],$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2],$noir);
	}

	if($notesParto["ligne"][$bo-2]==-1){
			imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]+$hEllipse*6,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]+$hEllipse*6,$noir);		
	}

	if($notesParto["ligne"][$bo-2]==-2){
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2],$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2],$noir);
	}

	if($notesParto["ligne"][$bo-2]==-3){
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2],$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2],$noir);
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]-$hEllipse,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]-$hEllipse,$noir);
	}

	if($notesParto["ligne"][$bo-2]==-4){
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]-$hEllipse*3/2,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]-$hEllipse*3/2,$noir);
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]-$hEllipse/2,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]-$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo-2]==-5){
		imageLine($image,$notesParto["absc"][$bo-2]-$DMoins,$notesParto["ordo"][$bo-2]-$hEllipse/2,$notesParto["absc"][$bo-2]+$DPlus,$notesParto["ordo"][$bo-2]-$hEllipse/2,$noir);
	}
}

?>