<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class CategoriaAlta extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Categoria_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		$this->template->add_css();
		$this->template->add_js();
		//obtenemos las campañas de correo
		$data=array(
					"nomToken"		=> $this->security->get_csrf_token_name(),
					"valueToken"	=> $this->security->get_csrf_hash(),
					"nombre"		=> empty(set_value('nombre')) ? "" : set_value('nombre'),
					"descripcion"	=> empty(set_value('descripcion')) ? "" : set_value('descripcion'),
					"imagen"		=> null
					);

		$this->template->set('page','Categorias / Registrar categoría');
		$this->template->load('sys_layout', 'contents' , 'producto/categoria_alta', $data);
	}

	public function editarCategoria($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$datos = $this->Categoria_model->infoCategoria(array("id_categoria" => $registro));
			$infoCategoria = $datos->row(0);
			$data=array(
						"nomToken"		=> $this->security->get_csrf_token_name(),
						"valueToken"	=> $this->security->get_csrf_hash(),
						"nombre"		=> empty(set_value('nombre')) ? $infoCategoria->nombre : set_value('nombre'),
						"descripcion"	=> empty(set_value('descripcion')) ? $infoCategoria->descripcion : set_value('descripcion'),
						"imagen"		=> $infoCategoria->imagen,
						"registro"		=> $registro,
						);

			$this->template->add_css();
			$this->template->add_js();
			$this->template->set('page', 'Categorias / Detalle de la categoria');
			$this->template->load('sys_layout', 'contents', 'producto/categoria_alta', $data);

		}else{
			redirect(base_url().'categorias');
		}
	}

	public function guardarCategoria($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		$this->form_validation->set_rules('nombre', 'nombre del plan', 'required');
        $this->form_validation->set_rules('descripcion', 'descripcion del plan', 'required');

        $this->form_validation->set_error_delimiters('<span class="help-inline">','</span>');
        $this->form_validation->set_message('required', 'Este campo es requerido.');

        if($this->form_validation->run() == FALSE){
        	if(isset($registro)){
        		$this->editaCategoria($registro);
        	}else{
        		$this->index();
        	}
		}else{
			//creamos arreglo para guardar registro:
			$data = array(
							"nombre" => $this->input->post("nombre"),
							"descripcion" => $this->input->post("descripcion")
						);
			//subimos el archivo:
			if($_FILES['archivo']['name'] && $_FILES['archivo']['type']){
				$path = $_FILES['archivo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				$hoyAhora = date("Y-m-d H:i:s");
				$nomFinal = human_to_unix($hoyAhora).'.'.$ext;
				$ruta = 'assets/img/categoria/'.$nomFinal;
				move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
				$data['imagen'] = $nomFinal;
			}
			if(isset($registro)){
				$result = $this->Categoria_model->editarCategoria($registro, $data);
			}else{
				$result = $this->Categoria_model->registrarCategoria($data);
			}

			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'categorias','refresh');
		}
	}

	public function eliminarCategoria($registro = NULL){
		if($this->session->userdata('perfil') == NULL){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$result = $this->Categoria_model->eliminaCategoria($registro);
			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error', $result['error']);
			}
			redirect(base_url().'categorias');
		}else{
			redirect(base_url().'categorias');
		}
	}

	public function activarCategoria($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$data = array("estatus" => "1");
			$this->Categoria_model->editarCategoria($registro,$data);
			redirect(base_url().'categorias');
		}else{
			redirect(base_url().'categorias');
		}
	}

	public function inactivarProducto($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$data = array("estatus" => "0");
			$this->Categoria_model->editarCategoria($registro,$data);
			redirect(base_url().'categorias');
		}else{
			redirect(base_url().'categorias');
		}
	}

	public function eliminarImagen($registro =  NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$data = array("imagen" => "");
			$this->Categoria_model->editarCategoria($registro,$data);
			redirect(base_url().'editar_producto/'.$registro);
		}else{
			redirect(base_url().'categorias');
		}
	}

}
?>
