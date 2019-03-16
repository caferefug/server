<?php
require "define.php";
/**
 * Router
 *
 * @author    Yukky
 * @copyright 2018~ @Xere_Yukky
 * @license   MIT-LiCENSE
 * $text = "I love milkchocolate";
 * 分解して最終的に配列に格納する。
 */ 


function route($text){
	$appname = strlen(APPNAME)+1;
	$founder = "/";
	$str = rawurldecode(substr($text, $appname));
	$count = mb_substr_count($str, $founder); // /の出現回数
	$routes = explode($founder, $str); // 文字列分割して配列で格納 & URL Decode

	return array ($routes,$count);
}

function dead($code){
	http_response_code($code);
	echo '
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pandora ERROR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://pandora.xere.jp/signin.css" rel="stylesheet">
    <style>

        * {
            line-height: 1.2;
            margin: 0;
        }

        html {
            color: #888;
            display: table;
            font-family: sans-serif;
            height: 100%;
            text-align: center;
            width: 100%;
        }

        body {
            display: table-cell;
            vertical-align: middle;
            margin: 2em auto;
        }

        h1 {
            color: #555;
            font-size: 2em;
            font-weight: 400;
        }

        p {
            margin: 0 auto;
            width: 280px;
        }

        @media only screen and (max-width: 280px) {

            body, p {
                width: 95%;
            }

            h1 {
                font-size: 1.5em;
                margin: 0 0 0.3em;
            }

        }

    </style>
</head>
<body>
    <h1>ERROR - '.$code.'</h1>
    <p>'.constant($code).'</p>
</body>
</html>';
	die();
}

function dead_json($code){
	header('content-type: application/json; charset=utf-8');
	http_response_code($code);
	$arr = array('code' => $code, 'description' => constant($code));
	echo json_encode($arr);
	die();
}