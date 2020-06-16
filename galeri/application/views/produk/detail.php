<!-- breadcrumb -->
<?php if ($this->session->flashdata('gagal')) {
						echo '<div class="alert alert-warning">';
						echo $this->session->flashdata('gagal');
						echo '</div>';
					} ?>
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?php echo base_url() ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="<?php echo base_url('produk') ?>" class="s-text16">
			Produk
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>


		<span class="s-text17">
			<?php echo $title ?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">

						<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$produk->foto_produk) ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/image/'.$produk->foto_produk) ?>" alt="<?php echo $produk->nama_produk ?>">
							</div>
						</div>

						<?php
						 if($foto) { 
						 	foreach ($foto as $foto) { 
						 ?>
						<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$foto->foto) ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/image/'.$foto->foto) ?>" alt="<?php echo $foto->judul_foto ?>">
							</div>
						</div>
					<?php 
						}
					}
					 ?>
						
					</div>
				</div>
			</div>


			<div class="w-size14 p-t-30 respon5">
				<h1 class="product-detail-name m-text25 p-b-13">
					<?php echo $title ?>
				</h1>

				<?php 
				// form untuk memproses belanjaan
				echo form_open(base_url('belanja/add'));
				// Elemen yang di bawa
				echo form_hidden('id', $produk->id_produk);
				//echo form_hidden('qty', 1 );
				echo form_hidden('price', $produk->harga_produk);
				echo form_hidden('name', $produk->nama_produk);
				echo form_hidden('weight', $produk->berat_produk);
				echo form_hidden('id_umkm', $produk->id_umkm);
				// Elemet Redirect
				echo form_hidden('redirect_page', str_replace('index.php/','', current_url())); 
				?>

				<span class="m-text14">
					IDR	<?php echo number_format($produk->harga_produk,'0',',','.') ?>
				</span>

				<p class="s-text8 p-t-10">
					<?php echo $produk->deskripsi_produk ?>
				</p>
				<p class="s-text8 p-t-10">
					Stok Produk : <?php echo $produk->stok_produk ?>
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">

					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>
						<?php $data = explode(",",$produk->warna)?>
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="warna">
								<option disabled>Choose an option</option>								
								<?php for($i=0;$i<count($data);$i++){?>
									<option value="<?php echo $data[$i] ?>">
											<?php echo $data[$i] ?>
									</option>
								<?php }?>
							</select>
						</div>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button type="submit" name="submit" value="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</button>
							</div>
						</div>
					</div>
					<h1 class="product-detail-name m-text25 p-b-13">Informasi Produk</h1>
					<li class="s-text8 p-t-10">1.	Dengan melakukan transaksi pemesanan secara online galeriajangambe.com, Anda kami anggap telah mengerti informasi produk yang akan Anda beli.</li>
					<li class="s-text8 p-t-10">2.	Produk yang tersedia di galeriajangambe.com sesuai dengan katalog online dan detail produk. Kami berusaha menyajikan data seakurat mungkin tanpa rekayasa agar Anda selaku pembeli tidak dirugikan.</li>
					<li class="s-text8 p-t-10">3.	Informasi produk kami peroleh secara resmi dari katalog produk, maupun informasi pendukung lainnya dari pihak UMKM.</li>
					<li class="s-text8 p-t-10">4.	Perbedaan warna dalam foto/gambar produk yang kami tampilkan di galeriajangambe.com bisa diakibatkan oleh faktor pencahayaan dan setting/resolusi monitor computer/HP dan karena itu tidak dapat dijadikan acuan.</li>
					<li class="s-text8 p-t-10">5.	Harga produk dalam situs ini adalah benar pada saat dicantumkan.</li>
					<li class="s-text8 p-t-10">6.	Harga yang tercantum adalah harga produk semata, tidak termasuk ongkos kirim. Ongkos kirim dihitung otomatis (berdasarkan harga dari jasa ekspedisi) sesuai dengan alamat pengiriman yang Anda berikan pada saat transaksi pemesanan.</li>
				</div>
				<?php
				// Closing form
				 echo form_close(); ?>
				
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

					<?php foreach ($produk_related as $produk_related) { ?>
					<div class="item-slick2 p-l-15 p-r-15">

					<?php 
					$warna = $this->input->post('warna');
					// form untuk memproses belanjaan
					echo form_open(base_url('belanja/add'));
					// Elemen yang di bawa
					echo form_hidden('id', $produk_related->id_produk);
					echo form_hidden('qty', 1 );
					echo form_hidden('warna',  $warna);
					echo form_hidden('price', $produk_related->harga_produk);
					echo form_hidden('name', $produk_related->nama_produk);
					// Elemet Redirect
					echo form_hidden('redirect_page', str_replace('index.php/','', current_url())); 
					?>

						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo base_url('assets/upload/image/'.$produk_related->foto_produk) ?>" 
								alt="<?php echo $produk_related->nama_produk ?>">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button Belanja -->
										<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="<?php echo base_url('produk/detail/'.$produk_related->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $produk_related->nama_produk ?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									IDR	<?php echo number_format($produk_related->harga_produk,'0',',','.') ?>
								</span>
							</div>
						</div>
						<?php
						// Closing form
						 echo form_close(); ?>
					</div>
				<?php } ?>

				</div>
			</div>

		</div>
	</section>

