<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <link href="../estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    //con pareja clave valor
    $frutas = array(
        "clave 1" => "Manzana",
        'clave 2' => 'Naranja',
        'clave 3' => "Cereza"
    );

    //echo $frutas["clave 4"];
    //echo "<br>";

    //sin epecificar clave, por defecto se le asigna la numérica mas pequeña que tenga
    $frutas = [
        "Manzana",
        "Naranja",
        "Cereza",
    ];

    echo "<h2>CON FOR</h2>";
    echo "<ul>";
    for($i = 0; $i < count($frutas); $i++){
        echo "<li>$frutas[$i]</li>";
    }
    echo "</ul>";

    echo "<h2>CON FOREACH</h2>";
    echo "<ul>";
    foreach($frutas as $fruta){
        echo "<li>$fruta</li>";
    }
    echo "</ul>";

    echo "<h2>CON FOREACH MOSTRANDO CLAVES TAMBIÉN</h2>";
    echo "<ul>";
    foreach($frutas as $clave => $fruta){
        echo "<li>$clave, $fruta</li>";
    }
    echo "</ul>";

    array_push($frutas, "Mango", "Melocotón");
    $frutas[] = "Sandía";
    $frutas[7] = "Uva";
    $frutas[] = "Melón";

    //echo $frutas[1];
    $frutas = array_values($frutas);

    unset($frutas[1]);

    //print_r($frutas);

    /*
        CREAR UN ARRAY CON UNA LISTA DE PERSONAS DONDE LA CLAVE SEA
        EL DNI Y EL VALOR EL NOMBRE

        QUE HAYA MINIMO 3 PERSONAS

        MOSTRAR EL ARRAY COMPLETO CON PRINT_R Y A ALGUNA PERSONA INDIVIDUAL

        AÑADIR ELEMENTOS CON Y SIN CLAVE

        BORRAR ALGUN ELEMENTO

        PROBAR A RESETAR LAS CLAVES
    */

    $personas = [
        "11223344F" => "José Alonso",
        "22331133G" => "Enya García",
        "44332211R" => "Fulgencio Hermenegildo"
    ];

    $personas["99112233G"] = "Cristiano 'El bicho' Ronaldo";
    array_push($personas, "Messi 'La pulga'"); //haciéndolo así, se le asignará la clave numérica mas pequeña que encuentre, que es 0 en este caso"

    unset($personas[0]);

    echo "<h2>MOSTRAR ARRAY CON print_r</h2>";
    print_r($personas);

    echo "<h2>MOSTRAR CON FOREACH USANDO CALVE Y VALOR</h2>";
    echo "<ul>";
    foreach($personas as $dni => $nombre){
        echo "<li>$dni -> $nombre</li>";
    }
    echo "</ul>";

    //echo "<p>" . $personas["22331133G"] . "</p>";

    echo "<h2>SON IGUALES LOS DOS ARRAYS?</h2>";
    echo "<p>Deben ser iguales los pares clave valor</p>";

    $frutas2 = [
        "naranja",
        "manzana",
        "cereza"
    ];
    print_r($frutas2);
    echo "<br>";

    $frutas3 = [
        "naranja",
        "manzana",
        "cereza"
    ];
    print_r($frutas3);
    echo "<br>";

    $frutas4 = [
        "cereza",
        "manzana",
        "naranja"
    ];
    print_r($frutas4);
    echo "<br>";

    echo "<p>El operador === pregunta si es identico, mismo valor y tipo.</p>";
    $numeros = [1, 2, 3, 4];
    print_r($numeros);
    echo "<br>";

    $numeros2 = ["1", "2", "3", "4"];
    print_r($numeros2);
    echo "<br>";

    if ($numeros === $numeros2) echo "<p>Son iguales</p>";
    else echo "<p>No son identicos (uno son caracteres, otro ints).</p>";

    if($frutas2 == $frutas3) echo "<p>1º y 2º Son iguales</p>";
    else echo "<p>No son iguales</p>";

    if($frutas2 == $frutas4) echo "<p>Son iguales</p>";
    else echo "<p>1º y 3º No son iguales</p>";

    echo "<h2>ORDENAR ARRAYS</h2>";
    echo "<p>Los que no son asociativos MACHACAN las keys al usarse</p>";
    echo "<p>sort();</p>";
    echo "<p>rsort(); -> reverse sort</p>";
    echo "<p>asort(); -> asociative sort</p>";
    echo "<p>arsort(); -> reverse asociative sort</p>";
    echo "<p>ksort(); -> key sort</p>";
    echo "<p>krsort(); -> reverse key sort</p>";

    $profas = [
        "Servidor" => "Alejandra",
        "Cliente" => "Jaime",
        "Interfaces" => "Jose", 
        "Despliegues" => "Alejandro", 
        "Empresa" => "Gloria",
        "Ingles" => "Virginia"
    ]

    ?>

    <h2>MOSTRAR CON FOREACH EN TABLA, CLAVE Y VALOR</h2>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($personas as $dni => $nombre){
                    echo "<tr>";
                    echo "<td>$dni</td>";
                    echo "<td>$nombre</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h2>MOSTRAR CON FOREACH EN TABLA, CLAVE Y VALOR, OTRA MANERA ("MEJOR")</h2>
    <p>El código de php busca en todas sus etiquetas como si no tubiera nada en medio, no tiene por qué estar todo en la misma etiqueta (HTML serían como comentarios)</p>
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
                        <td><?php echo $dni;?></td>
                        <td><?php echo $nombre;?></td>
                    </tr>
                <?php }
            ?>
        </tbody>
    </table>

    <h2>Mostrar en una tabla profesores y sus asignaturas, otra ordenado alfabeticamente por asignatura y otra al revés por profesor</h2>
    <?php print_r($profas); ?>
    <h3>Original</h3>
    <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor/a</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($profas as $asig => $profe) { ?>
                    <tr>
                        <td><?php echo $asig; ?></td>
                        <td><?php echo $profe; ?></td>
                    </tr>
                <?php }
            ?>
        </tbody>
    </table>
    <h3>Por keys</h3>
    <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor/a</th>
            </tr>
        </thead>
        <tbody>
            <?php
                ksort($profas);
                foreach ($profas as $asig => $profe) { ?>
                    <tr>
                        <td><?php echo $asig; ?></td>
                        <td><?php echo $profe; ?></td>
                    </tr>
                <?php }
            ?>
        </tbody>
    </table>
    <h3>Por keys al reves</h3>
    <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor/a</th>
            </tr>
        </thead>
        <tbody>
            <?php
                arsort($profas);
                foreach ($profas as $asig => $profe) { ?>
                    <tr>
                        <td><?php echo $asig; ?></td>
                        <td><?php echo $profe; ?></td>
                    </tr>
                <?php }
            ?>
        </tbody>
    </table>

    <h2>EJERCICIO DE CLASE</h2>
    <!--
        Guillermo => 3
        Daiana => 5
        Angel => 8
        Ayoub => 7
        Mateo => 9
        Joaquín => 4

        Mostrar nombre, nota y esto:
        menor a 5 suspenso
        5 - 7 aprobado
        7 - 9 notable
        10 sobresaliente

        si está aprobado en verde, si no en rojo
    -->
    <table>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sacrificios = [
                    "Guillermo" => 3,
                    "Daiana" => 5,
                    "Angel" => 8,
                    "Ayoub" => 7,
                    "Mateo" => 9,
                    "Joaquín" => 4
                ];
                foreach($sacrificios as $nombre => $nota) { 
                    if ($nota < 5){ ?> <tr class="ko"> <?php } ?>
                        <td><?php echo $nombre ?></td>
                        <td><?php echo $nota ?></td>
                        <?php 
                        if ($nota < 5){ ?> 
                            <td class="ko">Suspenso</td> 
                        <?php }
                        elseif ($nota < 7){ ?> 
                            <td class="ok">Aprobado</td>
                        <?php }
                        elseif ($nota < 9){ ?>
                            <td class="ok">Notable</td>
                        <?php }
                        elseif ($nota <= 10){ ?>
                            <td class="ok">Sobresaliente</td>
                        <?php } ?>
                    </tr>
                <?php }
            ?>
        </tbody>
    </table>



</body>
</html>