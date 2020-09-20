  <?= $this->session->flashdata('message'); ?>
  <!-- partial -->
  <div class="content-wrapper">
    <h3 class="page-heading mb-4">Detail Invoice <div class="btn btn-sm btn-success">No. Invoice : <?= $invoice->id; ?></div></h3>
    <div class="row mb-2">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <h5 class="card-title mb-4">Tabel Pesanan </h5>
             <div class="table-responsive">
               <table class="table table-bordered table-hover center-aligned-table">
                 <thead>
                   <tr class=" text-center bg-primary">
                     <th>#</th>
                     <th>Id Produk</th>
                     <th>Nama Produk</th>
                     <th>Jumlah Pesanan</th>
                     <th>Harga Satuan</th>
                     <th>Sub Total</th>
                   </tr>
                 </thead>
                 <tbody>
                    <?php
                     $no =1;
                     $total = 0;
                     foreach ($pesanan as $p) :
                      $subtotal = $p->jumlah * $p->harga;
                      $total   +=  $subtotal; 
                     ?>
                     <tr class="text-center">
                       <td><?= $no++; ?></td>
                       <td><?= $p->id; ?></td>
                       <td><?= $p->nama_produk; ?></td>
                       <td><?= $p->jumlah; ?></td>
                       <td>Rp <?= number_format($p->harga); ?></td>
                       <td>Rp <?= number_format($subtotal); ?></td>
                     </tr>
                    <?php endforeach; ?>

                 </tbody>
                 <tfoot>
                   <tr >
                     <td colspan="5" align="right" class="font-weight-bold">Grand Total</td>
                     <td  align="center" class="font-weight-bold">Rp <?= number_format($total) ; ?></td>
                   </tr>
                 </tfoot>
               </table>
             </div>
             <a href="<?= base_url('admin/invoice') ?>">
              <div class="btn btn-sm btn-warning">Kembali</div>
             </a>
           </div>
         </div>
       </div>
     </div>
  </div>