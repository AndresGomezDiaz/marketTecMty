<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Producto extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Producto_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}


		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$filtro = array();
			empty($this->input->post('nombre')) ? null : $filtro['nombre'] = $this->input->post('nombre');
			empty($this->input->post('costo')) ? null : $filtro['costo'] = $this->input->post('costo');
			empty($this->input->post('categoria')) ? null : $filtro['categoria'] = $this->input->post('categoria');
		}else{
			$filtro = null;
		}

		//obtenemos los planes
		$datos = $this->Producto_model->infoProducto($filtro);

		$data=array("datos"			=> $datos,
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash()
					);

		$this->template->add_css();
		$this->template->add_js(array(
										base_url().'assets/js/jquery.uniform.js',
										base_url().'assets/js/select2.min.js',
										base_url().'assets/js/jquery.dataTables.min.js',
										base_url().'assets/jsApp/plan.js'));
		$this->template->set('page','Productos');
		$this->template->load('sys_layout', 'contents' , 'producto/producto_lista', $data);
	}



}
?>
