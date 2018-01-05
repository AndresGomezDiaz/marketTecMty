<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Usuario_model', 'Loyalty_model'));
	}

	public function infoClienteEdita($id = NULL){
		if(isset($id)){
			//obtenemos la info del usuario
			$this->db->select('a.id_usuario, b.id_info_usuario, a.nombre, a.apellidos, a.correo, a.estatus, a.id_perfil,
								b.numero, b.codigo_postal, b.fecha_reg, b.vigencia, b.id_plan, b.id_equipo, b.sexo, b.fecha_nac');
			$this->db->from('usuario a');
			$this->db->join('info_usuario b','id_usuario','INNER');
			$this->db->where("a.id_usuario", $id);
			$this->db->where("a.id_perfil", 4);
			$query = $this->db->get();
			return $query;
		}else{
			return array("result"=>false);
		}
	}

	public function infoClienteLista($filtro  = NULL){
		$this->db->select('a.id_usuario, b.id_info_usuario, a.nombre, a.apellidos, a.correo, a.estatus,b.numero,b.sexo,b.fecha_nac,b.codigo_postal,
							b.id_plan, b.id_equipo, c.nombre AS nombre_plan');
		$this->db->from('usuario a');
		$this->db->join('info_usuario b','id_usuario','INNER');
		$this->db->join('plan c','id_plan','INNER');
		if(isset($filtro)){
			$this->db->where($filtro);
		}
		$this->db->where("a.id_perfil", 4);
		$query = $this->db->get();
		return $query;
	}

	public function infoSimpleCliente($filtro = NULL){
		if(isset($filtro)){
			$this->db->where($filtro);
		}
		$query = $this->db->get('info_usuario');
		return $query;
	}

	public function insertaInfoCliente($data =  NULL){
		if(isset($data)){
			$this->db->insert("info_usuario", $data);
			$result = array("result"=>true, "msg" => "El cliente se registró correctamente");
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA REGISTRAR");
		}
		return $result;
	}

	public function actualizaInfoCliente($id = NULL, $data = NULL){
		if(isset($data) && isset($id)){
			$this->db->where("id_usuario", $id);
			$this->db->update('info_usuario',$data);
			$result = array("result"=>true, "msg" => "El cliente se actualizó correctamente");
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA REGISTRAR");
		}
		return $result;
	}

	public function eliminaCliente($id = NULL){
		if(isset($id)){
			$this->db->where("id_usuario", $id);
			$this->db->delete('info_usuario');

			$this->db->where("id_usuario", $id);
			$this->db->delete('usuario');
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA ELIMINAR");
		}
		return $result;
	}

	public function inactivaCliente($id = NULL){
		if(isset($id)){
			$data = array("estatus" => 2);
			$result = $this->actualizaInfoCliente($id, $data);
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA ELIMINAR");
		}
		return $result;
	}

	public function activaCliente($id = NULL){
		if(isset($id)){
			$data = array("estatus" => 1);
			$result = $this->actualizaInfoCliente($id, $data);
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA ELIMINAR");
		}
		return $result;
	}

}
