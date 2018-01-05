<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class EntradaAlta extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Entrada_model', 'Categoria_model', 'Producto_model', 'Color_model'));
    }

    public function index(){
    	if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		//obtenemos las categorias:
		$categorias = $this->Categoria_model->infoCategoria();
		//obtenemos los productos
		$productos = $this->Producto_model->infoProducto();
		//Obtenemos los colores
		$colores = $this->Color_model->dimeColores();

		$data=array(
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash(),
					"categorias"	=> $categorias,
					"productos"		=> $productos,
					"colores"		=> $colores,
					"numero"		=> "",
					"notas"			=> "",
					);

		$this->template->add_css(array(base_url().'assets/css/uniform.css'));
		$this->template->add_js(array(
										base_url().'assets/jsApp/entrada.js',
										base_url().'assets/jsApp/producto.js',
										base_url().'assets/js/jquery.uniform.js',
										base_url().'assets/js/select2.min.js',
										base_url().'assets/js/matrix.form_common.js'
										));
		$this->template->set('page','Entradas / Registrar entrada');
		$this->template->load('sys_layout', 'contents' , 'inventario/entrada_alta', $data);
    }

    public function guardarEntrada($registro = NULL){
    	var_dump($_POST);
    }


}
