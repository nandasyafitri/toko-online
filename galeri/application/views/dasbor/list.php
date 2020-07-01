
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<?php include('menu.php') ?>
			
					</div>
				</div>
						
				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<?php if($this->session->flashdata('sukses')) {
						echo '<div class="alert alert-success">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					} ?>
						<div class="alert alert-info">
							<h1>Selamat Datang <i><strong><?php echo $this->session->userdata('nama_pelanggan'); ?></strong> </i> </h1>
						</div>
						<?php 
						//kalau ada transaksi,tampilkan tabelnya
						if($header_transaksi) { 
						?>

						<table class="table table-bordered" width="100%">
							<thead>
								<tr class="bg-info">
									<th>NO</th>
									<th>KODE TRANSAKSI</th>
									<th>TANGGAL</th>
									<th>JUMLAH TOTAL</th>
									<th>JUMLAH ITEM</th>
									<th>STATUS</th>
									<th>RESI</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $header_transaksi->kode_transaksi ?></td>
									<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
									<td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
									<td><?php echo $header_transaksi->total_item ?></td>
									<td><?php echo $header_transaksi->status_bayar ?></td>
									<td><?php echo $header_transaksi->resi ?></td>
									<td>
										
										<div class="btn-group">
										<?php if($header_transaksi->status_bayar == "Dikirim") { ?>
										<a href="<?php echo base_url('dasbor/konfirmasi_diterima/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-danger btn-sm">
										<i class="file-alt"></i>	 Diterima </a>
									<?php } ?>
									</div>
								

									<div class="btn-group" >
										<a href="<?php echo base_url('dasbor/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-outline-primary btn-sm">
											<i class="file-alt"></i>	 Detail </a>

										<a href="<?php echo base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-upload"></i>	 Konfirmasi Pembayaran </a>
											</div>
									</td>
								</tr>
								<?php $i++; } ?>
							</tbody>
						</table>

						<p class="text-sm-left">
					Note : lakukan konfirmasi "Diterima"  apabila produk sudah diterima.

						<?php
						//kalau tidak ada tampilkan notifikasi
						}else{ ?>

							<p class="alert alert-success">
								<i class="fa fa-warning"></i>	Belum Ada Data Transaksi
							</p>

						<?php } ?>
				</div>
			</div>

		</div>

	</section>