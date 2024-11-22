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
        $fabricante = $_POST["fabricante"];
        $pais = $_POST["pais"];

        $sql = "INSERT INTO fabricantes
            (fabricante, pais)
            VALUES
            ('$fabricante', '$pais')
            ";

        $_conexion -> query($sql);
    }
    ?>

    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <input class="form-control" name="fabricante" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Pais</label>
                <input class="form-control" name="pais" type="text">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>