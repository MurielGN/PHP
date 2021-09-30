<!--
    Crear una carpeta que se llame img y copiar en ella 5 ficheros de imágenes que muestre el logo de un deporte.
    Crear una array asociativo que almacene como clave el nombre del deporte y como valor la dirección de la imagen.
-->
<?php
    $deportes = ["Soccer" => "./img/log1.JPG", "Basketball" => "./img/log2.JPG", "Tennis" => "./img/log3.JPG", "Volleyball" => "./img/log4.JPG", "Baseball" => "./img/log5.JPG", ]
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04</title>
    <style>
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        img{
            width: 100px; height: 89px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Deporte</th>
            <th>Logo</th>
        </tr>
        <?php foreach($deportes as $key => $value): ?>
            <tr>
                <td><?=$key?></td>
                <td><img src="<?=$value?>"></td>
            </tr>
        <?php endforeach;?>
    </table>
    
</body>
</html>