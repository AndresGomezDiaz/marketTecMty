<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class ClienteAlta extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Login_model', 'Usuario_model','Equipo_model', 'Plan_model', 'Cliente_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		$datos = array();
		$planes = $this->Plan_model->infoPlan(array('estatus' => "1"));

		$data=array(
					"planes"		=> $planes,
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash(),
					"nombre"		=> empty(set_value('nombre')) ? "" : set_value('nombre'),
					"apellidos"		=> empty(set_value('apellidos')) ? "" : set_value('apellidos'),
					"correo"		=> empty(set_value('correo')) ? "" : set_value('correo'),
					"numero"		=> empty(set_value('numero')) ? "" : set_value('numero'),
					"codigo_postal"	=> empty(set_value('codigo_postal')) ? "" : set_value('codigo_postal'),
					"vigencia"		=> empty(set_value('vigencia')) ? "" : set_value('vigencia'),
					"plan"			=> empty(set_value('plan')) ? "" : set_value('plan'),
					"equipo"		=> empty(set_value('equipo')) ? "" : set_value('equipo'),
					"sexo"			=> empty(set_value('sexo')) ? "" : set_value('sexo'),
					"fecha_nac"		=> empty(set_value('fecha_nac')) ? "" : set_value('fecha_nac')
					);

$jsDatePicker = <<<EOD
	$(function() {
		$('#fecha_nac').datepicker({
			autoclose: true,
		});
	});
