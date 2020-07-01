<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body{
			font-family: Arial;
			font-size: 12px;
		}
		.cetak{
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table{
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th{
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th{
			background-color: #f5f5f5f5;
			font-weight: bold;
		}
		h1{
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
		body{
			font-family: Arial;
			font-size: 12px;
		}
		.cetak{
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table{
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th{
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th{
			background-color: #f5f5f5f5;
			font-weight: bold;
		}
		h1{
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
</head>
<body onload="print()">
	<div class="cetak">
		<img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" width="50" height="50" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
		<h1>Laporan Penjualan <?php echo $site->namaweb ?></h1>
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>UMKM</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($data as $laporan) { ?>
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
</body>
</html>
