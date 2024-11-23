<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    require("../05_Funciones/PEGI.php");
    ?>
</head>
<body>
    <!--
    Workflow de Alejandra:
        Primero, guardar los elementos del POST en variables auxialiares
        Segundo, hacer todas las comprobaciones pertinentes
        Tercero, si todas las comprobaciones son correctas, se crean las variables "reales" en base a las auxiliares
        Cuarto, hago las operaciones que tenga que hacer dentro de la condicion isset(...) de las variables "reales"
    -->

    <!--
    FILTER_VALIDATE -> con un filtro adecuado (FILTER_VALIDATE_BOOL, FILTER_VALIDATE_EMAIL, FILTER_VALIDATE_INT...)
        - si es true, devuelve el valor original
        - si es false, devuelve false
    -->
    <?php
    /**
     * PEGIs = 3, 7, 12, 16, 18
     */
    ?>

    <form action="" method="post">
        <label for="pegi">PEGI</label>
        <input type="text" name="numero" id="pegi" placeholder="my assi">
        <input type="hidden" name="accion" value="pegi">
        <input type="submit" value="Dale">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["accion"] == "pegi") {
        $tmp_pegi = $_POST["numero"];
        /*
        if (comprobarPEGI($tmp_pegi)) {
            $pegi = $tmp_pegi;
        }
        */
        if ($tmp_pegi != "") {
            if (is_numeric($tmp_pegi)) {
                if (filter_var($tmp_pegi, FILTER_VALIDATE_INT) !== FALSE) { // EXACTAMENTE OPUESTO (PORQUE SI NO, EL 0 PASARÍA COMO FALSE)
                    if ($tmp_pegi >= 0) {
                        if ($tmp_pegi == 3 || $tmp_pegi == 7 || $tmp_pegi == 13 || $tmp_pegi == 16 || $tmp_pegi == 18) {
                            $pegi = $tmp_pegi;
                        } else {
                            echo "<p>Ese PEGI no existe.</p>";
                        }
                    } else {
                        echo "<p>PEGI no puede ser negativo.</p>";
                    }
                } else {
                    echo "<p>PEGI debe ser un número entero.</p>";
                }
            } else {
                echo "<p>PEGI debe ser un número.</p>";
            }
        } else {
            echo "<p>Introduce un valor.</p>";
        }
        
        if (isset($pegi)) {
            echo "<p>Me alegro por ti</p>";
        }
    }
    ?>
</body>
</html>