<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row-fluid">
	<div class="span12">
		<?php if($this->session->flashdata('correcto')){ ?>
		<div class="alert alert-success alert-block">
			<button class="close" data-dismiss="success">×</button>
			<strong><?=$this->session->flashdata('msg')?></strong>
		</div>
		<?php } ?>
		<?php if($this->session->flashdata('error')){ ?>
		<div class="alert alert-error alert-block">
			<button class="close" data-dismiss="alert">×</button>
			<strong><?=$this->session->flashdata('error')?></strong>
		</div>
		<?php } ?>
		<div class="widget-box">
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<td colspan="8" style="text-align: right;">
								<a href="#MyModal1" data-toggle="modal" class="btn btn-sm btn-primary btn-flat">Filtrar</a>&nbsp;&nbsp;&nbsp;
								<a href="registrar_clientes" class="btn btn-success"> + Registrar cliente</a>&nbsp;&nbsp;&nbsp;
								<a class="btn btn-info"> Exportar</a>
							</td>
						</tr>
						<tr>
							<th>Nombre</th>
							<th>Plan</th>
							<th>Correo</th>
							<th>Numero</th>
							<th colspan="4">Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($datos->result() as $info): ?>
						<tr class="gradeX">
							<td><?=$info->nombre?></td>
							<td><?=$info->nombre_plan?></td>
							<td><?=$info->correo?></td>
							<td><?=$info->numero?></td>
							<td style="text-align: center;"><a title="Eliminar" href="<?=base_url().'eliminar_cliente/'.$info->id_usuario?>"><i class="icon-trash icon-2x"></i></a></td>
							<?php if($info->estatus == 1){ ?>
							<td style="text-align: center;"><a title="Bloquear" href="<?=base_url().'inactivar_cliente/'.$info->id_usuario?>"><i class="icon-ban-circle icon-2x"></i></a></td>
							<?php }else{ ?>
							<td style="text-align: center;"><a title="Desbloquear" href="<?=base_url().'activar_cliente/'.$info->id_usuario?>"><i class="icon-ban-ok icon-2x"></i></a></td>
							<?php } ?>

							<td style="text-align: center;"><a title="Editar" href="<?=base_url().'editar_cliente/'.$info->id_usuario?>"><i class="icon-edit icon-2x"></i></a></td>
							<td style="text-align: center;"><a title="Detalle" href="<?=base_url().'detalle_cliente/'.$info->id_usuario?>"><i class="icon-file icon-2x"></i></a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal hide" id="MyModal1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Filtrar Clientes</h3>
	</div>
	<?php $attributes = array("role"=>"form", "class" => "form-horizontal", "id" => "filtro_cliente", "name" => "filtro_cliente"); ?>
	<?=form_open_multipart(base_url().'clientes',$attributes)?>
	<div class="modal-body">
		<div class="control-group">
			<label class="control-label">Nombre:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre" value="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Correo:</label>
			<div class="controls">
				<input type="text" name="correo" id="correo" value="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Numero:</label>
			<div class="controls">
				<input type="text" name="numero" id="numero" value="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Plan:</label>
			<div class="controls">
				<select name="estatus" id="estatus">
					<option value="">Seleccione</option>
					<?php foreach($planes->result() as $infoPlan): ?>
						<option value="<?=$infoPlan->id_plan?>"><?=$infoPlan->nombre?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Estatus:</label>
			<div class="controls">
				<select name="estatus" id="estatus">
					<option value="">Seleccione</option>
					<option value="1">Activo</option>
					<option value="2">Inactivo</option>
				</select>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
		<button type="submit" class="btn btn-primary">Buscar</button>
	</div>
	<?=form_close()?>
</div>
