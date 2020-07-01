<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {


	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	//konfigurasi Umum
	public function index()
	{
		$konfigurasi =$this->konfigurasi_model->listing();


		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb', 'Nama Website','required', array('required' => '%s Harus Diisi' ));

		

		if ($valid->run()===FALSE) {
			// End Validasi

		$data  = array('title' 			=> 'Konfigurasi Website',
						'konfigurasi'	=> $konfigurasi,
					    'isi' 			=> 'admin/konfigurasi/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$i = $this->input;
		 	$data = array(	'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
		 					'namaweb' 				=> $i->post('namaweb'),
							'tagline' 				=> $i->post('tagline'),
							'email' 				=> $i->post('email'),
							'website' 				=> $i->post('website'),
							'keywords' 				=> $i->post('keywords'),
							'metatext' 				=> $i->post('metatext'),
							'telepon' 				=> $i->post('telepon'),
							'alamat' 				=> $i->post('alamat'),
							'facebook' 				=> $i->post('facebook'),
							'instagram' 			=> $i->post('instagram'),
							'deskripsi' 			=> $i->post('deskripsi'),
							'about'					=> $i->post('about'),
							'syarat_ketentuan_pelanggan'		=> $i->post('syarat_ketentuan_pelanggan'),
							'syarat_ketentuan_umkm'		=> $i->post('syarat_ketentuan_umkm')
					);
		 	$this->konfigurasi_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Update');
		 	redirect(base_url('admin/konfigurasi'),'refresh');
		 }
		 // end masuk database

	}

	//konfigurasi logo website
	public function logo()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb', 'Nama Website','required', 
					array('required' => '%s Harus Diisi' ));


		if ($valid->run()) {
			// cek jika gambar di ganti 
			if (!empty($_FILES['logo']['name'])) {

			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; //Dalam KB
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('logo')){
				
			// End Validasi

		$data  = array('title' 			=> 'Konfigurasi Logo Website',
						'konfigurasi' 	=> $konfigurasi,
						'error' 	 	=> $this->upload->display_errors(),
					    'isi' 			=> 'admin/konfigurasi/logo');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

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
		 	$data = array('id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
		 				  'namaweb' 		=> $i->post('namaweb'),
						  'logo' 			=> $upload_foto['upload_data']['file_name'],
					);
		 	$this->konfigurasi_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Update');
		 	redirect(base_url('admin/konfigurasi/logo'),'refresh');
		 }}else{
		 	// Edit Produk tanpa ganti gambar
		 	$i = $this->input;
		 	$data = array('id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
		 				  'namaweb' 		=> $i->post('namaweb'),
						  //'logo' 			=> $upload_foto['upload_data']['file_name'],
					);
		 	$this->konfigurasi_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Update');
		 	redirect(base_url('admin/konfigurasi/logo'),'refresh');


		 }}
		 // end masuk database
		 $data  = array('title' 			=> 'Konfigurasi Logo Website',
						'konfigurasi' 	=> $konfigurasi,
					    'isi' 			=> 'admin/konfigurasi/logo');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	//konfigurasi icon
	public function icon()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb', 'Nama Website','required', 
					array('required' => '%s Harus Diisi' ));


		if ($valid->run()) {
			// cek jika gambar di ganti 
			if (!empty($_FILES['icon']['name'])) {

			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; //Dalam KB
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('icon')){
				
			// End Validasi

		$data  = array('title' 			=> 'Konfigurasi Icon Website',
						'konfigurasi' 	=> $konfigurasi,
						'error' 	 	=> $this->upload->display_errors(),
					    'isi' 			=> 'admin/konfigurasi/icon');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

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
		 	$data = array('id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
		 				  'namaweb' 		=> $i->post('namaweb'),
						  'icon' 			=> $upload_foto['upload_data']['file_name'],
					);
		 	$this->konfigurasi_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Update');
		 	redirect(base_url('admin/konfigurasi/icon'),'refresh');
		 }}else{
		 	// Edit Produk tanpa ganti gambar
		 	$i = $this->input;
		 	$data = array('id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
		 				  'namaweb' 		=> $i->post('namaweb'),
						  //'icon' 			=> $upload_foto['upload_data']['file_name'],
					);
		 	$this->konfigurasi_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Update');
		 	redirect(base_url('admin/konfigurasi/icon'),'refresh');


		 }}
		 // end masuk database
		 $data  = array('title' 			=> 'Konfigurasi Icon Website',
						'konfigurasi' 	=> $konfigurasi,
					    'isi' 			=> 'admin/konfigurasi/icon');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}
}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */