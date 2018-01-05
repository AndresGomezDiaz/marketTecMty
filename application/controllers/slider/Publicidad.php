<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Publicidad extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Publicidad_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		//obtenemos los planes
		$datos = $this->Publicidad_model->slidersLista();

		$data=array("datos"	=> $datos);

		$this->template->add_css();
		$this->template->add_js();
		$this->template->set('page','Publicidad home');
		$this->template->load('sys_layout', 'contents' , 'slider/publicidad_lista', $data);
	}



}
?>
