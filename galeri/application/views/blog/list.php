<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" 
		style="background-image: url(<?php echo base_url() ?>assets/template/images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			<?php echo $title ?>
		</h2>
		<p class="m-text13 t-center">
			<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div>

					<!-- Blog -->
					<div class="row" id="blog">
						<?php foreach ($blog as $blog) { ?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative ">
									<img src="<?php echo base_url('assets/upload/image/thumbs/'.$blog->gambar) ?>" alt="<?php echo $blog->gambar ?>">

								</div>

								<div class="block2-txt p-t-20">
									<a href="<?php echo base_url('blog/detail/'.$blog->id_blog) ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $blog->judul ?>
									</a>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26 text-center">
						<?php echo $pagin; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	