<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Hello !!</h1>
</body>
</html>
<?php

$array = ['yellow', 'green', 'rosybrown', 'coral'];
foreach ($array as $arr) {
    echo "<h1 style='color: {$arr}'>This page is Green</h1>";
}

$digit = [1, 2, 3, 4, 5];
$a = count($digit);
foreach ($digit as $digital) {
    echo $a = $a * $digital;
    echo "<br>";
}
