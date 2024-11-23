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
<!-- Crear un formulario que reciba dos números, base y exponente. Se mostrará el resultado de elevar la base al exponente -->
 <form action="" method="post">
    <p>Base</p>
    <input type="text" name="base">
    <p>Exponente</p>
    <input type="text" name="exponente">
    <br><br>
    <input type="submit" value="Calcular">
 </form>

 <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $base = (int)$_POST["base"];
        $exponente = (int)$_POST["exponente"];
        //$potencia = $base ** $exponente;
        $potencia = 1;
        for($i = 0; $i < $exponente; $i++){
            $potencia *= $base;
        }
        echo "<p>" . ($base**$exponente) . "</p>"; //concatenar cositas nazis
    }
?>
</body>
</html>