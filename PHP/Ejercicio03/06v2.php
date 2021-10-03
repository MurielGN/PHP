<!--
    Incluir el archivo infopaises.php en un programa php (06.php) que me muestre 
    el país que tiene mas población y el nombre de sus ciudades. 
    El programa debe buscar en las tablas.
-->
<?php
    require_once("infopaises.php");

    function cmp($a, $b){
        if ($a["Poblacion"] == $b["Poblacion"]) {
            return 0;
        }
        return ($a["Poblacion"] < $b["Poblacion"])? -1 : 1;  
    }

    uasort($paises, 'cmp');
    $paisMax = array_key_last($paises);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 v2</title>
</head>

<body>
    <p>
        El pais con más población es <?=$paisMax?>. <br/>
        Sus ciudades son 
        <?php
            foreach ($ciudades[$paisMax] as $key => $value) {
                if($key + 1 == count($ciudades[$paisMax])){
                     echo $value.".";
                }else{
                    echo $value.", ";
                }   
            }
        ?>
    </p>

</body>

</html>