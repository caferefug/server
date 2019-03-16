<?php

include "lib.php";

if (!isset($_GET['type']) || !isset($_GET['tero_id']) || !isset($_GET['user_id']) || !isset($_GET['type'])) {
    exit;
}

if ($_GET['type'] == '0') {
    $db = getdb();
    $newuser = $db->query("SELECT * FROM WHERE user_id='".$_GET['user_id']."'")->fetchAll();
    echo count($newuser);
    $db->query("UPDATE Ranking SET CASE WHEN score <= 0 THEN 0 ELSE score-1 END WHERE user_id='".$_GET['user_id']."'");
} else if ($_GET['type'] == '1') {
    getdb()->query("UPDATE Ranking SET score=score+2 WHERE user_id='".$_GET['user_id']."'");
}

if (insert_feedback($_GET['tero_id'], $_GET['user_id'], $_GET['type'])) {
	echo "OK";
}else{
	echo "False";
}
