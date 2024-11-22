<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <?php
        require("../05_Funciones/irpf.php");
        require("../05_Funciones/calcularIRPF.php");
    ?>
</head>
<body>
    <!--
    Desde 0 hasta 12.450 euros:        retención del 19%.
    Desde 12.450 hasta 20.199 euros:   retención del 24%.   Tramo de 7749
    Desde 20.200 hasta 35.199 euros:   retención del 30%.   Tramo de 14999
    Desde 35.200 hasta 59.999 euros:   retención del 37%.   Tramo de 24799
    Desde 60.000 hasta 299.999 euros:  retención del 45%.   Tramo de 239999
    Más de 300.000 euros:              retención del 47%.
    -->
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_renta = $_POST["renta"];

        if(comprobarIRPF($tmp_renta) === true)
            $renta = $tmp_renta;
        else
            $error = comprobarIRPF($tmp_renta);

        if (isset($renta)) {
            calcularIRPF($renta);
        }
    }
    ?>
    <form action="" method="post">
        <label for="renta">Renta</label>
        <input type="text" name="renta" id="renta" placeholder="Dinero">
        <?php if (isset($error)) echo "<div>$error</div>" ?>
        <input type="submit" name="IRPF">
    </form>
</body>
</html>