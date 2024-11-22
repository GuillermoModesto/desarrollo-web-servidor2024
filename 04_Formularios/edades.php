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
<!-- Formulario que reciba nombre y edad. Si la edad es menor a 18, mostrar "nombre" es menor de edad. Entre 18 y 65 "nombre" es mayor de edad. Mayor a 65 "nombre" se a jubilado -->
<form action="" method="post">
    <p>Nombre</p>
    <input type="text" name="nombre">
    <p>Edad</p>
    <input type="text" name="edad">
    <br><br>
    <input type="submit" value="Es legal?">
</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $edad = (int)$_POST["edad"];
    $mensaje = "";

    /*
    if ($edad < 18)
        $mensaje = " es menor de edad. Vas a la carcel.";
    else if($edad >= 18 && $edad < 65)
        $mensaje = " es legal, te libraste.";
    else if($edad >= 65)
        $mensaje = " está jubilado. Para gustos colores.";
    $mensaje = $nombre . $mensaje;
    echo "<p>$mensaje</p>";
    */
    
    // USANDO MATCH
    $mensaje = match(true){
        $edad < 18 => " es menor de edad.",
        $edad >= 18 and $edad < 65 => " es mayor de edad.",
        $edad >= 65 => " se ha jubilado."
    };

    echo "<p>$nombre $mensaje";
}
?>
</body>
</html>