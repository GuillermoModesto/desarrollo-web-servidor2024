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
    <link href="../estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="" method="post">
        <label for="dinero_original">Dinero:</label>
        <input type="number" id="dinero_original" name="dinero_original" placeholder="123">

        <select name="divisa_original" id="divisa_original">
            <option value="euro">Euro</option>
            <option value="dolar">Dolar</option>
            <option value="yen">Yen</option>
        </select>

        <select name="divisa_final" id="divisa_final">
            <option value="euro">Euro</option>
            <option value="dolar">Dolar</option>
            <option value="yen">Yen</option>
        </select>

        <input type="submit" value="Cambiar">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $dinero_original = $_POST["dinero_original"];
        $dinero_final = 0;
        $divisa_original = $_POST["divisa_original"];
        $divisa_final = $_POST["divisa_final"];

        if ($divisa_original == "euro") {
            if ($divisa_final == "euro") {
                $dinero_final = $dinero_original;
            }
            if ($divisa_final == "dolar") {
                $dinero_final = $dinero_original * 1.09;
            }
            else if ($divisa_final == "yen") {
                $dinero_final = $dinero_original * 163.38;
            }
        }
        if ($divisa_original == "dolar") {
            if ($divisa_final == "dolar") {
                $dinero_final = $dinero_original;
            }
            if ($divisa_final == "euro") {
                $dinero_final = $dinero_original * 0.92;
            }
            else if ($divisa_final == "yen") {
                $dinero_final = $dinero_original * 146.67;
            }
        }
        if ($divisa_original == "yen") {
            if ($divisa_final == "yen") {
                $dinero_final = $dinero_original;
            }
            if ($divisa_final == "dolar") {
                $dinero_final = $dinero_original * 0.0061;
            }
            else if ($divisa_final == "euro") {
                $dinero_final = $dinero_original * 0.0067;
            }
        }
        echo "<p>$dinero_final</p>";
    }
    ?>
</body>
</html>