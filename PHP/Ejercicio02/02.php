<?php
require_once("funcionesvar.php");
?>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Ejercicio 2</h1>
    <hr>
    <?php
    $n1 =  random_int(1, 10);
    $n2 =  random_int(1, 10);
    ?>
    <p>
        1º Número : <?=$n1?> <br/>
        2º Número : <?=$n2?> 
    </p>
    <p>
        Suma: <?=$n1?> + <?=$n2?> = <?=sumar($n1,$n2)?>. <br/>
        Resta: <?=$n1?> - <?=$n2?> = <?=resta($n1,$n2)?>. <br/>
        Multiplicación: <?=$n1?> x <?=$n2?> = <?=multiplicacion($n1,$n2)?>. <br/>
        División: <?=$n1?> / <?=$n2?> = <?=division($n1,$n2)?>. <br/>
        Módulo: <?=$n1?> % <?=$n2?> = <?=modulo($n1,$n2)?>. <br/>
        Potencia: <?=$n1?> ** <?=$n2?> = <?=potencia($n1,$n2)?>. <br/>
    </p>
    <hr>
    <?php show_source(__FILE__); ?>
    <hr>
</body>

</html>