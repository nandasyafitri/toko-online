<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		//Load helper random string
		$this->load->helper('string');
		date_default_timezone_set('Asia/Jakarta');
	}

	// Halaman Belanja
	public function index()
	{
		$keranjang	= $this->cart->contents();

		$data =array(	'title'		=> 'Keranjang Belanja',
						'keranjang'	=> $keranjang,
						'isi'		=>	'belanja/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Sukses Belanja
	public function sukses()
	{

		$rekening 		= $this->rekening_model->listing();

		$data =array(	'title'		=> 'Belanja Berhasil',
						'rekening'			=> $rekening,
						'isi'		=> 'belanja/sukses'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Checkout
	public function checkout()
	{
		//cek pelanggan sudah login atau belum jika belum maka nanti harus registrasi
		// dan juga sekalian login. mengecek dengan session email


		//Kondisi sudah login
		if($this->session->userdata('email')) {
			$email 			= $this->session->userdata('email');
			$nama_pelanggan	= $this->session->userdata('nama_pelanggan');
			$konfigurasi 	= $this->konfigurasi_model->listing();
			$pelanggan  	= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);

			$keranjang	= $this->cart->contents();

			//Validasi Input
			$valid = $this->form_validation;

			$valid->set_rules('nama_pelanggan', 'Nama Pelanggan','required', array('required' => '%s Harus Diisi' ));

			$valid->set_rules('telepon_pelanggan', 'Telepon','required', array('required' => '%s Harus Diisi' ));

			$valid->set_rules('alamat_pelanggan', 'Alamat','required', array('required' => '%s Harus Diisi' ));

			$valid->set_rules('email','Email','required|valid_email', array('required' => '%s Harus Diisi', 'valid_email' => '%s Tidak Valid'));

			if ($valid->run()===FALSE) {
			// End Validasi

				$data =array(	'title'			=>'Checkout',
								'keranjang'		=> $keranjang,
								'pelanggan'		=> $pelanggan,
								'konfigurasi'	=> $konfigurasi,
								'isi'			=>'belanja/checkout'
							);
				$this->load->view('layout/wrapper', $data, FALSE);
				// Masuk database
				// jumlah_transakasi = '1000' ==>string, 
				//kurir pilihan = '500' ==> string
				// hasil = '1000500' ==>string
			}else{
				
				if(true){
					$i = $this->input;
					//$jumlah_transaksi = $i->post('jumlah_transaksi') + $i->post('kurir-pilihan');
					$jumlah_transaksi = floatval($i->post('jumlah_transaksi')) + floatval($i->post('kurir-pilihan'));
					$data = array(	'id_pelanggan'		=> $pelanggan->id_pelanggan,
									'nama_pelanggan'	=> $i->post('nama_pelanggan'),
									'email' 			=> $i->post('email'),
									'telepon_pelanggan' => $i->post('telepon_pelanggan'),
									'provinsi_tujuan'	=> $i->post('provinsi_tujuan'),
									'kota_tujuan'		=> $i->post('kota_tujuan'),
									'alamat_pelanggan' 	=> $i->post('alamat_pelanggan'),
									'kode_transaksi' 	=> $i->post('kode_transaksi'),
									'tanggal_transaksi' => $i->post('tanggal_transaksi'),
									'jumlah_transaksi'	=> $jumlah_transaksi,
									'status_bayar'		=> 'Belum',
									'tanggal_post' 		=> date('Y-m-d H:i:s')
							);
					//proses masuk ke header transaksi
					$this->header_transaksi_model->tambah($data);
					//proses masuk ke tabel transaksi
					foreach ($keranjang as $keranjang) {
						$sub_total	= $keranjang['price'] * $keranjang['qty'];
						
						$data = array(	'id_pelanggan' 		=> $pelanggan->id_pelanggan,
										'kode_transaksi'	=> $i->post('kode_transaksi'),
										'id_produk'			=> $keranjang['id'],
										'harga'				=> $keranjang['price'],
										'jumlah'			=> $keranjang['qty'],
										'warna'				=> $keranjang['options'], 
										'total_harga'		=> $sub_total,
										'tanggal_transaksi'	=> $i->post('tanggal_transaksi')
									);
						$this->transaksi_model->tambah($data);
						$stok_sekarang = (int)(($this->produk_model->getStok($keranjang['id']))->stok_produk);
						$jumlah = (int)($keranjang['qty']);
						$stok_akhir = $stok_sekarang - $jumlah;
						$data_stok = array(
							'id_produk'			=> $keranjang['id'],
							'stok_produk'		=> $stok_akhir
						);
						$this->produk_model->update_stok($data_stok);
					}	
					//end proses masuk tabel transasksi
					// setelah masuk ke tabel transaksi maka keranjangnya di kosongkan kembali
					$this->cart->destroy();
					
					//end peng kosongan keranjang
					$this->session->set_flashdata('sukses','Checkout Berhasil');
					redirect(base_url('belanja/sukses'),'refresh');
				}
				else{
					$this->session->set_flashdata('gagal','Checkout gagal');
					// Redirect page
					redirect(base_url('belanja'),'refresh');
				}
		 }

			//end masuk database
		}else{
			// kalau belum maka harus registrasi
			$this->session->set_flashdata('sukses', 'Silahkan Login atau registrasi terlebih dahulu');
			redirect(base_url('registrasi'),'refresh');

		}
	}

	//Tambahkan ke keranjang belanja
	public function add()
	{	
		//ambil data dari form
		$id 	= $this->input->post('id');
		$qty 	= $this->input->post('qty');
		$price	= $this->input->post('price');
		$name 	= $this->input->post('name');
		$warna 	= $this->input->post('warna');
		$weight = $this->input->post('weight');
		$id_umkm= $this->input->post('id_umkm'); 
		$redirect_page 	= $this->input->post('redirect_page');
		//ambil data produk
		$produk = $this->produk_model->detail($id);
		//jika stok produk > atau = kuantitas yg diminta, bisa add ke cart
		if($produk->stok_produk >= $qty){
			// proses memasukkan ke keranjang belanja
			$data 	= array(	'id'		=> $id,
								'qty'		=> $qty,
								'price'		=> $price,
								'name'		=> $name,
								'options'	=> $warna,
								'weight'	=> $weight,
								'id_umkm'	=> $id_umkm 
							);
			$this->cart->insert($data);
			redirect(base_url('belanja'), 'refresh');
		}else{
			$this->session->set_flashdata('gagal','Pembelian Tidak Dapat Dilakukan Karena Produk Sudah Habis ');
			
		// Redirect page
		redirect($redirect_page,'refresh');
		}
	}

	//Update Cart
	public function update_cart($rowid)
	{
		//jika ada data rowid dan jumlah stok sesuai
		$id = $this->input->post('id_produk');
		$stok_sekarang = (int)(($this->produk_model->getStok($id))->stok_produk);
		$qty 	= (int)($this->input->post('qty'));
		if ($rowid && $stok_sekarang >= $qty) {
			$data = array(	'rowid' => $rowid,
							'qty'	=> $this->input->post('qty')
						 );
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Belanjaan telah di Update');
			redirect(base_url('belanja'),'refresh');
		}else{
			//jika tidak ada rowid jumlah stok tidak sesuai
			$this->session->set_flashdata('gagal','Gagal Update Cart');
			redirect(base_url('belanja'),'refresh');
		}
	}



	// Hapus semua isi keranjang belanja
	public function hapus($rowid='')
	{	
		if ($rowid) {
			//Hapus  per item
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Data keranjang Belanja telah di Hapus');
			redirect(base_url('belanja'),'refresh');

		}else{
			//Hapus semua 
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Data keranjang Belanja telah di Hapus');
			redirect(base_url('belanja'),'refresh');
		}
		
	}
	public function kota($provinsi)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key: 6a26ff0bce7ba763143451d8e6a2a315"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$kota = json_decode($response, true);
			if($kota['rajaongkir']['status']['code']=='200'){
				foreach($kota['rajaongkir']['results'] as $kt){
					echo "<option value='$kt[city_id]'>$kt[city_name]</option>";
				}
			}
		}
	}
	public function getservice()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "origin=".$this->input->post('origin')."&destination=".$this->input->post('destination')."&weight=".$this->input->post('weight')."&courier=".$this->input->post('courier'),
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: 6a26ff0bce7ba763143451d8e6a2a315"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
			$data['cost'] = $response;
		}
	}

}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */