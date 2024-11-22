<?php
define("RET1", 0.19);

define("RET2", 0.24);
define("MIN2", 12450);

define("RET3", 0.30);
define("MIN3", 20200);

define("RET4", 0.37);
define("MIN4", 35200);

define("RET5", 0.45);
define("MIN5", 60000);

define("RET6", 0.47);
define("MIN6", 300000);

function calcularIRPF($renta) {
    $renta_aux = $renta;
    $irpf = 0;

    if ($renta_aux >= MIN6){
        $irpf += ($renta_aux - MIN6) * RET6;
        $renta_aux -= ($renta_aux - MIN6);
        echo "<p>$renta_aux 1</p>";
    }
            
    if ($renta_aux > MIN5 && $renta_aux <= MIN6){
        $irpf += ($renta_aux - MIN5) * RET5;
        $renta_aux -= ($renta_aux - MIN5);
        echo "<p>$renta_aux 2</p>";
    }

    if ($renta_aux > MIN4 && $renta_aux <= MIN5){
        $irpf += ($renta_aux - MIN4) * RET4;
        $renta_aux -= ($renta_aux - MIN4);
        echo "<p>$renta_aux 3</p>";
    }

    if ($renta_aux > MIN3 && $renta_aux <= MIN4){
        $irpf += ($renta_aux - MIN3) * RET3;
        $renta_aux -= ($renta_aux - MIN3);
        echo "<p>$renta_aux 4</p>";
    }
            
    if ($renta_aux > MIN2 && $renta_aux <= MIN3){
        $irpf += ($renta_aux - MIN2) * RET2;
        $renta_aux -= ($renta_aux - MIN2);
        echo "<p>$renta_aux 5</p>";
    }
            
    $irpf += $renta_aux * RET1;
    echo "<p>$renta_aux 6</p>";

    $neto = $renta - $irpf;

    echo "<p>Bruto: $renta</p>";
    echo "<p>Neto: $neto</p>";
}
?>