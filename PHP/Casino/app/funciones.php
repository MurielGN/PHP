<?php
    function jugar($eleccion){
        $rand = random_int(0,1);
        if($rand == 0 && $eleccion == "par"){
            return true;
        }elseif($rand == 1 && $eleccion == "impar"){
            return true;
        }else{
            return false;
        }
    }
?>