<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Entrada_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function infoEntrada($filtro = NULL){
		if(isset($filtro)){
			foreach($filtro as $key => $value):
				if($key == "fecha_fin"){
					$this->db->where("date(fecha_reg) <=", $value);
				}if($key == "fecha_ini"){
					$this->db->where("date(fecha_reg) >=", $value);
				}else{
					$this->db->where($key, $value);
				}
			endforeach;
		}
		$query = $this->db->get('entrada');
		return $query;
	}

	public function numeroProductos($entrada = NULL){
		if(isset($entrada)){
			$this->db->where("id_entrada",$entrada);
			$query = $this->db->get("prod_ent");
			return array("result" => true, "msg" => "Consulta realizada con éxito", "value" => $query->num_rows());
		}else{
			return array("result" => false, "msg" => "Falta entrada para obtener los valores");
		}
	}

	public function registrarEntrada($data = NULL) {
		if(isset($data)){
			$this->db->insert('entrada', $data);
			$result = array("result"=>true, "msg" => "La categoría se registró correctamente");
		}else{
			$result = array("result"=>false, "error" => "ERROR AL REGISTRAR LA CATEGORIA");
		}
		return $result;
	}

	public function editarEntrada($registro = NULL, $data = NULL){
		if(isset($data) && isset($registro)){
			$this->db->where('id_categoria', $registro);
			$this->db->update('categoria',$data);
			$result = array("result"=>true, "msg" => "La categoría se editó correctamente");
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACIÓN PARA EDITAR LA CATEGORIA");
		}
	}

	public function eliminarEntrada($id){
		$validaCategoriaProducto = $this->validaCategoriaProducto($id);
		if($validaCategoriaProducto['result'] == true){
			$this->db->where('id_categoria', $id);
			$this->db->delete('categoria');
			$result = array("result" => true, "msg" => "La categoría se eliminó correctamente");
		}else{
			$result = $validaCategoriaProducto;
		}
		return $result;
	}
}
