<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
		$this->load->helper('form');
    }

	public function index(){
		$data = array(
						"nomToken"		=> $this->security->get_csrf_token_name(),
						"valueToken"	=> $this->security->get_csrf_hash()
					);

		$this->template->add_js();
		$this->template->add_css();
		$this->template->load('web_layout', 'contents' , 'pagina_web/productos', $data);
	}

}

?>
