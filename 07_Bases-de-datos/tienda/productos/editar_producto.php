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

        $id_producto = depurar($_POST["id_producto"]);

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

        $tmp_categoria = depurar($_POST["categoria"]);
        $val_categoria = validar_categoria($tmp_categoria, $categorias);
        if ($val_categoria === true)
            $categoria = $tmp_categoria;
        else
            $error++;

        $tmp_stock = depurar($_POST["stock"]);
        $val_stock = validar($tmp_stock, "producto", "stock");
        if ($val_stock === true)
            $stock = $tmp_stock;
        else
            $error++;

        $original_imagen = $_POST["original_imagen"];
        $direccion_temporal = $_FILES["imagen"]["tmp_name"];
        if ($direccion_temporal == "")
            $imagen = $original_imagen;
        else {
            $imagen = $_FILES["imagen"]["name"];
            move_uploaded_file($direccion_temporal, "../imagenes/$imagen");
        }

        $descripcion = depurar($_POST["descripcion"]);

        if ($error === 0) {
                $sql = "UPDATE productos SET
                nombre = '$nombre',
                precio = '$precio',
                categoria = '$categoria',
                stock = '$stock',
                imagen = '$imagen',
                descripcion = '$descripcion'
            WHERE id_producto = $id_producto";

            $_conexion -> query($sql);
        }
    }

    $id_producto = $_GET["id_producto"];
    $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
    $resultado = $_conexion -> query($sql);
    $producto = $resultado -> fetch_assoc();
    $imagen = $producto["imagen"];
    ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype, tipo de encriptación para enviar archivos por HTTP/HTTPS --> 
            <div class="mb-3">
                <label class="form-label">Nombre producto</label>
                <input class="form-control" name="nombre" type="text"
                    value="<?php echo $producto["nombre"] ?>">
                <?php if (isset($val_nombre) && $val_nombre !== true) { ?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_nombre; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text"
                    value="<?php echo $producto["precio"] ?>">
                <?php if (isset($val_precio) && $val_precio !== true) {?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_precio; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <select name="categoria">
                    <option value="<?php echo $producto["categoria"] ?>" selected hidden>
                        <?php echo $producto["categoria"] ?>
                    </option>
                    <?php
                    foreach($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                    <?php }
                    ?>
                    <?php if (isset($val_categoria) && $val_categoria !== true) {?> 
                    <div class="alert alert-danger" role="alert">
                        <?php echo $val_categoria; ?>
                    </div> <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="text"
                    value="<?php echo $producto["stock"] ?>">
                <?php if (isset($val_stock) && $val_stock !== true) {?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_stock;  ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
                <input type="hidden" name="original_imagen" value="<?php echo $imagen ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" name="descripcion" type="text"
                    value="<?php echo $producto["descripcion"] ?>">
                <?php if (isset($val_descripcion) && $val_descripcion !== true) {?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $val_descripcion; ?>
                </div> <?php } ?>
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_producto" value ="<?php echo $id_producto ?>">
                <input class="btn btn-primary" type="submit" value="Editar">
                <a class="btn btn-secondary" href="./index.php">Volver</a>
            </div>
            <?php 
            if (isset($error) && $error === 0) { ?>
            <div class="alert alert-success" role="alert">
                Producto editado correctamente.
            </div>
            <?php }
            ?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>