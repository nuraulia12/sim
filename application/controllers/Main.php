<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');

		$status = $this->session->userdata('status');
		if($status == ''){
			redirect(site_url('login'));
		}

	}

	public function _example_output($output = null)
	{
		$this->load->view('main.php',(array)$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}


	// Function Olahdata Pengguna
	public function users_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('tabel_pengguna');
			$crud->set_subject('Pengguna');
			$crud->change_field_type('password_pengguna','password');
			$crud->set_rules('password_pengguna','password','min_length[8]');
			$crud->unset_clone();
			$crud->callback_before_insert(array($this,'encrypt_password_callback'));
			$crud->callback_before_update(array($this,'encrypt_password_callback'));

			$crud->required_fields('nama_pengguna','username_pengguna','password_pengguna','level_pengguna');

			$output = $crud->render();

			$this->_example_output($output);
	}

	//callback encrypt password
	function encrypt_password_callback($post_array) {
		//$this->load->library('encrypt');
		//$key = 'super-secret-key';
		$post_array['password_pengguna'] = MD5($post_array['password_pengguna']);

		return $post_array;
	}

	// Function Olahdata Barang
	public function product_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('tabel_barang');
			$crud->set_subject('Barang');
			$crud->set_field_upload('foto','assets/uploads/files');
			$crud->set_relation('id_merk','tabel_merk','nama_merk');
			$crud->display_as('id_merk','Nama Merk');
