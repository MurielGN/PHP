<?php
    define('ciclos',50);
    define('cien',100);
    $max = -1;
    $min = 101;
    $suma = 0;
    
    for($i=0; $i < ciclos; $i++){
        $aux = random_int(1,cien);
        $suma += $aux;
        if($min > $aux){
            $min = $aux;
        }
        if($max < $aux){
            $max = $aux;
        }
    }
?>
<html>
<head>
<title>Ejercicio 02</title>
</head>
<body>
    <table>
        <tr>
            <th colspan="2">Generación de <?=ciclos?> valores aleatorios</th>
        </tr>
        <tr>
            <td>Máximo</td><td><?=$max?> <br/></td>
        </tr>
        <tr>
            <td>Mínimo</td><td><?=$min?> <br/></td>
        </tr>
        <tr>
            <td>Media</td><td><?= $suma/ciclos?> <br/></td>
        </tr>
    </table>
</body>
</html>