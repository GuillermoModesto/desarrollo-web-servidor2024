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
    ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $_conexion -> query($sql);

        if ($resultado -> num_rows != 0) { 
            $info_usuario = $resultado -> fetch_assoc();
            $accesso_concedido = password_verify($contrasena, $info_usuario["contrasena"]);
            if ($accesso_concedido) {
                session_start();
                $_SESSION["usuario"] = $usuario;
                header("location: ../index.php");
                exit;
            }
        } else {
            $existe_usuario = false;
        }
    }
    ?>
    <div class="container">
        <h3>Iniciar sesión</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <?php if (isset($existe_usuario) && $existe_usuario === false) { ?> 
                <div class="alert alert-danger col-3" role="alert">
                    <?php echo "El usuario no existe." ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if (isset($accesso_concedido) && !$accesso_concedido) { ?> 
                <div class="alert alert-danger col-3" role="alert">
                    <?php echo "Contraseña erronea." ?>
                </div> 
                <?php } ?>
            </div>
            <div class="mb-3">
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Iniciar sesión">
                <a href="registro.php" class="btn btn-secondary">Registrarse</a>
                <a href="../index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>