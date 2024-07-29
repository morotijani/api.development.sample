<?php 

	require ("../classes/config.php"); // "reguire" produces and error if do not find the file and it dosent continue

	spl_autoload_register(function($classname){
		// you give it a callback function, you tell it what function to be run when a class is not found
		require ('../classes/' . strtolower($classname) . '.php');
	});

 	$app = new APP;
 	if (isset($_GET['url'])) {
 		// code...
		header("Access-Control-Allow-Origin: *");
		header("Content-type: application/json; charset=UTF-8");
	 	$result = $app->result;
	 	echo $result;
 	}
