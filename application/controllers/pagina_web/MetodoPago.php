<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MetodoPago extends CI_Controller {

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
		// <script type="text/javascript" src="js/components/bs-switches.js"></script>
		//<link rel="stylesheet" href="css/components/bs-switches.css" type="text/css" />


		$this->template->add_js(array(base_url().'assetsWeb/js/components/bs-switches.js'));
		$this->template->add_css(array(base_url().'assetsWeb/css/components/bs-switches.css'));
		$this->template->load('web_layout', 'contents' , 'pagina_web/metodo_pago', $data);
	}

}

?>
