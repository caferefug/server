<?php
include "lib.php";

if (isset($_GET['count'])) {
	$json = tero_counts();
	header("X-Content-Type-Options: nosniff");
	header('Access-Control-Allow-Origin:*');
	header("Content-Type: application/json; charset=UTF-8");
	json_encode($json);
}elseif (isset($_GET['tero'])) {
	echo "OK";
	$json = view_action($_GET['tero']);
	header("X-Content-Type-Options: nosniff");
	header('Access-Control-Allow-Origin:*');
	header("Content-Type: application/json; charset=UTF-8");
	echo $json;
}else{
$item = history($_GET['tero_id'],$_GET['page']);
header("X-Content-Type-Options: nosniff");
header('Access-Control-Allow-Origin:*');
header("Content-Type: application/json; charset=UTF-8");
echo $item;
}