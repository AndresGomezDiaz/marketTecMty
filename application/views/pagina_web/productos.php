<section id="content">
<div class="content-wrap">
		<div class="container clearfix">
			<!-- Shop
			============================================= -->
			<div id="shop" class="shop grid-container clearfix" data-layout="fitRows">
				<?php foreach($productos->result() as $infoProducto): ?>
					<div class="product clearfix">
						<div class="product-image">
							<a href="<?=base_url().'web_producto_detalle/'.$infoProducto->id_producto?>"><img src="<?=base_url().'assets/img/producto/'.$infoProducto->imagen?>" alt="<?=$infoProducto->nombre?>"></a>
							<div class="product-overlay">
								<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Agregar al carrito</span></a>
								<a href="<?=base_url().'web_producto_detalle/'.$infoProducto->id_producto?>" class="item-quick-view"><i class="icon-zoom-in2"></i><span> Ver detalle</span></a>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title"><h3><a href="#"><?=$infoProducto->nombre?></a></h3></div>
							<div class="product-price">$<?=$infoProducto->precio?></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div><!-- #shop end -->
		</div>
	</div>
</section>
