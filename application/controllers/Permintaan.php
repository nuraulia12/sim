<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Permintaan");
		$status = $this->session->userdata('status');
		if($status == ''){
			redirect(site_url('login'));
		}
    }

    public function index(){
        $data['permintaan'] = $this->M_Permintaan->getAllPermintaan();
        $this->load->view('permintaan',$data);
    }

    public function hasil(){
        $level = $this->session->userdata('level_pengguna');
        $data['permintaan'] = $this->M_Permintaan->getPermintaanBySubUnit();
        $this->load->view('hasil_permintaan',$data);
    }

    public function add(){
    	$data["barang"] = $this->M_Permintaan->getAllBarang();
        $data["barang2"] = $this->M_Permintaan->getAllBarang();
    	$this->load->view('add_permintaan',$data);
    }

    public function insert(){
        $nama_barang    = $this->input->post('nama_barang');
        $tgl_permintaan = $this->input->post('tgl_permintaan');
        $jumlah_barang  = $this->input->post('jumlah_barang');
        $harga_barang   = $this->input->post('harga_barang');
	$ruangan	= $this->input->post('ruangan');
        $id_pengguna    = $this->session->userdata('id_pengguna');

        $data = array(
            'id_barang' => $nama_barang,
            'tgl_permintaan' => $tgl_permintaan,
            'jumlah_barang' => $jumlah_barang,
            'harga_barang' => $harga_barang,
            'id_pengguna' =>$id_pengguna
            );
        $this->M_Permintaan->input_data($data,'tabel_permintaan_barang');
        redirect('permintaan/pertanyaan');
        // $this->pertanyaan();
    }

    public function pertanyaan(){
        $data['pertanyaan'] = $this->M_Permintaan->getAllKriteria();
        $data['id_terakhir'] = $this->M_Permintaan->get_last();
        $this->load->view('pertanyaan',$data);

    }

    public function simpan_jawaban(){
    	$id_permintaan = $_POST['id_permintaan'];
         $data['kriteria'] = $this->M_Permintaan->getAllKriteria();
         foreach($data['kriteria'] as $kriteria){
            $id_kriteria = $kriteria->id_kriteria;
            $nilai = $_POST['nilai'.$id_kriteria];
            $data = array(
            'id_permintaan' => $id_permintaan,
            'id_kriteria' => $id_kriteria,
            'nilai' => $nilai,
            'normalisasi'=>$nilai*$nilai
            );
            $this->M_Permintaan->simpan_data($data,'tabel_topsis');
         }
         redirect('permintaan');
    }

    public function update(){

    }

    public function read(){
        $id_permintaan=$this->uri->segment('3');
        $data['detail_permintaan'] = $this->M_Permintaan->getPermintaanByID($id_permintaan);
        $this->load->view('detail_permintaan',$data);
    }

    public function delete(){
        $id_permintaan=$this->uri->segment('3');
        $where = array('id_permintaan' => $id_permintaan);
        $this->M_Permintaan->deletePermintaan($where,'tabel_permintaan_barang');
        $this->M_Permintaan->deleteJawaban($where,'tabel_topsis');
        redirect(site_url('permintaan'));
    }


}
?>
