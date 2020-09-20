<!--================Checkout Area =================-->
<?php foreach ($detail as $d): ?>
	<?php var_dump ($d);exit(); ?>
<section class="checkout_area section_gap">
	<div class="container">
		<div class="billing_details mt-4">
			<div class="row">
				<div class="col-lg-8">
					<h3>Billing Details</h3>
					<form class="row contact_form" action="<?= base_url('shop/konfirmasiProduk'); ?>" method="post" novalidate="validate">
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">

						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="alamat" name="nama" placeholder="Alamat Lengkap">
						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon / WA aktif">
						</div>
						<div class="col-md-6 form-group p_star">
							<input type="number" min="6" max="6" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
						</div>
						<div class="col-md-6 form-group p_star">
							<select name="kurir" class="form-control">
								<option value="">=== Pilih Kurir ===</option>
								<option value="jne">JNE</option>
								<option value="jnt">JNT</option>
								<option value="pos">POS</option>
								<option value="sicepat">SICEPAT</option>
							</select>
						</div>
						
				</div>
				<div class="col-lg-4">
					<div class="order_box">
						<h2>Your Order</h2>
						<ul class="list">
							<li>
								<a href="#">Product
									<span>Total</span>
								</a>
							</li>
							<li>
								<a href="#"><?= $d->nama_produk; ?>
									<span class="middle">x <?= $jumlahBeli; ?></span>
									<span class="last"><?= "Rp ".number_format($jumlahBeli*$d->harga); ?></span>
								</a>
							</li>
						</ul>
						<ul class="list list_2">
							<li>
								<a href="#">Sub Total
									<span><?= number_format(50000 + ($jumlahBeli*$d->harga)); ?></span>
								</a>
							</li>
							<li>
								<a href="#">Shipping
									
								</a>
							</li>
						</ul>
						<!-- <div data-theme="light" id="rajaongkir-widget"></div>
						<script type="text/javascript" src="//rajaongkir.com/script/widget.js"></script> -->

						<button class="main_btn" type="submit">Proses Pembayaran</button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endforeach; ?>
<!--================End Checkout Area =================-->
