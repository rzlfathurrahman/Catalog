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
             <h5 class="card-title mb-4">Form Update Users</h5>
              <form action="<?= base_url('users/updateAksi'); ?>"  method="post" accept-charset="utf-8" class="forms-sample">
                <?php foreach ($detail as $d): ?>
                  
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="hidden" name="id" value="<?= $d->id; ?>">
                  <input type="text" name="nama" class="form-control" id="nama" value="<?= $d->nama; ?>"  placeholder="Nama Lengkap">
                  <?= form_error('nama', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" value="<?= $d->username; ?>"  placeholder="Username" readonly>
                  <?= form_error('username', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" name="password" class="form-control" id="password" value="<?= $d->password; ?>"  placeholder="password Lengkap">
                  <?= form_error('password', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                </div>

                <div class="form-group">
                  <label for="is_active">
                    Status  
                    <?php if ($d->is_active == 1): ?>
                      <span class="btn btn-sm btn-success">Online</span>
                    <?php else: ?>
                      <span class="btn btn-sm btn-danger">Offline</span>
                    <?php endif; ?>
                   </label>
                   <?php if ($d->is_active == 1): ?>

                   <div class="form-radio">
                      <label>
                        <input name="is_active" value="1" type="radio" checked="">
                        Aktif
                      </label>
                    </div>

                    <div class="form-radio">
                      <label>
                        <input name="is_active" value="0" type="radio" >
                        Tidak Aktif
                      </label>
                    </div>

                  <?php else: ?>
                    <div class="form-radio">
                      <label>
                        <input name="is_active" value="1" type="radio" >
                        Aktif
                      </label>
                    </div>

                    <div class="form-radio">
                      <label>
                        <input name="is_active" value="0" type="radio" checked="">
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