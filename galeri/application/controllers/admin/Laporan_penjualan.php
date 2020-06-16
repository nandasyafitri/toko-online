<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller {
    //load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('laporan_penjualan_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}

	//data penjualan
	public function index()
	{
		$laporan = $this->laporan_penjualan_model->listing();
		$data  = array('title' => 'Laporan Penjualan Produk',
						'laporan' => $laporan,
					    'isi' => 'admin/laporan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Cetak
	public function cetak()
	{	
		$data = $this->laporan_penjualan_model->listing();
		$data = array(	'title'	=> 'Cetak Laporan Penjualan',
						'data'	=> $data			
						);
		$this->load->view('admin/laporan/cetak', $data, FALSE);
	}
}