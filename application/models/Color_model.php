<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Color_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function dimeColores($filtro = NULL){
		if(isset($filtro)){
			foreach($filtro as $key => $value):
				if($key == 'colores'){
					$disColores = explode(',',$value);
					$this->db->where_in($disColores);
				}else{
					$this->db->where($key, $value);
				}
			endforeach;
		}
		$query = $this->db->get('color');
		return $query;
	}

}
