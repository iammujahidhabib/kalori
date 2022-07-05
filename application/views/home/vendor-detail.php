<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

    </div>
</section>
<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <h2>Katering Sehat</h2>
            <h3><?= $vendor->nama_vendor ?></h3>
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
            <div class="col-lg-4 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                <img src="<?= base_url() ?>asset/logo/<?= $vendor->foto ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-3 pt-4 pt-lg-0 content d-flex flex-column aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <?php if ($this->session->isLogin == true) { ?>
                    <div class="form-group">
                        <h6>Nomor Telpon</h6>
                        <p><?= $vendor->phone_number ?></p>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <h6>Kota</h6>
                    <p><?= $vendor->nama_kota ?></p>
                </div>
                <div class="form-group">
                    <h6>Alamat</h6>
                    <p><?= $vendor->alamat ?></p>
                </div>
            </div>
            <div class="col-lg-5 pt-4 pt-lg-0 content d-flex flex-column aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="form-group">
                    <h6>Deskripsi</h6>
                    <p><?= $vendor->deskripsi ?></p>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Menu Sehat</h2>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Semua</li>
                    <?php foreach ($kategori as $key) { ?>
                        <li data-filter=".filter-<?= $key->id_kategori ?>"><?= $key->nama_kategori ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">
            <?php foreach ($menu as $key) { ?>
                <a href="<?= site_url('menu/detail/' . $key->id_menu) ?>">
                    <div class="col-lg-4 col-md-6 portfolio-item filter-<?= $key->id_kota ?>">
                        <?php if ($key->foto_menu) { ?>
                            <img src="<?= base_url('asset/corporate/foto/' . $key->foto_menu) ?>" class="img-fluid" alt="">
                        <?php } else { ?>
                            <img src="https://i0.wp.com/f1-styx.imgix.net/article/2021/09/29103622/sepiring-makanan-untuk-diet.jpg?fit=900%2C602&ssl=1" class="img-fluid">
                        <?php } ?> <div class="portfolio-info">
                            <h4><?= $key->nama ?></h4>
                            <p><?= $key->kalori ?> - <?= $key->batas ?> kal</p>
                            <p><?= $key->durasi ?> hari</p>
                            <p>Rp <?= $key->harga ?></p>
                            <a href="<?= base_url('asset/logo/' . $key->foto) ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $key->nama ?>"><i class="bx bx-plus"></i></a>
                            <a href="<?= site_url('menu/detail/' . $key->id_menu) ?>" class="details-link" title="Pesan"><i class="bx bx-shopping-bag"></i></a>
                        </div>
                    </div>
                </a>
            <?php } ?>


        </div>

    </div>
</section>