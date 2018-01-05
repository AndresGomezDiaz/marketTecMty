<?php $attributes = array("role"=>"form", "id" => "form-login", "name" => "form-login"); ?>
<?=form_open(base_url().'Login/user_login',$attributes)?>
<?=form_hidden('token',$token)?>
<div class="control-group normal_text"> <h3><a href="<?=base_url()?>"><img src="<?=base_url()?>assets/img/LogoTecGrande.png" alt="Logo" /></a></h3></div>
<div class="control-group">
    <div class="controls">
        <div class="main_input_box">
            <span class="add-on bg_tec"><i class="icon-user"> </i></span><input type="text" name="username" placeholder="Usuario" />
        </div>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <div class="main_input_box">
            <span class="add-on bg_tec"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Contraseña" />
        </div>
    </div>
</div>
<?php if($this->session->flashdata('usuario_incorrecto')){ ?>
<div class="alert alert-error">
	<button class="close" data-dismiss="alert">×</button>
	<strong>Error!</strong> Datos de acceso incorrectos
</div>
<?php } ?>
<div class="form-actions">
    <span class="pull-right"> <button type="submit" class="btn btn-tecMty">Entrar</button></span>
</div>
<?=form_close()?>
