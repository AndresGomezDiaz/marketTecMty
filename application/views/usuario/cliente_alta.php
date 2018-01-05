<?php defined('BASEPATH') OR exit('No direct script access allowed');
$attributes = array("role"=>"form", "class" => "form-horizontal", "id" => "registrar_usuario", "name" => "registrar_usuario");
if(isset($registro)){ $ligaUrl=base_url().'usuario/ClienteAlta/registraCliente/'.$registro; }else{ $ligaUrl = base_url().'usuario/ClienteAlta/registraCliente';  }
?>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>Registrar donante</h5>
			</div>
			<div class="widget-content nopadding">
				<?=form_open_multipart($ligaUrl,$attributes)?>
					<input type="hidden" name="liga" id="liga" value="<?=base_url().'plan/PlanEquipoRelaciona/dimePlanEquipo'?>">
					<input type="hidden" name="<?=$nomToken?>" value="<?=$valueToken?>">
					<div class="control-group <?=empty(form_error('nombre')) ? "" : "error"?>">
						<label class="control-label">Nombre:</label>
						<div class="controls">
							<input type="text" name="nombre" id="nombre" class="span11 m-wrap" value="<?=$nombre?>">
							<?php echo form_error('nombre'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('apellidos')) ? "" : "error"?>">
						<label class="control-label">Apellidos:</label>
						<div class="controls">
							<input type="text" name="apellidos" id="apellidos" class="span11 m-wrap" value="<?=$apellidos?>">
							<?php echo form_error('apellidos'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('fecha_nac')) ? "" : "error"?>">
						<label class="control-label">Fecha de nacimiento:</label>
						<div class="controls">
							<input type="text" name="fecha_nac" id="fecha_nac" class="span11 m-wrap past-enabled" value="<?=$fecha_nac?>" placeholder="MM/DD/YYYY">
							<?php echo form_error('fecha_nac'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('sexo')) ? "" : "error"?>">
						<label class="control-label">Sexo:</label>
						<div class="controls">
							<select name="sexo" id="sexo" class="span11 m-wrap">
								<option value="">Seleccione</option>
								<option value="M" <?=($sexo == 'M') ? "selected" : ""?>>Hombre</option>
								<option value="F" <?=($sexo == 'F') ? "selected" : ""?>>Mujer</option>
							</select>
							<?php echo form_error('sexo'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('correo')) ? "" : "error"?>">
						<label class="control-label">Correo:</label>
						<div class="controls">
							<input type="text" name="correo" id="correo" class="span11 m-wrap" value="<?=$correo?>">
							<?php echo form_error('correo'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('numero')) ? "" : "error"?>">
						<label class="control-label">Celular:</label>
						<div class="controls">
							<input type="text" name="numero" id="numero" class="span11 m-wrap" value="<?=$numero?>">
							<?php echo form_error('numero'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('codigo_postal')) ? "" : "error"?>">
						<label class="control-label">Codigo postal:</label>
						<div class="controls">
							<input type="text" name="codigo_postal" id="codigo_postal" class="span11 m-wrap" value="<?=$codigo_postal?>">
							<?php echo form_error('codigo_postal'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('vigencia')) ? "" : "error"?>">
						<label class="control-label">Vigencia:</label>
						<div class="controls">
							<select name="vigencia" id="vigencia" class="span11 m-wrap">
								<option value="">Seleccione</option>
								<option value="12" <?=($vigencia == 12) ? "selected" : ""?>>12 Meses</option>
								<option value="18" <?=($vigencia == 18) ? "selected" : ""?>>18 Meses</option>
								<option value="24" <?=($vigencia == 24) ? "selected" : ""?>>24 Meses</option>
							</select>
							<?php echo form_error('vigencia'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('plan')) ? "" : "error"?>">
						<label class="control-label">Plan:</label>
						<div class="controls">
							<select name="plan" id="plan" equipoAttri='<?=empty($equipo) ? "" : $equipo?>' class="span11 m-wrap">
								<option value="">Seleccione</option>
								<?php foreach($planes->result() as $info): ?>
									<option value="<?=$info->id_plan?>" <?=($plan == $info->id_plan) ? "selected" : ""?>><?=$info->nombre?></option>
								<?php endforeach; ?>
							</select>&nbsp;<span id='Buscando'></span>
							<?php echo form_error('plan'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('equipo')) ? "" : "error"?>">
						<label class="control-label">Equipo:</label>
						<div class="controls">
							<select name="equipo" id="equipo"  class="span11 m-wrap">
								<option value="">Seleccione</option>
							</select>
							<?php echo form_error('equipo'); ?>
						</div>
					</div>
					<div class="form-actions text-right">
						<input type="submit" value="Guardar" class="btn btn-success">&nbsp;&nbsp;&nbsp;
						<a href="<?=base_url().'clientes'?>" class="btn">Cancelar</a>
					</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>

