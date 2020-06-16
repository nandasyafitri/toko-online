<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
    
    public function jumlah_umkm()
    {
        $this->db->select('*');
		$this->db->from('umkm');
		$query = $this->db->get();
		return $query->result();
    }
    public function jumlah_produk()
    {
        $this->db->select('*');
		$this->db->from('produk');
		$query = $this->db->get();
		return $query->result();
    }
    public function pengeluaran_produk()
    {
        $this->db->select_sum('jumlah');
        $this->db->from('transaksi');
        $query = $this->db->get();
		return $query->row();
    }

}