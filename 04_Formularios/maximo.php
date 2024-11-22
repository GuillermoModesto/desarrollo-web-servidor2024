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
<!-- Hardcodear un array. Mostrar los números como yo quiera. Crear un formulario donde se intente adivinar el máximo valor -->
<?php
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
for($i = 0; $i < count($array); $i++) echo "$array[$i] ";
?>
<form action="" method="post">
    <label for="maximo">Máximo</label> <!-- for está conectado con el id -->
    <input type="text" name="maximo" id="maximo" placeholder="Introduce el máximo">
    <input type="submit">
</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $aux = $array[0];
    for($i = 1; $i < count($array); $i++){
        if($aux < $array[$i]) $aux = $array[$i];
    }
    $maximo = $_POST["maximo"];
    if($maximo == $aux) echo "<p>bien por ti</p>";
    else echo "<p>bájate los pantalones</p>";
}
?>
</body>
</html>