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
					<div class="col-md-12">
						<?php 
						// display error
						echo validation_errors('<div class="alert alert-warning">','</div>');

						// form open
						echo form_open(base_url('umkm/registrasi')); 
						$kode_umkm = strtoupper(random_string('alnum',6));
						?>
						<table class="table table-hover">
							<tbody>
							      <input type="hidden" name="kode_umkm" class="form-control" value="<?php echo $kode_umkm ?>" value="<?php echo set_value('kode_umkm') ?>" required >								
							    <tr>
							      <td scope="col">Nama Pengusaha</td>
							      <td><input type="text" name="nama_pengusaha" class="form-control" placeholder="Nama Pengusaha" value="<?php echo set_value('nama_pengusaha') ?>" required></td>
							    </tr>
							    <tr>
							      <td>Nama UMKM</td>
							      <td><input type="text" name="nama_umkm" class="form-control" placeholder="Nama UMKM" value="<?php echo set_value('nama_umkm') ?>" required=></td>
							    </tr>
							    <tr>
								  <td>Jenis UMKM</td>
								  <td>
								  <div class="from-group row ">
									<div class="col-sm-5">
											<select class="form-control" name="jenis_umkm">
											<?php foreach($kategori as $kategori){ ?>
												<option value="<?php echo $kategori->id_kategori?>"><?php echo $kategori->nama_kategori?></option>
											<?php }?>
											</select>
										</div>
									</div>
								  </td>
							    </tr>
							    <tr>
							      <td>Telepon</td>
							      <td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required></td>
							    </tr>
								<tr>
									<td>Alamat Provinsi dan Kota</td>
									<td>
										<div class="form-group">  
											<select class="form-control" id="provinsi" name="id_provinsi">
												<option value=""> Pilih Provinsi</option>
												<?php
													if($provinsi['rajaongkir']['status']['code']=='200'){
														foreach($provinsi['rajaongkir']['results'] as $pv){
															echo "<option value='$pv[province_id]'>$pv[province]</option>";
														}
													}
												?>                  
											</select>
										</div>
										<div class="form-group">  
											<select class="form-control" id="kota" name="id_kota">
												<option value=""> Pilih Kota</option>            
											</select>
										</div>
									</td>
								</tr>
							    <tr>
							      <td>Alamat Lengkap</td>
							      <td> <textarea name="alamat" class="form-control" placeholder="kecamatan, nama jalan, nama desa, no rumah dll.."><?php echo set_value('alamat') ?></textarea> </td>
							    </tr>
							    <tr>
							      <td></td>
							      <td> 
							      		<button class="btn btn-outline-success" type="submit">
							      			<i class="fa fa-save">		Submit</i>
							      		</button>
							      		<button class="btn btn-outline-primary" type="reset">
							      			<i class="fa fa-times">		Reset</i>
							      		</button>
							      </td>
							    </tr>
							  </tbody>
							</table>
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
	<!-- script untuk menampilkan daftar kota berdasarkan provinsi -->
	<script>
  		document.getElementById('provinsi').addEventListener('change', function(){
			fetch("<?= base_url('umkm/registrasi/kota/')?>"+this.value,{
				method:'GET',
			})
			.then((response)=>response.text())
			.then((data)=>{
				document.getElementById('kota').innerHTML = data
			})
		})
  	</script>
	  <!-- end script untuk menampilkan daftar kota berdasarkan provinsi -->