<?php
// var_dump($_POST);
// exit();

// データ受信
$referee = $_POST["referee"];
$comedian = $_POST["comedian"];
$score = $_POST["score"];
$description = $_POST["description"];

$writeData = "{$referee} {$comedian} {$score} {$description}\n";

$file = fopen('data/results.txt', 'a');

flock($file, LOCK_EX);

fwrite($file, $writeData);

flock($file, LOCK_UN);

fclose($file);

header("Location:index.php");
exit();