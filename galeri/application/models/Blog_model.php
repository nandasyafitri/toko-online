<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
    	//listing all blog
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->order_by('id_blog', 'desc');
		$query = $this->db->get();
		return $query->result();
    }

    //listing all blog dashboard
	public function home()
	{
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->order_by('tanggal_upload', 'desc');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
    }
    	// Tambah
	public function tambah($data)
	{
		$this->db->insert('blog', $data);
    }
    	//Delete
	public function delete($data)
	{
		$this->db->where('id_blog', $data['id_blog']);
		$this->db->delete('blog', $data);
    }
    	// Detail blog
	public function detail($id_blog)
	{
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->where('id_blog', $id_blog);
		$this->db->order_by('id_blog', 'desc');
		$query = $this->db->get();
		return $query->row();
	}	// Edit
	public function edit($data)
	{
		$this->db->where('id_blog', $data['id_blog']);
		$this->db->update('blog', $data);
	}
	//Total Blog
	public function total_blog()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('blog');
		$query	= $this->db->get();
		return $query->row();

	}
	//Tampil Blog
	public function blog($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->order_by('tanggal_upload', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}
	//Read Blog
	public function read($id)
	{
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->where('blog.id_blog', $id);
		$query = $this->db->get();
		return $query->row();
	}

}