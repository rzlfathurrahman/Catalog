<!-- partial -->
<div class="content-wrapper" >
  <?php foreach ($detail as $d): ?>

    <div class="card mb-3">
      <div class="row">
        <div class="col-md-4">
          <img src="<?= base_url('assets/uploads/').$d->gambar;  ?>" alt="<?= $d->gambar ?>" class="card-img" style="max-width: 500px;">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h3 class="card-title"><?= $d->nama_produk; ?></h3>
            <p class="card-text"><?= $d->keterangan; ?></p>
            <div class="btn btn-primary "><?= $d->kategori; ?></div>
            <div class="btn btn-warning ">Ukuran : <?= $d->ukuran; ?></div>
            <div class="btn btn-dark ">Stok : <?= $d->stok; ?></div>
            <div class="btn btn-secondary "><?= "Rp".number_format($d->harga); ?></div>
          </div>
        </div>
      </div>
    </div>

   <?= anchor('produk','<div class="btn btn-danger">Kembali</div>'); ?>
    <?= anchor('produk/update/'.$d->id, '<div class="btn btn-success ">Update</div>'); ?>
  <?php endforeach; ?>
</div>