<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $a1=347;
    echo gettype($a1) . "<br>";
    $a2=2147483647;
    echo gettype($a2) . "<br>";
    $a3=-2147483647;
    echo gettype($a3) . "<br>";
    $a4=23.7678;
    echo gettype($a4) . "<br>";
    $a5=3.1416;
    echo gettype($a5) . "<br>";
    $a6="347";
    echo gettype($a6) . "<br>";
    $a7="3.1416";
    echo gettype($a7) . "<br>";
    $a8="Solo literal";
    echo gettype($a8) . "<br>";
    $a9="12.3 literal con numero";
    echo gettype($a9) . "<br>";

    ?>
</body>
</html>