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
    ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = 0;

        $tmp_usuario = depurar($_POST["usuario"]);
        $val_usuario = validar($tmp_usuario, "usuario", "nombre");
        if ($val_usuario === true) {
            $sql = "SELECT * FROM usuarios WHERE usuario = '$tmp_usuario'";
            $resultado = $_conexion -> query($sql);
            if ($resultado -> num_rows == 0) {
                $usuario = $tmp_usuario;
            } else {
                $error++;
                $val_usuario = "El usuario ya está registrado.";
            }
        } else {
            $error++;
        }
        

        $tmp_contrasena = depurar($_POST["contrasena"]);
        $val_contrasena = validar($tmp_contrasena, "usuario", "contrasena");
        if ($val_contrasena === true) {
            $contrasena = $tmp_contrasena;
        } else {
            $error++;
        }

        if ($error === 0) {
            $contrasena_cifrado = password_hash($contrasena, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrado')";
            $_conexion -> query($sql);

            if (isset($error) && $error === 0) { ?>
            <div class="alert alert-success" role="alert">
                Registrado con exito.
            </div>
            <?php }
        }
    }
    ?>
    <div class="container">
        <h3>Registro</h3>
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype, tipo de encriptación para enviar archivos por HTTP/HTTPS --> 
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <?php if (isset($val_usuario) && $val_usuario !== true) { ?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_usuario; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if (isset($val_contrasena) && $val_contrasena !== true) { ?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_contrasena; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registrarse">
                <a href="iniciar_sesion.php" class="btn btn-secondary">Iniciar sesión</a>
                <a href="../index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>