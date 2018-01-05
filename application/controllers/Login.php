
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
		$this->load->model(array('Login_model', 'Usuario_model'));
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form'));
    }

	public function index(){
		header("Access-Control-Allow-Origin: *");
		if($this->session->userdata('perfil') == ""){

			$data = array(
							"token" => $this->token()
						);

			$this->template->set('title', 'Plan perfecto');
			$this->template->load('login_sys_layout', 'contents' , 'login', $data);
		}else{
			redirect(base_url().'backend');
			break;
		}
	}

	public function user_login(){
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[1]|max_length[150]|xss_clean');
            //lanzamos mensajes de error si es que los hay
			if($this->form_validation->run() == FALSE){
				$this->index();
			}else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				//validamos el usuario:
				$existeUsuario = $this->Login_model->valida_usuario($username);

				if($existeUsuario){
					//validamos la contraseña:
					$passCorrecto = $this->Login_model->valida_pass($username,$password);
					if($passCorrecto){
						//obtenemos la info del usuario
						$info = $this->Usuario_model->infoSimpleUsuario(array("correo" => $username));
						foreach($info->result() as $row):
							if($row->estatus == 1){
								$data = array(
					                'is_logued_in' 	=> 		TRUE,
					                'perfil'		=>		$row->id_perfil,
					                'nombre' 		=> 		$row->nombre,
					                'apellidos'		=>		$row->apellidos,
					                'correo'		=>		$row->correo,
					                'id_usuario'	=>		$row->id_usuario
			            		);
			            		$this->session->set_userdata($data);
								$this->index();
							}else{
								$this->session->set_flashdata('usuario_incorrecto','Tu usuario esta Inactivo');
								redirect(base_url().'Login','refresh');
							}
						endforeach;
					}else{
						$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
						redirect(base_url().'Login','refresh');
					}
				}else{
					$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
					redirect(base_url().'Login','refresh');
				}
			}
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
			redirect(base_url().'Login');
		}
	}

	public function token(){
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->index();
	}
}
?>
