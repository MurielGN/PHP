<?php
    session_start();
?>
<?php
    //if(!isset($_SESSION['nombre'])){}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria del siglo XXI</title>
</head>
<body>
    <h1>La Frutería del Siglo XXI</h1>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(empty($_SESSION['nombre'])){
                if(empty($_GET['nombre'])){
                    include_once './app/formularioLog.html';
                }else{
                    $_SESSION['nombre'] = $_GET['nombre'];
                    include_once './app/dentroFruteria.php';
                }
            }else{
                if(count($_SESSION['frutas']) != 0){
                    include_once './app/carrito.php';
                }
                include_once './app/dentroFruteria.php';
            }
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($_SESSION['nombre'])){
                include_once './app/formularioLog.html';
            }else{
                switch ($_POST['orden']) {
                    case 'Anotar':
                        $_SESSION['frutas'][$_POST['frutas']] +=  intval($_POST['cantidad']);
                        include_once './app/carrito.php';
                        include_once './app/dentroFruteria.php';
                        break;
                    case 'Terminar':
                        session_destroy();
                        include_once './app/carrito.php';

                        echo "<br><br>Muchas gracias, por su pedido. <br>";
                        include_once './app/nuevoCliente.php';
                        break;
                    
                    default:
                        # code...
                        break;
                }
                
            }
                
        }
    ?>

    
</body>
</html>