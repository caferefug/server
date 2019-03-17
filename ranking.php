<?php

require "lib.php";

$result = getdb()->query("SELECT * FROM Ranking ORDER BY score DESC")->fetchAll(/*PDO::FETCH_GROUP|PDO::FETCH_COLUMN*/);

foreach ($result as &$data) {
    $name_json = file_get_contents("https://green.adam.ne.jp/roomazi/cgi-bin/randomname.cgi");
    $name_json = str_replace('callback(', '', $name_json);
    $name_json = str_replace(')', '', $name_json);
    $data['user_name'] = json_decode($name_json, true)['name'][1];
    //$data["user_name"] = file_get_contents("https://f25c46ee.ngrok.io/profile/" . $data["user_id"] );
}
unset($data);

echo json_encode($result);
