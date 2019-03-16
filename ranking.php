<?php

require "lib.php";

$result = getdb()->query("SELECT * FROM Ranking ORDER BY score DESC")->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($result);
