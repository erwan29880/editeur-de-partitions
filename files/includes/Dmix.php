<?php

$notes= array(				//je remplace les notes au format abc pour pouvoir les mettre en forme en html + css
'/\^F/',
'/\^f/',
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
'/G,/',
'/A,/',
'/B,/',
'/c\'/',
'/d\'/',
'/e\'/',
'/\^C/',
'/\^E/',
'/=F/',
'/\^G/',
'/\^A/',
'/\^c/',
'/\^e/',
'/=f/',
'/\^g/',
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
'F',
'f',
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
'4p',
'9\'p',
'11p',
'10\'p',
'1"t',
'1"p',
'4\'t',
'2"p',
'2"t',
'3"t',
'3"p',
'8\'t',
'4"p',
'4"t',
'3\'p',
'3\'t',
'5t',
'6t',
'6p',
'7t',
'7p',
'6\'p',
'7\'t',
'9t',
'10t',
'9p',
'9\'t',
'10p'
);

$signe=preg_replace($notes, $chiffres, $signe);

?>