  <?= $this->session->flashdata('message'); ?>
  <!-- partial -->
  <div class="content-wrapper">
    <h3 class="page-heading mb-4">Invoice </h3>
    <div class="row mb-2">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <?php if ($invoice == null) : ?>
              <div class="container-fluid">
                <div class="row">
                  <div class="content-wrapper full-page-wrapper d-flex align-items-center text-center error-page">
                    <div class="col-lg-6 mx-auto">
                      <h1 class="display-1 mb-0"><i class="fa fa-warning"></i></h1>
                      <h2 class="mb-4">Invoice Masih Kosong!</h2>
                    </div>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <h5 class="card-title mb-4">Tabel Invoice </h5>
              <div class="table-responsive">
                <table class="table table-bordered table-hover center-aligned-table">
                  <thead>
                    <tr class=" text-center bg-primary">
                      <th>#</th>
                      <th>Id Invoice</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Tanggal Pesan</th>
                      <th>Batas Bayar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1;
                    foreach ($invoice as $p) : ?>
                      <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $p->id; ?></td>
                        <td><?= $p->nama; ?></td>
                        <td><?= $p->alamat; ?></td>
                        <td><a href="https://api.whatsapp.com/send?phone=<?= $p->telepon ?>"><i class="fa fa-whatsapp"></i> <?= $p->telepon; ?></a></td>
                        <td><?= $p->tgl_pesan; ?></td>
                        <td><?= $p->batas_bayar; ?></td>
                        <td>
                          <?= anchor('admin/invoice/detailInvoice/' . $p->id, '<div class="btn btn-success btn-sm">Detail</div>'); ?>
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