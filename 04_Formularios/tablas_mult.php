<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <link href="../estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    for($i = 1; $i <= 10; $i++) {
    ?>
    <table>
        <thead>
            <tr>
                <?php
                echo "<th>Tabla del: $i</th>";
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            for($j = 1; $j <= 10; $j++) {
                echo "<tr><td>$j * $i = " . ($j * $i) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php } ?>
</body>
</html>