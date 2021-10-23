<?php
function usuarioOk($usuario, $contraseña) :bool {
   //He añadido un mínimo de 4 digitos en la contraseña para que no se pueda entrar dejando los campos en blanco.
   return (strrev($usuario) == $contraseña && strlen($contraseña)>3);  
}

function str_word_count_utf8($str) {
   //Corrigo la funcion para que no separe palabras con acentos o la ñ del $str
   $palabras = preg_split('/\W+/u', $str, -1, PREG_SPLIT_NO_EMPTY);
   return count($palabras);

}

function letrasMasRepetida($str){
   $indice = -1;
   $auxC = '';
   foreach (count_chars($str, 1) as $i => $val) { //No cuenta la e y é como iguales
      if(chr($i) != ' ' && $indice < $val){
         $indice = $val;
         $auxC = chr($i);
      }
   }
   return $auxC;
}
function palabraMasRepetida($str){
   //Corrigo la funcion para que no separe palabras con acentos o la ñ del $str
   $palabras = preg_split('/\W+/u', $str, -1, PREG_SPLIT_NO_EMPTY);
   $pOrdenadas = array_count_values($palabras);
   arsort($pOrdenadas);
   return array_key_first($pOrdenadas);


}
?>
