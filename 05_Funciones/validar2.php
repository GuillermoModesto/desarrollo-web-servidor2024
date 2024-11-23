<?php
function validar ($validar, $tipo) {
    switch ($tipo) {
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "dni":
            if ($validar == "")
                return "El DNI es obligatorio";

            $len = strlen($validar);
            if ($len != 9)
                return "El DNI debe contener 9 caracteres en total, no $len";

            $patron = "/^[0-9]{8}[a-zA-Z]$/";
            if (!preg_match($patron, $validar))
                return "El formato de DNI no es el correcto, debe contener 8 letras y un número";

            $num_dni = (int)(substr($validar, 0, 8));
            $letra_dni = substr($validar, 8);

            $letra = match ($num_dni % 23) {
                0 => "T", 1 => "R", 2 => "W", 3 => "A", 4 => "G", 5 => "M",
                6 => "Y",7 => "F", 8 => "P", 9 => "D", 10 => "X", 11 => "B",
                12 => "N", 13 => "J", 14 => "Z", 15 => "S", 16 => "Q", 17 => "V",
                18 => "H", 19 => "L", 20 => "C", 21 => "K", 22 => "E"
            };

            if (strtoupper($letra_dni) != $letra)
                return "Ese DNI no existe, la letra no coincide con la que debería ser";

            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "sexo":
            if ($validar == "")
                return "Elige un sexo de los únicos dos disponibles válidos que existen.";

            $sexos_validos = ["masculino", "femenino"];
            if (!in_array($validar, $sexos_validos))
                return "Hola mi hacker favorito";

            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/    
        case "nombre":
            if ($validar == "")
                return "El nombre es obligatorio";

            if (strlen($validar) < 2 || strlen($validar) > 30)
                return "El nombre debe tener entre 2 y 30 caracteres";

            $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚñÑ]{2,30}$/";
            if (!preg_match($patron, $validar))
                return "El nombre solo puede tener letras y espacios en blanco";
    
            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "apellido":
            if ($validar == "")
                return "El apellido es obligatorio";
    
            if (strlen($validar) < 2 || strlen($validar) > 30)
                return "El apellido debe tener entre 2 y 30 caracteres";
    
            $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚñÑ]{2,30}$/";
            if (!preg_match($patron, $validar))
                return "El apellido solo puede tener letras y espacios en blanco";
    
            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "fnacimiento":
            if ($validar == "")
                return "La fecha es obligatoria";
    
            $patron = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
            if (!preg_match($patron, $validar))
                return "Formato de fecha erroneo";
    
            $fecha_actual = date("Y-m-d");
            list($anho_actual, $mes_actual, $dia_actual) = explode("-", $fecha_actual);

            $anho_limite = $anho_actual - 120;
            list($anho_validar, $mes_validar, $dia_validar) = explode("-", $validar);

            if ((($anho_validar < $anho_limite) || ($anho_validar > $anho_actual)) ||
                 (($anho_validar == $anho_limite) && ($mes_validar < $mes_actual)) ||
                 (($anho_validar == $anho_limite) && ($mes_validar == $mes_actual) && ($dia_validar < $dia_actual)))
                return "Has alcanzado el límite de edad soportado";

            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "correo":
            
            if ($validar == "")
                return "El correo es obligatorio";

            $patron = "/^[a-zA-Z0-9\_]*@[a-z]*.[a-z]*$/";
            if (!preg_match($patron, $validar))
                return "Formato de correo erroneo";

            $malsonantes = ["cabron", "imbecil", "mierda"];
            foreach ($malsonantes as $malsonante) {
                if (str_contains($malsonante, $validar))
                    return "El correo no puede contener palabras malsonantes";
            }

            return true;

    }
}
?>