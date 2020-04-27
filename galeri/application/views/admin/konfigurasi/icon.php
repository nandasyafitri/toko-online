
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
				echo form_open_multipart(base_url('admin/konfigurasi/icon'));
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
			<label class="col-sm-2 col-form-label">Upload Icon</label>
		   <div class="col-sm-5">
			<input type="file" name="icon" class="form-control" placeholder="Upload Icon" value="<?php echo 
			$konfigurasi->icon ?>" required>
			<br>
			Icon lama : <br> 
			<img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>" class="img img-responsive img-thumbnail" width="200">
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


