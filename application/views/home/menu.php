<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

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
            <!-- <div class="col-lg-12 d-flex justify-content-center">
                <ul id="kota-flters">
                    <li data-filter="*" class="kota-active">Semua</li>
                    <?php foreach ($kota as $key) { ?>
                        <li data-filter=".kota-<?= $key->id_kota ?>"><?= $key->nama_kota ?></li>
                    <?php } ?>
                </ul>
            </div> -->
        </div>

        <div class="row portfolio-container kota.container" data-aos="fade-up">
            <?php foreach ($menu as $key) { ?>
                <div class="col-lg-4 col-md-6 portfolio-item kota-<?= $key->id_kota ?> filter-<?= $key->id_kategori ?>">
                    <a href="<?= site_url('katering/detail/' . $key->id_vendor) ?>">
                        <h5 class="text-center"><?= $key->nama_vendor ?> - <?= $key->nama_kota ?></h5>
                    </a>
                    <a href="<?= site_url('menu/detail/' . $key->id_menu) ?>">
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
                            <a href="<?= site_url('menu/pesan/' . $key->id_menu) ?>" class="details-link" title="Pesan"><i class="bx bx-shopping-bag"></i></a>
                        </div>
                    </a>
                </div>
            <?php } ?>


        </div>

    </div>
</section>