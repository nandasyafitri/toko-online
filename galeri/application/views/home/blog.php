<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					 Blog
				</h3>
			</div>

			<div class="row" >
				<?php foreach ($blog as $blog) { ?>
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a class="block3-img dis-block hov-img-zoom">
							<img src="<?php echo base_url('assets/upload/image/'.$blog->gambar) ?>" alt="<?php echo $blog->gambar ?>">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="<?php echo base_url('blog') ?>" class="m-text11">
									<?php echo $blog->judul ?>
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Admin</span>
							<span class="s-text6">on</span> <span class="s-text7"><?php echo $blog->tanggal_upload ?></span>

							<p class="s-text8 p-t-16">
								<?php echo substr($blog->isi, 0, 100) ?>
							</p>
						</div>
					</div>
				</div>
			<?php } ?> 
			</div>
		</div>
	</section>