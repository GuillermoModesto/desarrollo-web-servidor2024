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
    <!--  Realiza un formulario que reciba dos números y devuelva todos los números primos dentro de ese rango (incluidos los extremos). -->
    
    <form action="" method="post">
        <label for="num3">Inicio:</label>
        <input type="text" name="inicio" id="num3" placeholder="1234">
    <br>
        <label for="num1">Fin:</label>
        <input type="text" name="fin" id="num1" placeholder="1234">
    <br>
        <input type="submit" name="Calcular">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
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
    ?>

            <ul>
        <?php
            foreach($primos as $primo) { ?>
                <li><?php echo $primo ?></li>
      <?php } ?>
            </ul>
  <?php } ?>

</body>
</html>