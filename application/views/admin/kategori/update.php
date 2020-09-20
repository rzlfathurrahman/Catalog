  <!-- partial -->
  <div class="content-wrapper">
    <h3 class="page-heading mb-4">Update Kategori</h3>
    <?php if (isset($error)) {
      echo $error;
    } ?>
    <div class="row mb-2">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <h5 class="card-title mb-4">Form Update Kategori Produk</h5>
              <form action="<?= base_url('kategori/updateAksi'); ?>"  method="post" accept-charset="utf-8" class="forms-sample">
                <?php foreach ($detail as $d): ?>
                  
                <div class="form-group">
                  <label for="kategoriProduk">Kategori Produk</label>
                  <input type="hidden" name="id" value="<?= $d->id; ?>">
                  <input type="text" name="kategori" class="form-control" id="kategoriProduk" value="<?= $d->kategori; ?>"  placeholder="Kategori Produk">
                  <?= form_error('kategori', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>

                <div class="form-group">
                  <label for="kategoriProduk">Link</label>
                  <input type="text" name="link" class="form-control" id="linkProduk" value="<?= $d->link; ?>"  placeholder="Link Kategori Produk">
                  <?= form_error('link', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>

                <div class="form-group">
                  <label for="">Status</label>
                  <?php if ($d->status == 1): ?>

                   <div class="form-radio">
                      <label>
                        <input name="status" value="1" type="radio" checked="">
                        Aktif
                      </label>
                    </div>

                    <div class="form-radio">
                      <label>
                        <input name="status" value="0" type="radio" >
                        Tidak Aktif
                      </label>
                    </div>

                  <?php else: ?>
                    <div class="form-radio">
                      <label>
                        <input name="status" value="1" type="radio" >
                        Aktif
                      </label>
                    </div>

                    <div class="form-radio">
                      <label>
                        <input name="status" value="0" type="radio" checked="">
                        Tidak Aktif
                      </label>
                    </div>
                  <?php endif ?>
                </div>

                <?php endforeach ?>
                <button style="cursor: pointer;" type="submit" class="btn btn-block btn-primary">SIMPAN</button>
              </form>
           </div>
         </div>
       </div>
     </div>
  </div>