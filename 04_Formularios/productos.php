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
    <?php
    $productos = [
        ["Nintendo Switch", 300],
        ["Playstation 5 Slim", 450],
        ["Playstation 5 Pro", 800],
        ["XBOX Series S", 300],
        ["XBOX Series X", 400]
    ];
    /*
    * Añadir tercera columna con stock, un número aleatorio entre 0 y 5
    * Mostrar todo en una tabla
    * Crear formulario donde se introduce nombre de producto y:
    *   Si hay stock, decimos que está disponible y su precio
    *   Si no, decimos que está agotado
    */
    for($i = 0; $i < count($productos); $i++){
        $productos[$i][2] = rand(0, 5);
    }
    ?>

    <table>
        <caption>Me quiero morir</caption>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($productos as $producto){
                list($nombre, $precio, $stock) = $producto; ?>
                <tr>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $precio ?></td>
                    <td><?php echo $stock ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <br><br>
    <form action="" method="post">
        <label for="prod">El odio me nutre</label>
        <input type="text" name="prod" id="prod" placeholder="qué?">
        <input type="submit" value="Dale">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $prod = $_POST["prod"]; 
        $prod_names = array_column($productos, 0);
        $i = 0;
        while(($i < count($prod_names)) && ($prod_names[$i] != $prod))
            $i++;
        if($i < count($prod_names)){ ?>
            <p>Disponible a <?php echo $productos[$i][1] . " €" ?></p>
        <?php }
        else echo "No disponible";
    }
    ?>
</body>
</html>