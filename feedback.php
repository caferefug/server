<?php
?>

<html>
    <head>
        <title>Feedback</title>
    </head>
    <body>
    <h1><span id="targets">0</span>人がターゲットになっています</h1>
    <img src="target.png">
    <h1><span id="feedbackers">0</span>人がフィードバックしてくれています！</h1>
    <img src="soft-app.png">
<script>
const sock = new WebSocket("ws://trunk-ws.herokuapp.com");

sock.addEventListener("open", e => {
    sock.send("tero_id <?=$_GET['tero_id']?>");
    console.log("接続が開かれたときに呼び出されるイベント");
});

sock.addEventListener("message", e => {
    const data = e.data.split(' ')[1];
    switch (e.data.split(' ')[0]) {
        case "feedback":
            console.log(data + "feedbacks");
            document.getElementById("feedbackers").innerText = data; 
        break;
        case "target":
            console.log(data + "targets");
            document.getElementById("targets").innerText = data; 
        break;
    }

    // console.log("サーバーからメッセージを受信したときに呼び出されるイベント");
});

sock.addEventListener("close", e => {
    console.log("接続が閉じられたときに呼び出されるイベント");
});

sock.addEventListener("error", e => {
    console.log("エラーが発生したときに呼び出されるイベント");
});

</script>
    </body>
    <style>
        body{
            text-align:center;
        }
        h1{
            background-color:green;
            color:white;
        }
        img{
            height:150px;
            width:auto;
        }
    </style>
</html>
