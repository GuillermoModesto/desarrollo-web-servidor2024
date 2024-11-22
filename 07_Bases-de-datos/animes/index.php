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
        img {
            width: 7vw;
        }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require("./conexion.php");
    ?>
</head>
<body>
    <a href="./nuevo_anime.php">Nuevo anime</a>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_anime = $_POST["id_anime"];
            $sql = "DELETE FROM animes WHERE id_anime = '$id_anime'";
            $_conexion -> query($sql);
        }
        $sql = "SELECT * FROM animes";
        $resultado = $_conexion -> query($sql);
    ?>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Estudio</th>
                <th>Año</th>
                <th>Número de temporadas</th>
                <th>Imagen</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($fila = $resultado -> fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila["titulo"] ?></td>
                        <td><?php echo $fila["nombre_estudio"] ?></td>
                        <td><?php echo $fila["anno_estreno"] ?></td>
                        <td><?php echo $fila["num_temporadas"] ?></td>
                        <td><img src="<?php echo $fila["imagen"] ?>" alt="Imagen del anime"></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_anime" value="<?php echo $fila["id_anime"] ?>">
                                <input type="submit" value="Borrar">
                            </form>
                        </td>
                        <td><a href="editar_anime.php?id_anime=<?php echo $fila["id_anime"] ?>">Editar</a></td>
                    </tr>
                <?php }
            ?>
        </tbody>
    </table>
</body>
</html>