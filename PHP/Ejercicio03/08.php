<?php
    require_once("infopaises.php");
    $rand2 = array_rand($paises, 2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 08</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: left;
        }
        td {
            color: blue;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Pais</th>
            <th>Capital</th>
            <th>Población</th>
            <th>Ciudades</th>
        </tr>
        <?php for($i = 0; $i < count($rand2); $i++): ?>
            <tr>
                <td><?=$rand2[$i]?></td>
                <?php foreach($paises[$rand2[$i]] as $value):?>
                    <td>
                        <?=$value?>
                    </td>
                <?php endforeach?>
                <td>
                    <?php foreach($ciudades[$rand2[$i]] as $key => $value):?>
                        <?php if($key + 1 == count($ciudades[$rand2[$i]])):?>
                            <?=$value?>
                        <?php endif?>
                        <?php if($key + 1 != count($ciudades[$rand2[$i]])):?>
                            <?=$value.","?>
                        <?php endif?>
                    <?php endforeach?>
                </td>
            </tr>
        <?php endfor?>
    </table>
    
</body>
</html>