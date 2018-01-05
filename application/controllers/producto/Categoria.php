<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Categoria extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Categoria_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$filtro = array();
			empty($this->input->post('nombre')) ? null : $filtro['nombre'] = $this->input->post('nombre');
		}else{
			$filtro = null;
		}

		//obtenemos los planes
		$datos = $this->Categoria_model->infoCategoria($filtro);

		$data=array("datos"			=> $datos,
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash(),
					"nombre"		=> empty($this->input->post('nombre')) ? "" : $this->input->post('nombre'),
					"estatus"		=> empty($this->input->post('estatus')) ? "" : $this->input->post('estatus'),
					);

		$this->template->add_css();
		$this->template->add_js(array(
										base_url().'assets/js/jquery.uniform.js',
										base_url().'assets/js/select2.min.js',
										base_url().'assets/js/jquery.dataTables.min.js',
										base_url().'assets/jsApp/plan.js'));
		$this->template->set('page','Categorias');
		$this->template->load('sys_layout', 'contents' , 'producto/categoria_lista', $data);
	}



}
?>
