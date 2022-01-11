<?php
    include_once 'AccesoDatos.php';

    //CONTROLADOR

    if(!empty($_POST['name']) && !empty($_POST['pswd'])){
        $name = $_POST['name'];
        $pswd = $_POST['pswd'];
    }else{
        $mensaje = " Los campos deven estar rellenos";
        include_once 'vistapedidos.php';
        exit();
    }

    // Accedo al Modelo
    $conexdb = AccesoDatos::initModelo();

    // Cargo la vista 
    include_once 'vistapedidos.php';
?>