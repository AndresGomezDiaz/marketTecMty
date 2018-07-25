<section id="slider" class="slider-parallax revslider-wrap ohidden clearfix">

			<!--
			#################################
				- THEMEPUNCH BANNER -
			#################################
			-->
			<div id="rev_slider_ishop_wrapper" class="rev_slider_wrapper fullwidth-container" data-alias="default-slider" style="padding:0px 0px;">
					<!-- START REVOLUTION SLIDER 5.1.4 fullwidth mode -->
				<div id="rev_slider_ishop" class="rev_slider fullwidthbanner" style="display:none;" data-version="5.1.4">
					<?php if($slider->num_rows() == 0){ ?>
					<ul>    <!-- SLIDE  -->
						<li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="5000" data-saveperformance="off" data-title="" style="background-color: #F6F6F6;">
							<!-- LAYERS -->
							<!-- LAYER NR. 2 -->
							<div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
							data-x="100"
							data-y="50"
							data-transform_in="x:-200;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
							data-speed="400"
							data-start="1000"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style=""><img src="<?=base_url().'assetsWeb/'?>images/slider/rev/shop/girl1.jpg" alt="Girl"></div>

							<div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
							data-x="570"
							data-y="105"
							data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
							data-speed="700"
							data-start="1400"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style=" color: #333; max-width: 550px; white-space: normal;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</div>

							<div class="tp-caption ltl tp-resizeme"
							data-x="570"
							data-y="375"
							data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
							data-speed="700"
							data-start="1550"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style=""><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>Ver mas</span> <i class="icon-angle-right"></i></a></div>

						</li>
					</ul>
					<?php }else{ ?>
						<ul>    <!-- SLIDE  -->
						<?php foreach($slider->result() as $infoSlider): ?>
							<li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="5000" data-saveperformance="off" data-title="" style="background-color: #F6F6F6;">
								<!-- LAYERS -->
								<!-- LAYER NR. 2 -->
								<div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
								data-x="50"
								data-y="0"
								data-transform_in="x:-200;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
								data-speed="400"
								data-start="1000"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style=""><img src="<?=base_url().'assets/img/publicidad/'.$infoSlider->imagen?>" alt="Tec"></div>
								<?php if($infoSlider->texto != ""){ ?>
								<div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
								data-x="570"
								data-y="105"
								data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
								data-speed="700"
								data-start="1400"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style=" color: #333; max-width: 550px; white-space: normal;"><?=$infoSlider->texto?></div>
								<?php } ?>
								<?php if($infoSlider->liga != ""){ ?>
								<div class="tp-caption ltl tp-resizeme"
								data-x="570"
								data-y="375"
								data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
								data-speed="700"
								data-start="1550"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style=""><a href="<?=$infoSlider->liga?>" target="_blank" class="button button-border button-large button-rounded tright nomargin"><span>Ver mas</span> <i class="icon-angle-right"></i></a></div>
								<?php } ?>
							</li>
						<?php endforeach; ?>
						</ul>
					<?php } ?>
				</div>
			</div><!-- END REVOLUTION SLIDER -->

		</section>
<section id="content">
<div class="content-wrap">

		<div class="container clearfix">
			<?php
			/*
			<div class="col_full clearfix">
				<?php if($categorias->num_rows() > 0){ ?>
				<div class="masonry-thumbs col-4" data-big="2" data-lightbox="gallery">

					<?php foreach($categorias->result() as $infoCategoria): ?>
						<a href="<?=base_url().'web_categorias'?>"><img class="image_fade" src="<?=base_url().'assets/img/categoria/'.$infoCategoria->imagen?>" alt="<?=$infoCategoria->nombre?>"></a>
					<?php endforeach; ?>
					<!-- <a href="#"><img class="image_fade" src="images/shop/banners/8.jpg" alt="Image"></a> -->
				</div>
				<div style="text-align: center;">
					<br />
					<a href="<?=base_url().'web_categorias'?>" class="button conoceMas link-blanco"><strong>Ver todas las Causas</strong></a>
				</div>
				<?php } ?>
			</div>
			*/ 
			?>
			<div class="clear"></div>
			<br />
			<!-- Shop
			============================================= -->
			<div id="shop" class="shop grid-container clearfix" data-layout="fitRows">
				<?php foreach($productos->result() as $infoProducto): ?>
					<div class="product clearfix">
						<div class="product-image">
							<a href="<?=base_url().'web_producto_detalle/'.$infoProducto->id_producto?>"><img src="<?=base_url().'assets/img/producto/'.$infoProducto->imagen?>" alt="Checked Short Dress"></a>
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
				</div>
			</div><!-- #shop end -->

		</div>

	</div>
</section>
