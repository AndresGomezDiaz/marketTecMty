<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Cliente extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Cliente_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$filtro = array();
			empty($this->input->post('nombre')) ? null : $filtro['a.nombre'] = $this->input->post('nombre');
			empty($this->input->post('correo')) ? null : $filtro['a.correo'] = $this->input->post('correo');
			empty($this->input->post('numero')) ? null : $filtro['b.numero'] = $this->input->post('numero');
			empty($this->input->post('plan')) ? null : $filtro['b.id_plan'] = $this->input->post('plan');
		}else{
			$filtro = null;
		}

		$datos = $this->Cliente_model->infoClienteLista($filtro);
		$planes = array();

		$data=array("datos"			=> $datos,
					"planes"		=> $planes,
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash(),
					"nombre"		=> empty($this->input->post('nombre')) ? "" : $this->input->post('nombre'),
					"estatus"		=> empty($this->input->post('estatus')) ? "" : $this->input->post('estatus'),
					"correo"		=> empty($this->input->post('correo')) ? "" : $this->input->post('correo'),
					"numero"		=> empty($this->input->post('numero')) ? "" : $this->input->post('numero'),
					"plan"			=> empty($this->input->post('plan')) ? "" : $this->input->post('plan'),
					);

		$this->template->add_css();
		$this->template->add_js(array(
										base_url().'assets/js/jquery.uniform.js',
										base_url().'assets/js/select2.min.js',
										base_url().'assets/js/jquery.dataTables.min.js',
										base_url().'assets/jsApp/plan.js'));
		$this->template->set('page','Clientes');
		$this->template->load('sys_layout', 'contents' , 'usuario/cliente_lista', $data);
	}
}
?>
