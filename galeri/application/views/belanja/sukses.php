	<!-- Cart -->
	<section class="bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="pos-relative">
				<div class="bgwhite">

					<h1><?php echo $title ?></h1><hr>
					<div class="clearfix"></div>
					<br><br>

					<?php if($this->session->flashdata('sukses')) {
						echo '<div class="alert alert-info">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					} ?>
				
				<p class="alert alert-success">
					Terimakasih, produk yang sudah anda beli akan segera kami proses, silahkan melakukan pembayaran dalam batas waktu 2x24 jam. jika pembayaran melewati batas waktu yang telah di tentukan maka pesanan anda kami batalkan. 

					
						<table class="table table-bordered" width="100%">
								<thead>
									<tr class="bg-info">
										<th>NAMA BANK </th>
										<th>NOMOR REKENING</th>
										<th>NAMA PEMILIK</th>
									</tr>
								</thead>
								<tbody>
								<?php $no=1; foreach($rekening as $rekening) { ?>
									<tr>
									<td><?php echo $rekening->nama_bank ?></td>
									<td><?php echo $rekening->nomor_rekening ?></td>
									<td><?php echo $rekening->nama_pemilik ?></td>
									</tr>
								 <?php $no++; ?>
								<?php } ?>
								</tbody>
							</table>
						 


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