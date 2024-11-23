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
    <!-- Realiza un formulario que reciba 3 números: a, b y c. Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b. -->

    <form action="" method="post">
        <label for="num3">Multiplos de:</label>
        <input type="text" name="c" id="num3" placeholder="1234">
    <br>
        <label for="num1">Entre:</label>
        <input type="text" name="a" id="num1" placeholder="1234">
    <br>
        <label for="num2">Y:</label>
        <input type="text" name="b" id="num2" placeholder="1234">
    <br>
        <input type="submit" name="Calcular">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $a = $_POST["a"];
            $b = $_POST["b"];
            $c = $_POST["c"];

            echo "<p>Multiplos de " . $c . " entre " . $a . " y " . $b . "</p>";

            $multiplos = [];

            $inicio = (int)($a / $c);

            while (($c * $inicio) <= $b) {
                array_push($multiplos, ($c * $inicio));
                $inicio++;
            } ?>
    <ul>
        <?php
            foreach($multiplos as $multiplo) { ?>
                <li><?php echo $multiplo ?></li>
            <?php }
        ?>
    </ul>
        <?php } 
        ?>
    
</body>
</html>