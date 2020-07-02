<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" 
		style="background-image: url(<?php echo base_url() ?>assets/template/images/foto/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			<?php echo $title ?>
		</h2>
		<p class="m-text13 t-center">
			<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
		</p>
	</section>


	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row" id="blog">
				<?php foreach ($blog as $blog) { ?>
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">

						<!-- item blog -->
						<div class="item-blog p-b-80">
							<a  class="item-blog-img pos-relative dis-block hov-img-zoom"  >
	
								<img src="<?php echo base_url('assets/upload/image/thumbs/'.$blog->gambar) ?>  " alt="<?php echo $blog->gambar ?>" width="820" height="481">

							</a>

							<div class="item-blog-txt p-t-33" style>
								<h4 class="p-b-11">
									<a href="<?php echo base_url('blog/detail/'.$blog->id_blog) ?>" class="m-text24">
										<?php echo $blog->judul ?>
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By Admin
										<span class="m-l-3 m-r-6"></span>
									</span>
								</div>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										<?php echo $blog->tanggal_upload ?>
										<span class="m-l-3 m-r-6"></span>
									</span>
								</div>

								<p class="p-b-12">
									<?php echo substr($blog->isi, 0, 100) ?>
								</p>

								<a href="<?php echo base_url('blog/detail/'.$blog->id_blog) ?>" class="s-text20">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		

						

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-r-50">
						<?php echo $pagin; ?>
					</div>
				</div>
			</div>

				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
					

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							kategori produk
						</h4>

						<ul>
							<?php foreach ($listing_kategori as $listing_kategori) { ?>
							<li class="p-t-6 p-b-8 bo7">
								<a href="<?php echo base_url('produk/kategori/'.$listing_kategori->slug_kategori) ?>" class="s-text13 active1">
									<?php echo $listing_kategori->nama_kategori ?>
								</a>
							</li>
						<?php } ?>
						</ul>
				
			

						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Produk Terbaru
						</h4>

						<ul class="bgwhite">
							
							<?php foreach ($produk_related as $produk_related) { ?>
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
								echo form_hidden('redirect_page', str_replace('index.php/','', current_url()));?>

							<li class="flex-w p-b-20">
								<a  class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4" >
									<img src="<?php echo base_url('assets/upload/image/'.$produk_related->foto_produk) ?>" alt="<?php echo $produk_related->nama_produk ?>">
								</a>

								<div class="w-size23 p-t-5">
									<a href="<?php echo base_url('produk/detail/'.$produk_related->slug_produk) ?>" class="s-text20">
										<?php echo $produk_related->nama_produk ?>
									</a>

									<span class="dis-block s-text17 p-t-6">
										IDR	<?php echo number_format($produk_related->harga_produk,'0',',','.') ?>
									</span>
								</div>
							</li>
						</ul>
							
						<?php } ?>
					
				</div>
			</div>
		</div>

	</section>
			