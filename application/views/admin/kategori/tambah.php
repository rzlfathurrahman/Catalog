  <!-- partial -->
  <div class="content-wrapper">
    <h3 class="page-heading mb-4">Tambah Kategori Produk</h3>
    <?php if (isset($error)) {
      echo $error;
    } ?>
    <div class="row mb-2">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <h5 class="card-title mb-4">Form Tambah Kategori Produk</h5>
              <form action="<?= base_url('kategori/tambahAksi'); ?>" method="post" accept-charset="utf-8" class="forms-sample">

              <div class="form-group">
                <label for="namaProduk">Kategori Produk</label>
                <input type="text" name="kategori" class="form-control" id="namaProduk" value="<?= set_value('kategori'); ?>"  placeholder="Kategori Produk">
                <?= form_error('kategori', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
              </div>

              <div class="form-group">
                <label for="namaProduk">Link</label>
                <input type="text" name="link" class="form-control" id="namaProduk" value="<?= set_value('link'); ?>"  placeholder="Link Kategori">
                <?= form_error('link', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
              </div>

              <button style="cursor: pointer;" type="submit" class="btn btn-block btn-primary">SIMPAN</button>
            <?= form_close(); ?>
           </div>
         </div>
       </div>
     </div>
  </div>