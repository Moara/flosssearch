<?php

define('HOST', 'localhost');  
define('DBNAME', 'repo');  
define('CHARSET', 'utf8');  
define('USER', 'root');  
define('PASSWORD', '');

try {
	$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => FALSE);
    $db = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; ", USER, PASSWORD, $opcoes);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


