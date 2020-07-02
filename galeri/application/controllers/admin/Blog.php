<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// proteksi halaman
		$this->simple_login->cek_login();
		$this->load->model('blog_model');
    }
    	//data blog
	public function index()
	{
		$blog = $this->blog_model->listing();
		$data  = array('title' => 'Data blog',
						'blog' => $blog,
					    'isi' => 'admin/blog/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    	//tambah blog
	public function tambah()
	{
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('judul', 'Judul','required', 
                    array('required' => '%s Harus Diisi' ));
                    
		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; //Dalam KB
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			// End Validasi

		$data  = array('title' 		=> 'Tambah Blog',
						'error'  	=> $this->upload->display_errors(),
					    'isi' 		=> 'admin/blog/tambah');
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
		 	$data = array(
						  'judul' 		        => $i->post('judul'),
						  'isi'          		=> $i->post('isi'),
						  'gambar'       		=> $upload_foto['upload_data']['file_name']
					);
		 	$this->blog_model->tambah($data);
		 	$this->session->set_flashdata('sukses','Blog Telah di Tambah');
		 	redirect(base_url('admin/blog'),'refresh');
		 }}
		 // end masuk database
		 $data  = array('title' => 'Tambah Blog',
					    'isi' => 'admin/blog/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    //Delete Blog
	public function delete($id_blog)
	{
		//Proses hapus foto
		$blog = $this->blog_model->detail($id_blog);
		unlink('./assets/upload/image/' .$blog->gambar);
		unlink('./assets/upload/image/thumbs/' .$blog->gambar);
		//end proses hapus foto
		$data  = array('id_blog' => $id_blog );
		$this->blog_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah di Hapus');
		redirect(base_url('admin/blog'),'refresh');
	}
	// Edit blog
	public function edit($id_blog)
	{
		// Ambil data blog yang mau di edit
		$blog 	= $this->blog_model->detail($id_blog);

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('judul', 'judul blog','required', 
					array('required' => '%s Harus Diisi' ));

		if ($valid->run()) {
			// cek jika gambar di ganti 
			if (!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; //Dalam KB
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			// End Validasi

		$data  = array('title' => 'Edit Blog : '.$blog->judul,
						'blog' => $blog,
						'error'  => $this->upload->display_errors(),
					    'isi' => 'admin/blog/edit');
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
             $data = array('id_blog'			=> $id_blog,
                            'judul' 		    => $i->post('judul'),
                            'isi'          		=> $i->post('isi'),
                            'gambar'       		=> $upload_foto['upload_data']['file_name']             
					);
		 	$this->blog_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Edit');
		 	redirect(base_url('admin/blog'),'refresh');
		 }}else{
		 	// Edit Blog tanpa ganti gambar
		 	$i = $this->input;
		 	$data = array('id_blog'			=> $id_blog,
                        'judul' 		    => $i->post('judul'),
                        'isi'          		=> $i->post('isi'),
					);
		 	$this->blog_model->edit($data);
		 	$this->session->set_flashdata('sukses','Data Telah di Edit');
		 	redirect(base_url('admin/blog'),'refresh');


		 }}
		 // end masuk database
		 $data  = array('title' => 'Edit Blog : '.$blog->judul,
						'blog' =>$blog,
					    'isi' => 'admin/blog/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}