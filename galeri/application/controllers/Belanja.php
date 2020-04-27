<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		//Load helper random string
		$this->load->helper('string');
	}

	// Halaman Belanja
	public function index()
	{
		$keranjang	= $this->cart->contents();

		$data =array(	'title'		=> 'Keranjang Belanja',
						'keranjang'	=> $keranjang,
						'isi'		=>	'belanja/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Sukses Belanja
	public function sukses()
	{

		$data =array(	'title'		=> 'Belanja Berhasil',
						'isi'		=> 'belanja/sukses'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Checkout
	public function checkout()
	{
		//cek pelanggan sudah login atau belum jika belum maka nanti harus registrasi
		// dan juga sekalian login. mengecek dengan session email


		//Kondisi sudah login
		if($this->session->userdata('email')) {
			$email 			= $this->session->userdata('email');
			$nama_pelanggan	= $this->session->userdata('nama_pelanggan');
			$pelanggan  	= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);

			$keranjang	= $this->cart->contents();

			//Validasi Input
			$valid = $this->form_validation;

			$valid->set_rules('nama_pelanggan', 'Nama Pelanggan','required', array('required' => '%s Harus Diisi' ));

			$valid->set_rules('telepon_pelanggan', 'Telepon','required', array('required' => '%s Harus Diisi' ));

			$valid->set_rules('alamat_pelanggan', 'Alamat','required', array('required' => '%s Harus Diisi' ));

			$valid->set_rules('email','Email','required|valid_email', array('required' => '%s Harus Diisi', 'valid_email' => '%s Tidak Valid'));

			

			if ($valid->run()===FALSE) {
			// End Validasi

			$data =array(	'title'		=>'Checkout',
							'keranjang'	=> $keranjang,
							'pelanggan'	=> $pelanggan,
							'isi'		=>'belanja/checkout'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
			// Masuk database
			}else{
		 	$i = $this->input;
		 	$data = array(	'id_pelanggan'		=> $pelanggan->id_pelanggan,
		 					'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'email' 			=> $i->post('email'),
							'telepon_pelanggan' => $i->post('telepon_pelanggan'),
							'alamat_pelanggan' 	=> $i->post('alamat_pelanggan'),
							'kode_transaksi' 	=> $i->post('kode_transaksi'),
							'tanggal_transaksi' => $i->post('tanggal_transaksi'),
							'jumlah_transaksi'	=> $i->post('jumlah_transaksi'),
							'status_bayar'		=> 'Belum',
							'tanggal_post' 		=> date('Y-m-d H:i:s')
					);
		 	//proses masuk ke header transaksi
		 	$this->header_transaksi_model->tambah($data);

		 	//proses masuk ke tabel transaksi
		 	foreach ($keranjang as $keranjang) {
		 		$sub_total	= $keranjang['price'] * $keranjang['qty'];
		 		$data = array(	'id_pelanggan' 		=> $pelanggan->id_pelanggan,
		 						'kode_transaksi'	=> $i->post('kode_transaksi'),
		 						'id_produk'			=> $keranjang['id'],
		 						'harga'				=> $keranjang['price'],
		 						'jumlah'			=> $keranjang['qty'],
		 						'total_harga'		=> $sub_total,
		 						'tanggal_transaksi'	=> $i->post('tanggal_transaksi')
		 					 );
		 		$this->transaksi_model->tambah($data);
		 	}	
		 	//end proses masuk tabel transasksi

		 	// setelah masuk ke tabel transaksi maka keranjangnya di kosongkan kembali
		 	$this->cart->destroy();
		 	//end peng kosongan keranjang

		 	$this->session->set_flashdata('sukses','Checkout Berhasil');
		 	redirect(base_url('belanja/sukses'),'refresh');
		 }

			//end masuk database
		}else{
			// kalau belum maka harus rgistrasi
			$this->session->set_flashdata('sukses', 'Silahkan Login atau registrasi terlebih dahulu');
			redirect(base_url('registrasi'),'refresh');

		}
	}

	//Tambahkan ke keranjang belanja
	public function add()
	{	
		//ambil data dari form
		$id 	= $this->input->post('id');
		$qty 	= $this->input->post('qty');
		$price	= $this->input->post('price');
		$name 	= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');

		// proses memasukkan ke keranjang belanja
		$data 	= array(	'id'		=> $id,
							'qty'		=> $qty,
							'price'		=> $price,
							'name'		=> $name 
						);
		$this->cart->insert($data);
		// Redirect page
		redirect($redirect_page,'refresh');
	}

	//Update Cart
	public function update_cart($rowid)
	{
		//jika ada data rowid
		if ($rowid) {
			$data = array(	'rowid' => $rowid,
							'qty'	=> $this->input->post('qty')
						 );
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Belanjaan telah di Update');
			redirect(base_url('belanja'),'refresh');
		}else{
			//jika tidak ada rowid
			redirect(base_url('belanja'),'refresh');
		}
	}



	// Hapus semua isi keranjang belanja
	public function hapus($rowid='')
	{	
		if ($rowid) {
			//Hapus  per item
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Data keranjang Belanja telah di Hapus');
			redirect(base_url('belanja'),'refresh');

		}else{
			//Hapus semua 
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Data keranjang Belanja telah di Hapus');
			redirect(base_url('belanja'),'refresh');
		}
		
	}

}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */