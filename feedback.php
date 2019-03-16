<?php
?>

<html>
    <head>
        <title>Feedback</title>
    </head>
    <body>
    <span id="feedbackers">0</span>人がフィードバックしてくれています！
<script>
const sock = new WebSocket("ws://trunk-ws.herokuapp.com");

sock.addEventListener("open", e => {
    sock.send("tero_id <?=$_GET['tero_id']?>");
    console.log("接続が開かれたときに呼び出されるイベント");
});

sock.addEventListener("message", e => {
    console.log(e.data);
    document.getElementById("feedbackers").innerText = e.data;

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
</html>
