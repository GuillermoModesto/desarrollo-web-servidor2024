<?php
function comprobarIVA ($precio, $iva) {
    if ($precio != "" && $iva != "")
        return true;
    echo "<p>Tienes cromosomas extra.</p>";
    return false;
}
?>