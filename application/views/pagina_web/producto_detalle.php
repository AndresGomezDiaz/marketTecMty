<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<!-- Detalle del producto -->
		<div class="postcontent nobottommargin">
			<div class="single-product">
				<div class="product">
					<h1><?=$detalleProducto->producto?></h1>
					<div class="col_half">
						<div class="product-image">
							<div class="slide" data-thumb="<?=base_url().'assets/img/producto/'.$detalleProducto->imagen?>">
								<a href="<?=base_url().'assets/img/producto/'.$detalleProducto->imagen?>" title="<?=$detalleProducto->producto?>" data-lightbox="gallery-item">
									<img src="<?=base_url().'assets/img/producto/'.$detalleProducto->imagen?>" alt="<?=$detalleProducto->producto?>">
								</a>
							</div>
						</div>
					</div>
					<div class="col_half col_last product-desc">
						<!-- Product Single - Price
						============================================= -->
						<div class="product-price">$<?=$detalleProducto->precio?></div>
						<!-- Product Single - Rating
						============================================= -->
						<div class="clear"></div>
						<div class="line"></div>

						<!-- Product Single - Quantity & Cart Button
						============================================= -->
						<form class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
							<div class="quantity clearfix">
								<input type="button" value="-" class="minus">
								<input type="text" step="1" min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />
								<input type="button" value="+" class="plus">
							</div>
							<button type="submit" class="add-to-cart button nomargin">Agregar al carrito</button>
						</form><!-- Product Single - Quantity & Cart Button End -->

						<div class="clear"></div>
						<div class="line"></div>

						<!-- Product Single - Short Description
						============================================= -->
						<p><?=$detalleProducto->descripcion?></p>


						<!-- Product Single - Meta
						============================================= -->
						<div class="panel panel-default product-meta">
							<div class="panel-body">
								<span itemprop="productID" class="sku_wrapper">Clave de producto: <span class="sku"><?=$detalleProducto->clave?></span></span>
								<span class="posted_in">Causa: <a href="#" rel="tag"><?=$detalleProducto->categoria?></a>.</span>
							</div>
						</div><!-- Product Single - Meta End -->
					</div>
				</div>
			</div>
			<div class="clear"></div><div class="line"></div>
			<!-- Productos relacionados -->
			<div class="col_full nobottommargin">
				<h4>Productos relacionados</h4>
				<div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xxs="1" data-items-sm="2" data-items-lg="4">
					<?php foreach($productosRel->result() as $infoProductos): ?>

						<div class="oc-item">
							<div class="product iproduct clearfix">
								<div class="product-image">
									<a href="#"><img src="<?=base_url().'assets/img/producto/'.$infoProductos->imagen?>" alt="<?=$infoProductos->nombre?>"></a>
									<div class="product-overlay">
										<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Agregar al carrito</span></a>
										<a href="<?=base_url().'web_producto_detalle/'.$infoProductos->id_producto?>" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Ver detalle</span></a>
									</div>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3><a href="#"><?=$infoProductos->nombre?></a></h3></div>
									<div class="product-price">$<?=$infoProductos->precio?></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>
		<!-- Resumen de las compras -->
		<div class="sidebar nobottommargin col_last">
			<h4>Productos seleccionados</h4>

			<span class="posted_in">Gorra</span><br />
			<span class="posted_in">Cantidad:  3</span><br />
			<span class="posted_in">Precio:  $10.00</span>
			<br /><br />
			<span class="posted_in">Paragüas</span><br />
			<span class="posted_in">Cantidad:  1</span><br />
			<span class="posted_in">Precio:  $10.00</span>
			<br /><br />
			<span class="posted_in">Plumas</span><br />
			<span class="posted_in">Cantidad:  1</span><br />
			<span class="posted_in">Precio:  $10.00</span>

			<div class="clear"></div><div class="line"></div>

			<h4>Subtotal</h4>
			<div class="subtotal" style="color:#c02746;"> $50.00 </div>

			<div class="clear"></div><div class="line"></div>
			<p>Los productos deben retirarse en las tiendas del campus</p>
			<a href="<?=base_url().'web_carrito'?>" class="add-to-cart button nomargin">Proceder al pago</a>

		</div>
	</div>
</div>
</section>
