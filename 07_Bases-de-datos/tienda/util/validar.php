<?php
function validar ($validar, $tipo1, $tipo2) {
    switch ($tipo1) {

        /* ------------------------ PRODUCTO ------------------------ */
        case "producto":
            switch ($tipo2) {
                /* ------ NOMBRE ------ */
                case "nombre":
                    if ($validar == "")
                        return "El nombre del producto es obligatorio.";

                    if (strlen($validar) <= 2)
                        return "El nombre del producto no puede tener menos de 2 caracteres.";

                    if (strlen($validar) > 50)
                        return "El nombre del producto no puede tener mas de 50 caracteres.";

                    $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚñÑ1234567890]+$/";
                    if (!preg_match($patron, $validar))
                        return "Formato inválido. Solo se admiten letras, números y espacios en blanco.";

                    return true;
                    break;
                /* ------ PRECIO ------ */
                case "precio":
                    if ($validar == "")
                        return "El precio del producto es obligatorio.";

                    if (!is_numeric($validar))
                        return "EL precio debe ser un número";

                    if ($validar < 0)
                        return "El precio debe ser positivo.";

                    $patron = "/^[0-9]{1,4}(\.[0-9]{1,2})?$/";
                    if (!preg_match($patron, $validar))
                        return "Solo se admiten valores numéricos entre 00.00 y 9999.99";

                    return true;
                    break;
                /* ------ STOCK ------ */
                case "stock":
                    if (!is_numeric($validar))
                        return "EL stock debe ser un número";

                    if ($validar < 0)
                        return "El stock debe ser positivo.";

                    if ($validar > 999)
                        return "El stock no puede ser superior a 999";

                    return true;
                    break;
                /* ------ DESCRIPCION ------ */
                case "descripcion":
                    if ($validar == "")
                        return "La descripción es obligatoria.";

                    if (strlen($validar) > 255)
                        return "La descripción no puede tener mas de 255 caracteres";

                    return true;
                    break;
            }
            break;

        /* ------------------------ CATEGORÍA ------------------------ */
        case "categoria":
            switch ($tipo2) {
                /* ------ CATEGORIA ------ */
                case "categoria":
                    if (strlen($validar) <= 2)
                        return "El nombre de la categoría no puede tener menos de 2 caracteres.";

                    if (strlen($validar) > 30)
                        return "El nombre de la categoría no puede tener mas de 30 caracteres.";

                    return true;
                    break;
                /* ------ DESCRIPCION ------ */
                case "descripcion";
                    if (strlen($validar) > 255)
                        return "La descripción no puede tener mas de 255 caracteres";

                    return true;
                    break;
            }
            break;

        /* ------------------------ USUARIO ------------------------ */
        case "usuario":
            switch ($tipo2) {
                /* ------ NOMBRE ------ */
                case "nombre":
                    if ($validar == "")
                        return "El nombre es obligatorio.";

                    if (strlen($validar) < 3)
                        return "El nombre debe tener mas de 3 caracteres.";  

                    if (strlen($validar) > 15)
                        return "El nombre debe tener menos de 15 caracteres.";  

                    $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ1234567890]+$/";
                    if (!preg_match($patron, $validar))
                        return "Formato inválido. Solo se admiten letras y números.";

                    return true;
                    break;
                /* ------ CONTRASEÑA ------ */
                case "contrasena":
                    if ($validar == "")
                        return "La contraseña es obligatoria.";

                    if (strlen($validar) < 8)
                        return "La contraseña debe tener mas de 8 caracteres.";  

                    if (strlen($validar) > 15)
                        return "La contraseña debe tener menos de 15 caracteres.";  

                    $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                    if (!preg_match($patron, $validar))
                        return "Formato inválido.";

                    return true;
                    break;
            }
    }
}

/* ------ CATEGORIA ------ */
function validar_categoria ($validar, $categorias) {
    if (!in_array($validar, $categorias))
        return "Elije una categoría de la lista.";
    return true;
}
?>