<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
    }
    //listing data blog
	public function index()
	{	
		$site =$this->konfigurasi_model->listing();

		//ambil data total
		$total =$this->blog_model->total_blog();
		
		//paginasi Start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'blog/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 6;
		$config['uri_segment']	 	= 3;
		$config['num_links'] 		= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href ="#">';
		$config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$config['first_url']		= base_url().'/blog/';
		
		$this->pagination->initialize($config);
		
		// ambil data blog
		$page 	= ($this->uri->segment(3))? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$blog =$this->blog_model->blog($config['per_page'],$page);


		//paginasi end

		$data  	= array(	'title' 			=> 'Blog '.$site->namaweb, 
							'site'				=> $site,
							'blog'			    => $blog,
							'pagin'				=> $this->pagination->create_links(),
							'isi'				=> 'blog/list'
						);

		$this->load->view('layout/wrapper', $data, FALSE);
    }
    	//Detail Blog
	public function detail($id)
	{
		$site 			= $this->konfigurasi_model->listing();
		$blog 		    = $this->blog_model->read($id);


		$data  	= array(	'title' 			=> $blog->judul, 
							'site'				=> $site,
							'blog'			    => $blog,
							'isi'				=> 'blog/detail'
						);

		$this->load->view('layout/wrapper', $data, FALSE);
	}
}