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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_anime = $_POST["id_anime"];
        $titulo = $_POST["titulo"];
        $nombre_estudio = $_POST["nombre_estudio"];
        $anno_estreno = $_POST["anno_estreno"];
        $num_temporadas = $_POST["num_temporadas"];

        $sql = "UPDATE animes SET
                    titulo = '$titulo',
                    nombre_estudio = '$nombre_estudio',
                    anno_estreno = '$anno_estreno',
                    num_temporadas = '$num_temporadas'
                WHERE id_anime = $id_anime";

        $_conexion -> query($sql);
    }

    $sql = "SELECT * FROM estudios";
    $resultado = $_conexion -> query($sql);
    $estudios = [];

    while ($fila = $resultado -> fetch_assoc()) {
        array_push($estudios, $fila["nombre_estudio"]);
    }

    $id_anime = $_GET["id_anime"];
    $sql = "SELECT * FROM animes WHERE id_anime = '$id_anime'";
    $resultado = $_conexion -> query($sql);
    $anime = $resultado -> fetch_assoc();

    ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype, tipo de encriptación para enviar archivos por HTTP/HTTPS --> 
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" name="titulo" type="text"
                    value="<?php echo $anime["titulo"] ?>">
            </div>
            <div class="mb-3">
                <select name="nombre_estudio">
                    <option value="<?php echo $anime["nombre_estudio"] ?>" selected hidden>
                        <?php echo $anime["nombre_estudio"] ?>
                    </option>
                    <?php
                    foreach($estudios as $estudio) { ?>
                        <option value="<?php echo $estudio ?>"><?php echo $estudio ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input class="form-control" name="anno_estreno" type="text"
                    value="<?php echo $anime["anno_estreno"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Número temporadas</label>
                <input class="form-control" name="num_temporadas" type="text"
                    value="<?php echo $anime["num_temporadas"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file"> <!-- type file, lo de "mete aquí un archivo" -->
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_anime" value ="<?php echo $id_anime ?>">
                <input class="btn btn-primary" type="submit" value="Editar">
            </div>
            <a href="./index.php">Volver</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>