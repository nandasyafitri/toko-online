<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');

	}

	//Login Pelanggan
	public function index()
	{

		//Validasi
		$this->form_validation->set_rules('email', 'Email', 'required', 
			array('required' => '%s Harus Diisi' ));
		$this->form_validation->set_rules('password', 'Password', 'required', 
			array('required' => '%s Harus Diisi' ));

			if($this->form_validation->run()) 
			{
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				//proses ke simple login
				$this->simple_pelanggan->login($email,$password);
			}
				//End Validasi

		$data = array(	'title' => 'Login Pelanggan',
						'isi'	=> 'masuk/list'
		 			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Logout
	public function logout()
	{
		//ambil fungsi logout di simple pelangganyang sudah di set di autoload libraries
		$this->simple_pelanggan->logout();
	}

}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */