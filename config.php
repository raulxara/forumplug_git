<?php
	define('INCLUDE_PATH','http://localhost/forplug/');
	define('HOST','');
	define('USER','');
	define('PASS','');
	define('DB','');

	$autoload = function($class){
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);
?>