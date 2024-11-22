<?php
function comprobarPEGI ($pegi) {
    if ($pegi == "") {
        echo "<p>Introduce un valor</p>";
        return false;
    }

    if (!is_numeric($pegi)) {
        echo "<p>PEGI debe ser un número.</p>";
        return false;
    }

    if (filter_var($tmp_pegi, FILTER_VALIDATE_INT) === FALSE) {
        echo "<p>PEGI debe ser un número entero.</p>";
        return false;
    }

    if ($pegi >= 0) {
        echo "<p>PEGI no puede ser negativo.</p>";
        return false;
    }

    if ($tmp_pegi != 3 && $tmp_pegi != 7 && $tmp_pegi != 13 && $tmp_pegi != 16 && $tmp_pegi != 18) {
        echo "<p>Ese PEGI no existe.</p>";
        return false;
    }

    return true;
    
}
?>