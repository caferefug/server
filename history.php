<?php
include "lib.php";

if (isset($_GET['count'])) {
	$json = tero_counts();
	header("X-Content-Type-Options: nosniff");
	header('Access-Control-Allow-Origin:*');
	header("Content-Type: application/json; charset=UTF-8");
	json_encode($json);
}else{
	if (isset($_GET['tero_id']) && isset($_GET['page'])) {
		$item = history($_GET['tero_id'],$_GET['page']);
		header("X-Content-Type-Options: nosniff");
		header('Access-Control-Allow-Origin:*');
		header("Content-Type: application/json; charset=UTF-8");
		echo $item;
	}else{
	header("X-Content-Type-Options: nosniff");
	header('Access-Control-Allow-Origin:*');
	header("Content-Type: application/json; charset=UTF-8");
	json_encode(array('code' => 504));
	}
}