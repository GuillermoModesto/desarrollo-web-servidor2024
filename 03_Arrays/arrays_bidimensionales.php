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
    $videojuegos = [
        ["FIFA 2077", "Deporte", 70],
        ["Dark Souls", "Soulslike", 50],
        ["Hollow Night", "Plataformas", 30],
        ["Miedo e ira", "La vida misma", "Gratis y obligatorio"]
    ];

    foreach($videojuegos as $videojuego){
        list($x, $y, $z) = $videojuego;
        echo "<p>$x, $y, $z</p>";
    }

    #Para ordenar (SORT_ASC, SORT_DESC...)
    $_titulo = array_column($videojuegos, 0);
    array_multisort($_titulo, SORT_DESC, $videojuegos);

    ?>

    <table>
        <thead>
            <caption><b>Juegos</b></caption>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            #Añadir elemento nuevo con un push
            $nuevo_videojuego = ["Throne and Liberty", "MMO", 0];
            array_push($videojuegos, $nuevo_videojuego);

            foreach ($videojuegos as $videojuego) {
                list($nombre, $categoria, $precio) = $videojuego; ?>
                <tr>
                    <td><?php echo "$nombre" ?> </td>
                    <td><?php echo "$categoria" ?> </td>
                    <td><?php echo "$precio" ?> </td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <h2>Ejercicio de rapideo 1</h2>
    <p>Ordenar por precio de mas barato a mas caro</p>
    <?php
    $_precio = array_column($videojuegos, 2);
    array_multisort($_precio, SORT_ASC, $videojuegos);
    ?>
    <table>
        <thead>
            <caption><b>Juegos</b></caption>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($videojuegos as $videojuego) {
                list($nombre, $categoria, $precio) = $videojuego; ?>
                <tr>
                    <td><?php echo "$nombre" ?> </td>
                    <td><?php echo "$categoria" ?> </td>
                    <td><?php echo "$precio" ?> </td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <h2>Ejercicio de rapideo 2</h2>
    <p>Ordenar por categoria alfabetico inverso</p>
    <?php
    $_categoria = array_column($videojuegos, 1);
    array_multisort($_categoria, SORT_DESC,$videojuegos);
    ?>
    <table>
        <thead>
            <caption><b>Juegos</b></caption>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($videojuegos as $videojuego) {
                list($nombre, $categoria, $precio) = $videojuego; ?>
                <tr>
                    <td><?php echo "$nombre" ?> </td>
                    <td><?php echo "$categoria" ?> </td>
                    <td><?php echo "$precio" ?> </td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <h2>Ejercicio de rapideo 3</h2>
    <p>Añadir columna que diga si es de pago o gratis</p>
    <?php
    array_push($videojuegos, ["Valorant", "FPS", 0]);
    array_push($videojuegos, ["League of Legends", "MOBA", 0]);
    for ($i = 0; $i < count($videojuegos); $i++){
        if ($videojuegos[$i][2] == 0)
            $videojuegos[$i][3] = "Gratuito";
        else if ($videojuegos[$i][2] > 0)
            $videojuegos[$i][3] = "De pago";
    }
    $_nombre = array_column($videojuegos, 0);
    $_categoria = array_column($videojuegos, 1);
    $_precio = array_column($videojuegos, 2);
    $_tipo = array_column($videojuegos, 3);
    array_multisort($_tipo, SORT_DESC, $_categoria, SORT_ASC, $_nombre, SORT_ASC, $videojuegos);
    ?>
    <table>
        <thead>
            <caption><b>Juegos</b></caption>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($videojuegos as $videojuego) {
                list($nombre, $categoria, $precio, $tipo) = $videojuego; ?>
                <tr>
                    <td><?php echo "$nombre" ?> </td>
                    <td><?php echo "$categoria" ?> </td>
                    <td><?php echo "$precio" ?> </td>
                    <td><?php echo "$tipo" ?> </td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</body>
</html>