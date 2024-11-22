<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        define("GENERAL", 1.21);
        define("REDUCIDO", 1.1);
        define("SUPERREDUCIDO", 1.04);
    ?>
    <link href="../estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" placeholder="Precio">
        &nbsp;&nbsp;&nbsp;
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Super reducido</option>
        </select>
        &nbsp;&nbsp;&nbsp;
        <input type="submit" name="Dale">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $precio = $_POST["precio"];
        $iva = $_POST["iva"];
        $iva_num = 0;
        $pvp = match ($iva) {
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };
        echo "<p>PVP => " . $pvp . "</p>";
    }
    ?>
</body>
</html>