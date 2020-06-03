
<!---Notifikasi--->
<div class="container-fluid">
	<div class="card shadow mb-4 ">
		<div class="card-body">    
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
				echo form_open_multipart(base_url('admin/blog/tambah'));
			?>
		</div>
	</div>
</div>



<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"> <b> Tambah Blog </b></h1>
 </div>


 <div class="card shadow mb-4 ">
 	<div class="card-header py-3 bg-primary mb-3">
 	</div>
 	<div class="card-body">
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Judul</label>
		   <div class="col-sm-10">
			<input type="text" name="judul" class="form-control" placeholder="Judul" value="<?php echo set_value('judul') ?>" required>
			</div>
		</div>
		<br>
        <div class="from-group row ">
			<label class="col-sm-2 col-form-label">Foto</label>
		   <div class="col-sm-5">
			<input type="file" name="gambar" class="form-control" required="required">
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Isi</label>
		   <div class="col-sm-10">
			<textarea name="isi" class="form-control" placeholder="" id="editor">
				<?php echo set_value('isi') ?>
			</textarea>
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
				<a href="<?php echo base_url('admin/blog') ?>" class="btn btn-outline-primary btn-sm">Kembali</a>
			</div>
		</div>

 	</div>
 </div>
</div>

</div>





<?php echo form_close(); ?>


