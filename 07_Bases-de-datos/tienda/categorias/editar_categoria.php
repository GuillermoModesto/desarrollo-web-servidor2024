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

        $categoria = depurar($_POST["categoria"]);

        $tmp_descripcion = depurar($_POST["descripcion"]);
        $val_descripcion = validar ($tmp_descripcion, "categoria", "descripcion");
        if ($val_descripcion === true) {
            $descripcion = $tmp_descripcion;
        } else {
            $error++;
        }

        if ($error === 0) {
            $sql = "UPDATE categorias SET
                descripcion = '$descripcion'
            WHERE nombre = '$categoria'";

            $_conexion -> query($sql);
        }
    }

    $_categoria = $_GET["categoria"];
    $sql = "SELECT * FROM categorias WHERE categoria = '$_categoria'";
    $resultado = $_conexion -> query($sql);
    $categoria = $resultado -> fetch_assoc();
    ?>

    <div class="container">
        <a class="btn btn-secondary" href="./index.php">Volver</a>
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype, tipo de encriptación para enviar archivos por HTTP/HTTPS --> 
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <input class="form-control" type="text" disabled
                    value="<?php echo $categoria["categoria"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" name="descripcion" type="text"
                    value="<?php echo $categoria["descripcion"] ?>">
                <?php if (isset($val_descripcion) && $val_descripcion !== true) { ?> 
                <div class="alert alert-danger col-3" role="alert">
                    <?php echo $val_descripcion; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <input type="hidden" name="categoria" value ="<?php echo $categoria["categoria"] ?>">
                <input class="btn btn-primary" type="submit" value="Editar">
            </div>
            <?php 
            if (isset($error) && $error === 0) { ?>
            <div class="alert alert-success" role="alert">
                La categoría se ha modificado correctamente.
            </div>
            <?php }
            ?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>