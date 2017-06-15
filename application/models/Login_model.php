<?php
class Login_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get() {
		return $this->session->userdata(USER_SESSION);
	}
	
	function set($data) {
		$this->session->set_userdata(USER_SESSION, $data);
	}
	
	function create($username, $password) {
		$this->load->model('user_model');
		if($data = $this->user_model->auth($username, $password)){
			unset($data['password']);

			$this->set($data);
			return true;
		}else{
			return false;
		}
	}
	
	function clear() {
		$this->session->unset_userdata(USER_SESSION);
	}
	
}