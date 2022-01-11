<?php

class Cliente{
    private $cod_cliente;
    private $nombre;
    private $clave;
    private $veces;

    // Getter con método mágico
    public function __get($atributo){
        if(property_exists($this, $atributo)){
            return $this->$atributo;
        }
    } 
    // Setter con método mágioc
    public function __set($atributo,$valor){
        if(property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }

    // Seter manuales
    public function setCod_cliente(string $cod_cliente){
        $this->cod_cliente = $cod_cliente;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    public function setClave(int $clave){
        $this->clave = $clave;
    }
    
    public function setVeces(int $veces){
        $this->veces = $veces;
    }
}

?>