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
    $user = $conexdb->checkPswd($name, $pswd);
    if($user == null){
        $mensaje = "Usuario y contraseña incorrectos.";
        header("Refresh:4; url=acceso.html");
    }

    //Amento el número de conexiones
    if($conexdb->aumentarVecesUsuario($user->cod_cliente)){
        $user->veces ++;
    }
    

    $pedidos = $conexdb->obtenerListaPedidos($user->cod_cliente);
    $mensaje = "Bienvenido usuario: ".$user->nombre.".  Has entrado ".$user->veces." veces en nuestra web.";
    if(count($pedidos) == 0){
        $mensaje = "No existen pedidos para este cliente.";
        unset($pedidos);
    }else{
        $mensaje .= "<br><br>Esta es su lista de pedidos del cliente con código ".$user->cod_cliente.":";
        $totalPedidos = 0;
        for($i = 0; $i< count($pedidos); $i++){
            $totalPedidos += $pedidos[$i]->precio; //Falta inluir Pedido?
        }
    }

    // Cargo la vista 
    include_once 'vistapedidos.php';
?>