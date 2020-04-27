<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('id_admin', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail user
	public function detail($id_admin)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin', $id_admin);
		$this->db->order_by('id_admin', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login user
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array('username' => $username, 'password' => MD5($password)));
		$this->db->order_by('id_admin', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('admin', $data);
	}


	// Edit
	public function edit($data)
	{
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->update('admin', $data);
	}	
	
	//Delete
	public function delete($data)
	{
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->delete('admin', $data);
	}	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */