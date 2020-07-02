<div class="container-fluid">
	<div class="card shadow mb-4 ">
		<div class="card-body">
		<p class= "pull-right">
 			<div class="btn-group pull-right">
 				<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" title= "Cetak" class="btn btn-success btn-sm">
 					<i class="fa fa-print">		Cetak</i>
 				</a>
 				<a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm">
 					<i class="fa fa-backward">		Kembali</i>
 				</a>
 		</p>
 		<div class="clearfix"></div> <hr> 
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
 		


 		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="20%">NAMA PELANGGAN</th>
					<th> : <?php echo $header_transaksi->nama_pelanggan ?></th>
				</tr>
				<tr>
					<th width="20%">KODE TRANSAKSI</th>
					<th> : <?php echo $header_transaksi->kode_transaksi ?></th>
				</tr>
                <tr>
					<td>STATUS</td>
					<td> : <?php echo $header_transaksi->status_bayar ?></td>
				</tr>
                <?php echo form_open(base_url('admin/transaksi/update/'.$header_transaksi->kode_transaksi));?>
                <tr>
					<td>UPDATE STATUS</td>
					<td>
                        <select class="form-control" name="status" id="status">
                            <option value="">PILIH</option>
                            <option value="Dikirim">Dikirim</option>
                            <option value="Batal">Batal</option>
                            <option value="Diterima">Diterima</option>
                        </select>
                    </td>
				</tr>
                <tr id="resi" style="display:none">
					<td>INPUT RESI</td>
					<td>
                        <input class="form-control" name="resi" placeholder="Masukkan Resi" value="<?php echo $header_transaksi->resi?>">
                    </td>
				</tr>
                <tr>
                    <td>
                    </td>
                    <td>
                    <button type="submit" name="simpan" class="btn btn-outline-success btn-sm">
                        <i class="fa fa-save">Simpan</i>
                    </button>
                    </td>
                </tr>
                <?php 
                //Echo form Close
                echo form_close();
                ?>
			</thead>
		</table>

		<br>
		<hr>
	</div>
</div>
</div>
<script>
    document.getElementById('status').addEventListener('change', function(){
        if(this.value == "Dikirim")
        {
            $('#resi').show()
        }else{
            $('#resi').hide()
        }
    })
</script>
