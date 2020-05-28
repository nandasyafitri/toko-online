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
		$this->db->select('*');
		$this->db->from('umkm');
		$this->db->where('kode_umkm', $kode_umkm);
		$query = $this->db->get();
		return $query->result();
	}
    public function cetak($kode_umkm)
    {
        
    }
}