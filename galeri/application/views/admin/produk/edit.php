
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
				echo form_open_multipart(base_url('admin/produk/edit/' .$produk->id_produk));
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
			<label class="col-sm-2 col-form-label">Kategori Produk</label>
		   <div class="col-sm-5">
		   	<select name="id_kategori" class="form-control">
		   		<?php foreach ($kategori as $kategori) { ?>
				<option value="<?php echo $kategori->id_kategori ?>" <?php if($produk->id_kategori==$kategori->id_kategori) { echo "selected"; } ?>>
						<?php echo $kategori->nama_kategori ?>
				</option>	
		   	  <?php	} ?>
		   	</select>
		   </div>
		</div>
		<br>
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Nama Produk</label>
		   <div class="col-sm-5">
			<input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo 
			$produk->nama_produk ?>" required>
			</div>
		</div>
		<br>
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Kode Produk</label>
		   <div class="col-sm-5">
			<input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo $produk->kode_produk ?>" required>
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Harga Produk</label>
		   <div class="col-sm-5">
			<input type="number" name="harga_produk" class="form-control" placeholder="Harga Produk" value="<?php echo $produk->harga_produk ?>" required>
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Berat Produk (Gram)</label>
		   <div class="col-sm-5">
			<input type="text" name="berat_produk" class="form-control" placeholder="Berat Produk" value="<?php echo $produk->berat_produk ?>" required>
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Foto Produk</label>
		   <div class="col-sm-5">
			<input type="file" name="foto_produk" class="form-control">
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Deskripsi Produk</label>
		   <div class="col-sm-10">
			<textarea name="deskripsi_produk" class="form-control" placeholder="Deskripsi Produk" id="editor">
				<?php echo $produk->deskripsi_produk ?>
			</textarea>
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Stok Produk</label>
		   <div class="col-sm-5">
			<input type="number" name="stok_produk" class="form-control" placeholder="Stok Produk" value="<?php echo $produk->stok_produk ?>" required>
			</div>
		</div>
		<br>
		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Status Produk</label>
		   <div class="col-sm-5">
			<select name="status_produk" class="form-control">
				<option value="Publish">Publikasikan</option>
				<option value="Draft" <?php if($poduk->status_produk=="Draft") { echo "selected"; } ?>>Simpan Sebagai Draft</option>
			</select>
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
				<a href="<?php echo base_url('admin/produk') ?>" class="btn btn-outline-primary btn-sm">Kembali</a>
			</div>
		</div>

 	</div>
 </div>
</div>

</div>





<?php echo form_close(); ?>


