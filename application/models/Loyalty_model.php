<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define('LRAPI', 'fDYsN7dgAnCsHGX4');
define('LIGAAPI', 'https://apitest.loyaltyrefunds.com');

class Loyalty_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function login($numero, $pass){
		$datosUsuario = $this->datosUsuario($numero, $pass);
	}

	/*HAY QUE AGREGAR EL PROCESO PARA QUE ACEPTE EL PASSWORD DEL USUARIO*/
	public function datosUsuario($numero,$pass){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => LIGAAPI."/account/".$numero."/".$pass."/",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
							"authorization: ".LRAPI,
							"cache-control: no-cache"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function recomedacion($cuenta, $amigos){
		$curl = curl_init();
		$query = "cuenta=".$cuenta."&amigos=".$amigos;
		curl_setopt_array($curl, array(
			CURLOPT_URL => LIGAAPI."/account.recomienda",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "utf-8",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $query,
			CURLOPT_HTTPHEADER => array(
										"authorization: ".LRAPI,
										"cache-control: no-cache",
										"content-type: application/x-www-form-urlencoded"
									),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function transacciones($cuenta, $pass){
		$curl = curl_init();
		$query = "account=".$cuenta."&key=".$pass;
		curl_setopt_array($curl, array(
			CURLOPT_URL => LIGAAPI."/account.transacciones",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "utf-8",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $query,
			CURLOPT_HTTPHEADER => array(
										"authorization: ".LRAPI,
										"cache-control: no-cache",
										"content-type: application/x-www-form-urlencoded"
									),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function cupones($cuenta, $pass){
		$curl = curl_init();
		$query = "account=".$cuenta."&key=".$pass;
		curl_setopt_array($curl, array(
			CURLOPT_URL => LIGAAPI."/account.cupones",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "utf-8",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $query,
			CURLOPT_HTTPHEADER => array(
										"authorization: ".LRAPI,
										"cache-control: no-cache",
										"content-type: application/x-www-form-urlencoded"
									),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}
}
