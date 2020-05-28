	<!-- Cart -->
	<section onload="print()" class="bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="pos-relative">
				<div class="bgwhite">

					<h1><?php echo $title ?></h1><hr>
					<div class="clearfix"></div>
					<br><br>

					<?php if($this->session->flashdata('sukses')) {
						echo '<div class="alert alert-warning">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					} ?>
				
					<div class="card-body">
						<table class="table table-bordered" width="100%">
								<thead>
									<tr class="bg-success">
										<th>NAMA PENGUSAHA</th>
										<th>TELEPON</th>
										<th>ALAMAT</th>
										<th>NAMA UMKM</th>
										<th>JENIS UMKM</th>
										<th>KODE UMKM</th>
										<th>ACTION</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($data as $data) { ?>
									<td><?php echo $data->nama_pengusaha ?></td>
									<td><?php echo $data->telepon ?></td>
									<td><?php echo $data->alamat ?></td>
									<td><?php echo $data->nama_umkm ?></td>
									<td><?php echo $data->jenis_umkm ?></td>
									<td><?php echo $data->kode_umkm ?></td>
									<td><a href="<?php echo base_url('umkm/registrasi/cetak/'.$data->kode_umkm) ?>" target="_blank" class="btn btn-info btn-sm">
								<i class="fa fa-print"></i>	  Cetak </a></td>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>


				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
		
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					
				</div>
			</div>

			
		</div>
	</section>