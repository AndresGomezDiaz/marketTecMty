<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class BuscarProducto extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model(array('Producto_model'));
    }

	public function index(){
		if($this->session->userdata('perfil') == FALSE){
			redirect(base_url().'Login');
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$categoria = $_POST['categoria'];

			$listaProductos = $this->Producto_model->infoProducto(array("a.id_categoria" => $categoria));
			if($listaProductos->num_rows() == 0){
				echo '<option value="">Sin registros</option>';
			}else{
				foreach($listaProductos->result() as $info):
					echo '<option value="'.$info->id_producto.' - '.$info->nombre.'">'.$info->categoria.'; '.$info->nombre.'</option>';
				endforeach;
			}

		}else{
			redirect(base_url().'productos');
		}
	}
}
?>
