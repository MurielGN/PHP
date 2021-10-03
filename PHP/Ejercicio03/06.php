<!--
    Incluir el archivo infopaises.php en un programa php (06.php) que me muestre 
    el país que tiene mas población y el nombre de sus ciudades. 
    El programa debe buscar en las tablas.
    Hacer otra versión (06v2.php) que ordene el array de países usando funciones de la librería 
    y me muestre directamente la última posición, donde debe estar el máximo.
-->
<?php
    require_once("infopaises.php");
    $auxPais = "";
    function buscarPais($paises, &$auxPais){
        $max = 0;
        foreach ($paises as $pais => $DatosPais) {
            foreach($DatosPais as $ciudades => $valoresC){
                if($ciudades == "Poblacion"){
                    if($max < $valoresC){
                        $max = $valoresC;
                        $auxPais = $pais;
                    }
                }
            }
        }
    return $auxPais;
    }
    function ordenarPaises(){
        
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>

<body>
    <p>
        El pais con más población es <?=buscarPais($paises, $auxPais)?>. <br/>
        Sus ciudades son 
        <?php
            foreach ($ciudades[$auxPais] as $key => $value) {
                if($key + 1 == count($ciudades[$auxPais])){
                     echo $value.".";
                }else{
                    echo $value.", ";
                }   
            }
        ?>
    </p>

</body>

</html>