<!--================Order Details Area =================-->
<section class="order_details p_120">
	<div class="container">
		<?php if ($pesan == "Maaf. Pemesanan gagal!"): ?>
		<h3 class="title_confirmation" style="padding-top: 25px;"><?= $pesan; ?></h3>
		<?php else: ?>
		<h3 class="title_confirmation" style="padding-top: 25px;"><?= $pesan; ?></h3>
		<?php endif ?>
		<div class="row order_d_inner">
			<div class="col-lg-12">
				<div class="details_item">
					<h4>Order Info</h4>
					<ul class="list">
						<li>
							<a href="#">
								<span>Nama Pembeli</span> : <?= $invoice['nama']; ?></a>
						</li>
						<li>
							<a href="#">
								<span>Alamat</span> : <?= $invoice['alamat']; ?></a>
						</li>
						<li>
							<a href="#">
								<span>Telepon</span> : <?= $invoice['telepon']; ?></a>
						</li>
						<li>
							<a href="#">
								<span>Tanggal Pesan</span> : <?= $invoice['tgl_pesan']; ?></a>
						</li>
						<li>
							<a href="#">
								<span>Batas Bayar</span> : <?= $invoice['batas_bayar']; ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="order_details_table">
			<h2>Order Details</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Produk</th>
							<th scope="col">Jumlah Produk</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<p><?= $data['nama_produk']; ?></p>
							</td>
							<td>
								<h5><?= $data['jumlah']; ?></h5>
							</td>
							<td>
								<p><?= number_format($data['harga']); ?></p>
							</td>
						</tr>
						
						<tr>
							<td>
								<h4>Total</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p class="font-weight-bold">Rp <?= number_format($data['harga']); ?></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!--================End Order Details Area =================-->
