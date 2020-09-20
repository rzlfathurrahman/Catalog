<!-- partial -->
<?= $this->session->flashdata('message');; ?>
<div class="content-wrapper" >
  <?php foreach ($contact as $d): ?>

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

     <div class="card mb-3">
      <h5 class="card-header font-weight-bold">Balas Pesan</h5>
      <div class="card-body">
       <form action="<?= base_url('admin/contact/balasAksi'); ?>"  class="form-sample" method="post">
         
        <div class="form-group">
          <label>Email</label>
          <input type="hidden" name="id" value="<?= $d->id ?>">  
          <input type="text" name="email" value="<?= $d->email ?>" class="form-control" readonly="">
        </div>

        <div class="form-group">
          <label>Subject</label>
          <input type="text" name="subject" placeholder="Subject" class="form-control" name="subject">
        </div>

        <div class="form-group">
          <label>Pesan</label>
          <textarea name="pesan" class="form-control" placeholder="Isi Pesan" rows="5" type="text"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Kirim</button>

       </form>
      </div>
    </div>

    <?= anchor('admin/contact','<div class="btn btn-danger">Kembali</div>'); ?>
  <?php endforeach; ?>
</div>