<?php

require "lib.php";

$result = getdb()->prepare("SELECT * FROM Ranking ORDER BY score DESC")->execute()->fetchColumn();

echo json_encode($result);
