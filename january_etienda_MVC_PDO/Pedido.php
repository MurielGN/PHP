<?php

class Pedido{
    private $numped;
    private $cod_cliente;
    private $producto;
    private $precio; 

    private $db;

    // Getter con método mágico
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
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
    public function setNumped(string $numped){
        $this->numped = $numped;
    }

    public function setCod_cliente(string $cod_cliente){
        $this->cod_cliente = $cod_cliente;
    }

    public function setProducto(int $producto){
        $this->producto = $producto;
    }  
    
    public function setPrecio(int $precio)
    {
        $this->precio = $precio;
    }

}

?>