$crud->order_by('tabel_barang.tanggal_barang_masuk','DESC');
			$level = $this->session->userdata('level_pengguna');

			$crud->required_fields('id_merk','nama_barang','tanggal_barang_masuk','jumlah','foto','keterangan');

			$crud->unset_clone();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function product_management2()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('tabel_barang');
			$crud->set_subject('Barang');
			$crud->set_field_upload('foto','assets/uploads/files');
			$crud->set_relation('id_merk','tabel_merk','nama_merk');
			$crud->display_as('id_merk','Nama Merk');
	$crud->order_by('tabel_barang.tanggal_barang_masuk','DESC');

			$crud->required_fields('id_merk','nama_barang','tanggal_barang_masuk','jumlah','foto','keterangan');

			$level = $this->session->userdata('level_pengguna');

			$crud->unset_clone();
			$crud->unset_print();
			$crud->unset_export();
			$crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	// Function Olahdata Permintaan
	public function request_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('tabel_permintaan_barang');
			$crud->set_subject('Permintaan Barang');
			$crud->set_relation('id_barang','tabel_barang','nama_barang');
			$crud->display_as('id_barang','Nama Barang');
			$crud->field_type('hasil', 'hidden', 3);

			$crud->required_fields();


			$output = $crud->render();

			$this->_example_output($output);
	}

	// Function Olahdata Permintaan Barang Dari Sub Unit ke SIM
	public function request_management2()
	{
			$crud = new grocery_CRUD();
			$crud->where('proses','Belum Diproses');
			$crud->set_table('tabel_request');
			$crud->set_subject('Permintaan Barang Dari Subunit ke SIM');

			$crud->set_relation('id_barang','tabel_barang','nama_barang');
			$crud->display_as('id_barang','Nama Barang');

			$crud->set_relation('id_pengguna','tabel_pengguna','nama_pengguna');
			$crud->display_as('id_pengguna','Request By');

			$crud->columns('tanggal_permintaan','id_barang','jumlah','ruangan','id_pengguna');
$crud->order_by('tabel_request.tanggal_permintaan','DESC');
			$crud->field_type('hasil', 'hidden', 3);
			$crud->field_type('proses','hidden', 3);
			//$crud->field_type('id_pengguna','hidden', 3);
			//$crud->fieldTypeFormFields('id_pengguna', 'hidden');

			$crud->callback_before_insert(array($this,'insert_pengguna'));
			$crud->callback_before_update(array($this,'insert_pengguna'));

		$crud->unset_delete();
			$crud->unset_clone();


			$output = $crud->render();

			$this->_example_output($output);

	}

	public function request_management3()
	{
			$crud = new grocery_CRUD();
			$crud->where('proses','Sudah Diproses');
			$crud->set_table('tabel_request');
			$crud->set_subject('Permintaan Barang Dari Subunit ke SIM');

			$crud->set_relation('id_barang','tabel_barang','nama_barang');
			$crud->display_as('id_barang','Nama Barang');

			$crud->set_relation('id_pengguna','tabel_pengguna','nama_pengguna');
			$crud->display_as('id_pengguna','Request By');

			$crud->columns('tanggal_permintaan','id_barang','jumlah','ruangan','id_pengguna');


			$crud->unset_clone();
			$crud->unset_print();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();

			$crud->field_type('hasil', 'hidden',3);
			$crud->field_type('proses','hidden',3);
			$crud->field_type('id_pengguna','hidden',3);

			$crud->callback_before_insert(array($this,'insert_pengguna'));
			$crud->callback_before_update(array($this,'insert_pengguna'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	// Function Lihat Permintaan di SIM dari Subunit
	public function request()
	{
			$crud = new grocery_CRUD();
			$crud->where('proses','Belum Diproses');
			$crud->set_table('tabel_request');
			$crud->set_subject('Permintaan Barang Dari Subunit ke SIM');

			$crud->set_relation('id_barang','tabel_barang','nama_barang');
			$crud->display_as('id_barang','Nama Barang');
			$crud->set_relation('id_pengguna','tabel_pengguna','nama_pengguna');
			$crud->display_as('id_pengguna','Request By');

			$crud->columns('tanggal_permintaan','id_barang','jumlah','ruangan','id_pengguna', 'proses');
			$crud->required_fields('tanggal_permintaan','id_barang','jumlah','ruangan','id_pengguna');
$crud->order_by('tabel_request.tanggal_permintaan','DESC');

			$crud->unset_clone();
			$crud->unset_delete();
			$crud->unset_edit();

			$crud->field_type('hasil', 'hidden',3);
			$crud->field_type('proses', 'hidden',3);
			//$crud->field_type('id_pengguna','hidden',3);

			$crud->callback_before_insert(array($this,'insert_pengguna'));
			$crud->callback_before_update(array($this,'insert_pengguna'));

			//$crud->field_type('hasil','invisible');

			//add button konfirmasi
			//$crud->add_action('Konfirmasi', '', '','ui-icon-plus',array($this,'konfirmasi'));
			$crud->add_action('Konfirmasi', base_url('assets/grocery_crud/themes/flexigrid/css/images/success.png'), 'main/konfirmasi');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function konfirmasi(){
		$this->load->model('M_Topsis');
		$id = $this->uri->segment('3');
		$where  = array('id_request'=>$id);
        	$data   = array('proses'=>'Sudah Diproses');
            	$this->M_Topsis->updateProsesRequest($where,$data,'tabel_request');
		$data['jumlah_permintaan'] = $this->M_Topsis->get_jumlah_permintaan($id);
		foreach($data['jumlah_permintaan'] as $jum){
			$jumlah_permintaan = $jum->jumlah;
		}

		//proses update stok
		$data['ambilidbarang'] = $this->M_Topsis->getIdBarang($id);
		foreach($data['ambilidbarang'] as $idbarang){
			$id_barang	= $idbarang->id_barang;
		}
		$data['barang'] = $this->M_Topsis->cek_barang($id_barang);
		foreach($data['barang'] as $barang){
			$stok	= $barang->jumlah;
		}
		$this->updateMyStok($id_barang,$stok,$jumlah_permintaan);
		//echo "ID Barang : ".$id_barang." : ".$stok;
		//echo "<br>Jumlah Permintaan : ".$jumlah_permintaan;
		//echo "<br>Stok Akhir : ".$stokakhir;
	}

	function updateMyStok($id_barang,$stok,$jumlah_permintaan){

		$where		= array('id_barang'=>$id_barang);
		$stokakhir	= $stok - $jumlah_permintaan;
		$data		= array('jumlah'=>$stokakhir);

		$this->M_Topsis->updateStokBarang($where,$data,'tabel_barang');
		redirect('main/request');
	}

	function insert_pengguna($post_array) {
		$post_array['id_pengguna'] 	= $this->session->userdata('id_pengguna');
		$post_array['hasil']		= 0;
		$post_array['proses']		= 'Belum Diproses';
		return $post_array;
	}



	// Function Olahdata Merk
	public function merk_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('tabel_merk');
			$crud->set_subject('Merk');
			$crud->unset_clone();

			$crud->required_fields('nama_merk','pabrik_merk','keterangan_merk');

			$output = $crud->render();

			$this->_example_output($output);
	}

	// Function Olahdata Kriteria
	public function kriteria_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('tabel_kriteria');
			$crud->set_subject('Kriteria Penghitungan');
			$crud->unset_clone();

			$crud->required_fields('nama_kriteria','pertanyaan_kriteria','jawaban1','jawaban2','jawaban3','jawaban4','jawaban5','positif','negatif','bobot_kriteria');

			$output = $crud->render();

			$this->_example_output($output);
	}

	// Function Olahdata Sub Kriteria
	public function subkriteria_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('tabel_subkriteria');
			$crud->set_subject('Sub Kriteria Penghitungan');
			$crud->set_relation('id_kriteria','tabel_kriteria','nama_kriteria');
			$crud->display_as('id_kriteria','Kriteria');
			$crud->unset_clone();

			$output = $crud->render();

			$this->_example_output($output);
	}
}
