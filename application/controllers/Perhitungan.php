<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->Model('Perhitungan');
    }

    public function index(){
        $this->load->view('perhitungan');
    }


?>
