<h1>Algunos de nuestros productos</h1>

<?php while($product = $productos->fetch_object()): ?>
	<div class="product">
		<a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
			<?php if($product->imagen != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
			<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" />
			<?php endif; ?>
			<h2><?=$product->nombre?></h2>
		</a>
		
		<?php if($product->descuento == 0):?>
			<p><?= $product->precio ?></p>
		<?php else: ?>
			<p class="ofertaNueva"><?= $product->precio * (100 - $product->descuento )/100 ?></p>
			<p class="ofertaAntigua"><?= $product->precio ?></p>
		<?php endif; ?>

		<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
	</div>
<?php endwhile; ?>
