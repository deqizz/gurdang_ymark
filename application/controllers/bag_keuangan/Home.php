<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();

		// $this->load->database();

		$this->load->database();
		$this->load->model(array('login_model'));
		// die();
	}
	public function index()
	{
		$user = $this->login_model->get();
		$this->check_role();
		$data['userdata'] = $user;
		$data['navbar']='data/navbar_admin';
		$data['content']='data/dashboard';
		$data['sidebar']='bag_keuangan/sidebar_bag_keuangan';
		$data['title']="Y-MARK COMPUTER";
		$data['scripts'] = ['js/data/general.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
		$this->load->view('data/tamplate_admin',$data);
	}
	function check_role(){
		$user = $this->login_model->get();
		if(isset($user)){
			if($user['role'] == 2){
			// $this->session->set_flashdata('form_msg', array('success' =>true, 'fail'=> false, 'msg' => 'Login Success'));
				// redirect('welcome');
			
			}else if($user['role'] == 1){
					redirect('bag_keuangan');
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}	
}
