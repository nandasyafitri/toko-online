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
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto, umkm.nama_umkm');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		$this->db->join('umkm', 'umkm.id_umkm = produk.id_umkm', 'left');
		// end join
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//listing all produk terkait
	public function produk_related($id_kategori)
	{
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(6);
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

	//listing all produk home beranda/dashboard
	public function home1()
	{
		$this->db->select('produk.*, kategori.nama_kategori, kategori.slug_kategori, COUNT(foto.id_foto) AS total_foto');
		$this->db->from('produk');
		//Join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('foto', 'foto.id_produk = produk.id_produk', 'left');
		// end join

		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('tanggal_post', 'desc');
		$this->db->limit(4);
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
		$this->db->select('produk.*, umkm.*');
		$this->db->from('produk');
		$this->db->join('umkm', 'produk.id_umkm = umkm.id_umkm', 'left');
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

	// Review
	public function review($id_produk)
	{
		$this->db->select('review.*, pelanggan.nama_pelanggan');
		$this->db->from('review');
		$this->db->join('pelanggan', 'review.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->join('produk', 'review.id_produk = produk.id_produk', 'left');
		$this->db->where('produk.id_produk', $id_produk);
		$this->db->order_by('review.tanggal_post', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah_review($data)
	{
		$this->db->insert('review', $data);
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
	// Tambah warna
	public function tambah_warna($data)
	{
		$this->db->insert('warna_produk', $data);
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
	
	

	//update stok produk
	public function update_stok($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}
	//get stok produk
	public function getStok($id)
	{
		$this->db->select('stok_produk');
		$this->db->from('produk');
		$this->db->where('id_produk', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//search produk
	public function search($keyword)
	{
		$this->db->like('nama_produk', $keyword);
		$this->db->or_like('deskripsi_produk', $keyword);
		$result = $this->db->get('produk')->result();
		return $result;
	}

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */