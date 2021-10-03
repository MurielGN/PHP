<?php
        
        $cont = 0;
        $contNuM = 0;
        $micro1 = microtime(true);
        do{
            $rand = random_int(1,10);
            $contNuM++;
            if($rand == 6){
                $cont++;
            }else{
                $cont = 0;
            }
        }while($cont != 3);
        $micro2 = microtime(true);
        echo "Han salido tres 6 seguidos tras generar ".$contNuM." números en ".(($micro2-$micro1)*1000)." milisegundos.";

        /*echo "Numero generado: ".$rand."<br>";
        echo "<code>";

        for($i = 1; $i<= $rand; $i++){
            //echo "<p>";
            for($k= $rand-$i-1; $k>=0; $k--){
                echo "&nbsp";
            }
            for($j = 1; $j <= $i*2-1; $j++){
                echo "*";
            }
            echo "<br/>";
            //echo "</p>";
        }
        echo "</code>";*/
?>