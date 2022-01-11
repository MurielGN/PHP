<?php
    include_once 'Cliente.php';
    include_once 'Pedido.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="default.css" rel="stylesheet" type="text/css" />
    <title>Vista Pedidos</title>
</head>
<body>
    <div id="container" style="width: 380px;">
    <div id="header">
            <h1>Tus Pedidos</h1>
        </div>
        <div id="content">
            <?= isset($mensaje) ? $mensaje : "" ?>

            <?php if(isset($pedidos)):  ?>
                <table border=1>
                    <th>Num Pedido</th>
                    <th>Cod Cliente</th>
                    <th>Producto</th>
                    <th>precio</th>
                        <?php foreach($pedidos as $values):?>
                            <tr>
                                <td><?= $values->numped ?></td>
                                <td><?= $values->cod_cliente ?></td>
                                <td><?= $values->producto ?></td>
                                <td><?= $values->precio ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total:</td>
                            <td><?= $totalPedidos ?></td>
                        </tr>
                </table>
            <?php endif ?>
        </div>
    </div>
</body>
</html>