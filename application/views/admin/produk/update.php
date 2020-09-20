  <!-- partial -->
  <div class="content-wrapper">
    <h3 class="page-heading mb-4">Update Produk</h3>
    <?php if (isset($error)) {
      echo $error;
    } ?>
    <div class="row mb-2">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <h5 class="card-title mb-4">Form Update Produk</h5>
              <form action="<?= base_url('produk/updateAksi'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="forms-sample">
                <?php foreach ($detail as $d): ?>
                  
                <div class="form-group">
                  <label for="namaProduk">Nama Produk</label>
                  <input type="hidden" name="id" value="<?= $d->id; ?>">
                  <input type="hidden" name="gambar_lama" value="<?= $d->gambar; ?>">
                  <input type="text" name="nama_produk" class="form-control" id="namaProduk" value="<?= $d->nama_produk; ?>"  placeholder="Nama Produk">
                  <?= form_error('nama_produk', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <select name="kategori" id="kategori" class="form-control">
                    <option value="<?= $d->kategori; ?>"><?= $d->kategori; ?></option>
                    <?php foreach ($kategori as $k): ?>
                      <option value="<?= $k->kategori; ?>"><?= $k->kategori; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('kategori', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label for="ukuran">Ukuran</label>
                  <select name="ukuran" id="ukuran" class="form-control">
                    <option value="<?= $d->ukuran; ?>"><?= $d->ukuran; ?></option>
                    <option value="XS">Extra Small</option>
                    <option value="S">Small</option>
                    <option value="M">Medium</option>
                    <option value="L">Large</option>
                    <option value="XL">Extra Large</option>
                  </select>
                  <?= form_error('ukuran', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label for="harga">Harga (dalam Rupiah)</label>
                  <input type="number" name="harga" class="form-control" id="harga" value="<?= $d->harga; ?>" placeholder="Harga Satuan" >
                  <?= form_error('harga', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label for="stok">Stok</label>
                  <input type="number" name="stok" class="form-control" id="stok" value="<?= $d->stok; ?>" placeholder="Stok Produk" >
                  <?= form_error('stok', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" cols="5" rows="5" placeholder="Let us type some loremm ipsum...." class="form-control p-input"><?= $d->keterangan; ?></textarea>
                  <?= form_error('keterangan', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label>Gambar</label><br>
                  <img class="form-text" width="100px" src="<?= base_url() . 'assets/uploads/'. $d->gambar ?>">
                  <input type="file" name="gambar" value="<?= $d->gambar ?>" class="form-control-file">
                  <?= form_error('gambar', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                  <div class="font-weight-bold text-danger ml-2 mt-2">Ukuran Maks 1Mb (800*800)</div>
                </div>

                <?php endforeach ?>
                <button style="cursor: pointer;" type="submit" class="btn btn-block btn-primary">SIMPAN</button>
              </form>
           </div>
         </div>
       </div>
     </div>
  </div>