<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class UsuarioAlta extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Login_model','Usuario_model', 'Perfil_model', 'Cliente_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		//obtenemos las campañas de correo
		$datos = array();
		$perfiles = $this->Perfil_model->infoPerfil(array("id_perfil !=" => 4));

		$data=array("datos"			=> $datos,
					"perfiles"		=> $perfiles,
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash()
					);

		$this->template->add_css();
		$this->template->add_js(array(base_url().'assets/jsApp/usuario.js'));

		$this->template->set('page','Usuarios / Registrar usuario');
		$this->template->load('sys_layout', 'contents' , 'usuario/usuario_alta', $data);
	}

	public function editaUsuario($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}



	}



	public function registraUsuario($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		$this->form_validation->set_rules('nombre', 'nombre del usuario', 'required');
        $this->form_validation->set_rules('apellidos', 'apellidos del usuario', 'required');
        $this->form_validation->set_rules('correo', 'correo del usuario', 'callback_valida_mail');
        $this->form_validation->set_rules('perfil', 'perfil del usuario', 'required');
        if($this->input->post('perfil') == 4){
        	$this->form_validation->set_rules('numero', 'celular del usuario', 'required|numeric');
        	$this->form_validation->set_rules('codigo_postal', 'coigo postal del usuario', 'required|numeric');
        	$this->form_validation->set_rules('vigencia', 'vigencia de su plan', 'required');
        	$this->form_validation->set_rules('plan', 'plan que selecciono el usuario', 'required');
        	$this->form_validation->set_rules('equipo', 'equipo que selecciono el usuario', 'required');
        }else{
        	$this->form_validation->set_rules('pass', 'password de acceso', 'required');
			$this->form_validation->set_rules('pass1', 'confirmacion de password', 'callback_valida_pass');
        }

        $this->form_validation->set_error_delimiters('<span class="help-inline">','</span>');
        $this->form_validation->set_message('required', 'Este campo es requerido.');
        $this->form_validation->set_message('numeric', 'El campo solo debe contener números');

        if($this->form_validation->run() == FALSE){
        	if(isset($registro)){
        		$this->editaUsuario($registro);
        	}else{
        		$this->index();
        	}
		}else{
			if(isset($registro)){

			}else{
				//insertamos el usuario:
				$dataUsuario = array(
										"nombre" 	=> $this->input->post('nombre'),
										"apellidos"	=> $this->input->post('apellidos'),
										"correo"	=> $this->input->post('correo'),
										"id_perfil"	=> $this->input->post('perfil'),
										"pass"		=> sha1($this->input->post('pass'))
									);
				//insertamos el usuario
				$result = $this->Usuario_model->insertaUsuario($dataUsuario);
			}


			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'usuarios', 'refresh');
		}
	}



	public function valida_pass($dato){
		if($dato){
			if($this->input->post('pass') != $dato){
				$this->form_validation->set_message('valida_pass', 'Las contraseñas tiene que ser iguales');
				return false;
			}else{
				return true;
			}
		}else{
			$this->form_validation->set_message('valida_pass', 'Las contraseñas tiene que ser iguales');
			return false;
		}
	}

	public function valida_mail($dato){
		if($dato){
			//vemos is es un email valido:
			if(filter_var($dato, FILTER_VALIDATE_EMAIL)){
				//vemos si no existe en la base de datos:
				if($this->Login_model->valida_usuario($dato)){
					$this->form_validation->set_message('valida_mail', 'El correo ya existe');
					return false;
				}else{
					return true;
				}
			}else{
				$this->form_validation->set_message('valida_mail', 'El correo no es valido');
				return false;
			}
		}else{
			$this->form_validation->set_message('valida_mail', 'El correo es obligatorio');
			return false;
		}
	}

}
?>
