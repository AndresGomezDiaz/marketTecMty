<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tec de Monterrey</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/matrix-style.css" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/matrix-media.css" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/select2.css" />
	<link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.gritter.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<?=$css_adicional?>
</head>
<body>
<div id="header">
  <h1><a href="<?=base_url().'HomeSistema'?>">Plan perfecto</a></h1>
</div>
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" >
    	<a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>
    		<span class="text">Bienvenido <?=$this->session->userdata('nombre').' '.$this->session->userdata('apellidos')?></span><b class="caret"></b>
    	</a>
		<ul class="dropdown-menu">
			<li><a href="<?=base_url().'Perfil'?>"><i class="icon-user"></i> Mi Perfil</a></li>
			<li class="divider"></li>
			<li><a href="<?=base_url()?>logoutBackend"><i class="icon-signin"></i> Salir</a></li>
		</ul>
    </li>
  </ul>
</div>
<div id="sidebar">
	<ul>
		<li class=""><a href="<?=base_url()?>HomeSistema"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
		<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Productos</span></a>
			<ul>
				<li><a href="<?=base_url()?>categorias">Categorías</a></li>
				<li><a href="<?=base_url()?>productos">Productos</a></li>
				<li><a href="<?=base_url()?>entradas">Entradas</a></li>
				<li><a href="<?=base_url()?>salidas">Salidas</a></li>
			</ul>
		</li>
		<li><a href="<?=base_url()?>usuarios"><i class="icon icon-user"></i> <span>Usuarios</span></a></li>
		<li><a href="<?=base_url()?>clientes"><i class="icon icon-group"></i> <span>Donantes</span></a></li>
		<li class="submenu"> <a><i class="icon icon-th-list"></i> <span>Reportes</span></a>
			<ul>
				<li><a href="<?=base_url()?>reporte_usuario">Usuarios</a></li>
			</ul>
		</li>
		<li> <a href="publicidad_home"><i class="icon icon-th-large"></i> <span>Publicidad home</span></a></li>
		<li class=""><a href="<?=base_url().'logoutBackend'?>"><i class="icon icon-signin"></i> Salir</a></li>
	</ul>
</div>
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a> <?=$page?></a></div>
	</div>
	<div class="container-fluid">
		<?=$contents?>
	</div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"><a href="http://loyaltyrefunds.com"> &copy; Powered by Recaudia </a> </div>
</div>
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.ui.custom.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/matrix.js"></script>
<?=$scriptsJs?>
</body>
</html>
