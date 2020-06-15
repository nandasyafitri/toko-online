<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('umkm_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}

	//data produk
	public function index()
	{
		$produk = $this->produk_model->listing();
		$data  = array('title' => 'Data Produk',
						'produk' => $produk,
					    'isi' => 'admin/produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Foto
	public function foto($id_produk)
	{
		$produk = $this->produk_model->detail($id_produk);
		$foto 	= $this->produk_model->foto($id_produk);

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('judul_foto', 'Nama Foto','required', 
					array('required' => '%s Harus Diisi' ));


		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; //Dalam KB
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){
				
			// End Validasi

		$data  = array('title' => 'Tambah Gambar Produk : '.$produk->nama_produk,
						'produk' => $produk,
						'foto'   => $foto,
						'error'  => $this->upload->display_errors(),
					    'isi' => 'admin/produk/foto');
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
		 	$data = array('id_produk'			=> $id_produk,
		 				  'judul_foto' 			=> $i->post('judul_foto'),
						  'foto' 				=> $upload_foto['upload_data']['file_name'],
					);
		 	$this->produk_model->tambah_foto($data);
		 	$this->session->set_flashdata('sukses','Data Foto Telah di Tambah');
		 	redirect(base_url('admin/produk/foto/' .$id_produk),'refresh');
		 }}
		 // end masuk database
		 $data  = array('title' 	=> 'Tambah Foto Produk : '.$produk->nama_produk,
						'produk' 	=> $produk,
						'foto'  	=> $foto,
					    'isi' 		=> 'admin/produk/foto');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	//tambah produk
	public function tambah()
	{
		//ambil data kategori
		$kategori 	= $this->kategori_model->listing();	
		$umkm 		= $this->umkm_model->listing();	

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk','required', 
					array('required' => '%s Harus Diisi' ));

		$valid->set_rules('kode_produk', 'Kode Produk','required|is_unique[produk.kode_produk]',
					 array('required' => '%s Harus Diisi',
					 		'is_unique' => '%s Sudah Ada. Buat kode produk baru' ));

		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; //Dalam KB
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto_produk')){
				
			// End Validasi

		$data  = array('title' 		=> 'Tambah Produk',
						'kategori' 	=> $kategori,
						'umkm'		=> $umkm,
						'error'  	=> $this->upload->display_errors(),
					    'isi' 		=> 'admin/produk/tambah');
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
		 	$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
		 	$data = array('id_kategori' 		=> $i->post('id_kategori'),
						  'nama_produk' 		=> $i->post('nama_produk'),
						  'slug_produk' 		=> $slug_produk,
						  'kode_produk' 		=> $i->post('kode_produk'),
						  'harga_produk'		=> $i->post('harga_produk'),
						  'berat_produk' 		=> $i->post('berat_produk'),
						  'foto_produk' 		=> $upload_foto['upload_data']['file_name'],
						  'deskripsi_produk' 	=> $i->post('deskripsi_produk'),
						  'stok_produk' 		=> $i->post('stok_produk'),
						  'status_produk' 		=> $i->post('status_produk'),
						  'id_umkm'				=> $i->post('id_umkm'),
						  'warna'				=> $i->post('warna')
					);
		 	$this->produk_model->tambah($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Tambah');
		 	redirect(base_url('admin/produk'),'refresh');
		 }}
		 // end masuk database
		 $data  = array('title' => 'Tambah Produk',
						'kategori' => $kategori,
						'umkm'		=> $umkm,
					    'isi' => 'admin/produk/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit produk
	public function edit($id_produk)
	{
		// Ambil data produk yang mau di edit
		$produk 	= $this->produk_model->detail($id_produk);
		//ambil data kategori
		$kategori = $this->kategori_model->listing();
		$umkm = $this->umkm_model->listing();

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk','required', 
					array('required' => '%s Harus Diisi' ));

		$valid->set_rules('kode_produk', 'Kode Produk','required',
					 array('required' => '%s Harus Diisi'));

		if ($valid->run()) {
			// cek jika gambar di ganti 
			if (!empty($_FILES['foto_produk']['name'])) {

			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; //Dalam KB
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto_produk')){
				
			// End Validasi

		$data  = array('title' => 'Edit Produk : '.$produk->nama_produk,
						'kategori' => $kategori,
						'umkm' => $umkm,
						'produk' => $produk,
						'error'  => $this->upload->display_errors(),
					    'isi' => 'admin/produk/edit');
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
		 	$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
		 	$data = array('id_produk'			=> $id_produk,
		 				  'id_kategori' 		=> $i->post('id_kategori'),
						  'nama_produk' 		=> $i->post('nama_produk'),
						  'slug_produk' 		=> $slug_produk,
						  'kode_produk' 		=> $i->post('kode_produk'),
						  'harga_produk'		=> $i->post('harga_produk'),
						  'berat_produk' 		=> $i->post('berat_produk'),
						  'foto_produk' 		=> $upload_foto['upload_data']['file_name'],
						  'deskripsi_produk' 	=> $i->post('deskripsi_produk'),
						  'stok_produk' 		=> $i->post('stok_produk'),
						  'status_produk' 		=> $i->post('status_produk'),
						  'id_umkm'				=> $i->post('id_umkm'),
						  'warna'				=> $i->post('warna')
					);
		 	$this->produk_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Edit');
		 	redirect(base_url('admin/produk'),'refresh');
		 }}else{
		 	// Edit Produk tanpa ganti gambar
		 	$i = $this->input;
		 	$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
		 	$data = array('id_produk'			=> $id_produk,
		 				  'id_kategori' 		=> $i->post('id_kategori'),
						  'nama_produk' 		=> $i->post('nama_produk'),
						  'slug_produk' 		=> $slug_produk,
						  'kode_produk' 		=> $i->post('kode_produk'),
						  'harga_produk'		=> $i->post('harga_produk'),
						  'berat_produk' 		=> $i->post('berat_produk'),
						  //(Gambar Tidak diganti)
						  //'foto_produk' 		=> $upload_foto['upload_data']['file_name'],
						  'deskripsi_produk' 	=> $i->post('deskripsi_produk'),
						  'stok_produk' 		=> $i->post('stok_produk'),
						  'status_produk' 		=> $i->post('status_produk'),
						  'id_umkm'				=> $i->post('id_umkm'),
						  'warna'				=> $i->post('warna')
					);
		 	$this->produk_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Edit');
		 	redirect(base_url('admin/produk'),'refresh');


		 }}
		 // end masuk database
		 $data  = array('title' => 'Edit Produk : '.$produk->nama_produk,
						'kategori' => $kategori,
						'umkm'		=> $umkm,
						'produk' =>$produk,
					    'isi' => 'admin/produk/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Delete Produk
	public function delete($id_produk)
	{
		//Proses hapus foto
		$produk = $this->produk_model->detail($id_produk);
		unlink('./assets/upload/image/' .$produk->foto_produk);
		unlink('./assets/upload/image/thumbs/' .$produk->foto_produk);
		//end proses hapus foto
		$data  = array('id_produk' => $id_produk );
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah di Hapus');
		redirect(base_url('admin/produk'),'refresh');
	}

	//Delete foto Produk
	public function delete_foto($id_produk,$id_foto)
	{
		//Proses hapus foto
		$foto = $this->produk_model->detail_foto($id_foto);
		unlink('./assets/upload/image/' .$foto->foto);
		unlink('./assets/upload/image/thumbs/' .$foto->foto);
		//end proses hapus foto
		$data  = array('id_foto' => $id_foto );
		$this->produk_model->delete_foto($data);
		$this->session->set_flashdata('sukses', 'Data Gambar Telah di Hapus');
		redirect(base_url('admin/produk/foto/'.$id_produk),'refresh');
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */