	<!-- konfigurasi API Raja Ongkir -->
<?php

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
  echo $response;
  $provinsi = json_decode($response, true);
}
?>
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">

					<h1><?php echo $title ?></h1><hr>					 
					<div class="clearfix"></div>
					<br><br><br><br>
				
					<?php if ($this->session->flashdata('sukses')) {
						echo '<div class="alert alert-info">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					} ?>
					<?php if ($this->session->flashdata('gagal')) {
						echo '<div class="alert alert-warning">';
						echo $this->session->flashdata('gagal');
						echo '</div>';
					} ?>

					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">GAMBAR</th>
							<th class="column-2">PRODUK</th>
							<th class="column-2">WARNA</th>
							<th class="column-4" width="20%">HARGA</th>
							<th class="column-4 p-l-70">JUMLAH</th>
							<th class="column-5" width="20%">SUB-TOTAL</th>
							<th class="column-5" width="20%">BERAT(gram)</th>
							<th class="column-6" width="20%">ACTION</th>
						</tr>
						
						<?php
						// Looping data keranjang belanja
						$berat = 0; 
						$group = array();
						foreach ($keranjang as $keranjang) { 
						// Ambil data Produk
							$id_produk		=$keranjang['id'];
							$produk 		=$this->produk_model->detail($id_produk);

						//Form Update
							echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
						?>
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->foto_produk) ?>" alt="<?php echo $keranjang['name'] ?>">
								</div>
							</td>
							<input type="hidden" name="id_produk" value="<?php echo $id_produk ?>">
							<td class="column-2"><?php echo $keranjang['name'] ?></td>
							<td class="column-2"><?php echo $keranjang['options'] ?></td>
							<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">Rp. 
								<?php $sub_total	= $keranjang['price'] * $keranjang['qty'];
								echo number_format($sub_total,'0',',','.'); 
								?> 
							</td>
							<td class="column-5">
								<?php $weight_total	= $keranjang['weight'] * $keranjang['qty'];
								$berat = $berat + $weight_total;
								echo $weight_total; 
								?> 
							</td>
							<td>
								<button type="submit" name="update" class="btn btn-outline-success btn-sm">
									<i class="fa fa-edit">	Update</i>
								</button>
								<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="btn btn-outline-danger btn-sm">
									<i class="fa fa-trash">	Hapus</i>
								</a>
							</td>
						</tr>
						<?php 
						//Echo form Close
						echo form_close();
						// End Looping keranjang belanja
						}
						?>
						 <tr class="table-row bg-info text-strong" style="font-weight: bold; color: black !important;">
						 	<td colspan="4" class="column-1">Total Harga Barang</td>
						 	<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
						 	<td colspan="2" class="column-2"><?php echo $berat ?> gram</td>
						 </tr>
					</table>

					<br>
					<?php echo form_open(base_url('belanja/checkout')); 
					$kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));
					date_default_timezone_set('Asia/Jakarta');
					?>
					<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan ?>">
					<input type="hidden" name="provinsi_asal" id="provinsi_asal" value="<?php echo $konfigurasi->id_provinsi?>">
					<input type="hidden" name="kota_asal" id="kota_asal"value="<?php echo $konfigurasi->id_kota ?>">
					<input type="hidden" name="jumlah_transaksi" id="jumlah_transaksi" value="<?php echo $this->cart->total()	?>">
					<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d H:i:s');?>">
					<table class="table">
							  <thead>
							  	<tr>
							      <th scope="col">Kode Transaksi</th>
							      <th><input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required></th>
							    </tr>
							    <tr>
							      <th scope="col">Nama Penerima</th>
							      <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required></th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <td>Email Penerima</td>
							      <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" required=></td>
							    </tr>
							    <tr>
							      <td>Telepon Penerima</td>
							      <td><input type="text" name="telepon_pelanggan" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon_pelanggan ?>" required></td>
							    </tr>
							    <tr>
							      <td>Alamat Pengiriman</td>
							      <td> <textarea name="alamat_pelanggan" class="form-control" placeholder="Alamat">
							      	<?php echo $pelanggan->alamat_pelanggan ?></textarea> </td>
							    </tr>
								<tr>
									<td>Dikirim Dari</td>									
									<td>Aceh Tamiang, Nanggroe Aceh Darussalam (NAD)</td>
								</tr>
								<tr>
									<td>Lokasi Tujuan</td>
									<td>
										<div class="form-group">  
											<select class="form-control" id="provinsi_tujuan" name="provinsi_tujuan">
												<option value=""> Pilih Provinsi</option>
												<?php
													if($provinsi['rajaongkir']['status']['code']=='200'){
														foreach($provinsi['rajaongkir']['results'] as $pv){
															echo "<option value='$pv[province_id]'>$pv[province]</option>";
														}
													}
												?>                  
											</select>
										</div>
										<div class="form-group">  
											<select class="form-control" id="kota_tujuan" name="kota_tujuan">
												<option value=""> Pilih Kota</option>            
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>Berat (gram)</td>
									<td><input type="number" name="berat" id="berat" class="form-control" value="<?php echo $berat?>" disabled></td>
								</tr>
							    <tr>
									<td>Kurir</td>
									<td>
										<div class="form-group">  
										<select class="form-control" id="kurir" onchange="getservice()">
											<option value="" > Pilih Kurir</option>
											<option value="jne">JNE</option>
											<option value="tiki">TIKI</option>
											<option value="pos">POS Indonesia</option>
										</select>
										</div>
										<div class="form-group">  
										<select class="form-control" id="kurir-pilihan" name="kurir-pilihan">
											<option value=""> Pilih Servis</option>
										</select>
										</div>
									</td>
							    </tr>
								<tr id="service" class="service">
								</tr>
								<tr class="table-row bg-info text-strong" style="font-weight: bold; color: black !important;">
									<td colspan="4" class="column-1">Total Belanjaan + Ongkos Kirim</td>
									<td colspan="2" class="column-2" id="total_bayar"></td>
								</tr>
							    <tr>
							      <td></td>
							      <td> 
							      		<button class="btn btn-outline-success" type="submit">
							      			<i class="fa fa-save">		CheckOut Sekarang</i>
							      		</button>
							      		<button class="btn btn-outline-primary" type="reset">
							      			<i class="fa fa-times">		Reset</i>
							      		</button>
							      </td>
							    </tr>
							  </tbody>
						</table>

					<?php echo form_close(); ?>


				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
				<h1>Pemesanan dan Pembatalan</h1><hr>	
					<li class="text-justify">1.	Pemesanan bisa Anda lakukan untuk tujuan pengiriman ke seluruh wilayah yang terlayani oleh pihak jasa ekspedisi yang kami tunjuk. Untuk mempercepat proses pemesanan, silakan konfirmasi ke Customer Service kami setelah Anda melakukan pemesanan.</li>
					<li class="text-justify">2.	Keterangan mengenai produk dan cara belanja di galeriajangambe.com  kami anggap telah Anda pelajari terlebih dahulu.</li>
					<li class="text-justify">3.	Kami meng-update informasi produk setiap awal pekan. Tetapi, jika ada kesalahan teknis yang menyebabkan harga, stok, atau informasi lainnya menjadi tidak benar dan Anda terlanjur melakukan pemesanan, maka kami akan menginformasikan dan memberi pilihan kepada Anda untuk tetap memesan produk tersebut atau membatalkannya.</li>
					<li class="text-justify">4.	Kami memberikan batas waktu pembayaran selama 1x24 jam sejak Anda menyelesaikan transaksi pembelian. Apabila Anda belum melakukan pembayaran setelah batas waktu tersebut, maka kami dapat membatalkan pesanan Anda.</li>
					<li class="text-justify">5.	Pembatalan pesanan dapat Anda lakukan sebelum pembayaran. Jika Anda telah melakukan pembayaran, pesanan tidak dapat Anda batalkan; Anda hanya diperbolehkan melakukan penukaran pesanan dengan produk lain sesuai jumlah pembayaran yang Anda tunaikan. Penukaran pesanan akan diproses melalui transaksi offline. Silakan hubungi Customer Service kami melalui telepon atau email.</li>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					
				</div>
			</div>

			
		</div>
	</section>