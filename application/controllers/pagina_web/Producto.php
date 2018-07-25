<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
		$this->load->helper('form');
		$this->load->model('Producto_model');
    }

	public function index(){
		$productos = $this->Producto_model->infoProducto();

		$data = array(
						"nomToken"		=> $this->security->get_csrf_token_name(),
						"valueToken"	=> $this->security->get_csrf_hash(),
						"productos"		=> $productos
					);

		$this->template->add_js();
		$this->template->add_css();
		$this->template->load('web_layout', 'contents' , 'pagina_web/productos', $data);
	}

}

?>
