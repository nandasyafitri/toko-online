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

		<a href="<?php echo base_url('blog') ?>" class="s-text16">
			Blog
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>


		<span class="s-text17">
			<?php echo $title ?>
		</span>
	</div>

<section class="bgwhite p-t-60 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/image/'.$blog->gambar) ?>" alt="<?php echo $blog->gambar ?>" width="820" height="481">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									<?php echo $blog->judul ?>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By Admin
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $blog->tanggal_upload ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>
								</div>

								<p class="p-b-25">
									<?php echo $blog->isi ?>
								</p>

								<p class="p-b-25">
									
								</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
