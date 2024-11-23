<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- -----PARA QUE SALGAN MENSAJES DE ERROR CUANDO LAS COSAS NO ESTÁN BIEN----- -->
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>

    <!-- -----DEFINICIÓN DE CONSTANTE GLOBAL----- -->
    <?php
        define("NOMBRE_CONSTANTE", "valor");
    ?>

    <!-- -----LOS CÓDIGOS PHP TRATAN EL HTML COMO UN COMENTARIO, NO LO TIENE EN CUENTA; AUNQUE DOS ETIQUETAS PHP ESTÉN SEPARADAS, ES COMO SI ESTUBIERAN JUNTAS----- -->
    <?php
        // -----CREAR VARIABLE-----
        $variable = "valor";

        // -----var_dump() MUESTRA INFORMACIÓN SOBRE LA VARIABLE-----
        var_dump($variable);

        // -----echo CAGA EL TEXTO QUE LE METAS DENTRO, Y COMO ESTAMOS EN HTML PODEMOS CREAR ETIQUETAS DESDE EL CÓDIGO-----
        echo "<h1>$variable</h1>";
        // -----concatenar-----
        echo "<p>hola " . (1+2) . " que tal</p>";

        // -----date('parametros'), mirar https://www.php.net/manual/es/function.date.php-----
        $dia = date('j');

        // -----rand(x, y) => numeros aleatorios en un rango-----
        $random = rand(1, 4);
    ?>

    <!------------------------------------ ARRAYS ------------------------------------>
        <!-- -----LOS ARRAYS EN PHP SON HASHMAPS (PAREJAS KEY/VALUE)----- -->
        <!-- -----SI NO SE ESPECIFICA LA KEY, SE ASIGNA UN VALOR NUMÉRICO EN ORDEN (0, 1, 2, 3, ...)----- -->
    <?php
            // -----DECLARAR ARRAY-----

        // -----Especificando la key-----
        $frutas = array(
            "clave 1" => "Manzana",
            'clave 2' => 'Naranja',
            'clave 3' => "Cereza"
        );
        // -----Sin epecificar la key-----
        $frutas = [
            "Manzana",
            "Naranja",
            "Cereza",
        ];

            // -----RECORRER EL ARRAY-----

        // -----Recorrer con for (EL LENGTH EN PHP ES COUNT(ARRAY))-----
        for($i = 0; $i < count($frutas); $i++){
            echo "<li>$frutas[$i]</li>";
        }
        // -----Recorrer con foreach-----
        foreach($frutas as $fruta){
            echo "<li>$fruta</li>";
        }
        // -----Recorrer con foreach, mostrando key y value-----
        foreach($frutas as $clave => $fruta){
            echo "<li>$clave, $fruta</li>";
        }

        // -----MOSTRAR ARRAY RÁPIDO Y FEO-----
        print_r($frutas);

            // -----AÑADIR/ELIMINAR ELEMENTOS ARRAY-------

        // -----array_push($array, "valor1", "valor2", ...); Añadir elemento/s al fondo del array con las keys numéricas mas bajas que pueda-----
        array_push($frutas, "Mango", "Melocotón");
        // -----añadir por posición/key-----
        $frutas[] = "Sandía";
        $frutas[7] = "Uva";
        $frutas[] = "Melón";

        // -----unset($array["key"]); La posición sigue existiendo vacía-----
        unset($frutas[1]);

            // -----ARREGLAR KEYS VACÍAS DE ARRAY-----

        $frutas = array_values($frutas);

            // -----ORDENAR ELEMENTOS DEL ARRAY-----

        // Los que no son asociativos MACHACAN las keys al usarse
        // sort()
        // rsort(); -> reverse sort
        // asort(); -> asociative sort
        // arsort(); -> reverse asociative sort
        // ksort(); -> key sort
        // krsort(); -> reverse key sort

            // -----ORDENAR MATRICES-----

        $notas = [
            ["Paco", "Desarrollo web servidor"],
            ["Paco", "Desarrollo web cliente"],
            ["Manu", "Desarrollo web servidor"],
            ["Manu", "Desarrollo web cliente"]
        ];

        // -----$_columna_extraida = array_column($array, columna_a_extraer);-----
        $_nombre = array_column($notas, 0);
        $_notas = array_column($notas, 2);
        $_asignatura = array_column($notas, 1);

        // -----array_multisort($columna_extraida1_de_array, forma_de_ordenar, $columna_extraida2_de_array, forma_de_ordenar, ......., $array_original)-----
        array_multisort($_nombre, SORT_ASC, $_notas, SORT_ASC, $_asignatura, SORT_ASC, $notas);
    ?>

    <!------------------------------------ TABLAS Y ARRAYS ------------------------------------>
        <!-- Se pueden hacer con mil echo "....." pero es un coñazo, lo suyo es hacerlo en html y meter php solo cuando sea necesario -->
    <?php
        $personas = [
            "11223344F" => "José Alonso",
            "22331133G" => "Enya García",
            "44332211R" => "Fulgencio Hermenegildo"
        ];
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($personas as $dni => $nombre){ ?>
                    <tr>
                        <td><?php echo $dni ?></td>
                        <td><?php echo $nombre ?></td>
                    </tr>
                <?php }
            ?>
        </tbody>
    </table>

    <!------------------------------------ FORMULARIOS ------------------------------------>
    <!-- Mirar ejercicio "divisas.php" -->

    <!------------------------------------ FUNCIONES (SON MUY SENCILLAS) ------------------------------------->
    <!-- Parámetros: -->
    <?php
    function cosa (int|float $numero, string $palabra) : string|boolean {
        echo "caca";
    }
    ?>
    <!--
    Esa funcion recoge un int ó float, un string. Devuelve string ó boolean.
    -->

    <!------------------------------------ SELECT CHULOS ------------------------------------>
    <!--disabled -> no se puede seleccionar
        selected -> aparece por defecto
        hidden -> no se ve en el desplegable
    -->
     <select name="var" id="var">
        <option disabled selected hidden>--- ELIGE UNA ---</option>
        <option value="val1">Val1</option>
        <option value="val2">Val2</option>
        <option value="val3">Val3</option>
     </select>

     <!-- Por esto, debemos asegurarnos de que el valor asociado al select no es una cadena vacía (puede pasar si se deja el valor por defecto que está desactivado) -->
    
    <!--
     Se pueden cambiar los valores del select desde el navegador, por ello es buena práctica validar su valor también, mas alla de lo de arriba
     Esto se puede hacer facil teniendo todos los valores válidos en un array y usando la funcion in_array($needle, $heystack)
    -->

    <!------------------------------------ CONSTRUCCIÓN DE PATRONES ------------------------------------>
    <!-- RegExr
        [a-z]                  -> de la a 'a' a la 'z' de una en una
        [a-z]+                 -> de la a 'a' a la 'z' en grupos de repeticiones consecutivas
        [a-zA-Z]               -> de la 'a' a la 'z' y de la 'A' a la 'Z' compartiendo normas
        [a-z][A-Z]+            -> de la 'a' a la 'z' de una en una y de la 'A' a la 'Z' en grupos de repeticiones consecutivas
        [1-9]{3}               -> exactamente 3 numeros
        [1-9]*                 -> de 0 a infinita cantidad de numeros
        [1-9][a-zA-Z][1-9]{3}  -> ejemplo de números hexadecimales (1 número, una letra alfabética, 3 números)
        [1-9]{3}\9             -> trés números y un 9
        [1-9]{2,4}             -> números de 2 a 4 cifras
        [1-9]{2,}              -> números de 2 o mas cifras
        [1-9]{,3}              -> números de hasta 3 cifras
    -->

    <!------------------------------------ SUPER LIMPIEZA ------------------------------------>
    <?php
    function depurar (string $entrada) : string { //--------------- -> Solo acepto strings y devuelvo strings 
        $salida = htmlspecialchars($entrada); //------------------- -> Elimino la posibilidad de que me metan etiquetas por texto
        $salida = trim($salida); //------------------------------- -> Limpia lo de antes
        $salida = preg_replace ('/\s+/', ' ', $salida); //--------- -> Reemplaza muchos espacios por uno solo
    return $salida;
    }
    ?>
    <!-- ---------------------------------- FILTER_VAR ---------------------------------- -->
     <?php
        // Sanear string
        $str = "<h1>Hello World!</h1>";
        $newstr = filter_var($str, FILTER_SANITIZE_STRING); // En este caso, quita las etiquetas html

        // Validar int
        filter_var($int, FILTER_VALIDATE_INT) === false;

        // Validar IP
        filter_var($ip, FILTER_VALIDATE_IP) === false;

        // Sanear y validar un email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo("$email is a valid email address");
        }

        // Sanear y validar URL
        $url = filter_var($url, FILTER_SANITIZE_URL);

        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            echo("$url is a valid URL");
        }

        /*
INPUT_POST 	POST variables
INPUT_GET 	GET variables
INPUT_COOKIE 	COOKIE variables
INPUT_ENV 	ENV variables
INPUT_SERVER 	SERVER variables
FILTER_DEFAULT 	Do nothing, optionally strip/encode special characters. Equivalent to FILTER_UNSAFE_RAW
FILTER_FLAG_NONE 	Allows no flags
FILTER_FLAG_ALLOW_OCTAL 	Only for inputs that starts with a zero (0) as octal numbers. This only allows the succeeding digits to be 0-7
FILTER_FLAG_ALLOW_HEX 	Only for inputs that starts with 0x/0X as hexadecimal numbers. This only allows succeeding characters to be a-fA-F0-9
FILTER_FLAG_STRIP_LOW 	Strip characters with ASCII value lower than 32
FILTER_FLAG_STRIP_HIGH 	Strip characters with ASCII value greater than 127
FILTER_FLAG_ENCODE_LOW 	Encode characters with ASCII value lower than 32
FILTER_FLAG_ENCODE_HIGH 	Encode characters with ASCII value greater than 127
FILTER_FLAG_ENCODE_AMP 	Encode &
FILTER_FLAG_NO_ENCODE_QUOTES 	Do not encode ' and "
FILTER_FLAG_EMPTY_STRING_NULL 	Not in use
FILTER_FLAG_ALLOW_FRACTION 	Allows a period (.) as a fractional separator in numbers
FILTER_FLAG_ALLOW_THOUSAND 	Allows a comma (,) as a thousands separator in numbers
FILTER_FLAG_ALLOW_SCIENTIFIC 	Allows an e or E for scientific notation in numbers
FILTER_FLAG_PATH_REQUIRED 	The URL must contain a path part
FILTER_FLAG_QUERY_REQUIRED 	The URL must contain a query string
FILTER_FLAG_IPV4 	Allows the IP address to be in IPv4 format
FILTER_FLAG_IPV6 	Allows the IP address to be in IPv6 format
FILTER_FLAG_NO_RES_RANGE 	Fails validation for the reserved IPv4 ranges: 0.0.0.0/8, 169.254.0.0/16, 127.0.0.0/8 and 240.0.0.0/4, and for the reserved IPv6 ranges: ::1/128, ::/128, ::ffff:0:0/96 and fe80::/10
FILTER_FLAG_NO_PRIV_RANGE 	Fails validation for the private IPv4 ranges: 10.0.0.0/8, 172.16.0.0/12 and 192.168.0.0/16, and for the IPv6 addresses starting with FD or FC
FILTER_FLAG_EMAIL_UNICODE 	Allows the local part of the email address to contain Unicode characters
FILTER_REQUIRE_SCALAR 	The value must be a scalar
FILTER_REQUIRE_ARRAY 	The value must be an array
FILTER_FORCE_ARRAY 	Treats a scalar value as array with the scalar value as only element
FILTER_NULL_ON_FAILURE 	Return NULL on failure for unrecognized boolean values
FILTER_VALIDATE_BOOLEAN 	Validates a boolean
FILTER_VALIDATE_EMAIL 	Validates value as a valid e-mail address
FILTER_VALIDATE_FLOAT 	Validates value as float
FILTER_VALIDATE_INT 	Validates value as integer
FILTER_VALIDATE_IP 	Validates value as IP address
FILTER_VALIDATE_MAC 	Validates value as MAC address
FILTER_VALIDATE_REGEXP 	Validates value against a regular expression
FILTER_VALIDATE_URL 	Validates value as URL
FILTER_SANITIZE_ADD_SLASHES 	Added as a replacement for FILTER_SANITIZE_MAGIC_QUOTES
FILTER_SANITIZE_EMAIL 	Removes all illegal characters from an e-mail address
FILTER_SANITIZE_ENCODED 	Removes/Encodes special characters
FILTER_SANITIZE_MAGIC_QUOTES 	Apply addslashes(). Deprecated in PHP 7.3.0 and removed in PHP 8.0.0
FILTER_SANITIZE_NUMBER_FLOAT 	Remove all characters, except digits, +- signs, and optionally .,eE
FILTER_SANITIZE_NUMBER_INT 	Removes all characters except digits and + - signs
FILTER_SANITIZE_SPECIAL_CHARS 	Removes special characters
FILTER_SANITIZE_STRING 	Removes tags/special characters from a string. Deprecated in PHP 8.1.0
FILTER_SANITIZE_STRIPPED 	Alias of FILTER_SANITIZE_STRING. Deprecated in PHP 8.1.0
FILTER_SANITIZE_URL 	Removes all illegal character from a URL
FILTER_UNSAFE_RAW 	Do nothing, optionally strip/encode special characters
FILTER_CALLBACK 	Call a user-defined function to filter data
        */
     ?>
    </head>
<body>
    
</body>
</html>