<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	//Halaman registrasi
	public function index()
	{	

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Pelanggan','required', array('required' => '%s Harus Diisi' ));

		$valid->set_rules('email','Email','required|valid_email|is_unique[pelanggan.email]', array('required' => '%s Harus Diisi', 'valid_email' => '%s Tidak Valid', 'is_unique' => '%s Email Sudah terdaftar' ));

		$valid->set_rules('password', 'Password','required', array('required' => '%s Harus Diisi' ));

		if ($valid->run()===FALSE) {
		// End Validasi

		$data = array(	'title' => 'Registrasi Pelanggan',
						'isi'	=> 'registrasi/list'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$i = $this->input;
		 	$data = array(	'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'email' 			=> $i->post('email'),
							'password' 			=> MD5($i->post('password')),
							'telepon_pelanggan' => $i->post('telepon_pelanggan'),
							'alamat_pelanggan' 	=> $i->post('alamat_pelanggan'),
							'tanggal_daftar' 	=> date('Y-m-d H:i:s')
					);
		 	$this->pelanggan_model->tambah($data);
		 	// Create Sessionlogin pelanggan
		 	$this->session->set_userdata('email',$i->post('email'));
		 	$this->session->set_userdata('nama_pelanggan',$i->post('nama_pelanggan'));
		 	//end create session
		 	$this->session->set_flashdata('sukses','Registrasi Berhasil');
		 	redirect(base_url('registrasi/sukses'),'refresh');
		 }
		 // end masuk database
	}

	// Sukses 
	public function sukses()
	{
		$data = array(	'title' => 'Registrasi berhasil',
						'isi'	=> 'registrasi/sukses'

					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */