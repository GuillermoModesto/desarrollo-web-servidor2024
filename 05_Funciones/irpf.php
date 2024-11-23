<?php
function comprobarIRPF ($renta) {
    if ($renta == "")
        return "<p>El campo no puede estar en blanco.</p>";

    if (!is_numeric($renta))
        return "<p>El campo debe ser un número.</p>";

    if ($renta <= 0)
        return "<p>La renta debe ser un valor positivo.</p>";
        
    return true;
}
?>