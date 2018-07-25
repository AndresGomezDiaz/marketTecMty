<?php defined('BASEPATH') OR exit('No direct script access allowed');
$attributes = array("role"=>"form", "class" => "form-horizontal", "id" => "registrar_equipo", "name" => "registrar_equipo");
if(isset($registro)){ $ligaUrl = base_url().'slider/PublicidadAlta/guardarPublicidad/'.$registro; }else{ $ligaUrl = base_url().'slider/PublicidadAlta/guardarPublicidad'; }
?>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>Registrar slider</h5>
			</div>
			<div class="widget-content nopadding">
				<?=form_open_multipart($ligaUrl,$attributes)?>
					<div class="control-group <?=empty(form_error('texto')) ? "" : "error"?>">
						<label class="control-label">Texto:</label>
						<div class="controls">
							<input type="text" maxlength="200" name="texto" id="texto" class="span11 m-wrap" value="<?=$texto?>">
							<?php echo form_error('texto'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('liga')) ? "" : "error"?>">
						<label class="control-label">Liga:</label>
						<div class="controls">
							<input type="text" name="liga" id="liga" class="span11 m-wrap" value="<?=$liga?>">
							<?php echo form_error('liga'); ?>
						</div>
					</div>
					<?php if($imagen != ""){ ?>
					<div class="control-group">
						<label class="control-label">Imagen: <a title="Eliminar" href="<?=base_url().'elimina_imagen_equipo/'.$registro?>"><i class="icon-trash icon-2x"></i></a></label>
						<div class="controls">
							<img src="<?=base_url().'assets/img/publicidad/'.$imagen?>" width="100%" class="span5 m-wrap">
							<span class="help-inline">La imagen tiene que ser en un tamaño mínimo de 1700 * 500 pixeles optimizada para web</span>
						</div>
					</div>
					<?php }else{ ?>
					<div class="control-group">
						<label class="control-label">Imagen:</label>
						<div class="controls">
							<input type="file" name="archivo" id="archivo" class="span11 m-wrap" required="required" value="<?=$imagen?>">
							<span class="help-inline">La imagen tiene que ser en un tamaño mínimo de 1700 * 500 pixeles optimizada para web</span>
						</div>
					</div>
					<?php } ?>
					<div class="form-actions text-right">
						<input type="submit" value="Guardar" class="btn btn-success">&nbsp;&nbsp;&nbsp;
						<a href="<?=base_url().'publicidad_home'?>" class="btn">Cancelar</a>
					</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>

