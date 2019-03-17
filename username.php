<?php

include "lib.php";

if (isset($_GET['id'])) {
	$json = what_username($_GET['id']);
	header("X-Content-Type-Options: nosniff");
	header('Access-Control-Allow-Origin:*');
	header("Content-Type: application/json; charset=UTF-8");
	echo $json;	
}else{
	return false;
}

?>