<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// proteksi halaman
		$this->simple_login->cek_login();
		$this->load->model('admin_model');
	}

	//halaman Utama
	public function index()
	{
		$jumlah_umkm = count($this->admin_model->jumlah_umkm());
		$jumlah_produk = count($this->admin_model->jumlah_produk());
		$pengeluaran_produk = ($this->admin_model->pengeluaran_produk());
		$data = array(	'title' => 'Halaman Admin',
						'jumlah_umkm' => $jumlah_umkm,
						'jumlah_produk' => $jumlah_produk,
						'pengeluaran_produk' => $pengeluaran_produk,
						'isi'  => 'admin/dashboard/list' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */