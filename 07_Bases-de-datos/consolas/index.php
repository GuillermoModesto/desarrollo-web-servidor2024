<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            background-color: #e8f2ff;
        }
        table, th, td {
            border: 1px solid black;
            margin: 5px;
            padding: 5px;
        }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require("./conexion.php");
    ?>
</head>
<body>
    <a href="./nueva_consola.php">Nueva consola</a>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_consola = $_POST["id_consola"];
            $sql = "DELETE FROM consolas WHERE id_consola = '$id_consola'";
            $_conexion -> query($sql);
        }

        $sql = "SELECT * FROM consolas";
        $resultado = $_conexion -> query($sql);
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fabricante</th>
                <th>Generacion</th>
                <th>Unidades vendidas</th>
                <th>Imagen</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($fila = $resultado -> fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila["nombre"] ?></td>
                        <td><?php echo $fila["fabricante"] ?></td>
                        <td><?php echo $fila["generacion"] ?></td>
                        <?php 
                            if ($fila["unidades_vendidas"] === null) {
                                echo "<td style='background-color: yellow; color:blue'>NO HAY DATOS</td>";
                            } else {
                                echo "<td>".$fila["unidades_vendidas"]."</td>";
                            }
                        ?></td>
                        <td><img src="<?php echo $fila["imagen"] ?>" alt="Imagen de la consola"></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_consola" value="<?php echo $fila["id_consola"] ?>">
                                <input type="submit" value="Borrar">
                            </form>
                        </td>
                    </tr>
                <?php }
            ?>
        </tbody>
    </table>
</body>
</html>