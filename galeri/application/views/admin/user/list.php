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
      <h1 class="h3 mb-0 text-gray-800"> <b> Admin Sistem </b></h1>
        <a href="<?php echo base_url('admin/user/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Baru </a>
  </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary mb-3"></div>
           <div class="card-body">
             <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $no=1; foreach($user as $user) { ?>
                    <tr>
                      <td><?php echo $no?></td>
                      <td><?php echo $user->nama_lengkap?></td>
                      <td>
                      	 <a href="<?php echo base_url('admin/user/edit/'.$user->id_admin) ?>" class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i> Edit </a> 

                      	 <a href="<?php echo base_url('admin/user/delete/'.$user->id_admin) ?>" class="btn btn-danger btn-xs"onclick="return confirm('Yakin ingin menghapus data ini?')" ><i class="fa fa-trash"></i> Hapus  </a>

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