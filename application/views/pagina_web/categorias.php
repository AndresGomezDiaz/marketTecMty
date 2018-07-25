<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<div class="col_full clearfix">
			<h3>Causas</h3>
			<div class="masonry-thumbs col-3" data-big="2" data-lightbox="gallery">
				<?php foreach($categorias->result() as $info): ?>
					<a href="<?=base_url().'web_productos'?>"><img class="image_fade" src="<?=base_url().'assets/img/categoria/'.$info->imagen?>" alt="<?=$info->nombre?>"></a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
</section>
