<?= $this->session->flashdata('message'); ?>
<!-- partial -->
<div class="content-wrapper">
  <h3 class="page-heading mb-4">Users</h3>
  <?= anchor('users/tambah', '<div type="div" class="mb-4 btn btn-primary mr-2">Tambah User</div>'); ?>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <?php if ($users == null) : ?>
            <div class="container-fluid">
              <div class="row">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center text-center error-page">
                  <div class="col-lg-6 mx-auto">
                    <h1 class="display-1 mb-0"><i class="fa fa-warning"></i></h1>
                    <h2 class="mb-4">Data Masih Kosong!</h2>
                    <p> Klik tombol Tambah users diatas atau dibawah ini !</p>
                    <?= anchor('users/tambah', '<div type="div" class="mb-4 btn btn-primary mr-2">Tambah Produk</div>'); ?>
                  </div>
                </div>
              </div>
            </div>
          <?php else : ?>
            <h5 class="card-title mb-4">Tabel User</h5>
            <div class="table-responsive">
              <table class="table table-bordered table-hover center-aligned-table">
                <thead>
                  <tr class=" text-center bg-primary">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($users as $p) : ?>
                    <tr class="text-center">
                      <td><?= $no++; ?></td>
                      <td><?= $p['nama']; ?></td>
                      <td><?= $p['username']; ?></td>
                      <td>
                        <?php if ($p['is_active'] == 1) : ?>
                          <span class="btn btn-sm btn-success">Online</span>
                        <?php else : ?>
                          <span class="btn btn-sm btn-danger">Offline</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?= anchor('users/update/' . $p['id'], '<div class="btn btn-primary btn-sm">Update</div>'); ?>
                      </td>
                      <td>
                        <?= anchor('users/delete/' . $p['id'], '<div class="btn btn-danger btn-sm" onclick="return confirm(\' Anda yakin ingin menghapus user ini ? \')">Hapus</div>'); ?>
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