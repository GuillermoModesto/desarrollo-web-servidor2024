<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require("../05_Funciones/edades.php"); // IMPORTAR UNA FUNCIÓN
        require("../05_Funciones/potencias.php"); // IMPORTAR UNA FUNCIÓN
    ?>
</head>
<body>

<!-- TENER VARIOS FORMULATIOS ES PELIGROSO, PORQUE AL ENVIAR UN FORMULARIO (DARLE AL BOTONCITO SUBMIT) EL OTRO NO SE MANDA, 
 Y AL ACCEDER A LOS DATOS DE LOS DOS EN EL CÓDIGO, NO VAN A EXISTIR LAS VARIABLES -->

<h3>FORMULARIO NOMBRE/EDAD</h3>
<form action="" method="post">
    <p>Nombre</p>
    <input type="text" name="nombre">
    <p>Edad</p>
    <input type="text" name="edad">
    
    <input type="hidden" name="accion" value="formulario_edades"> <!-- UNA VARIABLE CON VALOR ASIGNADO EN EL FORMULARIO DE LAS EDADES -->

    <br><br>
    <input type="submit" value="Es legal?">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["accion"] == "formulario_edades") { // Comprueba cual formulario se envía mirando que hay en la variable
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];

        if(comprobarEdad($nombre, $edad)) {
            $mensaje = match(true){
                $edad < 18 => " es menor de edad.",
                $edad >= 18 and $edad < 65 => " es mayor de edad.",
                $edad >= 65 => " se ha jubilado."
            };
        }
    }
}
?>

<h3>FORMULARIO POTENCIA</h3>
<form action="" method="post">
    <p>Base</p>
    <input type="text" name="base">
    <p>Exponente</p>
    <input type="text" name="exponente">

    <input type="hidden" name="accion" value="formulario_potencia"> <!-- MISMA VARIABLE CON VALOR ASIGNADO EN EL FORMULARIO DE LAS POTENCIAS -->

    <br><br>
    <input type="submit" value="Calcular">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["accion"] == "formulario_potencia") { // Comprueba cual formulario se envía mirando que hay en la variable
        $base = $_POST["base"];
        $exponente = $_POST["exponente"];

        if (comprobarNumeros($base, $exponente)) {
            $potencia = 1;
            for($i = 0; $i < $exponente; $i++){
                $potencia *= $base;
            }
            echo "<p>" . ($base**$exponente) . "</p>"; //concatenar cositas nazis
        }
    }
}
?>

</body>
</html>