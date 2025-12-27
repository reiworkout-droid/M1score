<?php

$file = fopen('data/results.txt', 'r');

flock($file, LOCK_EX);

if($file) {
    $str = "";
    $array = [];
    while ($line = fgets($file)) {
        $str .= "<tr><td>{$line}</td></tr>";
        $array[] = [
            'referee' => implode(" ", array_slice(explode(" ", str_replace("\n", "", $line)),0,1)),
            'comedian' => explode(" ", str_replace("\n", "", $line))[1],
            'score' => explode(" ", str_replace("\n", "", $line))[2],
            'description' => explode(" ", str_replace("\n", "", $line))[3]
       ];
    }
}

flock($file, LOCK_UN);

fclose($file);

// var_dump($array);
// exit();

?>




<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="read.css">
    <title>M1結果発表</title>
</head>
<body>
    <header><img src="./img/M1.jpeg" alt="" id="M1img"></header>
    <fieldset>
        <legend>M1結果発表</legend>
        <a href="index.php" id="result">採点画面</a>
        <div>
            <div id="subtitle">Let's judge!</div>
        </div>
        <div id="outputPosition">
            <div id="output"></div>
        </div> 
    </fieldset>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        const array = <?= json_encode($array)?>;
        console.log(array);

        let html = '';

        for (let i = 0; i < array.length; i++) {
            html += `
                <div id="outputIndivisual">
                    <li>審査員：${array[i].referee}</li>
                    <li>コンビ：${array[i].comedian}</li>
                    <li>スコア：${array[i].score}</li>
                    <li>審査基準：<br>${array[i].description}</li>
                </div>
            `;
        }

        $('#output').html(html);
    </script>
</body>
</html>