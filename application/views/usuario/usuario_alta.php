<?php defined('BASEPATH') OR exit('No direct script access allowed');
$attributes = array("role"=>"form", "class" => "form-horizontal", "id" => "registrar_usuario", "name" => "registrar_usuario");
?>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>Registrar Plan</h5>
			</div>
			<div class="widget-content nopadding">
				<?=form_open_multipart(base_url().'usuario/UsuarioAlta/registraUsuario',$attributes)?>
					<input type="hidden" name="liga" id="liga" value="<?=base_url().'plan/PlanEquipoRelaciona/dimePlanEquipo'?>">
					<input type="hidden" name="<?=$nomToken?>" value="<?=$valueToken?>">
					<div class="control-group <?=empty(form_error('nombre')) ? "" : "error"?>">
						<label class="control-label">Nombre:</label>
						<div class="controls">
							<input type="text" name="nombre" id="nombre" class="span11 m-wrap" value="<?=set_value('nombre')?>">
							<?php echo form_error('nombre'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('apellidos')) ? "" : "error"?>">
						<label class="control-label">Apellidos:</label>
						<div class="controls">
							<input type="text" name="apellidos" id="apellidos" class="span11 m-wrap" value="<?=set_value('apellidos')?>">
							<?php echo form_error('apellidos'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('correo')) ? "" : "error"?>">
						<label class="control-label">Correo:</label>
						<div class="controls">
							<input type="text" name="correo" id="correo" class="span11 m-wrap" value="<?=set_value('correo')?>">
							<?php echo form_error('correo'); ?>
						</div>
					</div>
					<div class="control-group <?=empty(form_error('perfil')) ? "" : "error"?>">
						<label class="control-label">Perfil:</label>
						<div class="controls">
							<select name="perfil" id="perfil" class="span11 m-wrap">
								<option value="">Seleccione</option>
								<?php foreach($perfiles->result() as $infoPerfil): ?>
								<option value="<?=$infoPerfil->id_perfil?>"><?=$infoPerfil->nombre?></option>
								<?php endforeach; ?>
							</select>
							<?php echo form_error('perfil'); ?>
						</div>
					</div>
					<div id="span_pass" class="control-group <?=empty(form_error('pass')) ? "" : "error"?>">
						<label class="control-label">Contraseña:</label>
						<div class="controls">
							<input type="text" name="pass" id="pass" class="span11 m-wrap" value="<?=set_value('pass')?>">
							<?php echo form_error('pass'); ?>
						</div>
					</div>
					<div id="span_pass1" class="control-group <?=empty(form_error('pass1')) ? "" : "error"?>">
						<label class="control-label">Confirmar contraseña:</label>
						<div class="controls">
							<input type="text" name="pass1" id="pass1" class="span11 m-wrap" value="<?=set_value('pass1')?>">
							<?php echo form_error('pass1'); ?>
						</div>
					</div>
					<div class="form-actions text-right">
						<input type="submit" value="Guardar" class="btn btn-success">&nbsp;&nbsp;&nbsp;
						<a href="planes" class="btn">Cancelar</a>
					</div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>

