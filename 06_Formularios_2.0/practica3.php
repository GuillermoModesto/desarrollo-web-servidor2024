<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require("../05_Funciones/validar3.php");
    ?>
</head>
<body>
    <!-- 
    - Nombre equipo : entre 3 y 20 caracteres. Letras, espacios en blanco y puntos
    - Iniciales : 3 caracteres exactos (ej. Malaga-MCF)
    - Ligas : EA Sports, HyperMotion, Primera RFEF
    - Número jugadores : entre 26 y 32
    - Fecha fudación : entre hoy y 18 diciembre 1889
    -->

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_nombre = $_POST["nombre"];
        $val_nombre = validar3($tmp_nombre);

        $tmp_iniciales = $_POST["iniciales"];
        $val_iniciales = validar3($tmp_iniciales);

        $tmp_liga = $_POST["liga"];
        $val_liga = validar3($tmp_liga);

        $tmp_njugadores = $_POST["njugadores"];
        $val_njugadores = validar3($tmp_njugadores);

        $tmp_ffundacion = $_POST["ffundacion"];
        $val_ffundacion = validar3($tmp_ffundacion);

        $arr_errors = [];

        

    }
    ?>

    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Málaga">
        <br><br>

        <label for="iniciales">Iniciales</label>
        <input type="text" id="iniciales" name="iniciales" placeholder="MCF">
        <br><br>

        <label for="liga">Liga</label>
        <select name="liga" id="liga">
            <option value="easports">EA Sports</option>
            <option value="hypermotion">HyperMotion</option>
            <option value="primerarfef">Primera RFEF</option>
        </select>
        <br><br>

        <label for="njugadores">Número de jugadores</label>
        <input type="number" id="njugadores" name="njugadores" placeholder="26 / 32">
        <br><br>

        <label for="ffundacion">Fecha fundación</label>
        <input type="date" id="ffundacion" name="ffundacion">
        <br><br>
    </form>
</body>
</html>