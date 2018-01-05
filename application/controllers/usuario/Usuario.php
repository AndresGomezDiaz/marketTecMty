<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Usuario extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Usuario_model', 'Perfil_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$filtro = array();
			empty($this->input->post('nombre')) ? null : $filtro['nombre'] = $this->input->post('nombre');
			empty($this->input->post('perfil')) ? null : $filtro['perfil'] = $this->input->post('perfil');
			empty($this->input->post('correo')) ? null : $filtro['correo'] = $this->input->post('correo');
			empty($this->input->post('numero')) ? null : $filtro['numero'] = $this->input->post('numero');
		}else{
			$filtro = null;
		}

		$datos = $this->Usuario_model->infoUsuario($filtro);
		$perfiles = $this->Perfil_model->infoPerfil();

		$data=array("datos"			=> $datos,
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash(),
					"nombre"		=> empty($this->input->post('nombre')) ? "" : $this->input->post('nombre'),
					"estatus"		=> empty($this->input->post('estatus')) ? "" : $this->input->post('estatus'),
					"perfil"		=> empty($this->input->post('perfil')) ? "" : $this->input->post('perfil'),
					"correo"		=> empty($this->input->post('correo')) ? "" : $this->input->post('correo'),
					"numero"		=> empty($this->input->post('numero')) ? "" : $this->input->post('numero')
					);

		$this->template->add_css();
		$this->template->add_js(array(
										base_url().'assets/js/jquery.uniform.js',
										base_url().'assets/js/select2.min.js',
										base_url().'assets/js/jquery.dataTables.min.js',
										base_url().'assets/jsApp/plan.js'));
		$this->template->set('page','Usuarios');
		$this->template->load('sys_layout', 'contents' , 'usuario/usuario_lista', $data);
	}
}
?>
