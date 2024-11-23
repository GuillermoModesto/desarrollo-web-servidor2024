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
    $sql = "SELECT * FROM categorias";
    $resultado = $_conexion -> query($sql);
    $categorias = [];

    while ($fila = $resultado -> fetch_assoc()) {
        array_push($categorias, $fila["categoria"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];
        $stock = $_POST["stock"];

        $direccion_temporal = $_FILES["imagen"]["tmp_name"];
        $nombre_imagen = $_FILES["imagen"]["name"];
        $imagen = "../imagenes/$nombre_imagen";
        move_uploaded_file($direccion_temporal, $imagen);

        $descripcion = $_POST["descripcion"];

        $sql = "INSERT INTO productos
            (nombre, precio, categoria, stock, imagen, descripcion)
            VALUES
            ('$nombre', '$precio', '$categoria', '$stock', '$imagen', '$descripcion')
            ";

        $_conexion -> query($sql);
    }
    ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre producto</label>
                <input class="form-control" name="nombre" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text">
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
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion"></textarea>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="./index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>