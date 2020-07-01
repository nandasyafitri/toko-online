
<!---Notifikasi--->
<div class="container-fluid">
	<div class="card shadow mb-4 ">
		<div class="card-body"> 

			<?php 
        if ($this->session->flashdata('sukses')) {
        	echo '<div class="alert alert-success">';
        	echo $this->session->flashdata('sukses');
        	echo '</div>';
        }
        ?>   
			<?php

				//Error upload
				if (isset($error)) {
					echo '<div class="alert alert-warning">';
					echo $error ;
					echo '<div>';
				}

				//Notifikasi Error
				echo validation_errors('<div class="alert alert-warning">','<div>');

				//form open
				echo form_open_multipart(base_url('admin/konfigurasi'));
			?>
		</div>
	</div>
</div>



<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"> <b> <?php echo $title ?> </b></h1>
 </div>


 <div class="card shadow mb-4 ">
 	<div class="card-header py-3 bg-primary mb-3">
 	</div>
 	<div class="card-body">
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Nama Website</label>
		   <div class="col-sm-5">
			<input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo 
			$konfigurasi->namaweb ?>" required>
			</div>
		</div>
		<br>
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Tagline/Moto</label>
		   <div class="col-sm-5">
			<input type="text" name="tagline" class="form-control" placeholder="Tagline/Moto" value="<?php echo 
			$konfigurasi->tagline ?>" required>
			</div>
		</div>

		<br>
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Email</label>
		   <div class="col-sm-5">
			<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo 
			$konfigurasi->email ?>" required>
			</div>
		</div>
		<br>
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Website</label>
		   <div class="col-sm-5">
			<input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo 
			$konfigurasi->website ?>" required>
			</div>
		</div>
		<br>

		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Facebook</label>
		   <div class="col-sm-5">
			<input type="text" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo 
			$konfigurasi->facebook ?>" required>
			</div>
		</div>
		<br>

		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Instagram</label>
		   <div class="col-sm-5">
			<input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo 
			$konfigurasi->instagram ?>" required>
			</div>
		</div>
		<br>

		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Telepon</label>
		   <div class="col-sm-5">
			<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo 
			$konfigurasi->telepon ?>" required>
			</div>
		</div>
		<br>

		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Alamat Kantor</label>
		   <div class="col-sm-5">
			<textarea name="alamat" class="form-control" placeholder="Alamat">
				<?php echo $konfigurasi->alamat ?></textarea>
			</div>
		</div>
		<br>

		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Keyword (untuk SEO Google)</label>
		   <div class="col-sm-5">
			<textarea name="keywords" class="form-control" placeholder="Keyword (untuk SEO Google)">
				<?php echo $konfigurasi->keywords ?></textarea>
			</div>
		</div>
		<br>
		
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Kode Metatext</label>
		   <div class="col-sm-5">
			<textarea name="metatext" class="form-control" placeholder="Metatext">
				<?php echo $konfigurasi->metatext ?></textarea>
			</div>
		</div>
		<br>


		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Deskripsi</label>
		   <div class="col-sm-5">
			<textarea name="deskripsi" class="form-control" placeholder="Deskripsi">
				<?php echo $konfigurasi->deskripsi ?></textarea>
			</div>
		</div>
		<br>


		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">About</label>
		   <div class="col-sm-5">
			<textarea name="about" class="form-control" placeholder="About">
				<?php echo $konfigurasi->about ?></textarea>
			</div>
		</div>
		<br>

		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Syarat dan Ketentuan Pelanggan</label>
		   <div class="col-sm-5">
			<textarea name="syarat_ketentuan_pelanggan" class="form-control"  id="editor" placeholder="Syarat dan Ketentuan Pelanggan">
				<?php echo $konfigurasi->syarat_ketentuan_pelanggan ?></textarea>
			</div>
		</div>
		<br>

		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Syarat dan Ketentuan UMKM</label>
		   <div class="col-sm-5">
			<textarea name="syarat_ketentuan_umkm" class="form-control"  placeholder="Syarat dan Ketentuan UMKM">
				<?php echo $konfigurasi->syarat_ketentuan_umkm ?></textarea>
			</div>
		</div>
		<br>
	
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label"></label>
		   <div class="col-sm-5">
				<button class="btn btn-primary btn-sm" name="submit" type="submit">
					<i class="fa fa-save">	 Simpan</i>
				</button>
				<button class="btn btn-info btn-sm" name="reset" type="reset">
					<i class="fa fa-times">	 Reset</i>
				</button>
			</div>
		</div>

 	</div>
 </div>
</div>

</div>





<?php echo form_close(); ?>


