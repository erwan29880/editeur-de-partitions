<?php 
$DMoins=6;
$DPlus=15;

if ($bo>=4){

	if($notesParto["diese"][$bo-4]==1){
			imagettftext($image,$taille,8,$notesParto["absc"][$bo-4]-$dieseBefore,$notesParto["ordo"][$bo-4]+$taille/2,$noir,$police,'#');			
	}
		
	if($notesParto["diese"][$bo-4]==2){
			imagettftext($image,$taille,0,$notesParto["absc"][$bo-4]-$dieseBefore,$notesParto["ordo"][$bo-4]+$taille/2,$noir,$police2,'b');			
	}

	if($notesParto["diese"][$bo-4]==3){	
			imagettftext($image,$taille,0,$notesParto["absc"][$bo-4]-$dieseBefore,$notesParto["ordo"][$bo-4]+$taille/2,$noir,$police2,'q');
			imagettftext($image,$taille,0,$notesParto["absc"][$bo-4]-$dieseBefore,$notesParto["ordo"][$bo-4]+$taille/2,$noir,$police2,'b');
	}
		
	if($notesParto["ligne"][$bo-4]==1){
			imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]+$hEllipse/2,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]+$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo-4]==2){
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4],$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4],$noir);
	}

	if($notesParto["ligne"][$bo-4]==3){
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]+$hEllipse,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]+$hEllipse,$noir);
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4],$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4],$noir);
	}

	if($notesParto["ligne"][$bo-4]==4){
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]+$hEllipse*3/2,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]+$hEllipse*3/2,$noir);
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]+$hEllipse/2,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]+$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo-4]==5){
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]+$hEllipse*2,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]+$hEllipse*2,$noir);
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]+$hEllipse,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]+$hEllipse,$noir);
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4],$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4],$noir);
	}

	if($notesParto["ligne"][$bo-4]==-1){
			imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]+$hEllipse*6,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]+$hEllipse*6,$noir);		
	}

	if($notesParto["ligne"][$bo-4]==-2){
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4],$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4],$noir);
	}

	if($notesParto["ligne"][$bo-4]==-3){
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4],$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4],$noir);
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]-$hEllipse,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]-$hEllipse,$noir);
	}

	if($notesParto["ligne"][$bo-4]==-4){
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]-$hEllipse*3/2,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]-$hEllipse*3/2,$noir);
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]-$hEllipse/2,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]-$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo-4]==-5){
		imageLine($image,$notesParto["absc"][$bo-4]-$DMoins,$notesParto["ordo"][$bo-4]-$hEllipse/2,$notesParto["absc"][$bo-4]+$DPlus,$notesParto["ordo"][$bo-4]-$hEllipse/2,$noir);
	}
}

?>