<?php

require "lib.php";

$count = tero_counts();
$rand = mt_rand(0,$count);
$result = getdb()->query("SELECT img_name FROM Teros WHERE id=$rand")->fetchColumn();

?>
<html>
    <head>
        <title>Today's rice terrorism</title>
    </head>
    <body>
<img src="https://.<?php echo $result; ?>">
    </body>
</html>
