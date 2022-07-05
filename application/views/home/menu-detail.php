<style>
    .circle-bg {
        background-color: lightgray;
        border-radius: 50%;
        padding: 10px;
    }
</style>
<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

    </div>
</section>
<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <h2>Menu Sehat</h2>
            <h3><?= $menu->nama ?></h3>
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
            <div class="col-lg-4 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                <?php if ($menu->foto_menu) { ?>
                    <img src="<?= base_url('asset/corporate/foto/' . $menu->foto_menu) ?>" class="img-fluid" alt="">
                <?php } else { ?>
                    <img src="https://i0.wp.com/f1-styx.imgix.net/article/2021/09/29103622/sepiring-makanan-untuk-diet.jpg?fit=900%2C602&ssl=1" class="img-fluid">
                <?php } ?>
            </div>
            <div class="col-lg-4 pt-4 pt-lg-0 content d-flex flex-column aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="form-group">
                    <h6>Kalori</h6>
                    <p><?= $menu->kalori ?> - <?= $menu->batas ?> kal</p>
                </div>
                <div class="form-group">
                    <h6>Durasi</h6>
                    <p><?= $menu->durasi ?> hari</p>
                </div>
                <div class="form-group">
                    <h6>Harga</h6>
                    <p>Rp <?= number_format($menu->harga, 0, ",", ".") ?></p>
                </div>
                <div class="form-group">
                    <a href="<?= site_url('menu/pesan/' . $menu->id_menu) ?>" class="btn btn-outline-success btn-block w-100"><i class="fa-solid fa-cart-shopping"></i> Aku mau</a>
                </div>
            </div>
            <div class="col-lg-4 pt-4 pt-lg-0 content d-flex flex-column aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <h4>Katering</h4>
                <h3><?= $vendor->nama_vendor ?> - <?= $vendor->nama_kota ?></h3>
                <?php if ($this->session->isLogin == true) { ?>
                    <div class="form-group">
                        <h6>Nomor Telpon</h6>
                        <p><i class="fa-solid fa-phone circle-bg"></i> <?= $vendor->phone_number ?></p>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <h6>Alamat</h6>
                    <p><?= $vendor->nama_kota ?></p>
                    <p><i class="fa-solid fa-location-dot circle-bg"></i> <?= $vendor->alamat ?></p>
                </div>
            </div>
            <div class="col-lg-12 pt-4 pt-lg-0 content d-flex flex-column aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="form-group">
                    <br>
                    <h6>Keterangan</h6>
                    <p class="text-justify"><?= $menu->keterangan ?></p>
                </div>
            </div>
        </div>
</section>