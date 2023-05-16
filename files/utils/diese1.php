<?php 
$DMoins=6;
$DPlus=15;

if ($bo>=1){

	if($notesParto["diese"][$bo-1]==1){
			imagettftext($image,$taille,8,$notesParto["absc"][$bo-1]-$dieseBefore,$notesParto["ordo"][$bo-1]+$taille/2,$noir,$police,'#');			
	}
		
	if($notesParto["diese"][$bo-1]==2){
		imagettftext($image,$taille,0,$notesParto["absc"][$bo-1]-$dieseBefore,$notesParto["ordo"][$bo-1]+$taille/2,$noir,$police2,'b');
	}

	if($notesParto["diese"][$bo-1]==3){	
		imagettftext($image,$taille,0,$notesParto["absc"][$bo-1]-$dieseBefore,$notesParto["ordo"][$bo-1]+$taille/2,$noir,$police2,'q');
		imagettftext($image,$taille,0,$notesParto["absc"][$bo-1]-$dieseBefore,$notesParto["ordo"][$bo-1]+$taille/2,$noir,$police2,'b');
	}
		
	if($notesParto["ligne"][$bo-1]==1){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]+$hEllipse/2,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]+$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo-1]==2){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1],$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1],$noir);
	}

	if($notesParto["ligne"][$bo-1]==3){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]+$hEllipse,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]+$hEllipse,$noir);
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1],$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1],$noir);
	}

	if($notesParto["ligne"][$bo-1]==4){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]+$hEllipse*3/2,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]+$hEllipse*3/2,$noir);
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]+$hEllipse/2,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]+$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo-1]==5){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]+$hEllipse*2,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]+$hEllipse*2,$noir);
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]+$hEllipse,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]+$hEllipse,$noir);
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1],$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1],$noir);
	}

	if($notesParto["ligne"][$bo-1]==-1){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]+$hEllipse*6,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]+$hEllipse*6,$noir);		
	}

	if($notesParto["ligne"][$bo-1]==-2){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1],$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1],$noir);
	}

	if($notesParto["ligne"][$bo-1]==-3){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1],$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1],$noir);
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]-$hEllipse,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]-$hEllipse,$noir);
	}

	if($notesParto["ligne"][$bo-1]==-4){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]-$hEllipse*3/2,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]-$hEllipse*3/2,$noir);
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]-$hEllipse/2,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]-$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo-1]==-5){
		imageLine($image,$notesParto["absc"][$bo-1]-$DMoins,$notesParto["ordo"][$bo-1]-$hEllipse/2,$notesParto["absc"][$bo-1]+$DPlus,$notesParto["ordo"][$bo-1]-$hEllipse/2,$noir);
	}
}

?>