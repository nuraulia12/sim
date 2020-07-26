<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Permintaan extends CI_Model
{
    function getAllBarang(){
    	$this->db->select("*");
	    $this->db->from('tabel_barang');
        $this->db->join('tabel_merk','tabel_barang.id_merk=tabel_merk.id_merk');
	    $query = $this->db->get();


	    if($query->num_rows() != 0)
	    {
	        return $query->result();
	    }
	    else
	    {
	        return false;
	    }
    }

    function getAllKriteria(){
    	$this->db->select("*");
    	$this->db->from('tabel_kriteria');
    	$this->db->order_by('id_kriteria','ASC');
    	$query = $this->db->get();

    	if($query->num_rows() !=0)
    	{
    		return $query->result();
    	}else{
    		return false;
    	}
    }



    function getSubKriteria(){
    	$this->db->select("*");
    	$this->db->from('tabel_subkriteria');
    	$this->db->join('tabel_kriteria', 'tabel_subkriteria.id_kriteria= tabel_kriteria.id_kriteria','inner');
    	// $this->db->group_by('tabel_kriteria.id_kriteria');
    	$query = $this->db->get();

    	if($query->num_rows() !=0)
    	{
    		return $query->result();
    	}else{
    		return false;
    	}
    }

    function getAllPermintaan(){
    	$this->db->select("*");
    	$this->db->from('tabel_permintaan_barang');
    	$this->db->join('tabel_barang', 'tabel_permintaan_barang.id_barang= tabel_barang.id_barang');
    	$this->db->join('tabel_merk','tabel_barang.id_merk=tabel_merk.id_merk');
        $this->db->join('tabel_pengguna','tabel_pengguna.id_pengguna=tabel_permintaan_barang.id_pengguna');
        $this->db->where('tabel_permintaan_barang.hasil','Belum Ada Hasil');
        $this->db->order_by('tabel_permintaan_barang.tgl_permintaan','DESC');


    	$query = $this->db->get();

    	if($query->num_rows() !=0)
    	{
    		return $query->result();
    	}else{
    		return false;
    	}
    }

    function getPermintaanBySubUnit(){
        $this->db->select("*");
        $this->db->from('tabel_permintaan_barang');
        $this->db->join('tabel_barang', 'tabel_permintaan_barang.id_barang= tabel_barang.id_barang');
        $this->db->join('tabel_merk','tabel_barang.id_merk=tabel_merk.id_merk');
        $this->db->join('tabel_pengguna','tabel_pengguna.id_pengguna=tabel_permintaan_barang.id_pengguna');
        $this->db->where('tabel_pengguna.level_pengguna','SUBUNIT');
        $this->db->order_by('tabel_permintaan_barang.tgl_permintaan','DESC');
        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    function getPermintaanByID($id_permintaan){
        $this->db->select("*");
        $this->db->from("tabel_permintaan_barang");
        $this->db->join("tabel_barang","tabel_permintaan_barang.id_barang=tabel_barang.id_barang");
        $this->db->join("tabel_merk","tabel_barang.id_merk=tabel_merk.id_merk");
        $this->db->join('tabel_pengguna','tabel_pengguna.id_pengguna=tabel_permintaan_barang.id_pengguna');
        $this->db->where("tabel_permintaan_barang.id_permintaan",$id_permintaan);
        $query = $this->db->get();

        if($query->num_rows() !=0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function simpan_data($data,$table){
		$this->db->insert($table,$data);
	}

	function get_last(){
		$this->db->select('id_permintaan');
		$this->db->from('tabel_permintaan_barang');
		$this->db->order_by('id_permintaan',"DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() !=0)
    	{
    		return $query->result();
    	}else{
    		return false;
    	}
	}

    function deletePermintaan($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function deleteJawaban($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}
