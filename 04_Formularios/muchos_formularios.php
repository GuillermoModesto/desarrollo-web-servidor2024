<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);
    /**************/
    define("RET1", 0.19);

    define("RET2", 0.24);
    define("MIN2", 12450);

    define("RET3", 0.30);
    define("MIN3", 20200);

    define("RET4", 0.37);
    define("MIN4", 35200);

    define("RET5", 0.45);
    define("MIN5", 60000);

    define("RET6", 0.47);
    define("MIN6", 300000);
    /**************/
    require("../05_Funciones/iva.php");
    require("../05_Funciones/irpf.php");
    require("../05_Funciones/primos.php");
    require("../05_Funciones/temperatura.php");
    /*
    Formularios y funciones para: iva, irpf, primosRango, temperaturas
    */
    ?>

<!-------------------------------------------------------------------------------------------------------------------------------------->
    <h3>IVA</h3>
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
        <input type="hidden" name="accion" value="IVA">
        <input type="submit" name="Dale">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["accion"] == "IVA"){
        $precio = $_POST["precio"];
        $iva = $_POST["iva"];
        if (comprobarIVA($precio, $iva)) {
            $pvp = match ($iva) {
                "general" => $precio * GENERAL,
                "reducido" => $precio * REDUCIDO,
                "superreducido" => $precio * SUPERREDUCIDO
            };
            echo "<p>PVP => " . $pvp . "</p>";
        }
    }
    ?>

<!-------------------------------------------------------------------------------------------------------------------------------------->
    <h3>IRPF</h3>
    <form action="" method="post">
        <label for="renta">Renta</label>
        <input type="number" name="renta" id="renta" placeholder="Dinero">
        <input type="hidden" name="accion" value="IRPF">
        <input type="submit" name="IRPF">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["accion"] == "IRPF") {
        $renta = $_POST["renta"];
        if (comprobarIRPF($renta)) {
            $renta_aux = $renta;
            $irpf = 0;

            if ($renta_aux >= MIN6){
                $irpf += ($renta_aux - MIN6) * RET6;
                $renta_aux -= ($renta_aux - MIN6);
            }
                
            if ($renta_aux > MIN5 && $renta_aux <= MIN6){
                $irpf += ($renta_aux - MIN5) * RET5;
                $renta_aux -= ($renta_aux - MIN5);
            }

            if ($renta_aux > MIN4 && $renta_aux <= MIN5){
                $irpf += ($renta_aux - MIN4) * RET4;
                $renta_aux -= ($renta_aux - MIN4);
            }

            if ($renta_aux > MIN3 && $renta_aux <= MIN4){
                $irpf += ($renta_aux - MIN3) * RET3;
                $renta_aux -= ($renta_aux - MIN3);
            }
                
            if ($renta_aux > MIN2 && $renta_aux <= MIN3){
                $irpf += ($renta_aux - MIN2) * RET2;
                $renta_aux -= ($renta_aux - MIN2);
            }
                
            $irpf += $renta_aux * RET1;

            $neto = $renta - $irpf;

            echo "<p>Bruto: $renta</p>";
            echo "<p>Neto: $neto</p>";
        }
    }
    ?>

<!-------------------------------------------------------------------------------------------------------------------------------------->
    <h3>Rango primos</h3>
    <form action="" method="post">
        <label for="num3">Inicio:</label>
        <input type="text" name="inicio" id="num3" placeholder="1234">
    <br>
        <label for="num1">Fin:</label>
        <input type="text" name="fin" id="num1" placeholder="1234">
    <br>
        <input type="hidden" name="accion" value="primos">
        <input type="submit" name="Calcular">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["accion"] == "primos") {
        $inicio = $_POST["inicio"];
        $fin = $_POST["fin"];

        if(comprobarPrimos($inicio, $fin)) {
            $inicio = (int)$_POST["inicio"];
            $fin = (int)$_POST["fin"];
            $primos = [];

            $j = 0;
            for ($i = $inicio; $i <= $fin; $i++) {
                $j = $i - 1;
                    
                while ($j >= 2 && ($i % $j != 0)){
                    $j--;
                }
                        
                if ($j == 1) {
                    array_push($primos, $i);
                }
            } 
            echo "<ul>";
            foreach($primos as $primo) {
                echo "<li>$primo</li>";
            }
            echo "</ul>";
        }
    }
    ?>

<!-------------------------------------------------------------------------------------------------------------------------------------->
    <h3>Temperaturas</h3>
    <form action="" method="post">
        <label for="numero">Temperatura</label>
        <input type="text" name="numero" id="numero" placeholder="Temperatura">
        &nbsp;&nbsp;&nbsp;
        <label for="temporiginal">de</label>
        <select name="temporiginal" id="temporiginal">
            <option value="celsius">CELSIUS</option>
            <option value="kelvin">KELVIN</option>
            <option value="fahrenheit">FAHRENHEIT</option>
        </select>
        <label for="tempnueva">a</label>
        <select name="tempnueva" id="tempnueva">
            <option value="celsius">CELSIUS</option>
            <option value="kelvin">KELVIN</option>
            <option value="fahrenheit">FAHRENHEIT</option>
        </select>
        &nbsp;&nbsp;&nbsp;
        <input type="hidden" name="accion" value="temperatura">
        <input type="submit" name="Dale">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["accion"] == "temperatura"){
        $temporiginal = $_POST["temporiginal"];
        $tempnueva = $_POST["tempnueva"];
        $numero = $_POST["numero"];
        
        if (comprobarTemperatura($numero)) {
            $numero = (int)$_POST["numero"];
            $numeronuevo = 0;

            if($temporiginal != "celsius") {
                if ($temporiginal == "kelvin")
                    $numero = $numero - 273.15;
                else if ($temporiginal == "fahrenheit")
                    $numero = ($numero - 32) * 5 / 9;
            }
            
            if ($tempnueva == "kelvin") 
                $numeronuevo = $numero + 273.15;
            else if ($tempnueva == "fahrenheit")
                $numeronuevo = ($numero * 9 / 5) + 32;

            echo "<p>$numeronuevo</p>";
        }
    }
    ?>
</body>
</html>