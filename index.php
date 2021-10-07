<?php
session_start();
require 'config.php';
//echo "URL: ".$_GET['url'];
spl_autoload_register(function($class){
	

	if(file_exists('controllers/'.$class.'.php')) {
		//echo "Entrou no IF de controllers"; exit;
		require 'controllers/'.$class.'.php';
	} 
	else if(file_exists('models/'.$class.'.php')) {
		//echo "Entrou no IF de models"; exit;
		require 'models/'.$class.'.php';
	} 
	else if(file_exists('core/'.$class.'.php')) {
		
		require 'core/'.$class.'.php';
	}	

});
$core = new Core();
$core->run();