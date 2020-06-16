
<!---Notifikasi--->
<div class="container-fluid">
	<div class="card shadow mb-4 ">
		<div class="card-body">    
			<?php 
				//Notifikasi Error
				echo validation_errors('<div class="alert alert-warning">','<div>');

				//form open
                echo form_open(base_url('admin/umkm/tambah'));
                $kode_umkm = strtoupper(random_string('alnum',6));
			?>
		</div>
	</div>
</div>
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"> <b> Tambah UMKM</b></h1>
 </div>
 <div class="card shadow mb-4 ">
 	<div class="card-header py-3 bg-primary mb-3">
 	</div>
 	<div class="card-body">
        <div class="from-group row ">
			<label class="col-sm-2 col-form-label">Kode UMKM</label>
		   <div class="col-sm-5">
			<input type="text" name="kode_umkm" class="form-control" value="<?php echo $kode_umkm ?>" value="<?php echo set_value('kode_umkm')?>" required>
			</div>
		</div>
        <br>
 		<div class="from-group row ">
			<label class="col-sm-2 col-form-label">Nama Pengusaha</label>
		   <div class="col-sm-5">
			<input type="text" name="nama_pengusaha" class="form-control" placeholder="Nama Pengusaha" value="<?php echo set_value('nama_pengusaha') ?>" required>
			</div>
		</div>
		<br>
        <div class="from-group row ">
			<label class="col-sm-2 col-form-label">Nama UMKM</label>
		   <div class="col-sm-5">
			<input type="text" name="nama_umkm" class="form-control" placeholder="Nama UMKM" value="<?php echo set_value('nama_umkm') ?>" required>
			</div>
		</div>
		<br>
        <div class="from-group row ">
			<label class="col-sm-2 col-form-label">Jenis UMKM</label>
		   <div class="col-sm-5">
			    <select class="form-control" name="jenis_umkm">
                <?php foreach($kategori as $kategori){ ?>
                    <option value="<?php echo $kategori->id_kategori?>"><?php echo $kategori->nama_kategori?></option>
                <?php }?>
                </select>
			</div>
		</div>
        <br>
        <div class="from-group row ">
			<label class="col-sm-2 col-form-label">Telepon</label>
		   <div class="col-sm-5">
			<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required>
			</div>
		</div>
        <br>
        <div class="from-group row ">
			<label class="col-sm-2 col-form-label">Alamat</label>
		   <div class="col-sm-5">
                <textarea class="form-control" name="alamat" placeholder="alamat" required><?php echo set_value('alamat') ?></textarea>
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
				<a href="<?php echo base_url('admin/umkm') ?>" class="btn btn-outline-primary btn-sm">Kembali</a>
			</div>
		</div>
 	</div>
 </div>
</div>

</div>
<?php echo form_close(); ?>


