<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persetujuan extends CI_Controller {

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
		$this->load->model(array('catatan_bm_model','login_model','user_model','pegawai_model','barang_model'));
		$this->load->library('upload');
	}
	public function index(){
		//ngambil data user dari database
		$user = $this->login_model->get();
		$data['userdata'] = $user;


		//init layout
		$data['navbar']='data/navbar_admin';
		$data['content']='data/persetujuan_content';
		$data['slide']=null;

		if ($user['role'] == 1) {
			$data['sidebar']='bag_gudang/sidebar_bag_gudang';
		} elseif ($user['role'] == 2) {
			$data['sidebar']='bag_keuangan/sidebar_bag_keuangan';
		} elseif ($user['role'] == 3) {
			$data['sidebar']='bag_pemasaran/sidebar_bag_pemasaran';
		} elseif ($user['role'] == 0) {
			$data['sidebar']='admin/sidebar_admin';
		}
		$data['title']='Persetujuan';

		//init data
		$data['catatan_bm'] = $this->catatan_bm_model->get()->result_array();


		$data['scripts'] = ['js/data/general.js','js/data/persetujuan.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
		$this->load->view('data/tamplate_admin',$data);
	}
	
	 public function post_edit(){
    	$data['kode_catatan_bm'] = $_POST['kode_catatan_bm'];
	    $data['status'] = $_POST['status'];
        if($this->catatan_bm_model->edit($_POST['kode_catatan_bm'],$data)){
        		$id = $_POST['kode_brg'];
       			$jml_brg = $this->barang_model->get(array("kode_brg"=>$id))->row_array();
       			$jml_bm = $_POST['jml_bm'];
       			$jml_brg_update = (int)$jml_brg['jml_brg'] + (int)$jml_bm;
       			$this->barang_model->update_brg($_POST['kode_brg'],$jml_brg_update);
            echo "1";
        }else{
            echo "0";
        }
    }

}
