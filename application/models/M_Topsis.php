<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Topsis extends CI_Model
{
	function getAllPermintaan(){
    	$this->db->select("*");
    	$this->db->from('tabel_permintaan_barang');
    	$this->db->join('tabel_barang', 'tabel_permintaan_barang.id_barang= tabel_barang.id_barang');
    	$this->db->join('tabel_merk','tabel_barang.id_merk=tabel_merk.id_merk');
        $this->db->join('tabel_pengguna','tabel_pengguna.id_pengguna=tabel_permintaan_barang.id_pengguna');
        $this->db->where('tabel_permintaan_barang.hasil','Belum Ada Hasil');
    	$query = $this->db->get();

    	if($query->num_rows() !=0)
    	{
    		return $query->result();
    	}else{
    		return false;
    	}
    }

    function getAlternatif(){
    	$this->db->select("*");
    	$this->db->from('tabel_permintaan_barang');
    	// $this->db->join('tabel_barang','tabel_permintaan_barang.id_barang=tabel_barang.id_barang');
        $this->db->where('tabel_permintaan_barang.hasil','Belum Ada Hasil');
    	$this->db->order_by('tabel_permintaan_barang.id_permintaan');
    	$query = $this->db->get();

    	if($query->num_rows() !=0)
    	{
    		return $query->result();
    	}else{
    		return false;
    	}
    }

    function getNilai(){
    	$this->db->select("nilai,id_topsis,normalisasi,normalisasi_ternormalisasi, terbobot, id_kriteria, max, min");
    	$this->db->from('tabel_permintaan_barang');
    	$this->db->join('tabel_topsis', 'tabel_permintaan_barang.id_permintaan = tabel_topsis.id_permintaan');
        $this->db->where('tabel_permintaan_barang.hasil','Belum Ada Hasil');
    	$this->db->order_by('tabel_topsis.id_topsis');
    	$query = $this->db->get();

    	if($query->num_rows() !=0)
    	{
    		return $query->result();
    	}else{
    		return false;
    	}
    }

    function getProsesTotal(){
        $this->db->select("*");
        $this->db->from('tabel_permintaan_barang');
        $this->db->join('tabel_topsis', 'tabel_permintaan_barang.id_permintaan = tabel_topsis.id_permintaan');
        $this->db->join('tabel_kriteria','tabel_topsis.id_kriteria=tabel_kriteria.id_kriteria');
        $this->db->where('tabel_permintaan_barang.hasil','Belum Ada Hasil');
        $this->db->order_by('tabel_topsis.id_topsis');
        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }



    function getNormalisasi(){
        $this->db->select("normalisasi");
        $this->db->from('tabel_permintaan_barang');
        $this->db->join('tabel_topsis', 'tabel_permintaan_barang.id_permintaan = tabel_topsis.id_permintaan');
        $this->db->where('tabel_permintaan_barang.hasil','Belum Ada Hasil');
        $this->db->order_by('tabel_permintaan_barang.id_permintaan');
        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    function getTerbobotAlternatif($id_barang){
        $this->db->select("*");
        $this->db->from("tabel_topsis");
        $this->db->join("tabel_permintaan_barang","tabel_permintaan_barang.id_permintaan = tabel_topsis.id_permintaan");
        $this->db->where("tabel_permintaan_barang.id_barang",$id_barang);
        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    function getAllSolusi(){
        $this->db->select("*");
        $this->db->from("tabel_permintaan_barang");
        $this->db->join("tabel_barang","tabel_permintaan_barang.id_barang=tabel_barang.id_barang");
        $this->db->where("tabel_permintaan_barang.hasil","Belum Ada Hasil");
        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    function getAllHasil(){
        $this->db->select("*");
        $this->db->from("tabel_permintaan_barang");
        $this->db->join("tabel_barang","tabel_permintaan_barang.id_barang=tabel_barang.id_barang");
        $this->db->where("tabel_permintaan_barang.hasil","Belum Ada Hasil");
	$this->db->order_by("tabel_permintaan_barang.nilai_akhir","DESC");
        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    function input_ternormalisasi($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function input_terbobot($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function input_solusimax($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function input_solusimin($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function update_solusi($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function selesaiTopsis($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function update_nilaiakhir($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function getJumlahNormalisasi(){
        $query = $this->db->query("SELECT id_kriteria, SUM(normalisasi) AS TOTAL FROM tabel_topsis WHERE status='PROSES' GROUP BY id_kriteria");
        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    function getAllTernormalisasi(){
        $this->db->select("*");
        $this->db->from('tabel_permintaan_barang');
        $this->db->join('tabel_barang', 'tabel_permintaan_barang.id_barang= tabel_barang.id_barang');
        $this->db->where('tabel_permintaan_barang.hasil','Belum Ada Hasil');
        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    function getJumlah($id_permintaan){
        $this->db->select("*");
        $this->db->from("tabel_barang");
        $this->db->join("tabel_permintaan_barang","tabel_permintaan_barang.id_barang=tabel_barang.id_barang");
        $this->db->where("tabel_permintaan_barang.id_permintaan",$id_permintaan);

        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }


function get_jumlah_permintaan($id){
        $this->db->select("*");
        $this->db->from("tabel_request");
        $this->db->where("id_request",$id);

        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

function getIdBarang($id){
        $this->db->select("*");
        $this->db->from("tabel_request");
        $this->db->where("id_request",$id);

        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    function updateStok($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

function updateStokBarang($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

function updateProsesRequest($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

	function cek_barang($id_barang){
		$this->db->select("*");
        	$this->db->from("tabel_barang");
        	$this->db->where("id_barang",$id_barang);
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
