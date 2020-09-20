<?= $this->session->flashdata('pesan');; ?>
<!--================Contact Area =================-->
    <section class="contact_area p_120">
        <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
        <h1 class="p-3">Kontak Kami</h1>
            <!-- <div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
                data-mlat="40.701083" data-mlon="-74.1522848">
            </div> -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Ajibarang, Banyumas</h6>
                            <p>Jalan Pancurendang KM 1</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>
                                <a href="#">+6281234567</a>
                            </h6>
                            <p>Senin - Sabtu & 09.00 - 18.00</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6>
                                <a href="#">mrdnCatalog@gmail.com</a>
                            </h6>
                            <p>Kirim kritik dan saranmu segera !</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="<?= base_url('contact'); ?>" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="nama" placeholder="Enter your name" value="<?= set_value("nama"); ?>">
                                <?= form_error('nama', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?= set_value("email"); ?>">
                                <?= form_error('email', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subjek" name="subjek" placeholder="Enter Subject" value="<?= set_value("subjek"); ?>">
                                <?= form_error('subjek', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="pesan" id="message" rows="1" placeholder="Enter Message"><?= set_value("pesan"); ?></textarea>
                                <?= form_error('pesan', '<div class="font-weight-bold text-danger ml-2 mt-2">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->