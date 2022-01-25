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
                    <img src="<?= base_url('asset/logo/' . $menu->foto_menu) ?>" class="img-fluid" alt="">
                <?php } else { ?>
                    <img src="https://i0.wp.com/f1-styx.imgix.net/article/2021/09/29103622/sepiring-makanan-untuk-diet.jpg?fit=900%2C602&ssl=1" class="img-fluid">
                <?php } ?>
            </div>
            <div class="col-lg-4 pt-4 pt-lg-0 content d-flex flex-column aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="form-group">
                    <label>Keterangan</label>
                    <h5><?= $menu->keterangan ?></h5>
                </div>
                <div class="form-group">
                    <label>Kalori</label>
                    <h5><?= $menu->kalori ?> - <?= $menu->batas ?></h5>
                </div>
                <div class="form-group">
                    <label>Durasi</label>
                    <h5><?= $menu->durasi ?> hari</h5>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <h5>Rp <?= $menu->harga ?></h5>
                </div>
                <div class="form-group">
                    <a href="<?= site_url('menu/pesan/' . $menu->id_menu) ?>" class="btn btn-primary">Pesan</a>
                </div>
            </div>
            <div class="col-lg-4 pt-4 pt-lg-0 content d-flex flex-column aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <h5><?= $vendor->nama_vendor ?> - <?= $vendor->nama_kota ?></h5>
                <?php if ($this->session->isLogin == true) { ?>
                    <div class="form-group">
                        <label>Nomor Telpon</label>
                        <h5><?= $vendor->phone_number ?></h5>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <h5><?= $vendor->deskripsi ?></h5>
                </div>
                <div class="form-group">
                    <label>Kota</label>
                    <h5><?= $vendor->nama_kota ?></h5>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <h5><?= $vendor->alamat ?></h5>
                </div>
            </div>
        </div>
</section>