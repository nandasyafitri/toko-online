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

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">

						<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$blog->gambar) ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/image/'.$blog->gambar) ?>" alt="<?php echo $blog->judul ?>">
							</div>
						</div>
						
					</div>
				</div>
			</div>


			<div class="w-size14 p-t-30 respon5">
				<h1 class="product-detail-name m-text25 p-b-13">
					<?php echo $title ?>
				</h1>

				<p class="s-text8 p-t-10">
					<?php echo $blog->isi ?>
				</p>
	
	
			</div>
		</div>
	</div>

