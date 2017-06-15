<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunggakan extends CI_Controller {

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
		$this->load->model(array('catatan_bm_model','login_model','user_model','tunggakan_model'));
		$this->load->library('upload');
	}
	public function index(){
		//ngambil data user dari database
		$user = $this->login_model->get();
		$data['userdata'] = $user;

		//check role kalo bukan admin langsung di redirect ke halaman depan


		//init layout
		$data['navbar']='data/navbar_admin';
		$data['content']='data/tunggakan_content';
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
		$data['title']='Tunggakan';

		//init data
		$data['tunggakan'] = $this->tunggakan_model->get()->result_array();
		$data['catatan_bm'] = $this->catatan_bm_model->get()->result_array();

		/*$id = 1;
       	$jml_brg = $this->barang_model->get_jml_brg(array("kode_brg"=>$id))->row_array();
       	$jml_bm = 20;
       	$jml_brg_update = (int)$jml_brg['jml_brg'] + (int)$jml_bm;
       	$data['jml_brg_update']=$jml_brg_update;*/

		$data['scripts'] = ['js/data/general.js','js/data/tunggakan.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
		$this->load->view('data/tamplate_admin',$data);
	}
	
	public function post(){
        $data['alasan'] = $_POST['alasan'];
	    $data['tgl_jatuhTempo'] = $_POST['tgl_jatuhTempo'];
	    $data['kode_catatan_bm'] = $_POST['kode_catatan_bm'];
	    if($_POST['kode_tunggakan'] == 0){
        	if($this->tunggakan_model->add($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
        	if($this->tunggakan_model->edit($_POST['kode_tunggakan'],$data)){
                echo "1";
            }else{
                echo "0";
            }
        }
    }
    public function get_by_id(){
        $id = $_POST['idx'];
        $result = $this->tunggakan_model->get(array("kode_tunggakan"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->tunggakan_model->delete($id)){
            echo "1";
        }else{
            echo "0";
        }
    }

}
