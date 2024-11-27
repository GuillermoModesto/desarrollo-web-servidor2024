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
    $sql = "SELECT * FROM categorias";
    $resultado = $_conexion -> query($sql);
    $categorias = [];

    while ($fila = $resultado -> fetch_assoc()) {
        array_push($categorias, $fila["categoria"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = 0;

        $tmp_nombre = depurar($_POST["nombre"]);
        $val_nombre = validar($tmp_nombre, "producto", "nombre");
        if ($val_nombre === true)
            $nombre = $tmp_nombre;
        else
            $error++;

        $tmp_precio = depurar($_POST["precio"]);
        $val_precio = validar($tmp_precio, "producto", "precio");
        if ($val_precio === true)
            $precio = $tmp_precio;
        else
            $error++;

        if (isset($_POST["categoria"]))
            $tmp_categoria = depurar($_POST["categoria"]);
        else
            $tmp_categoria = "";
        $val_categoria = validar_categoria($tmp_categoria, $categorias);
        if ($val_categoria === true)
            $categoria = $tmp_categoria;
        else
            $error++;
        
        if ($_POST["stock"] !== "")
            $tmp_stock = depurar($_POST["stock"]);
        else
            $tmp_stock = 0;
        $val_stock = validar($tmp_stock, "producto", "stock");
        if ($val_stock === true)
            $stock = $tmp_stock;
        else
            $error++;

        $tmp_descripcion = depurar($_POST["descripcion"]);
        $val_descripcion = validar($tmp_categoria, "producto", "descripcion");
        if ($val_descripcion === true)
            $descripcion = $tmp_descripcion;
        else
            $error++;

        $direccion_temporal = $_FILES["imagen"]["tmp_name"];
        $nombre_imagen = $_FILES["imagen"]["name"];
        $imagen = $nombre_imagen;
        move_uploaded_file($direccion_temporal, "../imagenes/$imagen");

        if ($error === 0) {
            $sql = "INSERT INTO productos
            (nombre, precio, categoria, stock, imagen, descripcion)
            VALUES
            ('$nombre', '$precio', '$categoria', '$stock', '../imagenes/$imagen', '$descripcion')
            ";

            $resultado = $_conexion -> query($sql);
        }

        if ($resultado === true)
            $error = 0;
    }
    ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre producto</label>
                <input class="form-control" name="nombre" type="text">
                <?php if (isset($val_nombre) && $val_nombre !== true) { ?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_nombre; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text">
                <?php if (isset($val_precio) && $val_precio !== true) {?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_precio; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <select name="categoria">
                    <option disabled selected hidden> -- ELIJA UNA -- </option>
                    <?php
                    foreach($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                    <?php }
                    ?>
                </select>
                <?php if (isset($val_categoria) && $val_categoria !== true) {?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_categoria; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="text">
                <?php if (isset($val_stock) && $val_stock !== true) {?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_stock;  ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion"></textarea>
                <?php if (isset($val_descripcion) && $val_descripcion !== true) {?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_descripcion; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="./index.php">Volver</a>
            </div>
            <?php 
            if (isset($error) && $error === 0) { ?>
            <div class="alert alert-success" role="alert">
                Nuevo producto introducido correctamente.
            </div>
            <?php }
            ?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>