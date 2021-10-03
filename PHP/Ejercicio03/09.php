<?php
    $temperaturas = [6,10,12,14,16,20,25,30,18,15,14,8];
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octurbre', 'Noviembre', 'Diciembre'];
    $mestemperatura = array_combine($meses, $temperaturas);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 09</title>
    <style>
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: left;
        }
        img{
            width: 10px;
        }
    </style>
</head>
<body>
    <table>
        <?php foreach($mestemperatura as $key => $value):?>
            <tr>
                <td><?=$key?></td>
                <td>
                    <?php for($i = 0; $i< $value; $i++):?><img src="./img/verde.png" alt="verde"/><?php endfor?>
                     <?=$value?> ºC
                </td>
            </tr>
        <?php endforeach?>
    </table>
        
</body>
</html>