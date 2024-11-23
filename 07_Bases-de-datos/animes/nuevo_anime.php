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
        
        require('conexion.php');
    ?>
</head>
<body>

    <?php
    // Encontrar y almacenar todos los nombres de estudios para tener la clave foranea controlada
    $sql = "SELECT * FROM estudios";
    $resultado = $_conexion -> query($sql);
    $estudios = [];

    while ($fila = $resultado -> fetch_assoc()) {
        array_push($estudios, $fila["nombre_estudio"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo"];
        $nombre_estudio = $_POST["nombre_estudio"];
        $anno_estreno = $_POST["anno_estreno"];
        $num_temporadas = $_POST["num_temporadas"];
        // $_FILES --> matriz que pide el nombre del campo (el name) y una cualidad predefinida
        /*
        'name' => string '' (length=0)
        'full_path' => string '' (length=0)
        'type' => string '' (length=0)
        'tmp_name' => string '' (length=0)
        'error' => int 4
        'size' => int 0
        */
        // var_dump($_FILES["imagen"]);

        $direccion_temporal = $_FILES["imagen"]["tmp_name"];
        $nombre_imagen = $_FILES["imagen"]["name"];
        /* Arreglar tema permisos con lo de abajo 
        sudo chown -R estudiante var/www
        sudo chmod -R 777 var/www
        sudo service apache2 restart
        */

        move_uploaded_file($direccion_temporal, "imagenes/$nombre_imagen");

        $sql = "INSERT INTO animes
            (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
            VALUES
            ('$titulo', '$nombre_estudio', '$anno_estreno', '$num_temporadas', './imagenes/$nombre_imagen')
            ";

        $_conexion -> query($sql);
    }
    ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype, tipo de encriptación para enviar archivos por HTTP/HTTPS --> 
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" name="titulo" type="text">
            </div>
            <div class="mb-3">
                <select name="nombre_estudio">
                    <?php
                    foreach($estudios as $estudio) { ?>
                        <option value="<?php echo $estudio ?>"><?php echo $estudio ?></option>
                    <?php }
                    ?>
                </select>
                <label class="form-label">Estudio</label>
                <input class="form-control" name="nombre_estudio" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input class="form-control" name="anno_estreno" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Número temporadas</label>
                <input class="form-control" name="num_temporadas" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file"> <!-- type file, lo de "mete aquí un archivo" -->
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
            <a href="./index.php">Volver</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>