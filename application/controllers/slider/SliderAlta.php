<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class SliderAlta extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Slider_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		$this->template->add_css();
		$this->template->add_js();
		//obtenemos las campañas de correo
		$datos = array();

		$data=array(
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash(),
					"nombre"		=> empty(set_value('nombre')) ? "" : set_value('nombre'),
					"texto"			=> empty(set_value('texto')) ? "" : set_value('texto'),
					"liga"			=> empty(set_value('liga')) ? "" : set_value('liga'),
					"imagen"		=> ""
					);

		$this->template->set('page','Slider / Registrar slider');
		$this->template->load('sys_layout', 'contents' , 'slider/slider_alta', $data);
	}

	public function editarSlider($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$this->template->add_css();
			$this->template->add_js();
			//obtenemos las campañas de correo
			$datos = $this->Slider_model->slidersLista(array("id_slider_home"=>$registro));
			$row = $datos->row(0);

			$data=array(
						"nomToken"		=> $this->security->get_csrf_token_name(),
						"valueToken"	=> $this->security->get_csrf_hash(),
						"nombre"		=> empty(set_value('nombre')) ? $row->nombre : set_value('nombre'),
						"texto"			=> empty(set_value('texto')) ? $row->texto : set_value('texto'),
						"liga"			=> empty(set_value('liga')) ? $row->liga : set_value('liga'),
						"imagen"		=> $row->imagen,
						"registro"		=> $registro
						);

			$this->template->set('page','Slider / Registrar slider');
			$this->template->load('sys_layout', 'contents' , 'slider/slider_alta', $data);
		}else{
			redirect(base_url().'slider_home');
		}
	}


	public function eliminarSlider($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$this->Slider_model->eliminaSlider($registro);
			redirect(base_url().'slider_home');
		}else{
			redirect(base_url().'slider_home');
		}
	}

	public function guardarSlider($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		$this->form_validation->set_rules('nombre', 'nombre del plan', 'required');

        $this->form_validation->set_error_delimiters('<span class="help-inline">','</span>');
        $this->form_validation->set_message('required', 'Este campo es requerido.');

        if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			if(isset($registro)){
				$data = array(
								"nombre" 	=> $this->input->post("nombre"),
								"texto" 	=> $this->input->post("texto"),
								"liga"		=> $this->input->post('liga')
							);
				//subimos el archivo:
				if($_FILES['archivo']['name'] && $_FILES['archivo']['type']){
					$path = $_FILES['archivo']['name'];
					$ext = pathinfo($path, PATHINFO_EXTENSION);
					$hoyAhora = date("Y-m-d H:i:s");
					$nomFinal = human_to_unix($hoyAhora).'.'.$ext;
					$ruta = 'assets/img/slider/'.$nomFinal;
					move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
					$data['imagen'] = $nomFinal;
				}
				$result = $this->Slider_model->editarSlider($registro, $data);
			}else{
				//creamos arreglo para guardar registro:
				$data = array(
								"nombre" 	=> $this->input->post("nombre"),
								"texto" 	=> $this->input->post("texto"),
								"liga"		=> $this->input->post('liga')
							);
				//subimos el archivo:
				if($_FILES['archivo']['name'] && $_FILES['archivo']['type']){
					$path = $_FILES['archivo']['name'];
					$ext = pathinfo($path, PATHINFO_EXTENSION);
					$hoyAhora = date("Y-m-d H:i:s");
					$nomFinal = human_to_unix($hoyAhora).'.'.$ext;
					$ruta = 'assets/img/slider/'.$nomFinal;
					move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
					$data['imagen'] = $nomFinal;
				}
				$result = $this->Slider_model->registrarSlider($data);
			}

			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'slider_home','refresh');
		}
	}

	public function subeSlide($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$this->Slider_model->aumentaOrden($registro);
			redirect(base_url().'slider_home');
		}else{
			redirect(base_url().'slider_home');
		}
	}

	public function bajaSlide($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$this->Slider_model->reduceOrden($registro);
			redirect(base_url().'slider_home');
		}else{
			redirect(base_url().'slider_home');
		}
	}


}
?>
