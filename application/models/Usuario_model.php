<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function infoUsuario($filtro = NULL){
		$this->db->select('a.id_usuario AS id, a.nombre, a.correo, b.nombre AS perfil');
		$this->db->from('usuario a');
		$this->db->join('perfil b','id_perfil','INNER');
		$this->db->where("b.id_perfil !=", 4);
		if(isset($filtro)){
			$this->db->where($filtro);
		}
		$query = $this->db->get();
		return $query;
	}

	public function infoSimpleUsuario($filtro = NULL){
		if(isset($filtro)){
			$this->db->where($filtro);
		}
		$query = $this->db->get('usuario');
		return $query;
	}

	public function cambiaPass($usuario = NULL, $pass = NULL){
		if(isset($pass)){
			$data = array("pass" => sha1($pass));
			$result = $this->actualizaUsuario($usuario,$data);
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA ACTUALIZAR");
		}
		return $result;
	}

	public function actualizaUsuario($id = NULL, $data = NULL){
		if(isset($data) && isset($id)){
			$this->db->where("id_usuario",$id);
			$this->db->update("usuario",$data);
			$result = array("result"=>true, "msg" => "El usuario se actualizó correctamente");
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA ACTUALIZAR");
		}
		return $result;
	}

	public function insertaUsuario($data =  NULL){
		if(isset($data)){
			$this->db->insert("usuario", $data);
			$result = array("result"=>true, "msg" => "El usuario se registró correctamente");
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION PARA REGISTRAR");
		}
		return $result;
	}
}
