<?php
?>

<html>
    <head>
        <title>Feedback</title>
    </head>
    <body>
<script>
const sock = new WebSocket("ws://trunk-ws-watcher.herokuapp.com:8080");

setInterval(() => {
sock.send("<?=$_GET['tero_id']?>")
}, 1000);

sock.addEventListener("open", e => {
    console.log("接続が開かれたときに呼び出されるイベント");
});

sock.addEventListener("message", e => {
    console.log("サーバーからメッセージを受信したときに呼び出されるイベント");
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
