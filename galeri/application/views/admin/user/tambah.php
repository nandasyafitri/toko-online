
<!---Notifikasi--->
<div class="container-fluid">
	<div class="card shadow mb-4 ">
		<div class="card-body">    
			<?php 
				//Notifikasi Error
				echo validation_errors('<div class="alert alert-warning">','<div>');

				//form open
				echo form_open(base_url('admin/user/tambah'));
			?>
		</div>
	</div>
</div>



<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"> <b> Tambah Admin Sistem </b></h1>
 </div>


 <div class="card shadow mb-4 ">
 	<div class="card-header py-3 bg-primary mb-3">
 	</div>
 	<div class="card-body">
 		
 	
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Nama Pengguna</label>
		   <div class="col-sm-5">
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Pengguna" value="<?php echo set_value('nama_lengkap') ?>" required>
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Username</label>
		   <div class="col-sm-5">
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Password</label>
		   <div class="col-sm-5">
			<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
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
				<a href="<?php echo base_url('admin/user') ?>" class="btn btn-outline-primary btn-sm">Kembali</a>
			</div>
		</div>

 	</div>
 </div>
</div>

</div>





<?php echo form_close(); ?>


