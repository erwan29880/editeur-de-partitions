<?php
$notesaRemplacer= array(      //je remplace les valeurs de rythme
'/8/',
'/6/',
'/4/',
'/3\/2/',
'/3/',
'/2/',
'/1/',
'/\//'
);
$notesremplacees=array(
'7',
'6',
'5',
'2',
'4',
'3',
'1',
''
);
$chaineTravail=preg_replace($notesaRemplacer,$notesremplacees,$chaineTravail);
#echo $chaineTravail.'<br />';




$notesaRemplacer= array(      //je remplace les barres de mesures et les rythmes
'/7/',
'/6/',
'/5/',
'/4/',
'/3/',
'/2/',
'/1/'
);
$notesremplacees=array(
'@@@@@@@',
'@@@@@@',
'@@@@@',
'@@@@',
'@@@',
'@@',
'@'
);

$chaineTravail=preg_replace($notesaRemplacer,$notesremplacees,$chaineTravail);



?>