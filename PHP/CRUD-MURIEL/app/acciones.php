<?php



function accionDetalles($id){
    $usuario = $_SESSION['tuser'][$id];
    $nombre  = $usuario[0];
    $login   = $usuario[1];
    $clave   = $usuario[2];
    $comentario=$usuario[3];
    $orden = "Detalles";
    include_once "layout/formulario.php";
    exit();
}

function accionAlta(){
    $nombre  = "";
    $login   = "";
    $clave   = "";
    $comentario = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
    exit();
}

function accionPostAlta(){
 
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $nuevo = [ $_POST['nombre'],$_POST['login'],$_POST['clave'],$_POST['comentario']];
    foreach($_SESSION['tuser'] as $user){
        if($user[1] == $nuevo[1]){
            echo "Login repetido.";
            return;
        }
    }
    $_SESSION['tuser'][]= $nuevo;  
}

function accionModificar($id){
    $usuario = $_SESSION['tuser'][$id];
    $nombre  = $usuario[0];
    $login   = $usuario[1];
    $clave   = $usuario[2];
    $comentario=$usuario[3];
    $orden = "Modificar";
    include_once "layout/formulario.php";
    exit();
}

function accionPostModificar($entrada, $id){
    $arrUser[] = $entrada['nombre'];
    $arrUser[] = $entrada['login'];
    $arrUser[] = $entrada['clave'];
    $arrUser[] = $entrada['comentario'];
    $_SESSION['tuser'][$id]= $arrUser;
}

function accionBorrar($id){
    unset($_SESSION['tuser'][$id]);
    $_SESSION['tuser'] = array_values($_SESSION['tuser']);
}

function accionTerminar(){
    volcarDatos($_SESSION['tuser']);
    session_destroy();

}
