<?php
include_once "PRODUCTO.php";

function accionBorrar ($nProducto){    
    $db = AccesoDatos::getModelo();
    $tproducto = $db->borrarProducto($nProducto);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function accionAlta(){
    $producto = new PRODUCTO();
    $producto->PRODUCTO_NO  = "";
    $producto->DESCRIPCION   = "";
    $producto->PRECIO_ACTUAL   = "";
    $producto->STOCK_DISPONIBLE = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($nProducto){
    $db = AccesoDatos::getModelo();
    $producto = $db->getProducto($nProducto);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($nProducto){
    $db = AccesoDatos::getModelo();
    $producto = $db->getProducto($nProducto);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $producto = new PRODUCTO();
    $producto->PRODUCTO_NO  = $_POST['PRODUCTO_NO'];
    $producto->DESCRIPCION   = $_POST['DESCRIPCION'];
    $producto->PRECIO_ACTUAL   = $_POST['PRECIO_ACTUAL'];
    $producto->STOCK_DISPONIBLE = $_POST['STOCK_DISPONIBLE'];
    $db = AccesoDatos::getModelo();
    $db->addProducto($producto);
    
}

function accionPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $producto = new PRODUCTO();
    $producto->PRODUCTO_NO  = $_POST['PRODUCTO_NO'];
    $producto->DESCRIPCION   = $_POST['DESCRIPCION'];
    $producto->PRECIO_ACTUAL  = $_POST['PRECIO_ACTUAL'];
    $producto->STOCK_DISPONIBLE = $_POST['STOCK_DISPONIBLE'];
    $db = AccesoDatos::getModelo();
    $db->modProducto($producto);
    
}

