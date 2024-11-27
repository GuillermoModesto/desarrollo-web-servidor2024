<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        require('../util/conexion.php');
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
    <style>
        img{
            width:25vh;
        }
    </style>
<body>
    <div class="container">
        <h1>Productos</h1>
        <a class="btn btn-secondary" href="./nuevo_producto.php">Nuevo producto</a>
        <a class="btn btn-secondary" href="../categorias/index.php">Categorias</a>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_producto = $_POST["id_producto"];
                $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
                $_conexion -> query($sql);
            }
            $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql);
        ?>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $fila["nombre"] ?></td>
                            <td><?php echo $fila["precio"] ?></td>
                            <td><?php echo $fila["categoria"] ?></td>
                            <td><?php echo $fila["stock"] ?></td>
                            <td><img src="<?php echo $fila["imagen"] ?>" alt="Imagen de producto"></td>
                            <td><?php echo $fila["descripcion"] ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $fila["id_producto"] ?>">
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                </form>
                            </td>
                            <td><a class="btn btn-secondary" href="editar_producto.php?id_producto=<?php echo $fila["id_producto"] ?>">Editar</a></td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>