<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		//halaman ini di proteksi dengan simple pelanggan => cek login
		$this->simple_pelanggan->cek_login();
	}

	//halaman dasbor
	public function index()
	{	
		//Ambil data login id_pelanggan dari session
		$id_pelanggan =$this->session->userdata('id_pelanggan');
		$header_transaksi =$this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array(	'title' 			=> 'Halaman Dashboard Pelanggan',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'dasbor/list'
		 			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//belanja
	public function belanja()
	{
		//Ambil data login id_pelanggan dari session
		$id_pelanggan 		=$this->session->userdata('id_pelanggan');
		$header_transaksi 	=$this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array(	'title' 			=> 'Riwayat Belanja',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'dasbor/belanja'
		 			);
		$this->load->view('layout/wrapper', $data, FALSE);

	}

	//Detail
	public function detail($kode_transaksi)
	{
		//Ambil data login id_pelanggan dari session
		$id_pelanggan 		=$this->session->userdata('id_pelanggan');
		$header_transaksi 	=$this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi   		=$this->transaksi_model->kode_transaksi($kode_transaksi);

		//pastikan bahwa pelanggan hanya mengakses data transaksinya
		if ($header_transaksi->id_pelanggan != $id_pelanggan) {
			$this->session->set_flashdata('warning', 'Anda Mencoba Mengakses Data Transaksi Orang Lain');
			redirect(base_url('masuk'),'refresh');
		}

		$data = array(	'title' 			=> 'Riwayat Belanja',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi'				=> 'dasbor/detail'
		 			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//profil
	public function profil()
	{
		//Ambil data login id_pelanggan dari session
		$id_pelanggan 		=$this->session->userdata('id_pelanggan');
		$pelanggan 			=$this->pelanggan_model->detail($id_pelanggan);


		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Pelanggan','required', array('required' => '%s Harus Diisi' ));

		$valid->set_rules('alamat_pelanggan', 'Alamat','required', array('required' => '%s Harus Diisi' ));

		$valid->set_rules('telepon_pelanggan', 'Telepon','required', array('required' => '%s Harus Diisi' ));

		if ($valid->run()===FALSE) {
		// End Validasi


		$data = array(	'title' 			=> 'Profil Saya',
						'pelanggan'			=> $pelanggan,
						'isi'				=> 'dasbor/profil'
		 			);
		$this->load->view('layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$i = $this->input;

		 	//kalau password lebih dari 6 karakter maka password di ganti
		 	if(strlen($i->post('password')) > 6 ) {
		 	$data = array(	'id_pelanggan'		=>$id_pelanggan,
		 					'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'password' 			=> MD5($i->post('password')),
							'telepon_pelanggan' => $i->post('telepon_pelanggan'),
							'alamat_pelanggan' 	=> $i->post('alamat_pelanggan')
					);
		 }else{
		 	//kalau pasword kurang dari 6 maka pasword  ga di ganti
		 	$data = array(	'id_pelanggan'		=>$id_pelanggan,
		 					'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'telepon_pelanggan' => $i->post('telepon_pelanggan'),
							'alamat_pelanggan' 	=> $i->post('alamat_pelanggan')
					);
		 }
		 //end data update
		 	$this->pelanggan_model->edit($data);
		 	$this->session->set_flashdata('sukses','Update profil berhasil Berhasil');
		 	redirect(base_url('dasbor/profil'),'refresh');
		 }
		 // end masuk database
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */