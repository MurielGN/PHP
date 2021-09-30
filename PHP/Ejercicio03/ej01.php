<?php
    $array =[];
    $max = 0;
    $min = 11;
    
    function generarNum(&$max,&$min, &$array){
        $aux = random_int(1,10);
        if (array_key_exists($aux, $array)) {
            $array[$aux]++;
        }else{
            $array[$aux] = 0;
        }
        if ($max < $aux) {
            $max = $aux;
        }
        if ($min > $aux) {
            $min =$aux;
        }
        return $aux;
    }
    function calcularModa($array){
        arsort($array);
        return array_key_first($array);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercico 01</title>
</head>
<body>
    <table style="border: solid 1px;">
        <tr>
            <th colspan="20"></th>
            <th>Máximo</th>
            <th>Mínimo</th>
            <th>Moda</th>
        </tr>
        <tr>
            <?php 
                for ($i=0; $i < 20; $i++) { 
                    echo "<td style=\"border: solid 1px;\">".generarNum($max,$min,$array)."</td>";
                }
                echo "<td style=\"border: solid 1px;\">".$max."</td>";
                echo "<td style=\"border: solid 1px;\">".$min."</td>";
                echo "<td style=\"border: solid 1px;\">".calcularModa($array)."</td>";
            ?>
        </tr>   
    </table>
    
</body>
</html>