<?php 
$DMoins=6;
$DPlus=15;

if ($bo>=0){

	if($notesParto["diese"][$bo]==1){
		imagettftext($image,$taille,8,$notesParto["absc"][$bo]-$dieseBefore,$notesParto["ordo"][$bo]+$taille/2,$noir,$police,'#');			
	}
		
	if($notesParto["diese"][$bo]==2){
		imagettftext($image,$taille,0,$notesParto["absc"][$bo]-$dieseBefore,$notesParto["ordo"][$bo]+$taille/2,$noir,$police2,'b');			
	}

	if($notesParto["diese"][$bo]==3){	
		imagettftext($image,$taille,0,$notesParto["absc"][$bo]-$dieseBefore,$notesParto["ordo"][$bo]+$taille/2,$noir,$police2,'q');
		imagettftext($image,$taille,0,$notesParto["absc"][$bo]-$dieseBefore,$notesParto["ordo"][$bo]+$taille/2,$noir,$police2,'b');
	}
		
	if($notesParto["ligne"][$bo]==1){
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]+$hEllipse/2,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]+$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo]==2){
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo],$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo],$noir);
	}

	if($notesParto["ligne"][$bo]==3){
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]+$hEllipse,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]+$hEllipse,$noir);
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo],$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo],$noir);
	}

	if($notesParto["ligne"][$bo]==4){
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]+$hEllipse*3/2,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]+$hEllipse*3/2,$noir);
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]+$hEllipse/2,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]+$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo]==5)  {
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]+$hEllipse*2,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]+$hEllipse*2,$noir);
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]+$hEllipse,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]+$hEllipse,$noir);
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo],$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo],$noir);
	}

	if($notesParto["ligne"][$bo]==-1){
			imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]+$hEllipse*6,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]+$hEllipse*6,$noir);
			
	}

	if($notesParto["ligne"][$bo]==-2){  //fonctionne aussi pour les lignes moins
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo],$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo],$noir);
	}

	if($notesParto["ligne"][$bo]==-3){  //fonctionne aussi pour les lignes moins
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo],$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo],$noir);
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]-$hEllipse,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]-$hEllipse,$noir);
	}

	if($notesParto["ligne"][$bo]==-4){  //fonctionne aussi pour les lignes moins
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]-$hEllipse*3/2,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]-$hEllipse*3/2,$noir);
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]-$hEllipse/2,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]-$hEllipse/2,$noir);
	}

	if($notesParto["ligne"][$bo]==-5){  //fonctionne aussi pour les lignes moins
		imageLine($image,$notesParto["absc"][$bo]-$DMoins,$notesParto["ordo"][$bo]-$hEllipse/2,$notesParto["absc"][$bo]+$DPlus,$notesParto["ordo"][$bo]-$hEllipse/2,$noir);
	}
}


?>