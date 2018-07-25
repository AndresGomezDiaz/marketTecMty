<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
		$this->load->helper('form');
		$this->load->model('Categoria_model');
    }

	public function index(){
		$categorias = $this->Categoria_model->infoCategoria();
		$data = array(
						"nomToken"		=> $this->security->get_csrf_token_name(),
						"valueToken"	=> $this->security->get_csrf_hash(),
						"categorias"	=> $categorias
					);

		$this->template->add_js();
		$this->template->add_css();
		$this->template->load('web_layout', 'contents' , 'pagina_web/categorias', $data);
	}

}

?>
