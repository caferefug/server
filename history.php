<?php
include "lib.php";

$item = history($_GET['tero_id'],$_GET['page']);
header('Content-type: application/json');
echo $item;
