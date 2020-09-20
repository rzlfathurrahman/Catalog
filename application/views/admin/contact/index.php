  <?= $this->session->flashdata('message'); ?>
  <!-- partial -->
  <div class="content-wrapper">
    <h3 class="page-heading mb-4">Contact </h3>
    <div class="row mb-2">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <?php if ($contact == null) : ?>
              <div class="container-fluid">
                <div class="row">
                  <div class="content-wrapper full-page-wrapper d-flex align-items-center text-center error-page">
                    <div class="col-lg-6 mx-auto">
                      <h1 class="display-1 mb-0"><i class="fa fa-warning"></i></h1>
                      <h2 class="mb-4">Pesan Masih Kosong!</h2>
                    </div>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <h5 class="card-title mb-4">Tabel Pesan </h5>
              <div class="table-responsive">
                <table class="table table-bordered table-hover center-aligned-table">
                  <thead>
                    <tr class=" text-center bg-primary">
                      <th>#</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Subjek</th>
                      <th colspan="3">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1;
                    foreach ($contact as $p) : ?>
                      <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['email']; ?></td>
                        <td><?= $p['subjek']; ?></td>
                        <td>
                          <?= anchor('admin/contact/detail/' . $p['id'], '<div class="btn btn-success btn-sm">Detail</div>'); ?>
                        </td>
                        <td>
                          <?= anchor('admin/contact/balas/' . $p['id'], '<div class="btn btn-primary btn-sm">Balas</div>'); ?>
                        </td>
                        <td>
                          <?= anchor('admin/contact/hapus/' . $p['id'], '<div class="btn btn-danger btn-sm" onclick="return confirm(\' Anda yakin ingin menghapus pesan ini?  \')">Hapus</div>'); ?>
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