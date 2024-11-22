<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
    $dia = date('j');
    $anho = 1990;

    echo "<p>Con date('L', anho)</p>";
    if(date('L', $anho) == 1) echo "<p>Año bisiesto con date</p>";
    else echo "<p>Año no bisiesto.</p>";

    echo "<p>Con anho%4!=0</p>";
    if($anho % 4 == 0) echo "<p>Año bisiesto con %4</p>";
    else echo "<p>Año no bisiesto.</p>";
    ?>
</body>
</html>