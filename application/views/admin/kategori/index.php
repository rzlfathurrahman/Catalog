  <?= $this->session->flashdata('message'); ?>
  <!-- partial -->
  <div class="content-wrapper">
    <h3 class="page-heading mb-4">Kategori Produk</h3>
    <?= anchor('kategori/tambah', '<div type="div" class="mb-4 btn btn-primary mr-2">Tambah Kategori Produk</div>'); ?>
    <?php //echo anchor('produk/import', '<div type="div" class="mb-4 btn disabled btn-success mr-2">Import Produk</div>'); 
    ?>
    <div class="row mb-2">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <?php if ($kategori == null) : ?>
              <div class="container-fluid">
                <div class="row">
                  <div class="content-wrapper full-page-wrapper d-flex align-items-center text-center error-page">
                    <div class="col-lg-6 mx-auto">
                      <h1 class="display-1 mb-0"><i class="fa fa-warning"></i></h1>
                      <h2 class="mb-4">Data Masih Kosong!</h2>
                      <p> Klik tombol Tambah Kategori Produk diatas atau dibawah ini !</p>
                      <?= anchor('produk/tambah', '<div type="div" class="mb-4 btn btn-primary mr-2">Tambah Produk</div>'); ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <h5 class="card-title mb-4">Tabel Kategori Produk</h5>
              <div class="table-responsive">
                <table class="table table-bordered table-hover center-aligned-table">
                  <thead>
                    <tr class=" text-center bg-primary">
                      <th>#</th>
                      <th>Kategori</th>
                      <th>Link</th>
                      <th>Status</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1;
                    foreach ($kategori as $p) : ?>
                      <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $p['kategori']; ?></td>
                        <td><a target="_blank" href="<?= $p['link']; ?>"><?= $p['link']; ?></a></td>
                        <td>
                          <?php if ($p['status'] == 1) : ?>
                            <div class="btn btn-primary btn-sm">Aktif</div>
                          <?php else : ?>
                            <div class="btn btn-warning disabled btn-sm">Tidak Aktif</div>
                          <?php endif ?>
                        </td>
                        <td>
                          <?= anchor('kategori/update/' . $p['id'], '<div class="btn btn-success btn-sm">Update</div>'); ?>
                        </td>
                        <td>
                          <?= anchor('kategori/hapus/' . $p['id'], '<div class="btn btn-danger btn-sm" onclick="return confirm(\'Anda yakin ingin menghapus kategori ini?\')">Hapus</div>'); ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>