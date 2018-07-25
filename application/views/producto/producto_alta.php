<?php defined('BASEPATH') OR exit('No direct script access allowed');
$attributes = array("role"=>"form", "class" => "form-horizontal", "id" => "registrar_plan", "name" => "registrar_plan");
if(isset($registro)){ $ligaUrl = base_url().'producto/ProductoAlta/guardarProducto/'.$registro; }else{ $ligaUrl = base_url().'producto/ProductoAlta/guardarProducto'; }
?>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>Registrar producto</h5>
			</div>
			<div class="widget-content nopadding">
				<?=form_open_multipart($ligaUrl, $attributes)?>
					<div class="control-group <?=empty(form_error('nombre')) ? "" : "error"?>">
						<label class="control-label">Nombre:</label>
						<div class="controls">
							<input type="text" name="nombre" id="nombre" class="span11 m-wrap" value="<?=$nombre?>">
							<?php echo form_error('nombre'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('clave')) ? "" : "error"?>">
						<label class="control-label">Clave de producto:</label>
						<div class="controls">
							<input type="text" name="clave" id="clave" class="span11 m-wrap" value="<?=$clave?>">
							<?php echo form_error('clave'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('categoria')) ? "" : "error"?>">
						<label class="control-label">Categoría:</label>
						<div class="controls">
							<select name="categoria" id="categoria"  class="span11 m-wrap">
								<option value="">Seleccione</option>
								<?php foreach($categorias->result() as $infoCat): ?>
									<option value="<?=$infoCat->id_categoria?>" <?=($categoria == $infoCat->id_categoria) ? "selected" : ""?> ><?=$infoCat->nombre?></option>
								<?php endforeach; ?>
							</select>
							<?php echo form_error('categoria'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('precio')) ? "" : "error"?>">
						<label class="control-label">Precio:</label>
						<div class="controls">
							<input type="text" name="precio" id="precio" class="span11 m-wrap" value="<?=$precio?>">
							<?php echo form_error('precio'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('descripcion')) ? "" : "error"?>">
						<label class="control-label">Descripción:</label>
						<div class="controls">
							<textarea name="descripcion" id="descripcion" class="span11 m-wrap"><?=$descripcion?></textarea>
							<?php echo form_error('descripcion'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('color')) ? "" : "error"?>">
						<label class="control-label">Color:</label>
						<div class="controls">
							<select name="color" id="color" class="span11 m-wrap">
								<option value="0">Varios colores</option>
								<?php foreach($colores->result() as $infoColor): ?>
									<option value="<?=$infoColor->id_color?>" <?=($color == $infoColor->id_color) ? "selected" : ""?> ><?=$infoColor->nombre?></option>
								<?php endforeach; ?>
							</select>
							<?php echo form_error('color'); ?>
						</div>
					</div>
					<?php if(isset($imagen)){ ?>
					<div class="control-group">
						<label class="control-label">Imagen: <a title="Eliminar" href="<?=base_url().'elimina_imagen_producto/'.$registro?>"><i class="icon-trash icon-2x"></i></a></label>
						<div class="controls">
							<img src="<?=base_url().'assets/img/producto/'.$imagen?>" width="100%" class="span5 m-wrap">
							<span class="help-inline">La imagen tiene que ser en un tamaño mínimo de 782 * 800 pixeles optimizada para web</span>
						</div>
					</div>
					<?php }else{ ?>
					<div class="control-group">
						<label class="control-label">Imagen:</label>
						<div class="controls">
							<input type="file" name="archivo" id="archivo">
							<span class="help-inline">La imagen tiene que ser en un tamaño mínimo de 782 * 800 pixeles optimizada para web</span>
						</div>
					</div>
					<?php } ?>
					<div class="form-actions text-right">
						<input type="submit" value="Guardar" class="btn btn-success">&nbsp;&nbsp;&nbsp;
						<a href="<?=base_url()?>productos" class="btn">Cancelar</a>
					</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>

