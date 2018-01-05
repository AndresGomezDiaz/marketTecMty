<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row-fluid">
	<div class="span12">
		<?php if($this->session->flashdata('correcto')){ ?>
		<div class="alert alert-success alert-block">
			<button class="close" data-dismiss="success">×</button>
			<strong>Entrada registrada correctamente</strong>
		</div>
		<?php } ?>
		<div class="widget-box">
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<td colspan="5" style="text-align: right;">
								<a href="#MyModal1" data-toggle="modal" class="btn btn-sm btn-primary btn-flat">Filtrar</a>&nbsp;&nbsp;&nbsp;
								<a href="registrar_entrada" class="btn btn-success"> + Registrar entrada</a>&nbsp;&nbsp;&nbsp;
								<a class="btn btn-info"> Exportar</a>
							</td>
						</tr>
						<tr>
							<th>Entrada</th>
							<th>Fecha registro</th>
							<th>Productos</th>
							<th colspan="4">Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($datos->result() as $info): ?>
						<tr class="gradeX">
							<td><?=$info->consecutivo?></td>
							<td><?=$info->fecha_reg?></td>
							<td><?=Entrada::numeroProductos($info->id_entrada)?></td>
							<td style="text-align: center;"><a title="Eliminar" href="<?=base_url().'eliminar_categoria/'.$info->id_categoria?>"><i class="icon-trash icon-2x"></i></a></td>
							<?php if($info->estatus == 1){ ?>
							<td style="text-align: center;"><a title="Inactivar" href="<?=base_url().'inactivar_categoria/'.$info->id_categoria?>"><i class="icon-remove icon-2x"></i></a></td>
							<?php }else{ ?>
							<td style="text-align: center;"><i class="icon-ban-circle icon-2x"></i></td>
							<?php } ?>
							<td style="text-align: center;"><a title="Editar" href="<?=base_url().'editar_categoria/'.$info->id_categoria?>"><i class="icon-edit icon-2x"></i></a></td>
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
		<h3>Filtrar Entradas</h3>
	</div>
	<div class="modal-body">
		<div class="control-group">
			<label class="control-label">Numero de entrada:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre" class="span5 m-wrap" value="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Costo del plan:</label>
			<div class="controls">
				<input type="text" name="costo" id="costo" class="span5 m-wrap" value="">
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
		<button type="submit" class="btn btn-primary">Buscar</button>
	</div>
</div>
