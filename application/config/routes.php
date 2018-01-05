<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['backend'] = 'HomeSistema';
$route['logoutBackend'] = 'Login/logout';

//		file:///C:/wamp64/www/CANVAS/Package-HTML/HTML/cart.html
//		file:///C:/wamp64/www/CANVAS/Package-HTML/HTML/checkout.html

//Pagina web:
$route['web_productos'] = 'pagina_web/Producto';
$route['web_categorias'] = 'pagina_web/Categoria';
$route['web_carrito'] = 'pagina_web/Carrito';
$route['web_producto_detalle'] = 'pagina_web/ProductoDetalle';
//$route['web_producto_detalle/(:any)'] = 'pagina_web/ProductoDetalle/index/$1';
$route['web_pago'] = 'pagina_web/MetodoPago';
$route['web_compra'] = 'pagina_web/EstatusCompra';
$route['aviso_legal'] = 'pagina_web/Legal';
$route['politica'] = 'pagina_web/Legal/politica';
$route['sobre_sitio'] = 'pagina_web/Legal/sitio';


//Categorias:
$route['categorias'] = "producto/Categoria";
$route['registrar_categoria'] = "producto/CategoriaAlta";
$route['editar_categoria/(:any)'] = "producto/CategoriaAlta/editarCategoria/$1";
$route['eliminar_categoria/(:any)'] = "producto/CategoriaAlta/eliminarCategoria/$1";
$route['inactivar_categoria/(:any)'] = "producto/CategoriaAlta/inactivarCategoria/$1";
$route['activar_categoria/(:any)'] = "producto/CategoriaAlta/activarCategoria/$1";
$route['elimina_imagen_categoria/(:any)'] = "producto/CategoriaAlta/eliminarImagen/$1";

//Productos:
$route['productos'] = "producto/Producto";
$route['registrar_producto'] = "producto/ProductoAlta";
$route['editar_producto/(:any)'] = "producto/ProductoAlta/editarProducto/$1";
$route['eliminar_producto/(:any)'] = "producto/ProductoAlta/eliminarProducto/$1";
$route['inactivar_producto/(:any)'] = "producto/ProductoAlta/inactivarProducto/$1";
$route['activar_producto/(:any)'] = "producto/ProductoAlta/activarProducto/$1";
$route['elimina_imagen_producto/(:any)'] = "producto/ProductoAlta/eliminarImagen/$1";

//Inventario Entradas:
$route['entradas'] = "inventario/Entrada";
$route['registrar_entrada'] = "inventario/EntradaAlta";
$route['buscar_producto'] = "inventario/BuscarProducto";


//Inventario Salidas:
$route['salidas'] = "inventario/Salidas";


//Usuarios:
$route['usuarios'] = 'usuario/Usuario';
$route['registrar_usuarios'] = 'usuario/UsuarioAlta';

//Clientes:
$route['clientes'] = 'usuario/Cliente';
$route['registrar_clientes'] = 'usuario/ClienteAlta';
$route['editar_cliente/(:any)'] = 'usuario/ClienteAlta/editaCliente/$1';
$route['eliminar_cliente/(:any)'] = 'usuario/ClienteAlta/eliminaCliente/$1';
$route['activar_cliente/(:any)'] = 'usuario/ClienteAlta/activaCliente/$1';
$route['inactivar_cliente/(:any)'] = 'usuario/ClienteAlta/inactivaCliente/$1';
$route['detalle_cliente/(:any)'] = 'usuario/Cliente/detalleCliente/$1';

//slider home
$route['slider_home'] = 'slider/Slider';
$route['registrar_slide'] = 'slider/SliderAlta';
$route['editar_slider/(:any)'] = 'slider/SliderAlta/editarSlider/$1';
$route['elimina_slider/(:any)'] = 'slider/SliderAlta/eliminarSlider/$1';
$route['baja_slide/(:any)'] = 'slider/SliderAlta/bajaSlide/$1';
$route['sube_slide/(:any)'] = 'slider/SliderAlta/subeSlide/$1';

$route['publicidad_home'] = 'slider/Publicidad';
$route['registrar_publicidad'] = 'slider/PublicidadAlta';
$route['editar_publicidad/(:any)'] = 'slider/PublicidadAlta/editarPublicidad/$1';
$route['elimina_publicidad/(:any)'] = 'slider/PublicidadAlta/eliminarPublicidad/$1';
$route['baja_publicidad/(:any)'] = 'slider/PublicidadAlta/bajaPublicidad/$1';
$route['sube_publicidad/(:any)'] = 'slider/PublicidadAlta/subePublicidad/$1';

