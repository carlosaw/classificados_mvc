<?php
session_start();

global $pdo;

try {
	$pdo = new PDO("mysql:dbname=awregula_classificados;host=162.241.2.197", "awregula", "H121tRa6lx");
}catch(PDOException $e) {
	echo "FALHOU ".$e->getMessage();
	exit;
}
?>