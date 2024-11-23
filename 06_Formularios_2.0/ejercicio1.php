<!DOCTYPE html>
<html lang="es">
<head>
    <!-- GUILLERMO ANTIÑOLO RUEDA -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>
        .error{
           color: red;
           background: yellow; 
           width: 30vw;
        }
        ul {
            list-style: none;
        }
    </style>
</head>
<body>

<?php
function validar ($validar, $tipo) {
    switch ($tipo) {
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "nombre":
            if ($validar == "")
                return "El nombre es obligatorio";

            if (strlen($validar) < 3 || strlen($validar) > 30)
                return "El nombre debe tener entre 3 y 30 caracteres";

            $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚñÑ]{2,30}$/";
            if (!preg_match($patron, $validar))
                return "El nombre solo puede tener letras y espacios en blanco";
    
            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "peso":
            if ($validar == "")
                return "El peso es obligatorio";

            $validar = (float)$validar;
            $menor = 0.1;
            $mayor = 999.99;
            if ($validar < 0.1) 
                return "El peso no es válido. Debe ser mayor a $menor";
            if ($validar > 999.99) 
                return "El peso no es válido. Debe ser menor a $mayor";

            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/    
        case "genero":
            if ($validar == "Desconocido")
                return true;

            $sexos_validos = ["hembra", "macho"];
            if (!in_array($validar, $sexos_validos))
                return "Genero invalido";

            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "tipo":
            if ($validar == "")
                return "El tipo es obligatorio";

            $tipos_validos = ["agua", "fuego", "volador", "planta", "electrico"];
            if (!in_array($validar, $tipos_validos))
                return "Hola mi hacker favorito";

            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "fcaptura":
            if ($validar == "")
                return "La fecha es obligatoria";
    
            $patron = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
            if (!preg_match($patron, $validar))
                return "Formato de fecha erroneo";
    
            $fecha_actual = date("Y-m-d");
            list($anho_actual, $mes_actual, $dia_actual) = explode("-", $fecha_actual);

            $anho_limite = $anho_actual - 30;
            list($anho_validar, $mes_validar, $dia_validar) = explode("-", $validar);

            if ((($anho_validar < $anho_limite) || ($anho_validar > $anho_actual)) ||
                 (($anho_validar == $anho_limite) && ($mes_validar < $mes_actual)) ||
                 (($anho_validar == $anho_limite) && ($mes_validar == $mes_actual) && ($dia_validar < $dia_actual)))
                return "Has alcanzado el límite de fecha de captura de 30 años";

            return true;
        /*----------------------------------------------------------------------------------------------------------------------------*/
        case "descripcion":
            if (strlen($validar) > 30)
                return "La descripcion debe tener menos de 30 caracteres";

            $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚñÑ]{0,200}$/";
            if (!preg_match($patron, $validar))
                return "El formato no es válido.";
    
            return true;
    }
}
function depurar (string $entrada) : string {
    $salida = htmlspecialchars($entrada);
    $salida = trim($salida);
    $salida = preg_replace ('/\s+/', ' ', $salida);
    return $salida;
}
?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_nombre = $_POST["nombre"];
        
        $val_nombre = validar(depurar($tmp_nombre), "nombre");

        $tmp_peso = $_POST["peso"];
        $val_peso = validar(depurar($tmp_peso), "peso");

        if (isset($_POST["genero"]))
            $tmp_genero = $_POST["genero"];
        else 
            $tmp_genero = "Desconocido";
        $val_genero = validar(depurar($tmp_genero), "genero");

        if (isset($_POST["tipo"]))
            $tmp_tipo = $_POST["tipo"];
        else 
            $tmp_tipo = "";
        $val_tipo = validar(depurar($tmp_tipo), "tipo");

        $tmp_fcaptura = $_POST["fcaptura"];
        $val_fcaptura = validar(depurar($tmp_fcaptura), "fcaptura");

        $tmp_descripcion = $_POST["descripcion"];
        $val_descripcion = validar(depurar($tmp_descripcion), "descripcion");

        $arr_error = [];
        if ($val_nombre === true)
            $nombre = $tmp_nombre;
        else
            array_push($arr_error, $val_nombre);

        if ($val_peso === true)
            $peso = $tmp_peso;
        else 
            array_push($arr_error, $val_peso);

        if ($val_genero === true)
            $genero = $tmp_genero;
        else 
            array_push($arr_error, $val_genero);

        if ($val_tipo === true)
            $tipo = $tmp_tipo;
        else 
            array_push($arr_error, $val_tipo);  

        if ($val_fcaptura === true)
            $fcaptura = $tmp_fcaptura;
        else 
            array_push($arr_error, $val_fcaptura);

        if ($val_descripcion === true)
            $descripcion = $tmp_descripcion;
        else 
            array_push($arr_error, $val_descripcion);

    }
    ?>

    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Pepe Luis">
        <?php if ($val_nombre !== true) echo "<div class='error'>$val_nombre</div>"; ?><br><br>

        <label for="peso">Peso</label>
        <input type="text" name="peso" id="peso" placeholder="kg">
        <?php if ($val_peso !== true) echo "<div class='error'>$val_peso</div>"; ?><br>

        <p>Genero:</p>
        <ul>
            <li>
                <input type="radio" name="genero" id="sexo1" value="hembra">
                <label for="sexo1">Hembra</label>
            </li>
            <li>
                <input type="radio" name="genero" id="sexo2" value="macho">
                <label for="sexo2">Macho</label>
            </li>
        </ul>
        <?php if ($val_genero !== true) echo "<div class='error'>$val_genero</div>"; ?>

        <select name="tipo" id="var">
            <option disabled selected hidden>--- TIPO ---</option>
            <option value="agua">Agua</option>
            <option value="fuego">Fuego</option>
            <option value="volador">Volador</option>
            <option value="planta">Planta</option>
            <option value="electrico">Eléctrico</option>
        </select>
        <?php if ($val_tipo !== true) echo "<div class='error'>$val_tipo</div>"; ?><br><br>

        <label for="fcaptura">Fecha de captura</label>
        <input type="date" name="fcaptura" id="fcaptura">
        <?php if ($val_fcaptura !== true) echo "<div class='error'>$val_fcaptura</div>"; ?><br><br>

        <label for="descripcion">Descripcion</label>
        <input type="textarea" name="descripcion" id="descripcion">
        <?php if ($val_descripcion !== true) echo "<div class='error'>$val_descripcion</div>"; ?><br><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
        if (count($arr_error) == 0) {
            echo "<p>¿Es la siguiente información correcta?</p>";
            echo "<ul>";
            echo "<li>Nombre:$nombre</li>";
            echo "<li>Peso:$peso</li>";
            echo "<li>Genero:$genero</li>";
            echo "<li>Tipo:$tipo</li>";
            echo "<li>Fecha captura:$fcaptura</li>";
            echo "<li>Descripcion:$descripcion</li>";
            echo "</ul>";
        }
        ?>
</body>
</html>