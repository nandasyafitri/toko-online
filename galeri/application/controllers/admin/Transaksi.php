<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('konfigurasi_model');
	}

	// Load data transaksi
	public function index()
	{
		$header_transaksi 	= $this->header_transaksi_model->listing();
		$data 		= array(	'title' 			=> 'Data Transaksi',
								'header_transaksi' 	=> $header_transaksi,
								'isi'				=> 'admin/transaksi/list'

							 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Detail
	public function detail($kode_transaksi)
	{
		
		$header_transaksi 	=$this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi   		=$this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title' 			=> 'Riwayat Belanja',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi'				=> 'admin/transaksi/detail'
		 			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Cetak
	public function cetak($kode_transaksi)
	{
		
		$header_transaksi 	=$this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi   		=$this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				=$this->konfigurasi_model->listing();

		$data = array(	'title' 			=> 'Riwayat Belanja',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
		 			);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}
	//status
	public function status($kode_transaksi)
	{
		$header_transaksi 	=$this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi   		=$this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title' 			=> 'Status Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi'				=> 'admin/transaksi/status'
		 			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Update Transaksi
	public function update($kode_transaksi)
	{
		
		//jika ada kode_transaksi ada
		if ($kode_transaksi) {
			$data = array(	'kode_transaksi' => $kode_transaksi,
							'status_bayar'	=> $this->input->post('status'),
							'resi'	=> $this->input->post('resi'),
						 );
			$this->transaksi_model->update($data);
			$this->session->set_flashdata('sukses', 'Transaksi telah di Update');
			redirect(base_url('admin/transaksi'),'refresh');
		}else{
			//jika tidak ada kode_transaksi
			$this->session->set_flashdata('gagal','Gagal Update Transaksi');
			redirect(base_url('admin/transaksi'),'refresh');
		}
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */