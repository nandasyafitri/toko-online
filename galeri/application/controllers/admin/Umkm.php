<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->model('umkm_model');
		$this->load->model('kategori_model');
		$this->load->helper('string');
    }
    
    //data umkm
	public function index()
	{
		$umkm = $this->umkm_model->listing();
		$data  = array('title' => 'Data UMKM',
						'umkm' => $umkm,
					    'isi' => 'admin/umkm/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    //tambah umkm
	public function tambah()
	{
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_umkm', 'Nama UMKM','required|is_unique[umkm.nama_umkm]', array('required' => '%s Harus Diisi', 'is_unique' => '%s Nama UMKM sudah ada. Buat Nama UMKM baru' ));

		

		if ($valid->run()===FALSE) {
			// End Validasi
            $kategori = $this->kategori_model->listing();
            $data  = array('title' 	=> 'Tambah UMKM',
                        'kategori'  => $kategori,
					    'isi' 	=> 'admin/umkm/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$i = $this->input;
		 	$data = array('nama_pengusaha' 	=> $i->post('nama_pengusaha'),
							'nama_umkm'     => $i->post('nama_umkm'),
							'jenis_umkm'	=> $i->post('jenis_umkm'),
							'alamat'	    => $i->post('alamat'),
							'telepon'	=> $i->post('telepon'),
							'kode_umkm'	=> $i->post('kode_umkm')
					);
		 	$this->umkm_model->tambah($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Tambah');
		 	redirect(base_url('admin/umkm'),'refresh');
		 }
		 // end masuk database
	}
	// Edit umkm
	public function edit($id_umkm)
	{
		$umkm = $this->umkm_model->detail($id_umkm);
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_umkm', 'Nama UMKM','required', array('required' => '%s Harus Diisi' ));

		

		if ($valid->run()===FALSE) {
			// End Validasi
			$kategori = $this->kategori_model->listing();	
			$data  = array('title' => 'Edit Data UMKM',
							'umkm' => $umkm,
							'kategori' => $kategori,
							'isi' => 'admin/umkm/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$i = $this->input;
		 	$data = array(	'id_umkm'			=> $id_umkm,
				 			'nama_pengusaha' 	=> $i->post('nama_pengusaha'),
							'nama_umkm'     	=> $i->post('nama_umkm'),
							'jenis_umkm'		=> $i->post('jenis_umkm'),
							'alamat'	    	=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'kode_umkm'			=> $i->post('kode_umkm')
					);
		 	$this->umkm_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Edit');
		 	redirect(base_url('admin/umkm'),'refresh');
		 }
		 // end masuk database
	}
	public function delete($id_umkm)
	{
		$data  = array('id_umkm' => $id_umkm );
		$this->umkm_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah di Hapus');
		redirect(base_url('admin/umkm'),'refresh');
	}

}