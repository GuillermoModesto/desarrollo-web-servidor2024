<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $var = 1.354e12;
    var_dump($var);

    $var = "holaquetalcomoestas";
    var_dump($var);

    $var = true;
    var_dump($var);

    echo "Mi variable es $var";
    echo 'Mi variable es $var';

    echo "<br>";

    define("CONSTANTE", 25);
    echo CONSTANTE;

    echo "<h2>La variable es $var</h2>";
    echo "<h2 style='color: orange'>La variable es $var</h2>";

    $frase1 = "hola";
    $frase2 = "mundo";

    echo "<p>$frase1 " . "$frase2</p>";
    ?>
</body>
</html>