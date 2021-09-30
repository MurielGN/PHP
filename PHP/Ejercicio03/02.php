<?php
/* 
        Crear un array que almacene 5 cadenas con el nombre de periódicos y sus enlaces para acceder.
        El array será asociativo con el nombre del periódico como clave y su URL como valor.
        Mostrar un lista html con cinco hiperenlaces a la URL de los diarioss
    */
    $meidos = ["El Pais" => "https://elpais.com/", "El Mundo" => "https://www.elmundo.es/", "El Mundo Today" => "https://www.elmundotoday.com/", "El Diario" => "https://www.eldiario.es/", "Marca" => "https://www.marca.com/"];
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercico 02</title>
    </head>

    <body>
        <ul>
            <?php foreach ($meidos as $key => $value) : ?>
                <li><a href="<?= $value ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>
    </body>

</html>