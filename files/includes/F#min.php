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
'/_a/',
'/=G,/',
'/A,/',
'/B,/',
'/=c\'/',
'/d\'/',
'/e\'/',
'/=C/',
'/\^D/',
'/=F/',
'/=G/',
'/\^A/',
'/=c/',
'/\^d/',
'/=f/',
'/=g/',
'/\^a/',
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
'g^',
'3p',
'3t',
'2\'t',
'9\'p',
'11p',
'10\'p',
'4t',
'1"p',
'4\'t',
'6p',
'2"t',
'8t',
'3"p',
'8\'t',
'9p',
'4"t',
'1"t',
'3\'t',
'5t',
'6t',
'2"p',
'7t',
'6\'t',
'3"t',
'7\'t',
'9t',
'10t',
'4"p',
'9\'t',
'10p'
);

$signe=preg_replace($notes, $chiffres, $signe);


?>