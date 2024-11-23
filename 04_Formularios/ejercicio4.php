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

</head>
<body>
    <!-- 
     Realiza un formulario que funcione a modo de conversor de temperaturas. Se introducirá en un campo de texto la temperatura,
     y luego tendremos un select para elegir las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos
     convertir la temperatura.
     Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.
     En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT

     celsius a kelvin -> +273,15
        kelvin a celsius -> -273,15
     celsius a fahrenheit -> (c × 9 / 5) + 32
        fahrenheit a celsius -> (f − 32) × 5 / 9
     kelvin a fahrenheit -> (k − 273,15) × 9 / 5 + 32
        fahrenheit a kelvin -> (f − 32) × 5 / 9 + 273,15

     Sea lo que sea pasalo a celsius, y luego a lo que nos pida si hace falta
    -->
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
        <input type="submit" name="Dale">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $temporiginal = $_POST["temporiginal"];
        $tempnueva = $_POST["tempnueva"];
        
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
    ?>
</body>
</html>