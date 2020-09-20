  <!-- partial -->
  <div class="content-wrapper">
    <h3 class="page-heading mb-4">Tambah User</h3>
    <?php if (isset($error)) {
      echo $error;
    } ?>
    <div class="row mb-2">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <h5 class="card-title mb-4">Form Tambah User</h5>
              <form action="<?= base_url('users/tambahAksi'); ?>" method="post" accept-charset="utf-8" class="forms-sample">

              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama'); ?>"  placeholder="Nama Lengkap">
                <?= form_error('nama', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="<?= set_value('username'); ?>"  placeholder="Username">
                <?= form_error('username', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
              </div>

              <div class="form-group">
                <label for="nama">Password</label>
                <input type="password" name="password" class="form-control" id="nama"  placeholder="Password">
                <?= form_error('password', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
              </div>

              <button style="cursor: pointer;" type="submit" class="btn btn-block btn-primary">SIMPAN</button>
            <?= form_close(); ?>
           </div>
         </div>
       </div>
     </div>
  </div>