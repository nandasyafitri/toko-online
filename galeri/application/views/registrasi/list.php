	<!-- Cart -->
	<section class="bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="pos-relative">
				<div class="bgwhite">

					<h1><?php echo $title ?></h1><hr>
					<div class="clearfix"></div>
					<br><br>
				
					<?php if ($this->session->flashdata('sukses')) {
						echo '<div class="alert alert-warning">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					} ?>

					<p class="alert alert-success">Sudah memiliki akun ? Silahkan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">Login di sini </a></p>
					<div class="col-md-12">
						<?php 
						// display error
						echo validation_errors('<div class="alert alert-warning">','</div>');

						// form open
						echo form_open(base_url('registrasi')); ?>
						<div class="container">
							<div class="row">
								<div class="col-md-2"><label>Nama</label></div>
								<div class="col-md-10"><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama_pelanggan') ?>" required></div>
							</div>
							<div class="row">
								<div class="col-md-2"><label>Email</label></div>
								<div class="col-md-10"><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required=></div>
							</div>
							<div class="row">
								<div class="col-md-2"><label>Password</label></div>
								<div class="col-md-10"><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></div>
							</div>
							<div class="row">
								<div class="col-md-2"><label>Telepon</label></div>
								<div class="col-md-10"><input type="text" name="telepon_pelanggan" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon_pelanggan') ?>" required></div>
							</div>
							<div class="row">
								<div class="col-md-2"><label>Alamat</label></div>
								<div class="col-md-10"> <textarea name="alamat_pelanggan" class="form-control" placeholder="Alamat"><?php echo set_value('alamat_pelanggan') ?></textarea> </div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-2"><label>S&K</label></div>
								<div class="col-md-10">
								<li class="text-justify">1.	Dengan menggunakan, berbelanja dan/atau mendaftarkan diri Anda di galeriajangambe.com, berarti Anda setuju untuk terikat dan patuh pada syarat dan ketentuan yang berlaku.</li>
								<li class="text-justify">2.	Syarat dan ketentuan ini dapat berubah sewaktu-waktu.</li>
								<li class="text-justify">3.	Syarat dan ketentuan ini kami buat untuk kepentingan bersama, untuk menjaga hak dan kewajiban masing-masing pihak, dan tidak dimaksudkan untuk merugikan salah satu pihak.</li>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-10">
									<button class="btn btn-outline-success" type="submit">
										<i class="fa fa-save">Submit</i>
									</button>
									<button class="btn btn-outline-primary" type="reset">
										<i class="fa fa-times">Reset</i>
									</button>
								</div>
							</div>
						</div>
						<?php echo form_close(); ?>
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