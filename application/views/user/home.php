<?= $this->session->flashdata('message');; ?>
<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="overlay"></div>
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="offset-lg-2 col-lg-8">
                    <h3>Beli Dari Rumah
                        <br />Diantar Sampai Ke Rumah</h3>
                    <p>MRDN Catalog adalah website Catalog online, anda bisa melihat berbagai macam produk yang ada. Tampilan yang sederhana dan mudah dipahami.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Hot Deals Area =================-->
<!-- <section class="hot_deals_area section_gap">
    <div class="container-fluid">
        <div class="row">
            <?php for ($i=0; $i < 2; $i++) : ?> 
                
            <div class="col-lg-6">
                <div class="hot_deal_box">
                    <img class="img-fluid" src="<?= base_url('assets/user/'); ?>/img/product/hot_deals/deal1.jpg" alt="">
                    <div class="content">
                        <h2>Hot Deals of this Month</h2>
                        <p>shop now</p>
                    </div>
                    <a class="hot_deal_link" href="<?= base_url('shop'); ?>"></a>
                </div>
            </div>
                
            <?php endfor; ?> 
        </div>
    </div>
</section> -->
<!--================End Hot Deals Area =================-->

<!--================Clients Logo Area =================-->
<!-- <section class="clients_logo_area" >
    <div class="container-fluid">
        <div class="clients_slider owl-carousel">
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-1.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-2.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-3.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-4.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-5.png" alt="">
            </div>
        </div>
    </div>
</section> -->
<!--================End Clients Logo Area =================-->

<!--================Latest Product Area =================-->
<section class="feature_product_area section_gap">
    <div class="main_box" >
        <div class="container-fluid" style="background: #F9F9FF;">
            <div class="row" style="padding: 2rem !important"> 
                <div class="main_title">
                    <h2>Produk Terbaru</h2>
                    <p >Produk Yang Baru Saja Dikeluarkan</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($produkBaru as $p): ?>
                    
                <div class="col col1">
                    <div class="f_p_item">
                        <div class="f_p_img">
                            <img class="img-fluid" src="<?= base_url('assets/uploads'); ?>/<?= $p->gambar; ?>" alt="">
                            <div class="p_icon">
                                <a href="<?= base_url('shop/addToChart/'.$p->id); ?>">
                                    <i class="lnr lnr-cart"></i>
                                </a>
                                <a href="<?= base_url('shop/details/'.$p->id); ?>">
                                    <i class="lnr lnr-eye"></i>
                                </a>
                            </div>
                            
                        </div>
                        <a href="<?= base_url('shop/details/'.$p->id); ?>">
                            <h4 class="text-capitalize"><?= $p->nama_produk; ?></h4>
                        </a>
                        <h5>Rp<?= number_format($p->harga); ?></h5>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>

            <div class="row" style="padding: 2rem !important">
                <nav class="cat_page mx-auto" aria-label="Page navigation example">
                    <?= anchor('shop','<button class="btn btn-primary">View All Product</button>'); ?>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--================End Latest Product Area =================-->

<!-- jangan tampilkan produk kecuali produk terbaru -->
<div style="display: none;">
    
<!--================Clients Logo Area =================-->
<section class="clients_logo_area" >
    <div class="container-fluid">
        <div class="clients_slider owl-carousel">
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-1.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-2.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-3.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-4.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-5.png" alt="">
            </div>
        </div>
    </div>
</section>
<!--================End Clients Logo Area =================-->

<!--================Man Product Area =================-->
<section class="feature_product_area section_gap" >
    <div class="main_box" >
        <div class="container-fluid" style="background: #F9F9FF;">
            <div class="row" style="padding: 2rem !important;">
                <div class="main_title">
                    <h2 >Pakaian Laki Laki</h2>
                    <p >Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($produkLaki as $pL): ?>
                    
                <div class="col col1">
                    <div class="f_p_item">
                        <div class="f_p_img">
                            <img class="img-fluid" src="<?= base_url('assets/uploads'); ?>/<?= $pL->gambar; ?>" alt="">
                            <div class="p_icon">
                                <a href="<?= base_url('shop/details/'.$p->id); ?>">
                                    <i class="lnr lnr-cart"></i>
                                </a>
                            </div>
                        </div>
                        <a href="<?= base_url('shop/details/'.$p->id); ?>">
                            <h4 class="text-capitalize"><?= $pL->nama_produk; ?></h4>
                        </a>
                        <h5 >Rp<?= number_format($p->harga); ?></h5>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>

            <div class="row" style="padding: 2rem !important">
                <nav class="cat_page mx-auto" aria-label="Page navigation example">
                    <?= anchor('shop','<button class="btn btn-primary">View All Product</button>'); ?>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--================End Man Product Area =================-->

<!--================Clients Logo Area =================-->
<section class="clients_logo_area" >
    <div class="container-fluid">
        <div class="clients_slider owl-carousel">
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-1.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-2.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-3.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-4.png" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url('assets/user/'); ?>/img/clients-logo/c-logo-5.png" alt="">
            </div>
        </div>
    </div>
</section>
<!--================End Clients Logo Area =================-->

<!--================ Woman Product Area =================-->
<section class="feature_product_area section_gap" >
    <div class="main_box" >
        <div class="container-fluid" style="background: #F9F9FF;">
            <div class="row" style="padding: 2rem !important;">
                <div class="main_title">
                    <h2 >Pakaian Wanita</h2>
                    <p >Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($produkWanita as $pW): ?>
                    
                <div class="col col1">
                    <div class="f_p_item">
                        <div class="f_p_img">
                            <img class="img-fluid" src="<?= base_url('assets/uploads'); ?>/<?= $pL->gambar; ?>" alt="">
                            <div class="p_icon">
                                <a href="<?= base_url('shop/details/'.$p->id); ?>">
                                    <i class="lnr lnr-cart"></i>
                                </a>
                            </div>
                        </div>
                        <a href="<?= base_url('shop/details/'.$p->id); ?>">
                            <h4 class="text-capitalize"><?= $pL->nama_produk; ?></h4>
                        </a>
                        <h5 >Rp<?= number_format($p->harga); ?></h5>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>

            <div class="row" style="padding: 2rem !important">
                <nav class="cat_page mx-auto" aria-label="Page navigation example">
                    <?= anchor('shop','<button class="btn btn-primary">View All Product</button>'); ?>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--================End Woman Product Area =================-->
</div>