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
    <!-- Tabla de multiplicar el número que se introduzca -->
     <form action="" method="post">
        <label for="mult">Hitler no se equivicó (por razones legales esto es una broma)</label>
        <input type="text" name="mult" id="mult" placeholder="métemela papi">
        <input type="submit" value="Dale">
     </form>
     <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $mult = (int)$_POST["mult"]; ?>
        <table>
        <tbody>
            <?php
            for($i = 1; $i != 11; $i++){ ?>
                <tr>
                    <td><?php echo "<p>$mult</p>" ?></td>
                    <td><p>*<p></td>
                    <td><?php echo "<p>$i</p>" ?></td>
                    <td><p>=<p></td>
                    <td><?php echo "<p>".($mult*$i)."</p>" ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
     </table>
    <?php }
     ?>
     
</body>
</html>