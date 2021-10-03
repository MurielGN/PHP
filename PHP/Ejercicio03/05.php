<!--
    Realizar un programa en PHP que muestre un posible resultado de la bonoloto: 
    Se presentarán 6 números obtenidos aleatoriamente en el rango de 1 a 49 (ambos inclusives) 
    Los 5 primeros forman la jugada ganadora y deberán presentar ordenados de menor a mayor en 
    una tabla html; el sexto es el número complementario.  
    Por supuesto los números no pueden repetirse.
-->

<?php
$loteria = [];
function generarNum(&$loteria)
{
    $aux = random_int(1, 50);
    foreach ($loteria as $valor) {
        if ($aux == $valor) {
            $aux = generarNum($loteria);
            break;
        }
    }
    $loteria[] = $aux;
    return $aux;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            color: blue;
        }
    </style>
</head>

<body>
    <table>
        <?php for ($i = 0; $i < 5; $i++) : ?>
            <td>
                <?= generarNum($loteria) ?>
            </td>
        <?php endfor ?>
        <td>
            Complementario <?= generarNum($loteria) ?>
        </td>

    </table>
</body>

</html>