<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables y sus tipos</title>
</head>
<body>
 <?php
    $a1=347;
    echo gettype($a1) . "<br>";
    settype ($a1, "double")."<br>";
    echo gettype($a1) . "<br><br>";

    $a2=2147483647; 
    echo gettype($a2) . "<br>";
    settype ($a2, "double")."<br>";
    echo gettype($a2) . "<br><br>";

    $a3=-2147483647;
    echo gettype($a3) . "<br>";
    settype ($a3, "double")."<br>";
    echo gettype($a3) . "<br><br>";

    $a4=23.7678;
    echo gettype($a4) . "<br>";
    settype ($a4, "integer")."<br>";
    echo gettype($a4) . "<br><br>";

    $a5=3.1416;
    echo gettype($a5) . "<br>";
    settype ($a5, "integer")."<br>";
    echo gettype($a5) . "<br><br>";

    $a6="347";
    echo gettype($a6) . "<br>";
    settype ($a6, "double")."<br>";
    echo gettype($a6) . "<br><br>";

    $a7="3.1416";
    echo gettype($a7) . "<br>";
    settype ($a7, "integer")."<br>";
    echo gettype($a7) . "<br><br>";

    $a8="Solo literal";
    echo gettype($a8) . "<br>";
    settype ($a8, "double")."<br>";
    echo gettype($a8) . "<br><br>";

    $a9="12.3 literal con numero";
    echo gettype($a9) . "<br>";
    settype ($a9, "integer")."<br>";
    echo gettype($a9) . "<br><br>";

    ?>
</body>
</html>