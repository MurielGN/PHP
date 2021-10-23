<html>

<head>
    <meta charset="UTF-8">
    <link href="web/default.css" rel="stylesheet" type="text/css" />
    <title>MINIFORO</title>
</head>

<body>
    <div id="container" style="width: 450px;">
        <div id="header">
            <img src="web/logo.png" alt="mini foro logo" width="100px" height="100px">
            <h1>MINIFORO versión 1.0</h1>
        </div>

        <div id="content">

            <?php
            //htmlspecialchars(); !!!!!!++++++++******

            include_once 'app/funciones.php';

            if (!isset($_REQUEST['orden'])) {
                include_once 'app/entrada.php';
            } else {
                switch ($_REQUEST['orden']) {

                    case "Entrar":
                        // Chequear usuario
                        if (
                            isset($_REQUEST['nombre']) && isset($_REQUEST['contraseña']) &&
                            usuarioOK($_REQUEST['nombre'], $_REQUEST['contraseña'])
                        ) {
                            $nombre = trim(htmlspecialchars($_REQUEST['nombre'], ENT_QUOTES, 'UTF-8'));
                            $contraseña = trim(htmlspecialchars($_REQUEST['contraseña'], ENT_QUOTES, 'UTF-8'));
                            echo " Bienvenido <b>" . $nombre . "</b><br>";
                            include_once  'app/comentario.html';
                        } else {
                            include_once 'app/entrada.php';
                            echo " <br> <span style=\"color: red;\">Usuario no válido</span> </br>";
                        }
                        break;

                    case "Nueva opinión":
                        echo " Nueva opinión <br>";
                        include_once  'app/comentario.html';
                        break;
                    case "Detalles": // Mensaje y detalles
                        //$tema y $comentario limpios de codigo inducido
                        $tema = trim(htmlspecialchars($_REQUEST['tema'], ENT_QUOTES, 'UTF-8'));
                        $comentario = trim(htmlspecialchars($_REQUEST['comentario'], ENT_QUOTES, 'UTF-8'));
                        //No se permiten temas vacios
                        if(empty($_REQUEST['tema'])){
                            include_once 'app/comentariorelleno.php';
                            echo " <br> <span style=\"color: red;\">No se puede dejar el tema en blanco</span> </br>";
                            break;
                        }

                        //No se permiten temas vacios
                        if(empty($_REQUEST['comentario'])){
                            include_once 'app/comentariorelleno.php';
                            echo " <br> <span style=\"color: red;\">No se puede dejar el comentario en blanco</span> </br>";
                            break;
                        }
                        
                        echo "Detalles de su opinión";
                    
                        include_once 'app/comentariorelleno.php';
                        include_once 'app/detalles.php';
                        break;
                    case "Terminar": // Formulario inicial
                        include_once 'app/entrada.php';
                }
            }

            ?>
        </div>
    </div>
</body>

</html>