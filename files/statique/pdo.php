<?php

getenv('MYSQL_DBHOST') ? $db_host=getenv('MYSQL_DBHOST') : $db_host="datasite1";
getenv('MYSQL_DBPORT') ? $db_port=getenv('MYSQL_DBPORT') : $db_port="9906";
getenv('MYSQL_DBUSER') ? $db_user=getenv('MYSQL_DBUSER') : $db_user="root";
getenv('MYSQL_DBPASS') ? $db_pass=getenv('MYSQL_DBPASS') : $db_pass="pa";
getenv('MYSQL_DBNAME') ? $db_name=getenv('MYSQL_DBNAME') : $db_name="accordeon";

try{
    $bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';port='.$db_port.';charset=utf8', $db_user, $db_pass);
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

?>
