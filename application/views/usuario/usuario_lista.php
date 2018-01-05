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
								<a href="registrar_usuarios" class="btn btn-success"> + Registrar usuario</a>&nbsp;&nbsp;&nbsp;
								<a class="btn btn-info"> Exportar</a>
							</td>
						</tr>
						<tr>
							<th>Nombre</th>
							<th>Perfil</th>
							<th>Usuario</th>
							<th colspan="4">Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($datos->result() as $info): ?>
						<tr class="gradeX">
							<td><?=$info->nombre?></td>
							<td><?=$info->perfil?></td>
							<td><?=$info->correo?></td>
							<td style="text-align: center;"><a title="Eliminar" href="#"><i class="icon-trash icon-2x"></i></a></td>
							<td style="text-align: center;"><a title="Bloquear" href="#"><i class="icon-ban-circle icon-2x"></i></a></td>
							<td style="text-align: center;"><a title="Editar" href="#"><i class="icon-edit icon-2x"></i></a></td>
							<td style="text-align: center;"><a title="Detalle" href="#"><i class="icon-file icon-2x"></i></a></td>
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
		<h3>Filtrar planes</h3>
	</div>
	<div class="modal-body">
		<div class="control-group">
			<label class="control-label">Nombre del plan:</label>
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
