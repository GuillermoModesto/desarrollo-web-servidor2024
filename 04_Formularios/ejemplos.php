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
    /*
    *   SINGLE PAGE FORM -> toda la información se procesa en la misma página
    *
    *   MULTI PAGE FORM -> reenvían a otra página
    */
    ?>

    <form action="" method="post"> <!-- |action| es a donde envía el formulario (si se pone vacío, es un single page form) |method| es el tipo de envío -->
        <p>Texto</p>
        <input type="text" name="mensaje"> <!-- crea una cajetilla de texto para escribir, y almacenará ese texto en la variable "mensaje" -->
        <p>Repeticiones</p>
        <input type="text" name="num">
        <br><br>
        <input type="submit" value="enviar"> <!-- crea un botón con el texto enviar -->
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        /*
        * Este cógido se ejecutará cuando el servidor reciba una petición a través del método POST
        */
        $mensaje = $_POST["mensaje"]; //_POST es un array que tiene todos las parejas de key (lo que hay en el name), valor (lo que se escribió en la cajetilla) dentro del modo POST
        $numero = (int)$_POST["num"]; //no hace falta el casteo porque lo hace implícitamente, pero es buena práctica hacerlo igualmente
        //echo "<h1>$mensaje</h1>";
        /*
        * Modificar el formulario para que recoja un número, y mostrar el mensaje tantas veces como se diga.
        */
        for($i = 0; $i < $numero; $i++){
            echo "<p>$mensaje</p>";
        }
    }
    ?>
</body>
</html>