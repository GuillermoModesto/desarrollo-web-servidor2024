<?php
function comprobarEdad($nombre, $edad) {
    if ($nombre != "" && $edad != "") {
        echo "<p>$nombre tiene $edad años</p>";
        return true;
    }
    echo "<p>Tus padres no te quieren.</p>";
    return false;
}
?>