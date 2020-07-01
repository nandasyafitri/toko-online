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
        $this->db->select_sum('transaksi.jumlah');
        $this->db->from('transaksi');
        $this->db->join('header_transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
        $this->db->where('header_transaksi.status_bayar', 'Dikirim');
        $this->db->or_where('header_transaksi.status_bayar', 'Diterima');
        $query = $this->db->get();
		return $query->row();
    }

}