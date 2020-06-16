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
		<table class="table table-bordered">
			<thead>
                <?php foreach ($data as $data) {?>
                    <tr>
                        <th width="20%">KODE UMKM</th>
                        <th> : <?php echo $data->kode_umkm ?></th>
                    </tr>
                    <tr>
                        <th width="20%">NAMA UMKM</th>
                        <th> : <?php echo $data->nama_umkm ?></th>
                    </tr>
                    <tr>
                        <th width="20%">NAMA PENGUSAHA</th>
                        <th> : <?php echo $data->nama_pengusaha ?></th>
                    </tr>
                    <tr>
                        <th width="20%">JENIS UMKM</th>
                        <th> : <?php echo $data->nama_kategori ?></th>
                    </tr>
                    <tr>
                        <th width="20%">TELEPON</th>
                        <th> : <?php echo $data->telepon ?></th>
                    </tr>
					<tr>
                        <th width="20%">ALAMAT</th>
                        <th> : <?php echo $data->alamat ?></th>
                    </tr>                   
                <?php }?>
			</thead>
			<tbody>
			</tbody>
		</table>

		<br>
	</div>
</body>
</html>
