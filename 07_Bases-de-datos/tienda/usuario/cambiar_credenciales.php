<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        require('../util/conexion.php');
        require('../util/depurar.php');
        require('../util/validar.php');
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = 0;

        $usuario = $_SESSION["usuario"];

        $tmp_contrasena = depurar($_POST["contrasena"]);
        $val_contrasena = validar($tmp_contrasena, "usuario", "contrasena");
        if ($val_contrasena === true) {
            $contrasena = $tmp_contrasena;
        } else {
            $error++;
        }

        if ($error === 0) {
            $contrasena_cifrado = password_hash($contrasena, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET
                contrasena = '$contrasena_cifrado'
            WHERE usuario = '$usuario'";

            $_conexion -> query($sql);
        }
    }
    ?>

    <div class="container">
    <h3>Registro</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" value="<?php echo $_SESSION["usuario"] ?>" type="text" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if (isset($val_contrasena) && $val_contrasena !== true) { ?> 
                <div class="alert alert-danger col-3" role="alert">
                    <?php echo $val_contrasena; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Cambiar contraseña">
                <a href="../index.php" class="btn btn-secondary">Volver</a>
            </div>
            <?php if (isset($error) && $error === 0) { ?>
                <div class="alert alert-success col-3" role="alert">
                Contraseña modificada con exito.
                </div>
            <?php } ?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>