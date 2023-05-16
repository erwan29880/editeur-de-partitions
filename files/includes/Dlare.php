<?php
$notes= array(				//je remplace les notes au format abc pour pouvoir les mettre en forme en html + css
'/_B/',
'/_D/',
'/_E/',
'/_G/',
'/_A/',  
'/_b/',
'/_d/',
'/_e/',
'/_g/',
'/_a/',			//10
'/A,/',
'/B,/',
'/=c\'/',
'/d\'/', 	//14
'/\^G/',
'/=c/',
'/\^g/',
'/C/',
'/D/',
'/E/',
'/F/',
'/G/',
'/A/',
'/B/',
'/c/',
'/d/',
'/e/',
'/f/',
'/g/',
'/a/',
'/b/'
);

$chiffres= array(
'^A',
'^C',
'^D',
'^F',
'^G',
'^a',
'^c',
'^d',
'f^',
'g^',   //10
'2\'p',
'3t',
'4"t',
'9\'p',   //14
'6t',
'2"t',
'10t',
'2\'t',
'3\'p',
'3\'t',
'4\'p',
'4\'t',
'5\'p',
'5\'t',
'6\'t',
'6\'p',
'7\'t',
'7\'p',
'8\'t',
'8\'p',
'9\'t'
);

$signe=preg_replace($notes, $chiffres, $signe);

?>