<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Laporan");
		$status = $this->session->userdata('status');
        error_reporting(0);
		if($status == ''){
			redirect(site_url('login'));
		}
    }

    public function laporan_barang(){
    	$this->load->view('laporan_barang',$data);
    }

public function view_laporan_barang(){
	$tanggal_awal	= $_POST['tanggal_awal'];
    	$tanggal_akhir	= $_POST['tanggal_akhir'];
    	$filter			= $_POST['filter'];
    	$data['barang'] = $this->M_Laporan->getBarang($tanggal_awal, $tanggal_akhir, $filter);

        if($_POST['button_submit'] == 'Tampilkan Laporan'){
            $this->load->view('view_laporan_barang',$data);
        }else{
            $this->load->view('cetak_laporan_barang',$data);
        }
}



    public function laporan_permintaan(){
    	$this->load->view('laporan_permintaan');
    }

    public function view_laporan_permintaan(){

    	$data['laporan_permintaan'] = $this->M_Laporan->getPermintaan($tanggal_awal, $tanggal_akhir, $filter);
$crud->order_by('tabel_request.tanggal_permintaan','DESC');
        if($_POST['button_submit'] == 'Tampilkan Laporan'){
            $this->load->view('view_laporan_permintaan',$data);
        }else{
            $this->load->view('cetak_laporan_permintaan',$data);
        }

    }

    public function cetak_laporan_permintaan(){
        $tanggal_awal   = $_POST['tanggal_awal'];
        $tanggal_akhir  = $_POST['tanggal_akhir'];
        $filter         = $_POST['filter'];
        $data['laporan_permintaan'] = $this->M_Laporan->getPermintaan($tanggal_awal, $tanggal_akhir, $filter);
        $this->load->view('cetak_laporan_permintaan',$data);
    }

	public function laporan_request(){
    	$this->load->view('laporan_request');
    }

public function view_laporan_request(){
    	$tanggal_awal			= $_POST['tanggal_awal'];
    	$tanggal_akhir			= $_POST['tanggal_akhir'];
    	$filter				= $_POST['filter'];
    	$data['laporan_request']	= $this->M_Laporan->getRequest($tanggal_awal, $tanggal_akhir, $filter);
																										($data['laporan_request']);

        if($_POST['button_submit'] == 'Tampilkan Laporan'){
            $this->load->view('view_laporan_request',$data);
        }else{
            $this->load->view('cetak_laporan_request',$data);
        }

    }

    public function cetak_laporan_request(){
        $tanggal_awal   		= $_POST['tanggal_awal'];
        $tanggal_akhir  		= $_POST['tanggal_akhir'];
        $filter         		= $_POST['filter'];
        $data['laporan_request'] 	= $this->M_Laporan->getRequest($tanggal_awal, $tanggal_akhir, $filter);
        $this->load->view('cetak_laporan_request',$data);
    }
}
?>
