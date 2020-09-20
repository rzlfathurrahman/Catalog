<?= $this->session->flashdata('message'); ?>
<!--================Cart Area =================-->
<section class="cart_area" style="margin-top: 3rem;">
	<div class="container">
		<div class="cart_inner">
			<div class="table-responsive ">
				<table class="table table-hover" >
					<thead>
						<tr >
							<th scope="col">Produk</th>
							<th scope="col">Harga</th>
							<th scope="col">Jumlah</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
					<?= form_open('shop/updateCart'); ?>
					<?php $i = 1; foreach ($this->cart->contents() as $items) : ?>
						<?= form_hidden($i.'[rowid]', $items['rowid']); ?>
						<tr >
							<td>
								<div class="media">
									<div class="d-flex">
										<img style="max-width: 145px; max-height: 98px;" src="<?= base_url('assets/uploads/'); ?><?= $items['gambar']; ?>" alt="">
									</div>
									<div class="media-body">
										<p><?= $items['name']; ?>(<?= $items['ukuran']; ?>)</p>
									</div>
								</div>
							</td>
							<td>
								<h5>Rp <?= number_format( $items['price']) ?></h5>
							</td>
							<td>
								<div class="form-group product_count">
									<?= form_input(array('type'=> 'number','class'=>'form-control','name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
								</div>
							</td>
							<td>
								<h5><?= "Rp"." ".number_format($items['subtotal']); ?></h5>
							</td>
						</tr>
					 <?php $i++; ?>
					<?php endforeach; ?>
						<tr >
							<td>
								<button type="submit" class="btn btn-sm btn-outline-success btn-block">Update Keranjang</button>
								<?= form_close(); ?>
							</td>
							<td>

								<?= anchor('shop/cartDestroy','<div class="btn btn-sm btn-danger btn-block" onclick="return confirm(\'Anda yakin ingin menghapus keranjang?\')">Hapus Keranjang</div>'); ?>
							</td>
							<td>

							</td>
							<td>

							</td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<h5>Subtotal</h5>
							</td>
							<td>
								<h5>Rp <?= number_format($this->cart->total()); ?></h5>
							</td>
						</tr>
						<tr class="out_button_area">
							<td>
							</td>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="checkout_btn_inner">
									<a class="gray_btn" href="<?= base_url('shop'); ?>">Lanjut Belanja</a>
									<a class="main_btn" href="<?= base_url('shop/pembayaran'); ?>">Pembayaran</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!--================End Cart Area =================-->