<?php
$hqueue=38;
$hEllipse=$decalageLignes+1;
$lEllipse=$hEllipse/1.3;
$xNote=$x+($lEllipse/2);
include($ROOT_PATH . 'utils/Notesigne.php');
$epaisseur=2;
$yqueue=$yNote-($epaisseur/2);
$yqueueBas=$yNote-($epaisseur/2);
$xQueueBas=$x-2;
$dieseBefore=16;

$notesParto["absc"][]=$x;
$notesParto["ordo"][]=$yNote;
$notesParto["duree"][]=$duree;
$notesParto["silence"][]=$silence;
$notesParto["ligne"][]=$ligneplus;
$notesParto["diese"][]=$diese;

$diese=0;
$ligneplus=0;
$silence=0;

?>