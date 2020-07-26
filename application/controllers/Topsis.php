<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topsis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Topsis");
		$this->load->model("M_Permintaan");
		$status = $this->session->userdata('status');
        error_reporting(0);
		if($status == ''){
			redirect(site_url('login'));
		}
    }

    public function lihat(){
    	$data['permintaan'] = $this->M_Topsis->getAllPermintaan();
        $this->load->view('lihat_permintaan',$data);
    }

    public function proses(){
    	$data['kriteria'] 	= $this->M_Permintaan->getAllKriteria();
    	$data['permintaan'] = $this->M_Permintaan->getAllPermintaan();
    	$data['alternatif'] = $this->M_Topsis->getAlternatif();

    	$data['baris_kriteria'] 	= $this->M_Permintaan->getAllKriteria();
    	$data['kolom_alternatif'] 	= $this->M_Topsis->getAlternatif();
    	$data['nilai']				= $this->M_Topsis->getNilai();
        $data['normalisasi']        = $this->M_Topsis->getNormalisasi();
        $data['jumlah_normalisasi'] = $this->M_Topsis->getJumlahNormalisasi();

        $this->prosesTernormalisasi();
        $this->prosesTerbobot();

        $this->prosesSolusiIdeal();

        $this->prosesD();

        $this->prosesTotal();

        // $this->selesaiTopsis();

        $data['ternormalisasi'] = $this->M_Topsis->getAllTernormalisasi();
        $data['solusi']         = $this->M_Topsis->getAllSolusi();
        $data['hasil']          = $this->M_Topsis->getAllHasil();
				$this->load->view('proses_topsis',$data);
    }

    function prosesTernormalisasi(){
        //penghitungan normalisasi
        $data['baris_kriteria']     = $this->M_Permintaan->getAllKriteria();
        $data['kolom_alternatif']   = $this->M_Topsis->getAlternatif();
        $data['nilai']              = $this->M_Topsis->getNilai();
        $data['normalisasi']        = $this->M_Topsis->getNormalisasi();
        $data['jumlah_normalisasi'] = $this->M_Topsis->getJumlahNormalisasi();

        $keys           = array_keys($data['nilai']);
        $keys2          = array_keys($data['jumlah_normalisasi']);
        $keys3          = array_keys($data['baris_kriteria']);
        $arraySize      = count($data['nilai']);
        $jumlahkriteria = count($data['baris_kriteria']);
        $jum = 0;
        for( $i=0; $i < $arraySize; $i++ ) {
            $id_topsis          = $data['nilai'][$keys[$i]]->id_topsis;
            $ternormalisasi     = ($data['nilai'][$keys[$i]]->nilai)/(sqrt($data['jumlah_normalisasi'][$keys2[$jum]]->TOTAL));
            // input data ternormalisasi
            $this->updateTernormalisasi($id_topsis,$ternormalisasi);

            $jum++;
            if(($keys[$i]+1) % $jumlahkriteria == 0){
                $jum = 0;
            }

        }
    }

    function prosesTerbobot(){
        $data['baris_kriteria']     = $this->M_Permintaan->getAllKriteria();
        $data['kolom_alternatif']   = $this->M_Topsis->getAlternatif();
        $data['nilai']              = $this->M_Topsis->getNilai();
        $data['normalisasi']        = $this->M_Topsis->getNormalisasi();
        $data['jumlah_normalisasi'] = $this->M_Topsis->getJumlahNormalisasi();

        $keys           = array_keys($data['nilai']);
        $keys2          = array_keys($data['jumlah_normalisasi']);
        $keys3          = array_keys($data['baris_kriteria']);
        $arraySize      = count($data['nilai']);
        $jumlahkriteria = count($data['baris_kriteria']);


        // normalisasi terbobot
        $in = 0;
        for( $i=0; $i < $arraySize; $i++ ) {
            $id_topsis      = $data['nilai'][$keys[$i]]->id_topsis;
            $terbobot       = ($data['nilai'][$keys[$i]]->normalisasi_ternormalisasi)*($data['baris_kriteria'][$keys3[$in]]->bobot_kriteria);
            // input data terbobot
            $this->updateTerbobot($id_topsis,$terbobot);
            $in++;
            if(($keys[$i]+1) % $jumlahkriteria == 0){
                $in = 0;
            }

        }
    }

    function prosesSolusiIdeal(){
        $data['baris_kriteria']     = $this->M_Permintaan->getAllKriteria();
        $data['kolom_alternatif']   = $this->M_Topsis->getAlternatif();
        $data['nilai']              = $this->M_Topsis->getNilai();
        $data['normalisasi']        = $this->M_Topsis->getNormalisasi();
        $data['jumlah_normalisasi'] = $this->M_Topsis->getJumlahNormalisasi();

        $keys           = array_keys($data['nilai']);
        $keys2          = array_keys($data['jumlah_normalisasi']);
        $keys3          = array_keys($data['baris_kriteria']);
        $arraySize      = count($data['nilai']);
        $jumlahkriteria = count($data['baris_kriteria']);
        $arrayAngka     = array();
        $jum            = 0;
        for( $i=0; $i < $arraySize; $i++ ) {
            $angka = $data['nilai'][$keys[$i]]->terbobot;
            $jum++;
            Array_push($arrayAngka,$angka);
            if(($keys[$i]+1) % $jumlahkriteria == 0){
                echo "</tr><tr>";
                $jum = 0;
            }
        }

        $pisah = array_chunk($arrayAngka, $jumlahkriteria);

        // mencari nilai maximal
        for( $i=0; $i < $jumlahkriteria; $i++) {
            $max=0;
						$kriteria   = $data['nilai'][$keys[$i]]->id_kriteria;
            /*for($j=0; $j < $arraySize; $j++){
               $baris = $pisah[$j][$i];
                if($max < $baris){
                    $max = $baris;
                }else{
                    $max = $max;
                }
            }*/
						$get_k = $this->db->get_where('tabel_kriteria', ['id_kriteria' => $kriteria])->row();
						//foreach ($get_k->result() as $k) {
							$max = $get_k->positif;

            $kriteria   = $data['nilai'][$keys[$i]]->id_kriteria;
            $datamax    = $max;
            $this->updateSolusiIdeal($kriteria,$datamax);
						//}
        }

        // mencari nilai minimal
        for( $i=0; $i < $jumlahkriteria; $i++) {
            $min=10;
            /*for($j=0; $j < $arraySize; $j++){
                $baris2 = $pisah[$j][$i];
                if($min > $baris2 && $baris2 !=NULL){
                    $min = $baris2;
                }else{
                    $min = $min;

                }
            }*/
						$kriteria   = $data['nilai'][$keys[$i]]->id_kriteria;
						$get_k = $this->db->get_where('tabel_kriteria', ['id_kriteria' => $kriteria])->row();
						//foreach ($get_k->result() as $k) {
							$min = $get_k->negatif;
            $kriteria   = $data['nilai'][$keys[$i]]->id_kriteria;
            $datamin    = $min;
            $this->updateSolusiIdeal2($kriteria,$datamin);
        }

    }

    function prosesD(){
        $data['alternatif']   = $this->M_Topsis->getAlternatif();
        foreach($data['alternatif'] as $alternatif){
            // echo $alternatif->nama_barang."<br>";
            $id_barang = $alternatif->id_barang;
            $data['terbobot_alternatif']   = $this->M_Topsis->getTerbobotAlternatif($id_barang);
            $max=0;
            $min=0;
            foreach($data['terbobot_alternatif'] as $ta){
                $hitung = ((($ta->max)-($ta->terbobot))*(($ta->max)-($ta->terbobot)));
                $max += $hitung;

                $hitung2 = ((($ta->min)-($ta->terbobot))*(($ta->min)-($ta->terbobot)));
                $min += $hitung2;

            }
            $id_barang      = $alternatif->id_barang;

            $positif        = sqrt($max);

            $negatif        = sqrt($min);

            $this->updateSolusi($id_barang, $positif, $negatif);
        }
    }

    function prosesTotal(){
        $data['alternatif']   = $this->M_Topsis->getAlternatif();
        foreach($data['alternatif'] as $alternatif){
            $id_permintaan  = $alternatif->id_permintaan;
            $positif     = $alternatif->positif;
            $negatif     = $alternatif->negatif;
            $nilai_akhir = $negatif/($negatif+$positif);
            if($nilai_akhir >= 0.70){
                $hasil = "Direkomendasikan";
            }elseif($nilai_akhir >= 0.5){
                $hasil = "Dipertimbangkan";
            }else{
                $hasil = "Ditolak";
            }
            $this->updateNilaiAkhir($id_permintaan,$nilai_akhir);
        }
    }

    function updateTernormalisasi($id_topsis,$ternormalisasi){
        $data=array ('normalisasi_ternormalisasi' => $ternormalisasi);
        $where=array ('id_topsis' => $id_topsis,'status'=>'PROSES');
        $this->M_Topsis->input_ternormalisasi($where, $data, 'tabel_topsis');
    }

    function updateTerbobot($id_topsis,$terbobot){
        $data=array ('terbobot' => $terbobot);
        $where=array ('id_topsis' => $id_topsis,'status'=>'PROSES');
        $this->M_Topsis->input_terbobot($where, $data, 'tabel_topsis');
    }

    function updateSolusiIdeal($id_kriteria,$datamax){
        $data=array ('max' => $datamax);
        $where=array ('id_kriteria' => $id_kriteria,'status'=>'PROSES');
        $this->M_Topsis->input_solusimax($where, $data, 'tabel_topsis');
    }

    function updateSolusiIdeal2($id_kriteria,$datamin){
        $data=array ('min' => $datamin);
        $where=array ('id_kriteria' => $id_kriteria,'status'=>'PROSES');
        $this->M_Topsis->input_solusimin($where, $data, 'tabel_topsis');
    }

    function updateSolusi($id_barang, $positif, $negatif){
        $data=array ('positif' => $positif, 'negatif'=>$negatif);
        $where=array ('id_barang' => $id_barang,'hasil'=>'Belum Ada Hasil');
        $this->M_Topsis->update_solusi($where, $data, 'tabel_permintaan_barang');
    }

    function updateNilaiAkhir($id_permintaan, $nilai_akhir){
        $data=array ('nilai_akhir' => $nilai_akhir);
        $where=array ('id_permintaan' => $id_permintaan,'hasil'=>'Belum Ada Hasil');
        $this->M_Topsis->update_nilaiakhir($where, $data, 'tabel_permintaan_barang');

    }

    function selesaiTopsis(){
        $data=array('status'=>'SELESAI');
        $where=array('status'=>'PROSES');
        $this->M_Topsis->selesaiTopsis($where,$data,'tabel_topsis');
        // redirect('topsis/lihat');
        $data['alternatif']   = $this->M_Topsis->getAlternatif();
        foreach($data['alternatif'] as $a){
            $id_permintaan  = $a->id_permintaan;
            $nilai_akhir    = $a->nilai_akhir;
            if($nilai_akhir >= 0.70){
                $hasil = "Direkomendasikan";
                //$data['stok'] = $this->M_Topsis->getJumlah($id_permintaan);
                //foreach($data['stok'] as $stok){
                //    $id_barang  = $stok->id_barang;
                //    $stokawal   = $stok->jumlah;
                //    $jumlah     = $stok->jumlah_barang;
                //    $stokakhir  = $stokawal - $jumlah;
                    // pengurangan stok
                //    $data   = array('jumlah'=>$stokakhir);
                //    $where  = array('id_barang'=>$id_barang);
                //    $this->M_Topsis->updateStok($where,$data,'tabel_barang');
                //}
            }else{
                $hasil = "Ditolak";
            }
            $where  = array('id_permintaan'=>$id_permintaan);
            $data   = array('hasil'=>$hasil);
            $this->M_Topsis->selesaiTopsis($where,$data,'tabel_permintaan_barang');
        }
        redirect('topsis/lihat');
    }

}

?>
