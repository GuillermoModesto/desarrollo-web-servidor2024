<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir categoría</title>
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

        $tmp_categoria = depurar($_POST["categoria"]);
        $val_categoria = validar($tmp_categoria, "categoria", "categoria");
        if ($val_categoria === true) {
            $categoria = $tmp_categoria;
        } else {
            $error++;
        }

        $tmp_descripcion = depurar($_POST["descripcion"]);
        $val_descripcion = validar ($tmp_descripcion, "categoria", "descripcion");
        if ($val_descripcion === true) {
            $descripcion = $tmp_descripcion;
        } else {
            $error++;
        }

        if ($error === 0) {
            $sql = "INSERT INTO categorias
                (categoria, descripcion)
                VALUES
                ('$categoria', '$descripcion')
                ";

            $_conexion -> query($sql);
        }
    }
    ?>

    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <input class="form-control" name="categoria" type="text">
                <?php if (isset($val_categoria) && $val_categoria !== true) { ?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_categoria; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion"></textarea>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="./index.php">Volver</a>
                <?php if (isset($val_descripcion) && $val_descripcion !== true) { ?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_descripcion; ?>
                </div> <?php } ?>
            </div>
            <?php 
            if (isset($error) && $error === 0) { ?>
            <div class="alert alert-success" role="alert">
                Nueva categoría introducida correctamente.
            </div>
            <?php }
            ?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>