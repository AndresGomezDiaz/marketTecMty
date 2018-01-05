<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function infoCategoria($filtro = NULL){
		if(isset($filtro)){
			$this->db->where($filtro);
		}
		$query = $this->db->get('categoria');
		return $query;
	}

	public function registrarCategoria($data = NULL) {
		if(isset($data)){
			$this->db->insert('categoria', $data);
			$result = array("result"=>true, "msg" => "La categoría se registró correctamente");
		}else{
			$result = array("result"=>false, "error" => "ERROR AL REGISTRAR LA CATEGORIA");
		}
		return $result;
	}

	public function editarCategoria($registro = NULL, $data = NULL){
		if(isset($data) && isset($registro)){
			$this->db->where('id_categoria', $registro);
			$this->db->update('categoria',$data);
			$result = array("result"=>true, "msg" => "La categoría se editó correctamente");
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACIÓN PARA EDITAR LA CATEGORIA");
		}
	}

	public function validaCategoriaProducto($id){
		if(isset($id)){
			$this->db->where('id_categoria', $id);
			$query = $this->db->get('producto');
			if($query->num_rows() == 0){
				$result = array("result"=>true);
			}else{
				$result = array("result"=>false, "error" => "LA CATEGORÍA SE ENCUENTRA EN UN PRODUCTO");
			}
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACION DEL PRODUCTO");
		}
		return $result;
	}

	public function eliminaCategoria($id){
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
