<?php
class User_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function auth($username, $password, $where = NULL) {
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where(array(
			'username' => $username,
			'password' => md5($password)
		));
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get()->row_array();
	}
	function add_user_login($data){
		$query = $this->db->insert('user_login', $data);
		// $this->db->insert();
		return $this->db->insert_id();
	}
	function update_user_login($id, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where('id',$id);
        return $this->db->update('user_login', $data);
    }
}