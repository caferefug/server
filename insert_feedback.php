<?php

include "lib.php";

if (insert_feedback($_GET['tero_id'], $_GET['user_id'], $_GET['type'])) {
	return true;
}else{
	return true;
}