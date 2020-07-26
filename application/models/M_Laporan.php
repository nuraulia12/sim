<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Laporan extends CI_Model
{
	function getBarang($tanggal_awal,$tanggal_akhir){
		$this->db->select("*");
		$this->db->from("tabel_barang");
		$this->db->join("tabel_merk","tabel_merk.id_merk=tabel_barang.id_merk");
		$this->db->where("tanggal_barang_masuk >=",$tanggal_awal);
		$this->db->where("tanggal_barang_masuk <=",$tanggal_akhir);
		$query = $this->db->get();

    	if($query->num_rows() !=0)
    	{
    		return $query->result();
    	}else{
    		return false;
    	}
	}

	function getPermintaan(){
		$this->db->select("*");
		$this->db->from("tabel_permintaan_barang");
		$this->db->join("tabel_barang","tabel_barang.id_barang=tabel_permintaan_barang.id_barang");
		$this->db->join("tabel_merk","tabel_merk.id_merk=tabel_barang.id_merk");
		$this->db->join('tabel_pengguna','tabel_pengguna.id_pengguna=tabel_permintaan_barang.id_pengguna');


		$query = $this->db->get();

    	if($query->num_rows() !=0)
    	{
    		return $query->result();
    	}else{
    		return false;
    	}
	}

	function getRequest($tanggal_awal, $tanggal_akhir, $filter){
		$this->db->select("*");
		$this->db->from("tabel_request");
		$this->db->join("tabel_barang","tabel_barang.id_barang=tabel_request.id_barang");
		$this->db->join('tabel_pengguna','tabel_pengguna.id_pengguna=tabel_request.id_pengguna');
		$this->db->where("tabel_request.proses",$filter);
		$this->db->where("tanggal_permintaan >=",$tanggal_awal);
		$this->db->where("tanggal_permintaan <=",$tanggal_akhir);

		$query = $this->db->get();

	    	if($query->num_rows() !=0)
	    	{
	    		return $query->result();
	    	}else{
	    		return false;
	    	}
	}
}
?>
