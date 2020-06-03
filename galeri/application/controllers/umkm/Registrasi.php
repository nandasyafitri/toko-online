<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('umkm_model');
		$this->load->model('kategori_model');
		$this->load->helper('string');
	}

	//Halaman registrasi
	public function index()
	{	

		//Validasi Input
		$valid = $this->form_validation;
        $valid->set_rules('nama_pengusaha', 'Nama Perusahaan','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('nama_umkm', 'Nama UMKM','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('jenis_umkm', 'Jenis UMKM','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('telepon', 'Telepon','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('alamat', 'Alamat','required', array('required' => '%s Harus Diisi' ));

		if ($valid->run()===FALSE) {
		// End Validasi
		$kategori = $this->kategori_model->listing();
		$data = array(	'title' => 'Registrasi UMKM',
						'kategori'  => $kategori,
						'isi'	=> 'umkm/registrasi/list'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$i = $this->input;
		 	$data = array(	'nama_pengusaha'	=> $i->post('nama_pengusaha'),
							'nama_umkm' 		=> $i->post('nama_umkm'),
							'jenis_umkm'        => $i->post('jenis_umkm'),
							'telepon' 	        => $i->post('telepon'),
							'alamat' 	        => $i->post('alamat'),
							'kode_umkm'			=> $i->post('kode_umkm')
					);
		 	$this->umkm_model->tambah($data);
		 	$this->session->set_flashdata('sukses','Registrasi Berhasil');
		 	redirect(base_url('umkm/registrasi/sukses/'.$i->post('kode_umkm')),'refresh');
		 }
		 // end masuk database
	}

	// Sukses 
	public function sukses()
	{
		$kode_umkm = $this->uri->segment(4);
		$data_umkm = $this->umkm_model->get_data_umkm($kode_umkm);
		$data = array(	'title' => 'Registrasi berhasil',
						'data'	=> $data_umkm,
						'isi'	=> 'umkm/registrasi/sukses'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Cetak
	public function cetak()
	{	
		$kode_umkm = $this->uri->segment(4);
		$data_umkm = $this->umkm_model->get_data_umkm($kode_umkm);
		$data = array(	'title'	=> 'Cetak Pendaftaran',
						'data'	=> $data_umkm			
						);
		$this->load->view('umkm/registrasi/cetak', $data, FALSE);
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */