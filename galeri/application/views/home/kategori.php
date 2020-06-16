<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Kategori Produk
				</h3>
			</div>
			<div class="row">
				<?php foreach ($kategori as $kategori) { ?>
					<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
						<!-- block1 -->
						<div class="block3-img dis-block hov-img-zoom">
							<img src="<?php echo base_url() ?>assets/template/images//banner-02.jpg" alt="IMG-BENNER">
							<div class="block1-wrapbtn w-size2">
								<!-- Button -->
								<a href="<?php echo base_url('produk/kategori/'.$kategori->slug_kategori) ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
									<?php echo $kategori->nama_kategori ?>
								</a>
							</div>
						</div>
					</div>
				<?php } ?>				
			</div>
		</div>
	</section>