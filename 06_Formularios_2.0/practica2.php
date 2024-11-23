<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require("../05_Funciones/validar2.php");
    ?>
    <style>
        .error{
           color: red;
           background: yellow; 
           width: 30vw;
        }
        ul {
            list-style: none;
        }
    </style>
</head>
<body>
    <!--
    - DNI: 8 caracteres y una letra (mirar de donde sale)
    - nombre, primer apellido, segundo apellido: caracteres alfabeticos, mostrar capitalized aunque no lo esté
    - fecha nacimiento: entre 18 y 120 años
    - correo electrónico: formato correo, impedir el uso de palabras malsonantes (algunas, como 3 o asi)
    -->

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_dni = $_POST["dni"];
            $val_dni = validar($tmp_dni, "dni");

            if (isset($_POST["sexo"]))
                $tmp_sexo = $_POST["sexo"];
            else 
                $tmp_sexo = "";
            $val_sexo = validar($tmp_sexo, "sexo");

            $tmp_nombre = $_POST["nombre"];
            $val_nombre = validar($tmp_nombre, "nombre");

            $tmp_apellido1 = $_POST["apellido1"];
            $val_apellido1 = validar($tmp_apellido1, "apellido");

            $tmp_apellido2 = $_POST["apellido2"];
            $val_apellido2 = validar($tmp_apellido2, "apellido");

            $tmp_fnacimiento = $_POST["fnacimiento"];
            $val_fnacimiento = validar($tmp_fnacimiento, "fnacimiento");

            $tmp_correo = $_POST["correo"];
            $val_correo = validar($tmp_correo, "correo");

            $arr_error = [];

            if ($val_dni === true) {
                $dni = $tmp_dni;
            } else {
                array_push($arr_error, $val_dni);
            }

            if ($val_sexo === true) {
                $sexo = $tmp_sexo;
            } else {
                array_push($arr_error, $val_sexo);
            }

            if ($val_nombre === true) {
                $nombre = $tmp_nombre;
            } else {
                array_push($arr_error, $val_nombre);
            }

            if ($val_apellido1 === true) {
                $apellido1 = $tmp_apellido1;
            } else {
                array_push($arr_error, $val_apellido1);
            }

            if ($val_apellido2 === true) {
                $apellido2 = $tmp_apellido2;
            } else {
                array_push($arr_error, $val_apellido2);
            }

            if ($val_fnacimiento === true) {
                $fnacimiento = $tmp_fnacimiento;
            } else {
                array_push($arr_error, $val_fnacimiento);
            }

            if ($val_correo === true) {
                $correo = $tmp_correo;
            } else {
                array_push($arr_error, $val_correo);
            }

        }
    ?>

    <form action="" method="post">
        <div class="campo">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" placeholder="DNI">
            <?php if ($val_dni !== true) echo "<div class='error'>$val_dni</div>"; ?>
            <br><br>
        </div>

        <div class="campo">
            <p>Sexo:</p>
            <ul>
                <li>
                    <input type="radio" name="sexo" id="sexo1" value="masculino">
                    <label for="sexo1">Masculino</label>
                </li>
                <li>
                    <input type="radio" name="sexo" id="sexo2" value="femenino">
                    <label for="sexo2">Femenino</label>
                </li>
            </ul>
            <?php if ($val_sexo !== true) echo "<div class='error'>$val_sexo</div>"; ?>
            <br><br>
        </div>

        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Pepe Luis">
            <?php if ($val_nombre !== true) echo "<div class='error'>$val_nombre</div>"; ?>
            <br><br>
        </div>

        <div class="campo">
            <label for="apellido1">Primer apellido</label>
            <input type="text" name="apellido1" id="apellido1" placeholder="Perez">
            <?php if ($val_apellido1 !== true) echo "<div class='error'>$val_apellido1</div>"; ?>
            <br><br>
        </div>

        <div class="campo">
            <label for="apellido2">Segundo apellido</label>
            <input type="text" name="apellido2" id="apellido2" placeholder="Perez">
            <?php if ($val_apellido2 !== true) echo "<div class='error'>$val_apellido2</div>"; ?>
            <br><br>
        </div>

        <div class="campo">
            <label for="fnacimiento">Fecha nacimiento</label>
            <input type="date" name="fnacimiento" id="fnacimiento">
            <?php if ($val_fnacimiento !== true) echo "<div class='error'>$val_fnacimiento</div>"; ?>
            <br><br>
        </div>

        <div class="campo">
            <label for="correo">Correo</label>
            <input type="text" name="correo" id="correo" placeholder="holaque@tal.tio">
            <?php if ($val_correo !== true) echo "<div class='error'>$val_correo</div>"; ?>
            <br><br>
        </div>

        <input type="submit" value="Enviar">

        <?php
        if (count($arr_error) == 0) {
            echo "<p>¿Es la siguiente información correcta?</p>";
            echo "<ul>";
            echo "<li>DNI --------------------------> $dni</li>";
            echo "<li>Sexo -------------------------> $sexo</li>";
            echo "<li>Nombre --------------------> $nombre</li>";
            echo "<li>Primer apellido ---------> $apellido1</li>";
            echo "<li>Segundo apellido ------> $apellido2</li>";
            echo "<li>Fecha de nacimiento -> $fnacimiento</li>";
            echo "<li>Correo ----------------------> $correo</li>";
            echo "</ul>";
        }
        ?>
    </form>
</body>
</html>