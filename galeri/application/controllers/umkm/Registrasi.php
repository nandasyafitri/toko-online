<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('umkm_model');
		$this->load->model('kategori_model');
		$this->load->helper('string');
	}

	//Halaman registrasi
	public function index()
	{	
		//ambil data provinsi dari api raja ongkir
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
			$provinsi = json_decode($response, true);
		}


		//Validasi Input
		$valid = $this->form_validation;
        $valid->set_rules('nama_pengusaha', 'Nama Perusahaan','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('nama_umkm', 'Nama UMKM','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('jenis_umkm', 'Jenis UMKM','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('telepon', 'Telepon','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('alamat', 'Alamat','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('id_provinsi', 'Provinsi','required', array('required' => '%s Harus Diisi' ));
		$valid->set_rules('id_kota', 'Kota/Kabupaten','required', array('required' => '%s Harus Diisi' ));

		if ($valid->run()===FALSE) {
		// End Validasi
		$kategori = $this->kategori_model->listing();
		$data = array(	'title' 	=> 'Registrasi UMKM',
						'kategori'  => $kategori,
						'provinsi'	=> $provinsi,
						'isi'		=> 'umkm/registrasi/list'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		//masuk database
		 }else{
		 	$i = $this->input;
		 	$data = array(	'nama_pengusaha'	=> $i->post('nama_pengusaha'),
							'nama_umkm' 		=> $i->post('nama_umkm'),
							'jenis_umkm'        => $i->post('jenis_umkm'),
							'telepon' 	        => $i->post('telepon'),
							'id_provinsi'		=> $i->post('id_provinsi'),
							'id_kota'			=> $i->post('id_kota'),
							'alamat' 	        => $i->post('alamat'),
							'kode_umkm'			=> $i->post('kode_umkm')
					);
		 	$this->umkm_model->tambah($data);
		 	$this->session->set_flashdata('sukses','Registrasi Berhasil');
		 	redirect(base_url('umkm/registrasi/sukses/'.$i->post('kode_umkm')),'refresh');
		 }
		 // end masuk database
	}

	// Sukses 
	public function sukses()
	{
		$kode_umkm = $this->uri->segment(4);
		$data_umkm = $this->umkm_model->get_data_umkm($kode_umkm);
		$data = array(	'title' => 'Registrasi berhasil',
						'data'	=> $data_umkm,
						'isi'	=> 'umkm/registrasi/sukses'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Cetak
	public function cetak()
	{	
		$kode_umkm = $this->uri->segment(4);
		$data_umkm = $this->umkm_model->get_data_umkm($kode_umkm);
		$data = array(	'title'	=> 'Cetak Pendaftaran',
						'data'	=> $data_umkm			
						);
		$this->load->view('umkm/registrasi/cetak', $data, FALSE);
	}
	//list kota berdasarkan provinsi
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
}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */