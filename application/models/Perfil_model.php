<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function infoPerfil($filtro = NULL){
		if(isset($filtro)){
			$this->db->where($filtro);
		}
		$query = $this->db->get('perfil');
		return $query;
	}

}
