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
'/_a/',  //10
'/G,/',
'/A,/',
'/B,/',
'/c\'/',
'/d\'/',
'/e\'/',
'/\^C/',
'/\^D/',
'/=F/',
'/\^G/',   //20
'/\^A/',
'/\^c/',
'/\^d/',
'/=f/',
'/\^g/',
'/\^a/',
'/C/',
'/D/',
'/E/',
'/F/',   //30
'/G/',
'/A/',
'/B/',
'/c/',
'/d/',
'/e/',
'/f/',
'/g/',
'/a/',  //39
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
'g^',  //10
'3p',    
'3t',
'4p',
'9\'p',
'11p',
'10\'p',
'1"t',
'1"p',  //18
'4\'t',
'2"p',   
'2"t',
'3"t',
'3"p',
'8\'t',
'4"p',
'4"t',
'4t',
'5p',
'5t',
'6t',   //30
'6p',
'7t',
'7p',
'8t',
'8p',
'9t',
'10t',
'9p',
'11t',  //39
'10p'
);

$signe=preg_replace($notes, $chiffres, $signe);

?>