<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DomicilioCliente_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Usuario_model', 'Loyalty_model'));
	}

	public function infoClienteDomicilio($idCliente = NULL){
		if(isset($idCliente)){
			$this->db->where('id_usuario', $idCliente);
			$query = $this->db->get('domicilio_entrega');
			return $query;
		}else{
			return array();
		}
	}

	public function insertaDomicilioCliente($data =  NULL){
		if(isset($data)){
			$this->db->insert("domicilio_entrega", $data);
			$result = array("result"=>true, "msg" => "El domicilio se registró correctamente");
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA REGISTRAR");
		}
		return $result;
	}

	public function actualizaDomicilioCliente($id = NULL, $data = NULL){
		if(isset($data) && isset($id)){
			$this->db->where("id_usuario", $id);
			$this->db->update('domicilio_cliente',$data);
			$result = array("result"=>true, "msg" => "El domicilio se actualizó correctamente");
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA REGISTRAR");
		}
		return $result;
	}

	public function eliminaDomicilio($id = NULL){
		if(isset($id)){
			$this->db->where("id_usuario", $id);
			$this->db->delete('domicilio_cliente');
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA ELIMINAR");
		}
		return $result;
	}

}
