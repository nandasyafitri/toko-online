<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm_model extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    // Tambah
	public function tambah($data)
	{
		$this->db->insert('umkm', $data);
	}
	public function get_data_umkm($kode_umkm)
	{
		$this->db->select('umkm.*, kategori.nama_kategori');
		$this->db->from('umkm');
		$this->db->join('kategori','kategori.id_kategori = umkm.jenis_umkm', 'left');
		$this->db->where('kode_umkm', $kode_umkm);
		$query = $this->db->get();
		return $query->result();
	}
    public function cetak($kode_umkm)
    {
        
	}
	//listing all umkm
	public function listing()
	{
		$this->db->select('umkm.*, kategori.nama_kategori');
		$this->db->from('umkm');
		$this->db->join('kategori','kategori.id_kategori = umkm.jenis_umkm', 'left');
		$this->db->order_by('id_umkm', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Detail kategori
	public function detail($id_umkm)
	{
		$this->db->select('*');
		$this->db->from('umkm');
		$this->db->where('id_umkm', $id_umkm);
		$this->db->order_by('id_umkm', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Edit
	public function edit($data)
	{
		$this->db->where('id_umkm', $data['id_umkm']);
		$this->db->update('umkm', $data);
	}
	//Delete
	public function delete($data)
	{
		$this->db->where('id_umkm', $data['id_umkm']);
		$this->db->delete('umkm', $data);
	}
}