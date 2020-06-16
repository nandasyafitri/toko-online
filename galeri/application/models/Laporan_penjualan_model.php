<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_penjualan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function listing()
	{
		$this->db->select('transaksi.tanggal_transaksi, produk.nama_produk, umkm.nama_umkm');
		$this->db->from('transaksi');
		$this->db->join('produk','transaksi.id_produk = produk.id_produk', 'left');
		$this->db->join('umkm', 'produk.id_umkm=umkm.id_umkm', 'left');
		$this->db->order_by('transaksi.tanggal_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
}