<!-- Código para conectar con la base de datos -->
<?php
    $_servidor = "localhost"; // ó "127.0.0.1 (loopback, tu mismo ordenador)
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "consolas_bd";

    //Tenemos dos opciones para crear la conexión: Mysqli (más simple) ó PDO (más completa)

    $_conexion = new Mysqli($_servidor, $_usuario, $_contrasena, $_base_de_datos)
        or die ("Error de conexión");

?>