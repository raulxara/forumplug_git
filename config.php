<?php
	define('INCLUDE_PATH','http://localhost/forplug/');
	define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','forplug');

	$autoload = function($class){
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);
?>