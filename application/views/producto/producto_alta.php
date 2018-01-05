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
									<option value="<?=$infoCat->id_categoria?>" <?=empty($categoria) ? "" : "selected"?> ><?=$infoCat->nombre?></option>
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
					<div class="control-group">
						<label class="control-label">Colores:</label>
						<div class="controls">
							<label>
							<div class="checker" id="uniform-undefined">
								<div class="span6">
								<table id="tablaColores" class="table table-bordered with-check">
									<thead>
									<tr>
										<th>Seleccionar</th>
										<th>Color</th>
									</tr>
									</thead>
									<tbody id="coloresLista">
										<?php foreach($colores->result() as $infoColor): ?>
											<tr>
												<td style="text-align: center;"><input onclick="desactivaVariosColores()" id="color" type="checkbox" <?=in_array($infoColor->id_color, $colores_prod) ? 'checked="checked"' : ""?> name="color[]" class="colorSelect" value="<?=$infoColor->id_color?>"></td>
												<td><i style="background-color:#<?=$infoColor->clave?>;  color: #<?=$infoColor->clave?>; <?=($infoColor->borde == 1) ? "border: solid #666666 1px;" : ""?>" class="icon-th"></i> &nbsp;&nbsp;&nbsp; <?=$infoColor->nombre?></td>
											</tr>
										<?php endforeach; ?>
										<tr>
											<td style="text-align: center;"><input type="checkbox" <?=(in_array(0, $colores_prod)) ? 'checked="checked"' : ""?> id="varios_colores" name="varios_colores" value="1" onclick="desactivaCasillas()"></td>
											<td>Varios colores</td>
										</tr>
									</tbody>
								</table>
								</div>
								<div class=" help-block span5" style="text-align: justify;">
									*Nota: Si se indica un color al hacer una entrada de producto se solicitará un registro de entrada por color, en caso de solo requerir indicar que el producto se encuentra en varios colores, se puede especificar en la descripción o bien, seleccionando la casilla "Varios colores"
								</div>
							</div>
							</label>
						</div>
					</div>
					<?php if(isset($imagen)){ ?>
					<div class="control-group">
						<label class="control-label">Imagen: <a title="Eliminar" href="<?=base_url().'elimina_imagen_producto/'.$registro?>"><i class="icon-trash icon-2x"></i></a></label>
						<div class="controls">
							<img src="<?=base_url().'assets/img/producto/'.$imagen?>" width="100%" class="span5 m-wrap">
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
						<a href="<?=base_url()?>productos" class="btn">Cancelar</a>
					</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>

