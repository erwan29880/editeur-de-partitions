<?php


if($signeNote=='3p' || $signeNote=='2\'p' ){
$yNote=$hParto+(6.5*$decalageLignes);
$ligneplus=-4;
}
else if($signeNote=='3t'){
$yNote=$hParto+(6*$decalageLignes);
$ligneplus=-3;
}
else if($signeNote=='4p' || $signeNote=='2\'t'){
$yNote=$hParto+(5.5*$decalageLignes);
$ligneplus=-5;
}
else if($signeNote=='4t' || $signeNote=='3\'p'){
$yNote=$hParto+(5*$decalageLignes);
$ligneplus=-2;
}
else if($signeNote=='5p' || $signeNote=='3\'t') $yNote=$hParto+(4.5*$decalageLignes);
else if($signeNote=='5t' || $signeNote=='4\'p') $yNote=$hParto+(4*$decalageLignes);
else if($signeNote=='4\'t') $yNote=$hParto+(3.5*$decalageLignes);
else if($signeNote=='6t') $yNote=$hParto+(3.5*$decalageLignes);
else if($signeNote=='6p' || $signeNote=='5\'p')	$yNote=$hParto+(3*$decalageLignes);
else if($signeNote=='7t' || $signeNote=='5\'t')	$yNote=$hParto+(2.5*$decalageLignes);
else if($signeNote=='7p' || $signeNote=='6\'t')
{
$yNote=$hParto+(2*$decalageLignes);
if($tonalite=='Gmin' || $tonalite=='Bbmaj' || $tonalite=='Dmin') $diese=3;
else $diese=0;

}
else if($signeNote=='8t' || $signeNote=='6\'p')	$yNote=$hParto+(1.5*$decalageLignes);
else if($signeNote=='8p' || $signeNote=='7\'t') $yNote=$hParto+(1*$decalageLignes);
else if($signeNote=='9t' || $signeNote=='7\'p') $yNote=$hParto+(0.5*$decalageLignes);
else if($signeNote=='8\'t')
{
$yNote=$hParto+(0*$decalageLignes);
if($tonalite=='Gmaj') $diese=3;
else $diese=0;
}
else if($signeNote=='10t')	$yNote=$hParto+(0*$decalageLignes);
else if($signeNote=='9p' || $signeNote=='8\'p')   $yNote=$hParto-(0.5*$decalageLignes);
else if($signeNote=='11t' || $signeNote=='9\'t')
{
$yNote=$hParto-(1*$decalageLignes);
$ligneplus=2;
}
else if($signeNote=='10p' || $signeNote=='10\'t') 
{
$yNote=$hParto-(1.5*$decalageLignes);
$ligneplus=1;
}
else if($signeNote=='9\'p') 
{
$yNote=$hParto-(2*$decalageLignes);
$ligneplus=3;
}
else if($signeNote=='11p') 
{
$yNote=$hParto-(2.5*$decalageLignes);
$ligneplus=4;
}
else if($signeNote=='10\'p') 
{
$yNote=$hParto-(3*$decalageLignes);
$ligneplus=5;
}
else if($signeNote=='1"p') 
{
$yNote=$hParto+(4.5*$decalageLignes);
if($tonalite!='Gmin' || $tonalite!='Bbmaj') $diese=2;
} 
else if($signeNote=='1"t')
{
$yNote=$hParto+(5*$decalageLignes);
$ligneplus=2;
if($tonalite=='Amaj' || $tonalite=='Dmaj') $diese=0;
else $diese=1;
} 
else if($signeNote=='2"p')
{
$yNote=$hParto+(3*$decalageLignes);
if($tonalite=='Amaj') $diese=0;
else $diese=1;
} 
else if($signeNote=='2"t')
{
$yNote=$hParto+(2*$decalageLignes);
if($tonalite=='Gmin' || $tonalite=='Bbmaj' || $tonalite=='Dmin' || $tonalite=='Fmaj') $diese=0;
else $diese=2;
} 
else if($signeNote=='3"p')
{
$yNote=$hParto+(1*$decalageLignes);
if($tonalite!='Amaj' || $tonalite!='Dmaj') $diese=2;
if($tonalite=='Gmin' || $tonalite=='Bbmaj') $diese=0;
} 
else if($signeNote=='3"t')
{
$yNote=$hParto+(1.5*$decalageLignes);
if($tonalite=='Amaj' || $tonalite=='Dmaj' || $tonalite=='Edor') $diese=0;
else $diese=1;
} 
else if($signeNote=='4"p')
{
$yNote=$hParto-(0.5*$decalageLignes);
$diese=1;
}
else if($signeNote=='4"t')
{
$yNote=$hParto-(1.5*$decalageLignes);
if($tonalite!='Gmin' || $tonalite!='Bbmaj' || $tonalite!='Dmin') $diese=2;
$ligneplus=1;
}
else if($signeNote=='z')
{
$silence=1;
$yNote=$hParto+$decalageLignes;
}
else  $yNote=$hParto+(5*$decalageLignes);




?>