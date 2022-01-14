<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
	Crear producto
</a>

<strong class="alert_green">Total de ventas realizadas: <?= $maxVent ?></strong>


<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>	
	<strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>
	
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
	<strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
	
<table>
	<tr>
		<th><a href="<?=base_url?>producto/gestion?var=id">ID</a></th>
		<th><a href="<?=base_url?>producto/gestion?var=nombre">NOMBRE</a></th>
		<th><a href="<?=base_url?>producto/gestion?var=precio">PRECIO</a></th>
		<th><a href="<?=base_url?>producto/gestion?var=stock">STOCK</a></th>
		<th><a href="<?=base_url?>producto/gestion?var=totalVentas">TOTAL VENTAS</a></th>
		<th>ACCIONES</th>

	</tr>
	<?php for($i = 0; $i<count($arrProductos); $i++): ?>
		<tr>
			<td><?=$arrProductos[$i]->id;?></td>
			<td><?=$arrProductos[$i]->nombre;?></td>
			<td><?=$arrProductos[$i]->precio;?></td>
			<td><?=$arrProductos[$i]->stock;?></td>
			<td><?= ($arrProductos[$i]->totalVentas == NULL)? 0 : $arrProductos[$i]->totalVentas ?></td>
			<td>
				<a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
				<a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
			</td>
		</tr>
	<?php endfor; ?>
</table>
