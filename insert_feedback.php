<?php

include "lib.php";


if ($_GET['type'] == '0') {
    getdb()->prepare("UPDATE Ranking SET CASE WHEN score <= 0 THEN 0 ELSE score-1 END WHERE user_id='".$_GET['user_id']."'")->execute()->fetchColumn();
} else if ($_GET['type'] == '1') {
    getdb()->prepare("UPDATE Ranking SET score=score+2 WHERE user_id='".$_GET['user_id']."'")->execute()->fetchColumn();
}

if (insert_feedback($_GET['tero_id'], $_GET['user_id'], $_GET['type'])) {
	json_encode(array('code' => 200 ));
}else{
	json_encode(array('code' => 504));
}
