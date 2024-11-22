<?php
function validar ($validar, $tipo) {
    switch ($tipo) {
        case "usuario":
            if ($validar == "")
                return "El usuario es obligatorio";

            $patron = "/^[a-zA-Z0-9_]{4,12}$/";
            if (!preg_match($patron, $validar))
                return "El usuario debe tener entre 4 y 12 caracteres y puede contener letras, números, y barrabaja";

            return true;

        case "nombre":
            if ($validar == "")
                return "El nombre es obligatorio";

            if (strlen($validar) < 2 || strlen($validar) > 30)
                return "El nombre debe tener entre 2 y 30 caracteres";

            $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]$/";
            if (!preg_match($patron, $validar))
                return "El nombre solo puede tener letras y espacios en blanco";

            return true;

        case "apellidos":
            if ($validar == "")
                return "El apellido es obligatorio";

            if (strlen($validar) < 2 || strlen($validar) > 30)
                return "El apellido debe tener entre 2 y 30 caracteres";

            $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]$/";
            if (!preg_match($patron, $validar))
                return "El apellido solo puede tener letras y espacios en blanco";

            return true;

        case "fnacimiento":
            if ($validar == "")
                return "La fecha es obligatoria";

            $patron = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
            if (!preg_match($patron, $validar))
                return "Formato de fecha erroneo";

            $fecha_actual = date("Y-m-d");
            list($anho_actual, $mes_actual, $dia_actual) = explode("-", $fecha_actual);

            
/*
            if ()
                return "Edad imposible";
*/
            return true;

    }
}
?>