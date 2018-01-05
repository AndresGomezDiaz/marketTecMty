<?php defined('BASEPATH') OR exit('No direct script access allowed');
$attributes = array("role"=>"form", "class" => "form-horizontal", "id" => "registrar_entrada", "name" => "registrar_entrada");
if(isset($registro)){ $ligaUrl = base_url().'inventario/EntradaAlta/guardarEntrada/'.$registro; }else{ $ligaUrl = base_url().'inventario/EntradaAlta/guardarEntrada'; }
?>
<?=form_open_multipart($ligaUrl,$attributes)?>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>Registrar entrada</h5>
			</div>
			<div class="widget-content nopadding">
				<div class="control-group <?=empty(form_error('numero')) ? "" : "error"?>">
					<label class="control-label">Numero de entrada:</label>
					<div class="controls">
						<input type="text" name="numero" id="numero" required="required" class="span11 m-wrap" value="<?=$numero?>">
						<?php echo form_error('numero'); ?>
					</div>
				</div>
				<div class="control-group <?=empty(form_error('descripcion')) ? "" : "error"?>">
					<label class="control-label">Notas:</label>
					<div class="controls">
						<textarea name="descripcion" id="descripcion" class="span11 m-wrap"><?=$notas?></textarea>
						<?php echo form_error('descripcion'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>Seleccionar Productos</h5>
			</div>
			<div class="widget-content nopadding">
				<div class="control-group">
					<label class="control-label">Categoría:</label>
					<div class="controls">
						<select name="categoria" id="categoria" categoriaAttri=''>
							<option value=""></option>
							<?php foreach($categorias->result() as $info): ?>
								<option value="<?=$info->id_categoria?>"><?=$info->nombre?></option>
							<?php endforeach; ?>
						</select>
						<span id="Buscando"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Producto:</label>
					<div class="controls">
						<select name="productoCat" id="productoCat">
							<option value=""></option>
							<?php foreach($productos->result() as $info): ?>
								<option value="<?=$info->id_producto.'-'.$info->nombre?>"><?=$info->categoria.'; '.$info->nombre?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Cantidad:</label>
					<div class="controls">
						<input type="text" name="cantidadProducto" id="cantidadProducto" required="required" class="span11 m-wrap">
					</div>
				</div>
				<div class="alert alert-error alert-block" style="display: none;" id="errorProducto"> <a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Error!</h4>
					Debe elegir un producto e ingresar una cantidad para poder agregar el producto
          		</div>
				<div class="form-actions text-right">
					<input type="button" class="add-row btn btn-success" value="Agregar producto">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>Productos a ingresar</h5>
			</div>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered" id="tablaProductos">
				<thead>
					<tr>
						<td colspan="3" style="text-align: right">
							<input type="button" class="delete-row btn btn-danger" value="Eliminar productos">
						</td>
					</tr>
					<tr>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody id="listaProductos">

				</tbody>
			</table>
			<div class="form-actions text-right">
				<input type="submit" value="Guardar entrada" id="guardarEntrada" disabled="disabled" class="btn btn-success">&nbsp;&nbsp;&nbsp;
				<a href="<?=base_url()?>entradas" class="btn">Cancelar</a>
			</div>
		</div>
	</div>
</div>

<?=form_close()?>
