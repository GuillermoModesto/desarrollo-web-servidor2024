<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require("../05_Funciones/validar.php");
    ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_usuario = $_POST["usuario"];
        $val_usuario = validar($tmp_usuario, "usuario");

        $tmp_nombre = $_POST["nombre"];
        $val_nombre = validar($tmp_nombre, "nombre");

        $tmp_apellidos = $_POST["apellidos"];
        $val_apellidos = validar($tmp_apellidos, "apellidos");

        $tmp_fnacimiento = $_POST["fnacimiento"];
        $val_fnacimiento = validar($tmp_fnacimiento, "fnacimiento");

        if ($val_usuario === true) {
            $usuario = $tmp_usuario;
        } else {
            $err_usuario = $val_usuario;
        }

        if ($val_nombre === true) {
            $nombre = $tmp_nombre;
        } else {
           $err_nombre = $val_nombre;
        }

        if ($val_apellidos === true) {
            $apellidos = $tmp_apellidos;
        } else {
           $err_apellidos = $val_nombre;
        }

        if ($val_fnacimiento === true) {
            $fnacimiento = $tmp_fnacimiento;
        } else {
           $err_fnacimiento = $val_fnacimiento;
        }
    }
    ?>

    <form action="" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" placeholder="some">
        <?php if (isset($err_usuario)) echo "<div>$err_usuario</div>" ?>
        <br><br>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="-(breaths in)-">
        <?php if (isset($err_nombre)) echo "<div>$err_nombre</div>" ?>
        <br><br>

        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" placeholder="BODY">
        <?php if (isset($err_apellidos)) echo "<div>$err_apellidos</div>" ?>
        <br><br>

        <label for="fnacimiento"> Fecha de nacimiento</label>
        <input type="date" id="fnacimiento" name="fnacimiento">
        <?php if (isset($err_fnacimiento)) echo "<div>$err_fnacimiento</div>" ?>
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>