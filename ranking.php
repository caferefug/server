<?php

require "lib.php";

$result = getdb()->query("SELECT * FROM Ranking ORDER BY score DESC")->fetchAll(/*PDO::FETCH_GROUP|PDO::FETCH_COLUMN*/);

$pay = "";
foreach ($result as $data) $pay .= $data["user_id"] . ',';

$names = json_decode(file_get_contents("https://trunk-beacon.herokuapp.com/profiles?user_ids=".$pay), true);

$i = 0;
foreach ($result as &$data) {
    //$name_json = file_get_contents("https://green.adam.ne.jp/roomazi/cgi-bin/randomname.cgi");
    //$name_json = str_replace('callback(', '', $name_json);
    //$name_json = str_replace(')', '', $name_json);
    //$data['user_name'] = json_decode($name_json, true)['name'][0][1];
    $data["user_name"] = $names[$i];
    $i++;
}
unset($data);


header("X-Content-Type-Options: nosniff");
header('Access-Control-Allow-Origin:*');
header("Content-Type: application/json; charset=UTF-8");
echo json_encode($result);


/* 前のやつ。参考までに
require "lib.php";

$result = getdb()->query("SELECT * FROM Ranking ORDER BY score DESC")->fetchAll();

foreach ($result as &$data) {
    $name_json = file_get_contents("https://green.adam.ne.jp/roomazi/cgi-bin/randomname.cgi");
    $name_json = str_replace('callback(', '', $name_json);
    $name_json = str_replace(')', '', $name_json);
    error_log($name_json);
    $data['user_name'] = json_decode($name_json, true)['name'][1];
    //$data["user_name"] = file_get_contents("https://f25c46ee.ngrok.io/profile/" . $data["user_id"] );
}
unset($data);

echo json_encode($result);
/*

