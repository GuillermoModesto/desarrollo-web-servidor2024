<?php
function validar ($validar, $tipo1, $tipo2) {
    switch ($tipo1) {

        /* ------ PRODUCTO ------ */
        case "producto":
            switch ($tipo2) {
                /* ------ NOMBRE ------ */
                case "nombre":
                    if ($validar == "")
                        return "El nombre del producto es obligatorio.";
                    if (strlen($validar) > 50)
                        return "El nombre del producto no puede tener mas de 50 caracteres.";
                    return true;
                    break;
                /* ------ PRECIO ------ */
                case "precio":
                    if ($validar == "")
                        return "El precio del producto es obligatorio.";
                    if (!is_numeric($validar))
                        return "EL precio debe ser un número";
                    return true;
                    break;
                /* ------ STOCK ------ */
                case "stock":
                    if (!is_numeric($validar))
                        return "EL stock debe ser un número";
                    return true;
                    break;
                /* ------ DESCRIPCION ------ */
                case "descripcion":
                    return true;
                    break;
            }

        /* ------ CATEGORÍA ------ */
        case "categoria":
            switch ($tipo2) {
                /* ------ CATEGORIA ------ */
                case "categoria":
                    break;
                /* ------ DESCRIPCION ------ */
                case "descripcion";
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