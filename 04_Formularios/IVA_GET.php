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
    <form action="" method="GET">
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

    <!-- GET SE ENVÍA POR DEFECTO PARA CARGAR UNA PÁGINA POR PRIMERA VEZ, Y AL NO TENER VALORES ASOCIADOS A LOS INPUTS/SELECTS... DA ERROR, AUNQUE
     REALMENTE ESTÉ TODO BIEN. 
     NO VALE EL $_SERVER["REQUEST.......] YA QUE SIMEPRE DARÁ TRUE EN LA PRIMERA CARGA. PARA LIDIAR CON ESTE PROBLEMA, SE PUEDEN HACER:
        isset($cosa) -> devuelve si $cosa a sido definida o no   
    TAMBIÉN NECESITAMOS COMPROBAR QUE LOS VALORES DE LAS VARIABLES NO SEAN CADENAS VACÍAS (QUE PUEDE PASAR SI LE DAS AL BOTÓN DE ENVIAR SIN TEXTO EN EL INPUT TEXT)
    -->>

    <?php
    /* Comprobar que no salgan errores en la primera carga */
    if(isset($_GET["precio"]) && isset($_GET["iva"])) {
        $precio = (int)$_GET["precio"];
        $iva = $_GET["iva"];
        $iva_num = 0;
        if($precio != "" && $iva != ""){
            $pvp = match ($iva) {
                "general" => $precio * GENERAL,
                "reducido" => $precio * REDUCIDO,
                "superreducido" => $precio * SUPERREDUCIDO
            };
            echo "<p>PVP => " . $pvp . "</p>";
        }
        else
            echo "<p>Tus padres no te quieren.</p>";
    }
    ?>
</body>
</html>