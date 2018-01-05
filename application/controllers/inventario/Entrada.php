<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Entrada extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Entrada_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$filtro = array();
			empty($this->input->post('fecha')) ? null : $filtro['fecha'] = $this->input->post('fecha');
		}else{
			$filtro = null;
		}

		//obtenemos los planes
		$datos = $this->Entrada_model->infoEntrada($filtro);

		$data=array("datos"			=> $datos,
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash(),
					// "nombre"		=> empty($this->input->post('nombre')) ? "" : $this->input->post('nombre'),
					// "estatus"		=> empty($this->input->post('estatus')) ? "" : $this->input->post('estatus'),
					);

		$this->template->add_css();
		$this->template->add_js(array(
										base_url().'assets/js/jquery.uniform.js',
										base_url().'assets/js/select2.min.js',
										base_url().'assets/js/jquery.dataTables.min.js'
									));
		$this->template->set('page','Entradas');
		$this->template->load('sys_layout', 'contents' , 'inventario/entrada_lista', $data);
	}

	static function numeroProductos($entrada = NULL){
		$CI =& get_instance();
		$datos = $CI->Entrada_model->numeroProductos($entrada);
		if($datos['result'] == true){
			return $datos['value'];
		}else{
			return '0';
		}
	}


}
?>
