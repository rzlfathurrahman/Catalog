  <!-- partial -->
  <div class="content-wrapper">
    <?= $this->session->flashdata('pesan'); ?>
    <?= $this->session->flashdata('messsage'); ?>
    <h3 class="page-heading mb-4">Produk</h3>
    <?= anchor('produk/tambah', '<div type="div" class="mb-4 btn btn-primary mr-2">Tambah Produk</div>'); ?>
    <div class="row mb-2">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <?php if ($produk == null) : ?>
              <div class="container-fluid">
                <div class="row">
                  <div class="content-wrapper full-page-wrapper d-flex align-items-center text-center error-page">
                    <div class="col-lg-6 mx-auto">
                      <h1 class="display-1 mb-0"><i class="fa fa-warning"></i></h1>
                      <h2 class="mb-4">Data Masih Kosong!</h2>
                      <p> Klik tombol Tambah Produk diatas atau dibawah ini !</p>
                      <?= anchor('produk/tambah', '<div type="div" class="mb-4 btn btn-primary mr-2">Tambah Produk</div>'); ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <h5 class="card-title mb-4">Tabel Produk</h5>
              <div class="table-responsive">
                <table class="table table-bordered table-hover center-aligned-table">
                  <thead>
                    <tr class=" text-center bg-primary">
                      <th>#</th>
                      <th>Nama Produk</th>
                      <th>Kategori</th>
                      <th>Ukuran</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th colspan="3">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($produk as $p) : ?>
                      <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $p['nama_produk']; ?></td>
                        <td><?= $p['kategori']; ?></td>
                        <td><?= $p['ukuran']; ?></td>
                        <td><?= "Rp " . number_format($p['harga']); ?></td>
                        <td><?= $p['stok']; ?></td>
                        <td>
                          <?= anchor('produk/detail/' . $p['id'], '<div class="btn btn-primary btn-sm">Detail</div>'); ?>
                        </td>
                        <td>
                          <?= anchor('produk/update/' . $p['id'], '<div class="btn btn-success btn-sm">Update</div>'); ?>
                        </td>
                        <td>
                          <?= anchor('produk/delete/' . $p['id'], '<div class="btn btn-danger btn-sm" onclick="return confirm(\'Anda yakin ingin menghapus data ini?\')">Hapus</div>'); ?>
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