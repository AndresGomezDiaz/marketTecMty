<?php defined('BASEPATH') OR exit('No direct script access allowed');
$attributes = array("role"=>"form", "class" => "form-horizontal", "id" => "registrar_plan", "name" => "registrar_plan");
if(isset($registro)){ $ligaUrl = base_url().'producto/CategoriaAlta/guardarCategoria/'.$registro; }else{ $ligaUrl = base_url().'producto/CategoriaAlta/guardarCategoria'; }
?>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>Registrar categoría</h5>
			</div>
			<div class="widget-content nopadding">
				<?=form_open_multipart($ligaUrl,$attributes)?>
				<!-- <form class="form-horizontal" method="post" action="#" name="form_plan_alta" id="form_plan_alta"> -->
					<div class="control-group <?=empty(form_error('nombre')) ? "" : "error"?>">
						<label class="control-label">Nombre de la categoría:</label>
						<div class="controls">
							<input type="text" name="nombre" id="nombre" class="span11 m-wrap" value="<?=$nombre?>">
							<?php echo form_error('nombre'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('descripcion')) ? "" : "error"?>">
						<label class="control-label">Descripción:</label>
						<div class="controls">
							<textarea name="descripcion" id="descripcion" class="span11 m-wrap"><?=$descripcion?></textarea>
							<?php echo form_error('descripcion'); ?>
						</div>
					</div>
					<?php if(isset($imagen)){ ?>
					<div class="control-group">
						<label class="control-label">Imagen: <a title="Eliminar" href="<?=base_url().'elimina_imagen_categoria/'.$registro?>"><i class="icon-trash icon-2x"></i></a></label>
						<div class="controls">
							<img src="<?=base_url().'assets/img/categoria/'.$imagen?>" width="100%" class="span5 m-wrap">
						</div>
					</div>
					<?php }else{ ?>
					<div class="control-group">
						<label class="control-label">Imagen:</label>
						<div class="controls">
							<input type="file" name="archivo" id="archivo">
						</div>
					</div>
					<?php } ?>
					<div class="form-actions text-right">
						<input type="submit" value="Guardar" class="btn btn-success">&nbsp;&nbsp;&nbsp;
						<a href="<?=base_url()?>categorias" class="btn">Cancelar</a>
					</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>

