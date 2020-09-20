<!-- partial -->
<div class="content-wrapper">
<h3 class="page-heading mb-4">Dashboard</h3>
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
            <div class="card-body">
            <div class="clearfix">
                <div class="float-left">
                <h4 class="text-danger">
                    <i class="fa fa-mail-reply highlight-icon" aria-hidden="true"></i>
                </h4>
                </div>
                <div class="float-right">
                <p class="card-text text-dark">Pesan</p>
                <h4 class="bold-text"><?= $pesan; ?></h4>
                </div>
            </div>
            <p class="text-muted">
                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> Pesan dari pembeli
            </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
            <div class="card-body">
            <div class="clearfix">
                <div class="float-left">
                <h4 class="text-warning">
                    <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                </h4>
                </div>
                <div class="float-right">
                <p class="card-text text-dark">Orders</p>
                <h4 class="bold-text"><?= $pesanan; ?></h4>
                </div>
            </div>
            <p class="text-muted">
                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Produk Terpesan
            </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
            <div class="card-body">
            <div class="clearfix">
                <div class="float-left">
                <h4 class="text-success">
                    <i class="fa fa-mobile-phone highlight-icon" aria-hidden="true"></i>
                </h4>
                </div>
                <div class="float-right">
                <p class="card-text text-dark">Jumlah Produk</p>
                <h4 class="bold-text"><?= $produk; ?></h4>
                </div>
            </div>
            <p class="text-muted">
                <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Produk Yang Tersedia
            </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
            <div class="card-body">
            <div class="clearfix">
                <div class="float-left">
                <h4 class="text-primary">
                    <i class="fa fa-file highlight-icon" aria-hidden="true"></i>
                </h4>
                </div>
                <div class="float-right">
                <p class="card-text text-dark">Kategori Produk</p>
                <h4 class="bold-text"><?= $kategori; ?></h4>
                </div>
            </div>
            <p class="text-muted">
                <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Kategori Produk
            </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalControlPanel">
          Control Panel
        </button>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="modalControlPanel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Control Panel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">

                  <!-- Tambah User -->
                  <div class="col-md-4 text-info text-center">
                    <h5>
                        <a href="<?= base_url('users/tambah') ?>">
                          <p class="nav-link small text-uppercase text-info">Tambah User</p>
                            <i class="fa fa-5x fa-user "></i>
                        </a>
                    </h5>
                  </div>
                  <!-- End Tambah User -->

                  <!-- Tambah Produk -->
                  <div class="col-md-4 text-info text-center">
                    <h5>
                        <a href="<?= base_url('kategori/tambah') ?>">
                          <p class="nav-link small text-uppercase text-info">Tambah Kategori Produk</p>
                            <i class="fa fa-5x fa-file "></i>
                        </a>
                    </h5>
                  </div>
                  <!-- End Tambah Produk -->

                  <!-- Tambah Kategoti Produk -->
                  <div class="col-md-4 text-info text-center">
                    <h5>
                        <a href="<?= base_url('produk/tambah') ?>">
                          <p class="nav-link small text-uppercase text-info">Tambah Produk</p>
                            <i class="fa fa-5x fa-mobile "></i>
                        </a>
                    </h5>
                  </div>
                  <!-- End Tambah Kategori PRoduk -->
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>

</div>
</div>