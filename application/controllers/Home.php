<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
		$this->load->helper('form');
		$this->load->model(array('Publicidad_model', 'Categoria_model', 'Producto_model'));
    }

	public function index(){

		$slider = $this->Publicidad_model->slidersLista();
		$categorias = $this->Categoria_model->infoCategoria();
		$productos = $this->Producto_model->infoProducto();

		$data = array(
						"nomToken"		=> $this->security->get_csrf_token_name(),
						"valueToken"	=> $this->security->get_csrf_hash(),
						"slider"		=> $slider,
						"categorias"	=> $categorias,
						"productos"		=> $productos
					);

		$this->template->add_js();
		$this->template->add_css(array(base_url().'assetsWeb/css/components/ion.rangeslider.css'));
		$this->template->load('home_layout', 'contents' , 'pagina_web/home', $data);
	}

}

?>
