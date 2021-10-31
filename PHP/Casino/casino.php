<?php
    session_start();
    $bankroll = &$_SESSION['bankroll'];
    include_once './app/funciones.php';
    $nvisitas = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino</title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(empty($bankroll)){
                if(empty($_GET['bankroll'])){
                    if (isset($_COOKIE["visitas"])){
                        $nvisitas = $_COOKIE["visitas"];

                    }
                    $nvisitas++;
                    setcookie("visitas", $nvisitas, time() + 30*24*3600);
                    include_once './app/bienvenida.php';
                }else{
                    $bankroll = intval($_GET['bankroll']);
                    //echo gettype($bankroll)." = ".$bankroll;
                    //echo gettype($_SESSION['bankroll'])." = ".$_SESSION['bankroll'];
                    include_once './app/apostando.php';
                }
            }else{
                include_once './app/apostando.php';
            }
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST['accion'] == "Apostar cantidad"){
                $apuestaCant = intval($_POST['apuesta']);
                $apuestaElec = $_POST['tipoApuesta'];

                if($apuestaCant <= $bankroll){
                    if(jugar($apuestaElec)){
                        $bankroll += $apuestaCant;
                        include_once './app/ganar.php';
                        include_once './app/apostando.php';
                    }else{
                        $bankroll -= $apuestaCant;
                        if($bankroll == 0){
                            session_destroy();
                            include_once './app/bankaRota.html';
                        }else{
                            include_once './app/perder.php';
                            include_once './app/apostando.php';
                        }
                    }
                }else{
                    include_once './app/error_apuesta.php';
                    include_once './app/apostando.php';
                }
            }
            if($_POST['accion'] == "Abandonar Casino"){
                session_destroy();
                include_once './app/salida.php';
            }
        }
    ?>
    
</body>
</html>