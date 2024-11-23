<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numero = 3;
        if($numero > 0){
            echo "<p style='color: red'>El número es positivo</p>";
        }
        elseif($numero == 0){
            echo "<p style='color: red'>El número es cero</p>";
        }
        else{
            echo "<p style='color: red'>El número no es positivo</p>";
        }

        if($numero > 0) echo "<p style='color: green'>El número es positivo</p>";
        elseif($numero == 0) echo "<p style='color: green'>El número es cero</p>";
        else echo "<p style='color: green'>El número no es positivo</p>";

        if($numero > 0):
            echo "<p style='color: blue'>El número es positivo</p>";
        elseif ($numero == 0):
            echo "<p style='color: blue'>El número es cero</p>";
        else:
            echo "<p style='color: blue'>El número no es positivo";
        endif;

        #EJ1
        echo "<p>Ej1</p>";

        echo "<p>Rangos: [-10, 0), [0, 10], (10, 20]</p>";
        echo "<p>Número: $numero</p>";
        if($numero >= -10 && $numero < 0) echo "<p style='color: green'>El número está en el rango [-10, 0)</p>";
        elseif($numero >= 0 && $numero <= 10) echo "<p style='color: green'>El número está en el rango [0, 10]</p>";
        elseif($numero > 10 && $numero <= 20) echo "<p style='color: green'>El número está en el rango (10, 20]</p>";
        else echo "<p>El número no está en el rango</p style='color: green'>";

        if($numero >= -10 && $numero < 0):
            echo "<p style='color: blue'>El número está en el rango [-10, 0)</p>";
        elseif($numero >= 0 && $numero <= 10):
            echo "<p style='color: blue'>El número está en el rango [0, 10]</p>";
        elseif($numero > 10 && $numero <= 20):
            echo "<p style='color: blue'>El número está en el rango (10, 20]</p>";
        else:
            echo "<p style='color: blue'>El número no está en el rango</p>";
        endif;

        #EJ2
        echo "<p>Ej2</p>";

        echo "<p>Número mayor o son iguales.</p>";
        $n1 = 5;
        $n2 = 2;
        echo "<p>Número1: $n1</p>";
        echo "<p>Número2: $n2</p>";

        if($n1 > $n2) echo "<p style='color: green'>$n1 es mayor a $n2";
        elseif($n2 > $n1) echo "<p style='color: green'>$n2 es mayor a $n1";
        else echo "<p style='color: green'>$n1 y $n2 son iguales</p>";

        if($n1 > $n2):
            echo "<p style='color: blue'>$n1 es mayor a $n2";
        elseif($n2 > $n1):
            echo "<p style='color: blue'>$n2 es mayor $n1";
        else:
            echo "<p style='color: blue'>$n1 y $n2 son iguales</p>";
        endif;

        echo "<h2>NUMEROS ALEATORIOS(rand())</h2>";
        $aleatorio = rand(1, 10);
        echo "$aleatorio";
        echo "<br>";
        $aleatorio = rand(1, 100)/10;
        echo "$aleatorio";
    ?>
</body>
</html>