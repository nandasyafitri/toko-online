<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all produk
	public function listing()
	{
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//listing all produk home
	public function home()
	{
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		// end join

		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

	//Read Produk
	public function read($slug_produk)
	{
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		// end join

		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//Tampil produk
	public function produk($limit,$start)
	{
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		// end join

		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//Total Produk
	public function total_produk()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$query	= $this->db->get();
		return $query->row();

	}

	//Total Produk filter by price
	public function total_produk_filter_by_price($lower_price, $upper_price){
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('harga_produk','>', $lower_price);
		$this->db->where('harga_produk','<', $upper_price);
		$query	= $this->db->get();
		return $query->row();
	}

	//Tampil kategori produk
	public function kategori($id_kategori,$limit,$start)
	{
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		// end join

		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//Total kategori produk
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$this->db->where('id_kategori', $id_kategori);
		$query	= $this->db->get();
		return $query->row();

	}

	// Listing kategori
	public function listing_kategori()
	{
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	// Detail produk
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail foto produk
	public function detail_foto($id_foto)
	{
		$this->db->select('*');
		$this->db->from('foto');
		$this->db->where('id_foto', $id_foto);
		$this->db->order_by('id_foto', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	 //foto
	public function foto($id_produk)
	{
		$this->db->select('*');
		$this->db->from('foto');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_foto', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('produk', $data);
	}


	 // Tambah foto
	public function tambah_foto($data)
	{
		$this->db->insert('foto', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}	
	
	//Delete
	public function delete($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk', $data);
	}

	//Delete Foto
	public function delete_foto($data)
	{
		$this->db->where('id_foto', $data['id_foto']);
		$this->db->delete('foto', $data);
	}
	
	//filter products by price
	public function filter_by_price($lower_price, $upper_price ,$limit, $start){
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		// end join

		$this->db->where('produk.harga_produk','>', $lower_price);
		$this->db->where('produk.harga_produk','<', $upper_price);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */