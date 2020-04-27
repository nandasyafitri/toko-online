<?php

 //Proteksi halaman admin dengan fungsi cek_login yang ada di simple login
	$this->simple_login->cek_login();


//Gabungkan semua bagian layout menjadi satu
require_once('head.php');
require_once('sidebar.php');
require_once('topbar.php');
require_once('content.php');
require_once('footer.php');
