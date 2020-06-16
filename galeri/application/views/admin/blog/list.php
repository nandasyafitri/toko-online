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
      <h1 class="h3 mb-0 text-gray-800"> <b> Data Blog </b></h1>
        <a href="<?php echo base_url('admin/blog/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Baru </a>
  </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary mb-3"></div>
           <div class="card-body">
             <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Isi</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $no=1; foreach($blog as $blog) { ?>
                    <tr>
                      <td><?php echo $no?></td>
                      <td><?php echo $blog->judul ?></td>
                      <td><?php echo $blog->isi ?></td>
                      <td>
                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$blog->gambar) ?>" 
                        class="img img-responsive img-thumbnail" width="60">
                      </td>
                      <td>

                        <a href="<?php echo base_url('admin/blog/foto/'.$blog->id_blog) ?>" class="btn btn-success btn-sm"> <i class="fa fa-image"></i> Foto () </a> 

                      	 <a href="<?php echo base_url('admin/blog/edit/'.$blog->id_blog) ?>" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> Edit </a> 

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