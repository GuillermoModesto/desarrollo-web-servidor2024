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
        
        require('../conexion.php');
    ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $contrasena_cifrado = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrado')";
        $_conexion -> query($sql);
    }
    ?>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype, tipo de encriptación para enviar archivos por HTTP/HTTPS --> 
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
            </div>
            <div class="mb-3">
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>