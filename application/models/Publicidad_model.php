<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Publicidad_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function slidersLista($filtro = NULL){
		if(isset($filtro)){
			$this->db->where($filtro);
		}
		$this->db->order_by('orden','ASC');
		$query = $this->db->get('publicidad_home');
		return $query;
	}

	public function registrarSlider($data = NULL) {
		$query = $this->db->get('publicidad_home');
		if($query->num_rows() == 6){
			$result = array("result"=>false, "error" => "SOLO PUEDE TENER 6 ANUNCIOS ACTIVOS, SI REQUIERE UNO MAS ELIMINE UNO.");
		}else{
			if(isset($data)){
				$data['orden'] = $this->maximoOrden();
				$this->db->insert('publicidad_home', $data);
				$result = array("result"=>true, "msg" => "EL ANUNCIO SE REGISTRÓ CORRECTAMENTE");
			}else{
				$result = array("result"=>false, "error" => "FALTA INFORMACION PARA GUARDAR");
			}
		}

		return $result;
	}

	public function reduceOrden($id){
		//primero vemos en que orden está.
		$this->db->select('id_publicidad_home, orden');
		$this->db->where('id_publicidad_home',$id);
		$query = $this->db->get('publicidad_home');

		$row = $query->row(0);
		$ordenActual = $row->orden;

		//primero actualizamos el valor siguiente:
		$this->db->where('orden', $ordenActual + 1);
		$this->db->update('publicidad_home',array('orden' => $ordenActual));

		$this->db->where('id_publicidad_home',$id);
		$this->db->update('publicidad_home', array('orden' => $ordenActual + 1));
	}

	public function aumentaOrden($id){
		//primero vemos en que orden está.
		$this->db->select('id_publicidad_home, orden');
		$this->db->where('id_publicidad_home',$id);
		$query = $this->db->get('publicidad_home');

		$row = $query->row(0);
		$ordenActual = $row->orden;

		//primero actualizamos el valor siguiente:
		$this->db->where('orden', $ordenActual - 1);
		$this->db->update('publicidad_home',array('orden' => $ordenActual));

		$this->db->where('id_publicidad_home',$id);
		$this->db->update('publicidad_home', array('orden' => $ordenActual - 1));
	}

	public function maximoOrden(){
		$sql = "SELECT (CASE WHEN MAX(orden) IS NULL THEN 1 ELSE MAX(orden)+1 END) AS orden
				FROM publicidad_home";
		$query = $this->db->query($sql);
		$row = $query->row(0);
		return $row->orden;
	}

	public function editarSlider($registro = NULL,$data = NULL){
		if(isset($data) && isset($registro)){
			$this->db->where('id_publicidad_home', $registro);
			$this->db->update('publicidad_home',$data);
			$result = array("result"=>true, "msg" => "EL ANUNCIO SE ACTUALIZÓ CORRECTAMENTE");
		}else{
			$result = array("result"=>false, "error" => "FALTA INFORMACIÓN PARA EDITAR EL ANUNCIO");
		}
	}

	public function eliminaSlider($id = NULL){
		if(isset($id)){
			$this->db->where('id_publicidad_home',$id);
			$this->db->delete('publicidad_home');
			$result = array("result" => true);
		}else{
			$result = array("result" => false, "error" => "FALTA ID PARA ELIMINAR");
		}
		return $result;
	}
}
