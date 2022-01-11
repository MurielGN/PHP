<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/Utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

function show_error(){
	$error = new errorController();
	$error->index();
}

if(isset($_GET['controller'])){
	$nombre_controlador = $_GET['controller'].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	$nombre_controlador = controller_default; //que es controller defatul?= productosController
	
}else{
	show_error();
	exit();
}

if(class_exists($nombre_controlador)){	//Existe la clase productosController
	$controlador = new $nombre_controlador(); //Donde están estas clases??? UsuarioController.php
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default; //que es action_default?= index
		$controlador->$action_default();
	}else{
		show_error();
	}
}else{
	show_error();
}

require_once 'views/layout/footer.php';

