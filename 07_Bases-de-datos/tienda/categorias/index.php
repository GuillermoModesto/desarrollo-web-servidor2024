<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        require('../util/conexion.php');
    ?>
<body>
    <div class="container">
        <h1>Categorias</h1>
        <a class="btn btn-secondary" href="./nueva_categoria.php">Nueva categoria</a>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $categoria = $_POST["categoria"];
                $sql = "DELETE FROM categorias WHERE categoria = '$categoria'";
                $_conexion -> query($sql);
            }
            $sql = "SELECT * FROM categorias";
            $resultado = $_conexion -> query($sql);
        ?>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Categoría</th>
                    <th>Descripcion</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $fila["categoria"] ?></td>
                            <td><?php echo $fila["descripcion"] ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="categoria" value="<?php echo $fila["categoria"] ?>">
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                </form>
                            </td>
                            <td><a class="btn btn-secondary" href="editar_categoria.php?categoria=<?php echo $fila["categoria"] ?>">Editar</a></td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>