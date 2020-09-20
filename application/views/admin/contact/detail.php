<!-- partial -->
<div class="content-wrapper" >
  <?php foreach ($detail as $d): ?>

    <div class="card mb-3">
      <h5 class="card-header font-weight-bold"><?= $d->nama; ?> - <span class="text-primary"><?= $d->email; ?></h5>
      <div class="card-body">
        <p class="card-text">Subjek  : <span class="font-weight-bold"><?= $d->subjek; ?></span></p>
        <div class="form-group">
          <label for="">Isi Pesan : </label>
          <textarea readonly id="" class="form-control" ><?= $d->pesan; ?></textarea>
        </div>
      </div>
    </div>

    <?= anchor('admin/contact','<div class="btn btn-danger">Kembali</div>'); ?>
    <?= anchor('admin/contact/balas/'.$d->id, '<div class="btn btn-primary ">Balas</div>'); ?>
  <?php endforeach; ?>
</div>