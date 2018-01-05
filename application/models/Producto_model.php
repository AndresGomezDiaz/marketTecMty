<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Producto_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function infoProducto($filtro = NULL){
		if(isset($filtro)){
			$this->db->where($filtro);
		}
		$this->db->select('a.id_producto, a.nombre, b.nombre AS categoria, b.id_categoria, a.precio, a.unidad, a.imagen, a.descripcion, a.estatus, a.colores');
		$this->db->from('producto a');
		$this->db->join('categoria b', 'a.id_categoria = b.id_categoria', 'INNER');
		$query = $this->db->get();
		return $query;
	}

	public function detalleProducto($id = NULL){
		if(isset($id)){
			$this->db->where('a.id_producto', $id);
		}
		$this->db->select('a.id_producto, a.nombre AS producto, b.nombre AS categoria, a.precio, a.unidad, a.imagen, a.precio, a.unidad, a.id_categoria, a.colores');
		$this->db->from('producto a');
		$this->db->join('categoria b', 'a.id_categoria = b.id_categoria', 'INNER');
		$query = $this->db->get();

		return $query;
	}

	public function registraProducto($data = NULL) {
		if(isset($data)){
			$this->db->insert('producto', $data);
			$result = array("result"=>true, "msg" => "El producto se registró correctamente");
		}else{
			$result = array("result"=>false, "error" => "SIN DATOS PARA INSERTAR");
		}
		return $result;
	}

	public function editaProducto($registro = NULL, $data = NULL){
		if(isset($data) && isset($registro)){
			$this->db->where('id_producto', $registro);
			$this->db->update('producto',$data);
			$result = array("result"=>true, "msg" => "El producto se modificó correctamente");
		}else{
			$result = array("result"=>false, "error" => "SIN DATOS PARA PODER EDITAR");
		}
		return $result;
	}

	public function validaProducto($producto = NULL){
		if(isset($producto)){
			$this->db->where("id_producto", $producto);
			$query = $this->db->get('prod_ent');
			if($query->num_rows() == 0){
				$result = array("result" => true);
			}else{
				$result = array("result" => false, "error" => "EL PRODUCTO SE ENCUENTRA EN UNA ENTRADA");
			}
		}else{
			$result = array("result" => false, "error" => "FALTA INFORMACION DEL PRODUCTO");
		}
		return $result;
	}

	public function eliminaProducto($id = NULL){
		$validaProducto = $this->validaProducto($id);
		if($validaProducto['result']){
			$this->db->where('id_producto',$id);
			$this->db->delete('producto');
		}else{
			$result = $validaProducto;
		}
		return $result;
	}
}
