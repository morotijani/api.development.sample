<?php

	
	define('DBHOST', 'localhost'); // "define" to create constance, and constance are accessible anywhere in the website...so we dont need to worry about scope
	define('DBDRIVER', 'mysql');
	define('DBNAME', 'api.sample');
	define('DBUSER', 'root');
	define('DBPASSWORD', '');


	define("PROOT", "/");
	define("BASEURL", "/api.development.sample/website/");


	function dnd($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	    die;
	}