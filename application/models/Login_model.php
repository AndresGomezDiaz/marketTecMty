<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function valida_usuario($correo = NULL){
		$this->db->where('correo', $correo);
		$query = $this->db->get('usuario');
		if($query->num_rows() == 0){
			return false;
		}else{
			return true;
		}
	}

	public function valida_pass($correo = NULL, $pass = NULL){
		$where = array("correo" => $correo, "pass" => sha1($pass));
		$this->db->where($where);
		$info = $this->db->get('usuario');
		if($info->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}


}
