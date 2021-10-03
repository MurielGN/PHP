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
    <title>Eejercico 07</title>
</head>
<body>
    <?php for($i = 0; $i < count($rand2); $i++): ?>
        <p>
            Ciudad <?=$rand2[$i]?>. <br/>
            <?php foreach($paises[$rand2[$i]] as $key => $value):?>
                <?=$key?>: <?=$value?>. 
            <?php endforeach?>
            <br/>Sus ciudades son  
            <?php foreach($ciudades[$rand2[$i]] as $key => $value):?>
                <?php if($key + 1 == count($ciudades[$rand2[$i]])):?>
                      <?=$value."."?>
                <?php endif?>
                <?php if($key + 1 != count($ciudades[$rand2[$i]])):?>
                      <?=$value.","?>
                <?php endif?>
            <?php endforeach?>
            <br/>
            <a href="https://www.google.es/maps/place/<?=$rand2[$i]?>">https://www.google.es/maps/place/<?=$rand2[$i]?></a>
        </p>
    <?php endfor?>
    
</body>
</html>