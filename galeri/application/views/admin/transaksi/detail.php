<div class="container-fluid">
	<div class="card shadow mb-4 ">
		<div class="card-body">
		<p class= "pull-right">
 			<div class="btn-group pull-right">
 				<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" title= "Cetak" class="btn btn-success btn-sm">
 					<i class="fa fa-print">		Cetak</i>
 				</a>
 				<a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm">
 					<i class="fa fa-backward">		Kembali</i>
 				</a>
 		</p>
 		<div class="clearfix"></div> <hr> 
		</div>
	</div>
</div>



<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"> <b> <?php echo $title ?> </b></h1>
 </div>


 <div class="card shadow mb-4 ">
 	<div class="card-header py-3 bg-primary mb-3">
 	</div>
 	<div class="card-body">
 		


 		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="20%">NAMA PELANGGAN</th>
					<th> : <?php echo $header_transaksi->nama_pelanggan ?></th>
				</tr>
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
					<td>JUMLAH TOTAL (Total Belanjaan + Ongkos Kirim) </td>
					<td> : <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
				</tr>
				<tr>
					<td>STATUS</td>
					<td> : <?php echo $header_transaksi->status_bayar ?></td>
				</tr>
				<tr>
					<td>BUKTI BAYAR</td>
					<td> : <?php if($header_transaksi->bukti_bayar == "") { echo 'Belum ada'; }else{ ?>  
						<img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>"
						class="img img-thumbnail" width="200">
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td>TANGGAL BAYAR</td>
					<td> : <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_bayar))  ?></td>
				</tr>
				<tr>
					<td>JUMLAH BAYAR</td>
					<td> : Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.')  ?></td>
				</tr>
				<tr>
					<td>PEMBAYARAN DARI</td>
					<td> : <?php echo $header_transaksi->nama_bank ?> No. Rekening <?php echo $header_transaksi->rekening_pembayaran ?> a.n <?php echo $header_transaksi->rekening_pelanggan ?></td>
				</tr>
				<tr>
					<td>PEMBAYARAN KE REKENING</td>
					<td> : <?php echo $header_transaksi->bank ?> No. Rekening <?php echo $header_transaksi->nomor_rekening ?> a.n <?php echo $header_transaksi->nama_pemilik ?></td>
				</tr>
				<tr>
					<td>RESI</td>
					<td> : <?php echo $header_transaksi->resi ?></td>
				</tr>
			</tbody>
		</table>

		<br>
		<hr>

		<table class="table table-bordered" width="100%">
			<thead>
				<tr class="bg-success">
					<th>NO</th>
					<th>KODE PRODUK</th>
					<th>NAMA PRODUK</th>
					<th>WARNA PRODUK</th>
					<th>JUMLAH PRODUK</th>
					<th>HARGA</th>
					<th>SUB TOTAL</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($transaksi as $transaksi) { ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $transaksi->kode_produk ?></td>
					<td><?php echo $transaksi->nama_produk ?></td>
					<td><?php echo $transaksi->warna ?></td>
					<td><?php echo number_format($transaksi->jumlah) ?></td>
					<td><?php echo number_format($transaksi->harga) ?></td>
					<td><?php echo number_format($transaksi->total_harga) ?></td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
	</div>
</div>
</div>