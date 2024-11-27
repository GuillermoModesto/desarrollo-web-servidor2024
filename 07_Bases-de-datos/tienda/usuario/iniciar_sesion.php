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
        /*
        var_dump($resultado);
        object(mysqli_result)[2]
        public 'current_field' => int 0
        public 'field_count' => int 2
        public 'lengths' => null
        public 'num_rows' => int 1
        public 'type' => int 0
        */
        if ($resultado -> num_rows == 0) {
            echo "<h2>El usuario no existe</h2>";
        } else {
            $info_usuario = $resultado -> fetch_assoc();
            $accesso_concedido = password_verify($contrasena, $info_usuario["contrasena"]);
            if (!$accesso_concedido) {
                echo "<h2>Contraseña equivocada</h2>";
            } else {
                //echo "<h2>P'adentro</h2>";
                session_start(); // crea la sesión para guardar información que será global hasta que se apaque el navegador
                $_SESSION["usuario"] = $usuario;
                header("location: ../index.php"); // como un enlace instantaneo
                exit; // mata al fichero YA
            }
        }
    }
    ?>
    <div class="container">
        <h3>Iniciar sesión</h3>
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
                <input class="btn btn-primary" type="submit" value="Iniciar sesión">
                <a href="registro.php" class="btn btn-secondary">Registrarse</a>
                <a href="../index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>