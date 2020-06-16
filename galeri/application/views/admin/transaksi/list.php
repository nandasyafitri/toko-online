<div class="container-fluid">
	<div class="card shadow mb-4 ">
		<div class="card-body"> 
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
 		<table class="table table-bordered" width="100%">
				<thead>
					<tr class="bg-success">
						<th>NO</th>
						<th>PELANGGAN</th>
						<th>KODE TRANSAKSI</th>
						<th>TANGGAL</th>
						<th>JUMLAH TOTAL</th>
						<th>JUMLAH ITEM</th>
						<th>RESI</th>
						<th>STATUS BAYAR</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $header_transaksi->nama_pelanggan ?>
							<br>
							<small>
								Telepon	: <?php echo $header_transaksi->telepon_pelanggan ?>
								<br> Email : <?php echo $header_transaksi->email ?>
								<br> Alamat Kirim :  <br> <?php echo nl2br($header_transaksi->alamat_pelanggan) ?>
							</small>
						</td>
						<td><?php echo $header_transaksi->kode_transaksi ?></td>
						<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
						<td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
						<td><?php echo $header_transaksi->total_item ?></td>
						<td><?php echo $header_transaksi->resi ?></td>
						<td><?php echo $header_transaksi->status_bayar ?></td>
						<td>
							<div class="btn-group">
							<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm">
								<i class="file-alt"></i>	 Detail </a>
							<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-info btn-sm">
								<i class="fa fa-print"></i>	  Cetak </a>
							<a href="<?php echo base_url('admin/transaksi/status/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm">
								<i class="fa fa-check"></i>	  Update Status </a>
								
							</div>
						</td>
					</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>