<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();

        //load data model user
       $this->CI->load->model('user_model');
	}

	// Fungsi Login
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		
		//jika ada data usernya maka
		if($check) {
			$id_admin 		=$check->id_admin;
			$nama_lengkap 	= $check->nama_lengkap;

			// Create session
			$this->CI->session->set_userdata('id_admin', $id_admin);
			$this->CI->session->set_userdata('nama_lengkap', $nama_lengkap);
			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('password', $password);

			redirect(base_url('admin/dashboard'),'refresh');

		}else{
			//kalau tidak ada maka login kembali
			$this-> CI->session->set_flashdata('warning', 'Username atau Password Salah');
			redirect(base_url('login'),'refresh');
		}
	}

	// Fugsi Cek Login
	public function cek_login()
	{
		//memeriksa session sudah ada atau belum
		if($this->CI->session->userdata('username') == "") {

			$this-> CI->session->set_flashdata('warning', 'Anda Belum Login');
			redirect(base_url('login'),'refresh');
		}
	}

	//fungsi Logout
	public function logout()
	{
		//membuang semua session yang telah diset saat login
			$this->CI->session->unset_userdata('id_admin');
			$this->CI->session->unset_userdata('nama_lengkap');
			$this->CI->session->unset_userdata('username');
			$this->CI->session->unset_userdata('password');
			
			// setelah session di unset maka rediret ke login
			$this-> CI->session->set_flashdata('sukses', 'Anda Berhasil Logout');
			redirect(base_url('login'),'refresh');
	}
}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
