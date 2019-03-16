<?php

include "lib.php";


if (insert_feedback($_GET['tero_id'], $_GET['user_id'], $_GET['type'])) {
	echo "OK";
}else{
	echo "False";
}
