
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
				echo form_open_multipart(base_url('admin/produk/foto/'.$produk->id_produk));
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
			<label class="col-sm-2 col-form-label">Judul Foto</label>
		   <div class="col-sm-5">
			<input type="text" name="judul_foto" class="form-control" placeholder="Judul Foto Produk" value="<?php echo set_value('judul_foto') ?>" required>
			</div>
		</div>
		<br>
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Unggah Foto</label>
		   <div class="col-sm-5">
			<input type="file" name="foto" class="form-control" placeholder="Foto Produk" value="<?php echo set_value('foto') ?>" required>
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label"></label>
		   <div class="col-sm-5">
				<button class="btn btn-primary btn-sm" name="submit" type="submit">
					<i class="fa fa-save">	 Simpan dan Unggah Foto</i>
				</button>
				<button class="btn btn-info btn-sm" name="reset" type="reset">
					<i class="fa fa-times">	 Reset</i>
				</button>
				<a href="<?php echo base_url('admin/produk') ?>" class="btn btn-outline-primary btn-sm">Kembali</a>
			</div>
		</div>

 	</div>
 </div>
</div>

</div>





<?php echo form_close(); ?>

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
     </div>
  </div>
</div>


<div class="container-fluid">
    <div class="card shadow mb-4">
           <div class="card-body">
             <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<tr>
                      <td>1</td>
                      <td><?php echo $produk->nama_produk ?></td>
                      <td>
                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->foto_produk) ?>" 
                        class="img img-responsive img-thumbnail" width="60">
                      </td>
                      <td>
                      </td>
                    </tr>


                  	<?php $no=2; foreach($foto as $foto) { ?>
                    <tr>
                      <td><?php echo $no?></td>
                      <td><?php echo $foto->judul_foto ?></td>
                      <td>
                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$foto->foto) ?>" 
                        class="img img-responsive img-thumbnail" width="60">
                      </td>
                      <td>

                      	 <a href="<?php echo base_url('admin/produk/delete_foto/'.$produk->id_produk.'/'.$foto->id_foto) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Inggin Hapus Foto Ini ? ')"> <i class="fa fa-trash"></i> Hapus </a> 

                      </td>
                    </tr>
                    <?php $no++; ?>
                      <?php } ?>
                  </tbody>
               </table>
              </div>
           </div>
        </div>
     </div>


     </div>
 </div>