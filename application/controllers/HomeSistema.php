<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HomeSistema extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		header("Access-Control-Allow-Origin: *");
		$data = array("nombre"=>$this->session->userdata('nombre'),"apellidos"=>$this->session->userdata('apellidos'));
		$this->template->set('title', 'Home');
		$this->template->add_js();
		$this->template->add_css();
		$this->template->set('page','Home');
		$this->template->load('sys_layout', 'contents' , 'home', $data);
	}

}

?>
