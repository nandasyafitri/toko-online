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
      <h1 class="h3 mb-0 text-gray-800"> <b> Laporan Penjualan Produk </b></h1>
      <a href="<?php echo base_url('admin/laporan_penjualan/cetak') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Cetak </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary mb-3"></div>
           <div class="card-body">
             <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Nama Produk</th>
                      <th>UMKM</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $no=1; foreach($laporan as $laporan) { ?>
                    <tr>
                      <td><?php echo $no?></td>
                      <td><?php echo $laporan->tanggal_transaksi ?></td>
                      <td><?php echo $laporan->nama_produk ?></td>
                      <td><?php echo $laporan->nama_umkm ?></td>                      
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