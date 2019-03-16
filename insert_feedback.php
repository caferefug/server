<?php

include "lib.php";


if (insert_feedback($_GET['tero_id'], $_GET['user_id'], $_GET['type'])) {
	json_encode(array('code' => 200 ));
}else{
	json_encode(array('code' => 504));
}
