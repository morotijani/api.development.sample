<?php

	header("Access-Control-Allow-Origin: *");
	header("HTTP/2 404 Not Found*");
	header("HTTP/2 403 Forbidden*");

	$a[] = "item 1";
	$a[] = "item 2";
	$a[] = "item 3";
	$a[] = "item 4";
	$a[] = "item 5";

	echo json_encode($a);