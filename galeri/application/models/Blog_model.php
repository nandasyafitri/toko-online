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

}