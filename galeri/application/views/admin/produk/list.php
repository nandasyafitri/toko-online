<!DOCTYPE html>
<html lang="en">

<head>
</head>

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
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"> <b> Data Produk </b></h1>
        <a href="<?php echo base_url('admin/produk/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Baru </a>
  </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary mb-3"></div>
           <div class="card-body">
             <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Berat (Gram)</th>
                      <th>Foto</th>
                      <th>Deskripsi</th>
                      <th>Stok</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $no=1; foreach($produk as $produk) { ?>
                    <tr>
                      <td><?php echo $no?></td>
                      <td><?php echo $produk->nama_kategori ?></td>
                      <td><?php echo $produk->nama_produk ?></td>
                      <td><?php echo number_format($produk->harga_produk,'0',',','.') ?></td>
                      <td><?php echo $produk->berat_produk ?></td>
                      <td>
                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->foto_produk) ?>" 
                        class="img img-responsive img-thumbnail" width="60">
                      </td>
                      <td><?php echo $produk->deskripsi_produk ?></td>
                      <td><?php echo $produk->stok_produk ?></td>
                      <td><?php echo $produk->status_produk ?></td>
                      <td>

                        <a href="<?php echo base_url('admin/produk/foto/'.$produk->id_produk) ?>" class="btn btn-success btn-sm"> <i class="fa fa-image"></i> Foto (<?php echo $produk->total_foto ?>) </a> 

                      	 <a href="<?php echo base_url('admin/produk/edit/'.$produk->id_produk) ?>" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> Edit </a> 

                         <?php include('delete.php') ?>

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
     


</html>