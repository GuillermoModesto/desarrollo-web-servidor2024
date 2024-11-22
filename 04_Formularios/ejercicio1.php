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
</head>
<body>
    <!-- Realiza un formulario que reciba 3 números y devuelva el mayor de ellos. -->

    <form action="" method="post">
        <label for="num1">Primer número</label>
        <input type="text" name="num1" id="num1" placeholder="1234">
    <br>
        <label for="num2">Segundo número</label>
        <input type="text" name="num2" id="num2" placeholder="1234">
    <br>
        <label for="num3">Tercer número</label>
        <input type="text" name="num3" id="num3" placeholder="1234">
    <br>
        <input type="submit" name="Mayor">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $num3 = $_POST["num3"];

            $nums = [$num1, $num2, $num3];
            sort($nums);
            */

            $nums = [];
            // $_POST guarda pareja key (name) y value (valor que recoge)
            foreach($_POST as $key => $value) { 
                if ($key != "Mayor") {
                    echo "<p>" . $value . "</p>";
                    array_push($nums, $value);
                }
            }
            sort($nums);
            echo "<p>El mayor es " . $nums[count($nums) - 1] . "</p>";
        }
    ?>
</body>
</html>