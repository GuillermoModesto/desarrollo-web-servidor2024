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
    #-Origen-Destino-Duración-Precio-
    $autobuses = [
        ["Málaga", "Ronda", 90, 10],
        ["Churriana", "Málaga", 20, 3],
        ["Málaga", "Granada", 90, 15],
        ["Torremolinos", "Málaga", 30, 3.5]
    ];
    /* 
    1º Añadir dos líneas de autobus
    2º Ordenar por origen, luego por duracion, 
    3º Mostrar las líneas en una tabla
    4º Insertar 3 buses mas
    5º Ordenar primero por origen, luego por destino, luego por precio.
    */

    print_r($autobuses);

    unset($autobuses[1]); #Esto borrará la posición 1 del array, dejandolo hueco. Lo suyo es hacer un multisort para que ese hueco no quede vacío y el resto mal ordenado.

    ?>
<!------------------------------------------------------------>
    <?php
    array_push($autobuses, ["Infierno", "Medac", 0, 7000]);
    array_push($autobuses, ["Silvermoon", "Ogrimar", 15, 4]);
    ?>
<!------------------------------------------------------------>
    <?php
    $_duracion = array_column($autobuses, 2);
    $_origen = array_column($autobuses, 0);
    #array_multisort($_origen, SORT_ASC, $_duracion, SORT_ASC, $_precio, SORT_ASC, $autobuses);
    ?>
<!------------------------------------------------------------>
    <table>
        <thead>
            <caption>Autobuses</caption>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Duracion</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($autobuses as $autobus){
                list($origen, $destino, $duracion, $precio) = $autobus; ?>
                <tr>
                    <td><?php echo "$origen" ?></td>
                    <td><?php echo "$destino" ?></td>
                    <td><?php echo "$duracion" ?></td>
                    <td><?php echo "$precio" ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
<!------------------------------------------------------------>
    <br><br>
    <?php
    array_push($autobuses, ["Málaga", "Barcelona", 840, 28]);
    array_push($autobuses, ["Málaga", "La Luna", 99999, 99999]);
    array_push($autobuses, ["Málaga", "Un lugar feliz", 9999999999999999999999999999999999999999999, 9999999999999999999999999999999999999999999]);
    ?>
<!------------------------------------------------------------>
    <?php
    $_destino = array_column($autobuses, 1);
    $_origen = array_column($autobuses, 0);
    array_multisort($_origen, SORT_ASC, $_destino, SORT_ASC, $autobuses);
    ?>

    <table>
        <thead>
            <caption>Autobuses</caption>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Duracion</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($autobuses as $autobus){
                list($origen, $destino, $duracion, $precio) = $autobus; ?>
                <tr>
                    <td><?php echo "$origen" ?></td>
                    <td><?php echo "$destino" ?></td>
                    <td><?php echo "$duracion" ?></td>
                    <td><?php echo "$precio" ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
<!------------------------------------------------------------>
    <h2>Añadir columna de forma dinámica</h2>
    <?php
    for($i = 0; $i < count($autobuses); $i++){
        if ($autobuses[$i][2] <= 30) 
            $autobuses[$i][4] = "Corta distancia";
        else if ($autobuses[$i][2] > 30 && $autobuses[$i][2] <= 120)
            $autobuses[$i][4] = "Media distancia";
        else if ($autobuses[$i][2] > 120)
            $autobuses[$i][4] = "Larga distancia";
    }
    print_r($autobuses);
    ?>

    <table>
        <thead>
            <caption>Autobuses</caption>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Duracion</th>
                <th>Precio</th>
                <th>Tipo viaje</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($autobuses as $autobus){
                list($origen, $destino, $duracion, $precio, $tipo) = $autobus; ?>
                <tr>
                    <td><?php echo "$origen" ?></td>
                    <td><?php echo "$destino" ?></td>
                    <td><?php echo "$duracion" ?></td>
                    <td><?php echo "$precio" ?></td>
                    <td><?php echo "$tipo" ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</body>
</html>