EOD;
		$this->template->add_css(array(
										base_url().'assetsWeb/css/components/datepicker.css',
										base_url().'assetsWeb/css/components/timepicker.css',
										));
		$this->template->add_js(array(
										base_url().'assets/jsApp/usuario.js',
										base_url().'assetsWeb/js/components/moment.js',
										base_url().'assetsWeb/js/components/datepicker.js',
										base_url().'assetsWeb/js/components/timepicker.js',
										$jsDatePicker
									));

		$this->template->set('page','Clientes / Registrar cliente');
		$this->template->load('sys_layout', 'contents' , 'usuario/cliente_alta', $data);
	}

	public function editaCliente($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){

			$datos = $this->Cliente_model->infoClienteEdita($registro);
			$planes = $this->Plan_model->infoPlan(array('estatus' => "1"));
			$infoCliente = $datos->row(0);

			$data=array(
						"planes"		=> $planes,
						"nomToken"		=> $this->security->get_csrf_token_name(),
						"valueToken"	=> $this->security->get_csrf_hash(),
						"nombre"		=> empty(set_value('nombre')) ? $infoCliente->nombre : set_value('nombre'),
						"apellidos"		=> empty(set_value('apellidos')) ? $infoCliente->apellidos : set_value('apellidos'),
						"correo"		=> empty(set_value('correo')) ? $infoCliente->correo : set_value('correo'),
						"numero"		=> empty(set_value('numero')) ? $infoCliente->numero : set_value('numero'),
						"codigo_postal"	=> empty(set_value('codigo_postal')) ? $infoCliente->codigo_postal : set_value('codigo_postal'),
						"vigencia"		=> empty(set_value('vigencia')) ? $infoCliente->vigencia : set_value('vigencia'),
						"plan"			=> empty(set_value('plan')) ? $infoCliente->id_plan : set_value('plan'),
						"equipo"		=> empty(set_value('equipo')) ? $infoCliente->id_equipo : set_value('equipo'),
						"sexo"			=> empty(set_value('sexo')) ? $infoCliente->sexo : set_value('sexo'),
						"fecha_nac"		=> empty(set_value('fecha_nac')) ? $this->covierteFechaVista($infoCliente->fecha_nac) : set_value('fecha_nac'),
						"registro"		=> $registro
						);

			$this->template->add_css();
			$this->template->add_js(array(base_url().'assets/jsApp/usuario.js'));

			$this->template->set('page','Clientes / Registrar cliente');
			$this->template->load('sys_layout', 'contents' , 'usuario/cliente_alta', $data);
		}else{
			redirect(base_url().'clientes');
		}
	}

	public function eliminaCliente($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$result = $this->Cliente_model->eliminaCliente($registro);

			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'clientes', 'refresh');
		}else{
			redirect(base_url().'clientes');
		}
	}

	public function inactivaCliente($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$result = $this->Cliente_model->inactivaCliente($registro);

			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'clientes', 'refresh');
		}else{
			redirect(base_url().'clientes');
		}
	}

	public function activaCliente($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$result = $this->Cliente_model->activaCliente($registro);

			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'clientes', 'refresh');
		}else{
			redirect(base_url().'clientes');
		}
	}


	public function registraCliente($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		$this->form_validation->set_rules('nombre', 'nombre del usuario', 'required');
        $this->form_validation->set_rules('apellidos', 'apellidos del usuario', 'required');

        if(isset($registro)){
        	//vemos si es el mismo correo
        	$validacionUsuario = $this->Usuario_model->infoSimpleUsuario(array("id_usuario" => $registro));
        	$validaCorreo = $validacionUsuario->row(0);
        	if($validaCorreo->correo != $this->input->post('correo')){
        		$this->form_validation->set_rules('correo', 'correo del usuario', 'callback_valida_mail');
        	}
        	if($validaCorreo->numero != $this->input->post('numero')){
        		$this->form_validation->set_rules('numero', 'celular del usuario', 'callback_valida_numero');
        	}

        }else{
        	$this->form_validation->set_rules('correo', 'correo del usuario', 'callback_valida_mail');
        	$this->form_validation->set_rules('numero', 'celular del usuario', 'callback_valida_numero');
        }

		$this->form_validation->set_rules('codigo_postal', 'coigo postal del usuario', 'required|numeric|min_length[5]|max_length[5]');
		$this->form_validation->set_rules('vigencia', 'vigencia de su plan', 'required');
		$this->form_validation->set_rules('plan', 'plan que selecciono el usuario', 'required');
		$this->form_validation->set_rules('equipo', 'equipo que selecciono el usuario', 'required');
		$this->form_validation->set_rules('sexo', 'sexo del cliente', 'required');
		$this->form_validation->set_rules('fecha_nac', 'fecha de nacimiento del cliente', 'required');

        $this->form_validation->set_error_delimiters('<span class="help-inline">','</span>');
        $this->form_validation->set_message('required', 'Este campo es requerido.');
        $this->form_validation->set_message('numeric', 'El campo solo debe contener números');
        $this->form_validation->set_message('min_length', 'El codigo postal debe ser de 5 dígitos');
        $this->form_validation->set_message('max_length', 'El codigo postal debe ser de 5 dígitos');


        if($this->form_validation->run() == FALSE){
        	if(isset($registro)){
        		$this->editaUsuario($registro);
        	}else{
        		$this->index();
        	}
		}else{
			if(isset($registro)){
				//editamos el cliente
				$dataUsuario = array(
										"nombre" 	=> $this->input->post('nombre'),
										"apellidos"	=> $this->input->post('apellidos'),
										"correo"	=> $this->input->post('correo'),
									);
				//insertamos el usuario
				$this->Usuario_model->actualizaUsuario($registro, $dataUsuario);

				//editamos la info de usuario:
				$datosCliente = array(
										"numero" => $this->input->post('numero'),
										"codigo_postal" => $this->input->post('codigo_postal'),
										"id_plan" => $this->input->post('plan'),
										"id_equipo" => ($this->input->post('equipo') == 'SE') ? "0" : $this->input->post('equipo'),
										"vigencia"	=> $this->input->post('vigencia'),
										"sexo"		=> $this->input->post('sexo'),
										"fecha_nac" => $this->covierteFechaBase($this->input->post('fecha_nac'))
									);
				$result = $this->Cliente_model->actualizaInfoCliente($registro, $datosCliente);

			}else{
				//insertamos el cliente:
				$dataUsuario = array(
										"nombre" 	=> $this->input->post('nombre'),
										"apellidos"	=> $this->input->post('apellidos'),
										"correo"	=> $this->input->post('correo'),
										"id_perfil"	=> 4,
										"pass"		=> sha1($this->input->post('codigo_postal'))
									);
				//insertamos el usuario
				$this->Usuario_model->insertaUsuario($dataUsuario);
				//vemos el usuario insertado:
				$infoUsuario = $this->Usuario_model->infoSimpleUsuario(array(
																				"nombre" 	=> $this->input->post('nombre'),
																				"apellidos"	=> $this->input->post('apellidos'),
																				"correo"	=> $this->input->post('correo'),
																				"id_perfil"	=> 4
																			));
				$detalleUsuario = $infoUsuario->row(0);
				//armamos el arreglo con su info
				$datosCliente = array(
										"numero" => $this->input->post('numero'),
										"codigo_postal" => $this->input->post('codigo_postal'),
										"fecha_reg" => date('Y-m-d H:i:s'),
										"id_usuario" => $detalleUsuario->id_usuario,
										"id_plan" => $this->input->post('plan'),
										"id_equipo" => ($this->input->post('equipo') == 'SE') ? "0" : $this->input->post('equipo'),
										"vigencia"	=> $this->input->post('vigencia'),
										"sexo"		=> $this->input->post('sexo'),
										"fecha_nac" => $this->covierteFechaBase($this->input->post('fecha_nac'))
									);
				$result = $this->Cliente_model->insertaInfoCliente($datosCliente);
			}

			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'clientes', 'refresh');
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

	public function valida_numero($dato){
		if($dato){
			if(is_numeric($dato)){
				if(strlen($dato) == 10){
					$validacionNumero = $this->Cliente_model->infoSimpleCliente(array("numero" => $dato));
					if($validacionNumero->num_rows() == 1){
						$this->form_validation->set_message('valida_numero', 'El numero celular ya existe');
						return false;
					}else{
						return true;
					}
				}else{
					$this->form_validation->set_message('valida_numero', 'El número debe ser a 10 dígitos');
					return false;
				}
			}else{
				$this->form_validation->set_message('valida_numero', 'El campo debe ser numérico');
				return false;
			}
		}else{
			$this->form_validation->set_message('valida_numero', 'El numero celular es obligatorio');
			return false;
		}
	}

	public function covierteFechaBase($fecha){
		//funcion para convertir la fecha de MM/DD/YYYY a YYYY-MM-DD
		$infoFecha = explode('/', $fecha);
		$fechaFin = $infoFecha[2].'-'.$infoFecha[0].'-'.$infoFecha[1];
		return $fechaFin;
	}

	public function covierteFechaVista($fecha){
		//funcion para convertir la fecha de YYYY-MM-DD a MM/DD/YYYY
		$infoFecha = explode('-', $fecha);
		$fechaFin = $infoFecha[1].'/'.$infoFecha[2].'/'.$infoFecha[0];
		return $fechaFin;
	}


}
