<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class ProductoAlta extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','date'));
		$this->load->model(array('Categoria_model', 'Producto_model', 'Color_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		$categorias = $this->Categoria_model->infoCategoria();
		$colores = $this->Color_model->dimeColores();

		$data=array(
					"categorias"		=> $categorias,
					"colores"			=> $colores,
					"nomToken"			=> $this->security->get_csrf_token_name(),
					"valueToken"		=> $this->security->get_csrf_hash(),
					"nombre"			=> empty(set_value('nombre')) ? "" : set_value('nombre'),
					"clave"				=> empty(set_value('clave')) ? "" : set_value('clave'),
					"categoria"			=> empty(set_value('categoria')) ? "" : set_value('categoria'),
					"descripcion"		=> empty(set_value('descripcion')) ? "" : set_value('descripcion'),
					"precio"			=> empty(set_value('precio')) ? "" : set_value('precio'),
					"colores_prod"		=> array()
					);

		$this->template->add_css();
		$this->template->add_js(array(base_url().'assets/jsApp/alta_producto.js'));

		$this->template->set('page','Productos / Registrar producto');
		$this->template->load('sys_layout', 'contents' , 'producto/producto_alta', $data);
	}

	public function editarProducto($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		$categorias = $this->Categoria_model->infoCategoria();
		$colores = $this->Color_model->dimeColores();
		$datos = $this->Producto_model->infoProducto(array("id_producto" => $registro));
		$row = $datos->row(0);

		$data=array(
					"categorias"		=> $categorias,
					"nomToken"			=> $this->security->get_csrf_token_name(),
					"valueToken"		=> $this->security->get_csrf_hash(),
					"nombre"			=> empty(set_value('nombre')) ? $row->nombre : set_value('nombre'),
					"clave"				=> empty(set_value('clave')) ? $row->clave : set_value('clave'),
					"categoria"			=> empty(set_value('categoria')) ? $row->categoria : set_value('categoria'),
					"descripcion"		=> empty(set_value('descripcion')) ? $row->descripcion : set_value('descripcion'),
					"precio"			=> empty(set_value('precio')) ? $row->precio : set_value('precio'),
					"imagen"			=> $row->imagen,
					"registro"			=> $registro,
					"colores_prod"		=> ($row->colores == "") ? array() : explode(",",$row->colores),
					"colores"			=> $colores
					);

		$this->template->add_css();
		$this->template->add_js(array(base_url().'assets/jsApp/alta_producto.js'));

		$this->template->set('page','Productos / Registrar producto');
		$this->template->load('sys_layout', 'contents' , 'producto/producto_alta', $data);
	}

	public function eliminarProducto($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$result = $this->Producto_model->eliminaProducto($registro);
			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'productos','refresh');
		}else{
			redirect(base_url().'productos');
		}
	}

	public function activarProducto($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$data = array("estatus" => "1");
			$this->Producto_model->editaProducto($registro,$data);
			redirect(base_url().'productos');
		}else{
			redirect(base_url().'productos');
		}
	}

	public function inactivarProducto($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$data = array("estatus" => "0");
			$this->Producto_model->editaProducto($registro,$data);
			redirect(base_url().'productos');
		}else{
			redirect(base_url().'productos');
		}
	}

	public function eliminarImagen($registro =  NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}
		if(isset($registro)){
			$data = array("imagen" => "");
			$this->Producto_model->editaProducto($registro,$data);
			redirect(base_url().'editar_producto/'.$registro);
		}else{
			redirect(base_url().'productos');
		}
	}


	public function guardarProducto($registro = NULL){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		$this->form_validation->set_rules('nombre', 'nombre del producto', 'required');
        $this->form_validation->set_rules('descripcion', 'descripcion del producto', 'required');
        $this->form_validation->set_rules('categoria', 'categoria del producto', 'required');
        $this->form_validation->set_rules('precio', 'precio del producto', 'required|numeric');
        if(isset($registro)){
        	$datoProducto = $this->Producto_model->detalleProducto($registro);
        	$infoProducto = $detalleProducto->row(0);
        	if()
        }else{
        	$this->form_validation->set_rules('clave','clave del producto','callback_valida_clave');
        }


        $this->form_validation->set_error_delimiters('<span class="help-inline">','</span>');
        $this->form_validation->set_message('required', 'Este campo es requerido.');
        $this->form_validation->set_message('numeric', 'El campo solo debe contener números');

        if($this->form_validation->run() == FALSE){
        	if(isset($registro)){
        		$this->editarProducto($registro);
        	}else{
        		$this->index();
        	}
		}else{

			if(count($this->input->post('color')) == 0 ){
				if($this->input->post('varios_colores') == 1){
					$colorGuarda = '0';
				}else{
					$colorGuarda = "";
				}
			}else{
				$colorGuarda = implode(',', $this->input->post('color'));
			}

			//creamos arreglo para guardar registro:
			$data = array(
							"nombre" 		=> $this->input->post("nombre"),
							"clave"			=> $this->input->post("clave"),
							"id_categoria"	=> $this->input->post('categoria'),
							"precio"		=> $this->input->post('precio'),
							"descripcion" 	=> $this->input->post("descripcion"),
							"colores"		=> $colorGuarda
						);
			//subimos el archivo:
			if($_FILES['archivo']['name'] && $_FILES['archivo']['type']){
				$path = $_FILES['archivo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				$hoyAhora = date("Y-m-d H:i:s");
				$nomFinal = human_to_unix($hoyAhora).'.'.$ext;
				$ruta = 'assets/img/producto/'.$nomFinal;
				move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
				$data['imagen'] = $nomFinal;
			}

			if(isset($registro)){
				$result = $this->Producto_model->editaProducto($registro, $data);
			}else{
				$result = $this->Producto_model->registraProducto($data);
			}

			if($result['result'] == true){
				$this->session->set_flashdata('correcto',$result['msg']);
			}else{
				$this->session->set_flashdata('error',$result['error']);
			}
			redirect(base_url().'productos','refresh');
		}
	}

	public function valida_clave($dato = NULL){
		if(isset($dato)){
			$infoDato = $this->Producto_model->infoProducto(array("clave" => $dato));
			if($infoDato->num_rows() == 0){
				return true;
			}else{
				$this->form_validation->set_message('valida_clave', 'La clave de producto ya existe');
				return false;
			}
		}else{
			$this->form_validation->set_message('valida_clave', 'La clave de producto es obligatoria');
			return false;
		}
	}
}
?>
