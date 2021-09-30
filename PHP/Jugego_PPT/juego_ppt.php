<?php
    define ('PIEDRA1',  "&#x1F91C;");
    define ('PIEDRA2',  "&#x1F91B;");
    define ('TIJERAS',  "&#x1F596;");
    define ('PAPEL',    "&#x1F91A;" );

    $jugada1 = random_int(1,3);
    $jugada2 = random_int(1,3);
    $cont = 0;

    function jugar($jugada1, $jugada2){
        if($jugada1+1 == $jugada2){
            return 2;
        }elseif($jugada1 == $jugada2){
            return 0;
        }elseif(abs($jugada1-$jugada2) == 2){
            if($jugada1 == 1){
                return 1;
            }else{
                return 2;
            }
        }
        return 1;
    }

    function mostrarJugada($jugada, &$cont){
        switch ($jugada) {
            case 1:
                if ($cont == 0) {
                    $cont++;
                    return PIEDRA1;
                }
                return PIEDRA2;
            case 2:
                $cont++;
                return PAPEL;
            case 3:
                $cont++;
                return TIJERAS;
        }
    }
    
    function resultado($jugada1, $jugada2){
        if(jugar($jugada1, $jugada2) == 0){
            return "¡Empate!";
        }
        return "Ha gando el jugador ".jugar($jugada1,$jugada2);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        ¡Piedra, papel, tijera!
    </h1>
    <p>
        Actualice la página para mostrar otra partida.
    </p>
    <table>
        <tr>
            <th>Jugador 1</th>
            <th>Jugador 2</th>
        </tr>
        <tr style="font-size: 100px;">
            <td><?= mostrarJugada($jugada1, $cont)?></td>
            <td><?= mostrarJugada($jugada2, $cont)?></td>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center;"><?=resultado($jugada1, $jugada2)?></th>
        </tr>
    </table>
</body>
</html>