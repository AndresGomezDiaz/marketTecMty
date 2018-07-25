<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class PublicidadAlta extends CI_Controller {

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
		$this->template->add_css();
		$this->template->add_js();
		//obtenemos las campañas de correo
		$datos = array();

		$data=array(
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash(),
					"liga"			=> empty(set_value('liga')) ? "" : set_value('liga'),
					"texto"			=> empty(set_value('texto')) ? "" : set_value('texto'),
					"imagen"		=> ""
					);

		$this->template->set('page','Slider / Registrar publicidad');
		$this->template->load('sys_layout', 'contents' , 'slider/publicidad_alta', $data);
	}

	public function editarPublicidad($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$this->template->add_css();
			$this->template->add_js();
			//obtenemos las campañas de correo
			$datos = $this->Publicidad_model->slidersLista(array("id_publicidad_home"=>$registro));
			$row = $datos->row(0);

			$data=array(
						"nomToken"		=> $this->security->get_csrf_token_name(),
						"valueToken"	=> $this->security->get_csrf_hash(),
						"liga"			=> empty(set_value('liga')) ? $row->liga : set_value('liga'),
						"texto"			=> empty(set_value('texto')) ? $row->texto : set_value('texto'),
						"imagen"		=> $row->imagen,
						"registro"		=> $registro
						);

			$this->template->set('page','Publicidad / Registrar publicidad');
			$this->template->load('sys_layout', 'contents' , 'slider/publicidad_alta', $data);
		}else{
			redirect(base_url().'publicidad_home');
		}
	}


	public function eliminarPublicidad($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$this->Publicidad_model->eliminaSlider($registro);
			redirect(base_url().'publicidad_home');
		}else{
			redirect(base_url().'publicidad_home');
		}
	}

	public function guardarPublicidad($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		$this->form_validation->set_rules('liga', 'liga de la publicidad', 'valid_url');

        $this->form_validation->set_error_delimiters('<span class="help-inline">','</span>');
        $this->form_validation->set_message('required', 'Este campo es requerido.');

        if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			if(isset($registro)){
				$data = array(
								"liga"		=> $this->input->post('liga')
							);
				//subimos el archivo:
				if($_FILES['archivo']['name'] && $_FILES['archivo']['type']){
					$path = $_FILES['archivo']['name'];
					$ext = pathinfo($path, PATHINFO_EXTENSION);
					$hoyAhora = date("Y-m-d H:i:s");
					$nomFinal = human_to_unix($hoyAhora).'.'.$ext;
					$ruta = 'assets/img/publicidad/'.$nomFinal;
					move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
					$data['imagen'] = $nomFinal;
				}
				$result = $this->Publicidad_model->editarSlider($registro, $data);
			}else{
				//creamos arreglo para guardar registro:
				$data = array(
								"liga"		=> $this->input->post('liga')
							);
				//subimos el archivo:
				if($_FILES['archivo']['name'] && $_FILES['archivo']['type']){
					$path = $_FILES['archivo']['name'];
					$ext = pathinfo($path, PATHINFO_EXTENSION);
					$hoyAhora = date("Y-m-d H:i:s");
					$nomFinal = human_to_unix($hoyAhora).'.'.$ext;
					$ruta = 'assets/img/publicidad/'.$nomFinal;
					move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
					$data['imagen'] = $nomFinal;
				}
				$result = $this->Publicidad_model->registrarSlider($data);
			}

			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'publicidad_home','refresh');
		}
	}

	public function subePublicidad($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$this->Publicidad_model->aumentaOrden($registro);
			redirect(base_url().'publicidad_home');
		}else{
			redirect(base_url().'publicidad_home');
		}
	}

	public function bajaPublicidad($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$this->Publicidad_model->reduceOrden($registro);
			redirect(base_url().'publicidad_home');
		}else{
			redirect(base_url().'publicidad_home');
		}
	}


}
?>
