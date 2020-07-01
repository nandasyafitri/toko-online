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
		$this->load->model('rekening_model');
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

	//konfirmasi barang diterima
	public function konfirmasi_diterima($kode_transaksi)
	{

		$status_bayar	= "Diterima";
		$data = array('status_bayar'	 => $status_bayar, 
					  'kode_transaksi'	 =>$kode_transaksi );

		$this->transaksi_model->update($data);
		$this->session->set_flashdata('sukses', 'Terimakasih');

		redirect(base_url('dasbor'),'refresh');

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


	//Konfirmasi pembayaran
	public function konfirmasi($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$rekening 			= $this->rekening_model->listing();

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank', 'Nama Bank','required', 
					array('required' => '%s Harus Diisi' ));

		$valid->set_rules('rekening_pembayaran', 'Nomor Rekening','required',
					 array('required' => '%s Harus Diisi'));

		$valid->set_rules('rekening_pelanggan', 'Nama pemilik Rekening','required',
					 array('required' => '%s Harus Diisi'));

		$valid->set_rules('tanggal_bayar', 'Tanggal Bayar','required',
					 array('required' => '%s Harus Diisi'));

		$valid->set_rules('jumlah_bayar', 'Jumlah Pembayaran','required',
					 array('required' => '%s Harus Diisi'));

		if ($valid->run()) {
			// cek jika gambar di ganti 
			if (!empty($_FILES['bukti_bayar']['name'])) {

			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; //Dalam KB
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_bayar')){
				
			// End Validasi

		$data = array(	'title' 			=> 'Konfirmasi Pembayaran',
						'header_transaksi' 	=> $header_transaksi,
						'rekening'			=> $rekening,
						'error'  			=> $this->upload->display_errors(),
						'isi'				=> 'dasbor/konfirmasi'
				 );
		$this->load->view('layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$upload_foto = array('upload_data' => $this->upload->data());

		 	//Create thumbnail gambar
		 	$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_foto['upload_data']['file_name'];
			//lokasi folder Thumbnail
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250; //Pixel
			$config['height']       	= 250;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
		 	// end create thumbnail

		 	$i = $this->input;
		 	
		 	$data = array('id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
		 				  'status_bayar' 		=> 'Konfirmasi',
		 				  'jumlah_bayar' 		=> $i->post('jumlah_bayar'),
						  'rekening_pembayaran' => $i->post('rekening_pembayaran'),
						  'rekening_pelanggan' 	=> $i->post('rekening_pelanggan'),
						  'bukti_bayar' 		=> $upload_foto['upload_data']['file_name'],
						  'id_rekening' 		=> $i->post('id_rekening'),
						  'tanggal_bayar' 		=> $i->post('tanggal_bayar'),
						  'nama_bank' 			=> $i->post('nama_bank')
						  
					);
		 	$this->header_transaksi_model->edit($data);
		 	$this->session->set_flashdata('sukses','Konfirmasi Pembayaran Berhasil');
		 	redirect(base_url('dasbor'),'refresh');
		 }}else{
		 	// Edit tanpa ganti gambar
		 	$i = $this->input;
		 	
		 	$data = array('id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
		 				  'status_bayar' 		=> 'Konfirmasi',
		 				  'jumlah_bayar' 		=> $i->post('jumlah_bayar'),
						  'rekening_pembayaran' => $i->post('rekening_pembayaran'),
						  'rekening_pelanggan' 	=> $i->post('rekening_pelanggan'),
						  //'bukti_bayar' 		=> $upload_foto['upload_data']['file_name'],
						  'id_rekening' 		=> $i->post('id_rekening'),
						  'tanggal_bayar' 		=> $i->post('tanggal_bayar'),
						  'nama_bank' 			=> $i->post('nama_bank')
						  
					);
		 	$this->header_transaksi_model->edit($data);
		 	$this->session->set_flashdata('sukses','Konfirmasi Pembayaran Berhasil');
		 	redirect(base_url('dasbor'),'refresh');


		 }}
		 // end masuk database
		 $data = array(	'title' 			=> 'Konfirmasi Pembayaran',
						'header_transaksi' 	=> $header_transaksi,
						'rekening'			=> $rekening,
						'isi'				=> 'dasbor/konfirmasi'
				 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */