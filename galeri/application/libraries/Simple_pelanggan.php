<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();

        //load data model user
       $this->CI->load->model('pelanggan_model');
	}

	// Fungsi Login
	public function login($email,$password)
	{
		$check = $this->CI->pelanggan_model->login($email,$password);
		
		//jika ada data usernya maka
		if($check) {
			$id_pelanggan 		=$check->id_pelanggan;
			$nama_pelanggan 	= $check->nama_pelanggan;

			// Create session
			$this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
			$this->CI->session->set_userdata('email', $email);

			redirect(base_url('dasbor'),'refresh');

		}else{
			//kalau tidak ada maka login kembali
			$this-> CI->session->set_flashdata('warning', 'Email atau Password Salah');
			redirect(base_url('masuk'),'refresh');
		}
	}

	// Fugsi Cek Login
	public function cek_login()
	{
		//memeriksa session sudah ada atau belum
		if($this->CI->session->userdata('email') == "") {

			$this-> CI->session->set_flashdata('warning', 'Anda Belum Login');
			redirect(base_url('masuk'),'refresh');
		}
	}

	//fungsi Logout
	public function logout()
	{
		//membuang semua session yang telah diset saat login
			$this->CI->session->unset_userdata('id_pelanggan');
			$this->CI->session->unset_userdata('nama_pelanggan');
			$this->CI->session->unset_userdata('email');
			
			// setelah session di unset maka rediret ke login
			$this-> CI->session->set_flashdata('sukses', 'Anda Berhasil Logout');
			redirect(base_url('masuk'),'refresh');
	}
}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */