<?php
include "lib.php";

if (isset($_GET['count'])) {
	$json = tero_counts();
	header("Access-Control-Allow-Headers: Origin, X-Requested-With");
	header('Content-type: application/json');
	json_encode($json);
}else{

$item = history($_GET['tero_id'],$_GET['page']);
header("Access-Control-Allow-Headers: Origin, X-Requested-With");
header('Content-type: application/json');
echo $item;
}