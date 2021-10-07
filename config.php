<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/classificados_mvc/");
	$config['dbname'] = 'classificados';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://www.awregulagens.com.br/");
	$config['dbname'] = 'xxxxxxx_classificados';
	$config['host'] = '1xxx.xxx.x.xxx';
	$config['dbuser'] = 'xxxxxxxx';
	$config['dbpass'] = 'xxxxxxxxxx';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

