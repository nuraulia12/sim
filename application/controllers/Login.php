<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('main');
    }
    
    public function index(){
        $this->load->view('login');
    }

    public function login(){
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username_pengguna' => $username,
			'password_pengguna' => md5($password)
			);
		$cek = $this->main->cek_login("tabel_pengguna",$where)->num_rows();
		$data ['pengguna']= $this->main->cek_login("tabel_pengguna",$where)->result();
		if($cek > 0){
 			foreach($data['pengguna'] as $pengguna){
 				$data_session = array(
					'nama' => $username,
					'status' => "login",
					'level'=>$pengguna->level_pengguna,
					'nama_pengguna'=>$pengguna->nama_pengguna,
					'id_pengguna'=>$pengguna->id_pengguna
					);
	 
				$this->session->set_userdata($data_session);
	 			// echo $pengguna->level_pengguna;
				redirect(site_url("Main"));	
 			} 
		}else{
            echo "Username dan password salah !";
            $this->load->view('login');
		}
    }

    public function logout(){
        $this->session->sess_destroy();
		redirect(site_url('login'));
    }
}