
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<?php include('menu.php') ?>

					</div>
				</div>
		

				<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
					<!-- Product -->
					
						<h1><?php echo $title ?></h1>
						<hr>
						<p>Berikut Adalah Riwayat Belanja Anda</p>
						<br>

						<?php 
						//kalau ada transaksi,tampilkan tabelnya
						if($header_transaksi) { 
						?>

						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="20%">KODE TRANSAKSI</th>
									<th> : <?php echo $header_transaksi->kode_transaksi ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>TANGGAL</td>
									<td> : <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
								</tr>
								<tr>
									<td>JUMLAH TOTAL</td>
									<td> : <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
								</tr>
								<tr>
									<td>STATUS</td>
									<td> : <?php echo $header_transaksi->status_bayar ?></td>
								</tr>
								<tr>
									<td>BUKTI BAYAR</td>
									<td> : <?php if($header_transaksi->bukti_bayar!="") { ?> 
										<img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
									<?php }else{ echo 'Belum Ada Bukti Bayar' ; } ?>
									</td>
								</tr>
							</tbody>
						</table>
						<?php 
						//error upload
						if(isset($error)){
							echo '<p class="alert alert-warning">'.$error.'</p>';
						}
						//notif error
						echo validation_errors('<p class="alert alert-warning">','</p>');

						//form  open
						echo form_open_multipart(base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi));
						 ?>

						 <table class="table">
						 	<tbody>
						 		<tr>
						 			<td width="30%">Pembayaran Ke Rekening</td>
						 			<td>
						 				<select name="id_rekening" class="form-control">
						 					<?php foreach($rekening as $rekening) { ?>	
						 						<option value="<?php echo $rekening->id_rekening ?>" <?php if($header_transaksi->id_rekening==$rekening->id_rekening) { echo "selected" ; } ?>>
						 							<?php echo $rekening->nama_bank ?> (NO. Rekening : <?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>)
						 						</option>
						 					<?php } ?>
						 				</select>
						 			</td>
						 		</tr>
						 		<tr>
						 			<td>Tanggal Pembayaran</td>
						 			<td>
						 				<input type="text" name="tanggal_bayar" class="form-control" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); }elseif($header_transaksi->tanggal_bayar!="") {echo $header_transaksi->tanggal_bayar; }else{ echo date('d-m-Y') ; } ?>">
						 			</td>
						 		</tr>
						 		<tr>
						 			<td>Jumlah Pembayaran</td>
						 			<td><input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) { echo set_value('jumlah_bayar'); }elseif($header_transaksi->jumlah_bayar!="") { echo $header_transaksi->jumlah_bayar ;}else{ echo $header_transaksi->jumlah_transaksi ; } ?>"></td>
						 		</tr>
						 		<tr>
						 			<td>Dari Bank</td>
						 			<td>
						 				<input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo $header_transaksi->nama_bank ?>">
						 			</td>
						 		</tr>
						 		<tr>
						 			<td>Dari Nomor Rekening</td>
						 			<td>
						 				<input type="text" name="rekening_pembayaran" class="form-control" placeholder="Nomor Rekening" value="<?php echo $header_transaksi->rekening_pembayaran ?>">
						 			</td>
						 		</tr>
						 		<tr>
						 			<td>Nama Pemilik</td>
						 			<td>
						 				<input type="text" name="rekening_pelanggan" class="form-control" placeholder="Nama Pemilik rekening" value="<?php echo $header_transaksi->rekening_pelanggan ?>">
						 			</td>
						 		</tr>
						 		<tr>
						 			<td>Upload Bukti Pembayaran</td>
						 			<td>
						 				<input type="file" name="bukti_bayar" class="form-control" placeholder="Upload Bukti Pembayaran" >
						 			</td>
						 		</tr>
						 		<tr>
						 			<td></td>
						 			<td>
						 				<div class="btn-group">
						 					<button class="btn btn-success" type="submit" name="submit">
						 						<i class="fa fa-upload">	Simpan</i>
						 					</button>
						 					<button class="btn btn-info" type="reset" name="reset">
						 						<i class="fa fa-times">	Reset</i>
						 					</button>
						 				</div>
						 			</td>
						 		</tr>
						 	</tbody>
						 </table>

						<?php
						// form close
						echo form_close();

						//kalau tidak ada tampilkan notifikasi
						}else{ ?>

							<p class="alert alert-success">
								<i class="fa fa-warning"></i>	Belum Ada Data Transaksi
							</p>

						<?php } ?>
					

				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
					<h1>Pembayaran</h1>
					<li class="text-justify">1.	Mata uang yang dipakai untuk pembayaran adalah Rupiah (IDR).</li>
					<li class="text-justify">2.	Pembayaran bisa melalui ATM, internet banking, mobile banking, setoran tunai, maupun transfer antarbank ke rekening bank yang telah kami informasikan kepada Anda.</li>
					<li class="text-justify">3.	Pembayaran dianggap lunas jika uang telah kami terima sesuai dengan jumlah yang harus dibayarkan. Segera lakukan konfirmasi kepada kami melalui fitur Konfirmasi Pembayaran yang tersedia di galeriajangambe.com.</li>
					<li class="text-justify">4.	Segala biaya yang timbul dari transaksi pembayaran (seperti fee pihak ketiga, biaya transfer, biaya kliring, switching, dan sebagainya) ditanggung oleh pembeli.</li>
					<li class="text-justify">5.	Keterlambatan proses transfer antarbank bukan tanggung jawab kami.</li>
					<li class="text-justify">6.	Kelalaian penulisan rekening dan informasi lainnya atau kelalaian pihak bank pada saat Anda melakukan pembayaran bukan tanggung jawab kami.</li>
				</div>
			</div>

		</div>

	</section>