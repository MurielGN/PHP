<?php
/* 
        Elegir a azar uno de los cinco medios y  mostrar el enlace seleccionado.
    */
    $meidos = ["El Pais" => "https://elpais.com/", "El Mundo" => "https://www.elmundo.es/", "El Mundo Today" => "https://www.elmundotoday.com/", "El Diario" => "https://www.eldiario.es/", "Marca" => "https://www.marca.com/"];
    $aleatorio = array_rand($meidos);
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercico 03</title>
    </head>

    <body>
        <p>
            El Medio recomendado es: <a href="<?=$meidos[$aleatorio]?>"><?=$aleatorio?></a>
        </p>
    </body>

</html>