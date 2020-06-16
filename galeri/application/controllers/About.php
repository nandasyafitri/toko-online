<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$site 		= $this->konfigurasi_model->listing();


		$data = array(	'title' 	=> $site->namaweb.' | '.$site->tagline,
						'keywords' 	=> $site->keywords,
						'deskripsi'	=> $site->deskripsi,
						'about'		=> $site->about,
						'logo'		=> $site->logo,
						'site'		=> $site,
						'isi'  		=> 'about');

		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file About.php */
/* Location: ./application/controllers/About.php */