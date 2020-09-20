<!-- ================Form Pembayaran Area =================-->
<section class="order_details p_120">
	<div class="container-fluid">
		<div class="row  d-flex justify-content-between align-items-center">
			<p class="col-lg-12 my-4  text-center">
				<span class="btn btn-success">
					Total Belanja Anda : Rp 200,000 
				</span>
			</p>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header text-center h4">
						Silahkan Isi Form Pengiriman Berikut !
					</div>
					<div class="card-body">
						<form action="<?= base_url('shop/prosesPembayaran'); ?>" method="post">
							
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required="">
							</div>

							<div class="form-group">
								<label for="alamat">Alamat Lengkap</label>
								<textarea name="alamat" id="alamat" cols="10" rows="5" placeholder="Isi Data Dengan Format Berikut : Desa Glempang,Kecamatan Pekuncen, Kabupaten Banyumas, Provinsi Jawa Tengah, Kode Pos : 53164" class="form-control" required=""></textarea>
							</div>

							<div class="form-group">
								<label for="telepon">Nomor Telepon / WA</label>
								<input type="text" name="telepon" placeholder="Nomor Telepon/ WA Aktif" class="form-control" id="telepon" required="">
							</div>

							<button type="submit" class="btn btn-primary btn-block">Kirim</button>

						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!--================End Form Pembayaran Area ================= -->