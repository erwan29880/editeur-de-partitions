<?php  

$totalT=strlen($tonaliteAfficheFin);

if($tonaliteAfficheFin[0]=='A') $tonique='La';
else if($tonaliteAfficheFin[0]=='B') $tonique='Si';
else if($tonaliteAfficheFin[0]=='C') $tonique='Do';
else if($tonaliteAfficheFin[0]=='D') $tonique='Ré';
else if($tonaliteAfficheFin[0]=='E') $tonique='Mi';
else if($tonaliteAfficheFin[0]=='F') $tonique='Fa';
else if($tonaliteAfficheFin[0]=='G') $tonique='Sol';
else $tonique='?';

if($totalT==1) $mode='majeur';
else if($totalT==2){
	if($tonaliteAfficheFin[1]=='#') $tonique=$tonique.' dièse';
	else if($tonaliteAfficheFin[1]=='b') $tonique=$tonique.' bémol';
	else if($tonaliteAfficheFin[1]=='m') $mode='mineur';
	else if($tonaliteAfficheFin[1]=='M') $mode='majeur';	
	else $nothing=0;
}
else if($totalT>2){
	if(preg_match('#min#i',$tonaliteAfficheFin))  $mode='mineur';
	else if(preg_match('#maj#i',$tonaliteAfficheFin))  $mode='majeur';
	else if(preg_match('#mix#i',$tonaliteAfficheFin))  $mode='mixolydien';
	else if(preg_match('#lyd#i',$tonaliteAfficheFin))  $mode='lydien';
	else if(preg_match('#dor#',$tonaliteAfficheFin))  $mode='dorien';
	else $mode='?';

}

if(!isset($mode)) $mode='?';

?>