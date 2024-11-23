<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <link href="../estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    $notas = [
        ["Paco", "Desarrollo web servidor"],
        ["Paco", "Desarrollo web cliente"],
        ["Manu", "Desarrollo web servidor"],
        ["Manu", "Desarrollo web cliente"]
    ];
    /*
    * 1º Añadir 4 estudiantes con asignaturas
    * 2º Eliminar 1 estudiante y asignatura.
    * 3º Añadir tercera columna que será la nota, de manera aleatoria entre 1 y 10
    * 4º Añadir cuarta columna que indique APTO o NO APTO dependiendo de si la nota es >=5 o no
    * 5º Ordenar alfabéticamente con los alumnos, luego con las notas, y luego con asignatura.
    * 6º Mostrar en una tabla
    */

    array_push($notas, ["Guillermo", "Interfaces"]);
    array_push($notas, ["Sofía", "Desarrollo web servidor"]);
    array_push($notas, ["Manu", "Interfaces"]);
    array_push($notas, ["Sebas", "Desarrollo web cliente"]);

    unset($notas[1]);
    $notas = array_values($notas); // devuelve los valores del array con las keys bien puestas, necesario hacer después del unset, ya que me deja una key vacía

    for ($i = 0; $i < count($notas); $i++) {
        $notas[$i][2] = rand(1, 10);
        if($notas[$i][2] < 5)
            $notas[$i][3] = "NO APTO";
        else if($notas[$i][2] >= 5)
            $notas[$i][3] = "APTO";
    }

    $_nombre = array_column($notas, 0);
    $_notas = array_column($notas, 2);
    $_asignatura = array_column($notas, 1);
    array_multisort($_nombre, SORT_ASC, $_notas, SORT_ASC, $_asignatura, SORT_ASC, $notas);

    ?>

    <table>
        <thead>
            <caption>NOTAS</caption>
            <tr>
                <th>Alumno</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($notas as $nota){
                list($nombre, $asignatura, $grade, $estado) = $nota; ?> <!-- el list tiene un funcionamiento muy simple, es un bucle que asigna cada posicion del array a cada variable que se le pasa -->
                <tr>
                    <td><?php echo "$nombre" ?></td>
                    <td><?php echo "$asignatura" ?></td>
                    <td><?php echo "$grade" ?></td>
                    <td><?php echo "$estado" ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</body>
</html>