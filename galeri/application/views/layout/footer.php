<?php 

//Load data Konfigurasi website
$site  				=$this->konfigurasi_model->listing();
$nav_produk_footer  =$this->konfigurasi_model->nav_produk();

 ?>

<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					KONTAK KAMI
				</h4>

				<div>
					<p class="s-text7 w-size27">
						<?php echo nl2br($site->alamat) ?>
						<br><i class="fa fa-envelope"></i> <?php echo $site->email ?>
						<br><i class="fa fa-phone"></i> <?php echo $site->telepon ?>
						
					</p>

					<div class="flex-m p-t-30">
					<a href=" <?php echo $site->facebook ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
					<a href=" <?php echo $site->instagram ?>" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Kategori Produk
				</h4>

				<ul>
					<?php foreach ($nav_produk_footer as $nav_produk_footer ) { ?>
					<li class="p-b-9">
						<a href="<?php echo base_url('produk/kategori/'.$nav_produk_footer->slug_kategori) ?>" class="s-text7">
							<?php echo $nav_produk_footer->nama_kategori ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		// $('.block2-btn-addcart').each(function(){
		// 	var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		// 	$(this).on('click', function(){
		// 		swal(nameProduct, "is added to cart !", "success");
		// 	});
		// });

		// $('.block2-btn-addwishlist').each(function(){
		// 	var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		// 	$(this).on('click', function(){
		// 		swal(nameProduct, "is added to wishlist !", "success");
		// 	});
		// });
	</script>

	<!--===============================================================================================-->

	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 10000, 50000 ],
	        connect: true,
	        range: {
	            'min': 1000,
	            'max': 1000000
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>


<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template/js/main.js"></script>
	<!-- script api raja ongkir -->
	<script>
		document.getElementById('provinsi_tujuan').addEventListener('change', function(){
			fetch("<?= base_url('belanja/kota/')?>"+this.value,{
				method:'GET',
			})
			.then((response)=>response.text())
			.then((data)=>{
				document.getElementById('kota_tujuan').innerHTML = data
			})
		})
		document.getElementById('kurir-pilihan').addEventListener('change', function(){
			var jumlah_transaksi = parseFloat($('#jumlah_transaksi').val())
			var ongkir = parseFloat(this.value)
			var total_bayar = parseFloat(jumlah_transaksi + ongkir)
			$('#total_bayar').text((total_bayar).toLocaleString('id', { style: 'currency', currency: 'IDR' }))
			$('#total_transaksi').val(total_bayar)
		})
		function getservice()
		{
			//ambil data dari belanja/checkout.php
			var origin			= $('#kota_asal').val()
			var destination 	= $('#kota_tujuan').find(":selected").val()
			var weight 			= $('#berat').val()
			var courier 		= $("#kurir").find(":selected").val()
			//pakai ajax untuk request data daftar ekspedisi yang tersedia dan ongkirnya
			$.ajax({
				//request ke controller belanja/getservice
                url: '<?= base_url() ?>belanja/getservice',
				//method POST
                type: 'POST',
				//return data atau respond data dalam json
				dataType: 'json',
                cache: false,
				beforeSend: function() {
					$('.service').append("<div class='modal'></div>")
  					$('.service').addClass("loading")
				},
				//data yang dikirim ke controller
                data: {
					origin		: origin,
					destination : destination,
					weight		: weight,
					courier 	: courier
				},
				//jika request berhasil
				success: function(response) {
					$('.service').removeClass("loading")
					//kosongkan elemen di kelas service
					$(".service").empty()
					var data = response
					var status = data.rajaongkir.status.code
					//status 200 artinya Response sukses
					if(status == 200)
					{
						//menampilkan data yg direturn
						var baris =''
						for(var i = 0; i< data.rajaongkir.results[0].costs.length ; i++){
							baris += '<td>'
							baris += '<div class="card">'
							//menampilkan nama ekspedisi
							baris += '<h5 class="card-title">'+data.rajaongkir.results[0].costs[i].service+'</h5>'
							baris += '<div class="card-body">'
							//menampilkan deskripsi ekspedisi
							baris += '<p class="card-text">'+data.rajaongkir.results[0].costs[i].description+'</p>'
							//menampilkan ongkir masing-masing ekspedisi berdasarkan kota-asal, kota-tujuan, berat barang (dalam gram)
							baris += '<p class="card-text"> '+(data.rajaongkir.results[0].costs[i].cost[0].value).toLocaleString('id', { style: 'currency', currency: 'IDR' })+'</p>'
							//menampilkan estimasi lama pengiriman
							baris += '<p class="card-text">Estimasi pengiriman : '+data.rajaongkir.results[0].costs[i].cost[0].etd+' hari</p>'
							baris += '</div>'
							baris += '</div>'
							baris += '</td>'
						}
						//append element
						$(".service").append(baris);
						var row = '<option value=""> Pilih Servis</option>'
						for(var i = 0; i< data.rajaongkir.results[0].costs.length ; i++){
							row += '<option value="'+(data.rajaongkir.results[0].costs[i].cost[0].value)+'">'+data.rajaongkir.results[0].costs[i].service+' / '+(data.rajaongkir.results[0].costs[i].cost[0].value).toLocaleString('id', { style: 'currency', currency: 'IDR' })+'</option>'
						}
						document.getElementById('kurir-pilihan').innerHTML = row

					}
					//jika Response gagal
					else{
						$(".service").empty()
						$(".service").append('<td colspan="6" style="text-align: center;">Tidak ada data</td>');
					}
                },
                error: function(data) {
                    alert("Gagal mengambil data");
                }
			})
		}
	</script>
	<!-- end script api raja ongkir -->
</body>
</html>