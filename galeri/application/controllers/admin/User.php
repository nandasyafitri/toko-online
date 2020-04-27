<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}

	//data user
	public function index()
	{
		$user = $this->user_model->listing();
		$data  = array('title' => 'Data Pengguna',
						'user' => $user,
					    'isi' => 'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah user
	public function tambah()
	{
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_lengkap', 'Nama Lengkap','required', array('required' => '%s Harus Diisi' ));

		$valid->set_rules('username', 'Username','required|min_length[6]|max_length[30]|is_unique[admin.username]', array('required' => '%s Harus Diisi', 'min_length' => '%s Minimal 6 Karakter','max_length' => '%s Maksimal 30 Karakter', 'is_unique' => '$s Username Sudah Ada. Buat Username Baru.'));

		$valid->set_rules('password', 'password','required', array('required' => '%s Harus Diisi' ));

		if ($valid->run()===FALSE) {
			// End Validasi

		$data  = array('title' => 'Tambah Pengguna',
					    'isi' => 'admin/user/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$i = $this->input;
		 	$data = array('nama_lengkap' => $i->post('nama_lengkap'),
							'username' => $i->post('username'),
							'password' => MD5($i->post('password')) 
					);
		 	$this->user_model->tambah($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Tambah');
		 	redirect(base_url('admin/user'),'refresh');
		 }
		 // end masuk database
	}

	// Edit user
	public function edit($id_admin)
	{
		$user = $this->user_model->detail($id_admin);
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_lengkap', 'Nama Lengkap','required', array('required' => '%s Harus Diisi' ));

		$valid->set_rules('password', 'password','required', array('required' => '%s Harus Diisi' ));

		if ($valid->run()===FALSE) {
			// End Validasi

		$data  = array('title' => 'Edit Pengguna',
						'user' => $user,
					    'isi' => 'admin/user/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$i = $this->input;
		 	$data = array(	'id_admin' => $id_admin,
		 					'nama_lengkap' => $i->post('nama_lengkap'),
							'username' => $i->post('username'),
							'password' => MD5($i->post('password')) 
					);
		 	$this->user_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Edit');
		 	redirect(base_url('admin/user'),'refresh');
		 }
		 // end masuk database
	}

	//Delete User
	public function delete($id_admin)
	{
		$data  = array('id_admin' => $id_admin );
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah di Hapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */