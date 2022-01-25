<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

    </div>
</section> <!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Rekanan Katering Kami</h2>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Semua</li>
                    <?php foreach ($kota as $key) { ?>
                        <li data-filter=".filter-<?= $key->id_kota ?>"><?= $key->nama_kota ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">
            <?php foreach ($vendor as $key) { ?>
                <a href="<?= site_url('katering/detail/' . $key->id_vendor) ?>">
                    <div class="col-lg-4 col-md-6 portfolio-item filter-<?= $key->id_kota ?>">
                        <img src="<?= base_url('asset/logo/' . $key->foto) ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $key->nama_vendor ?></h4>
                            <p><?= $key->alamat ?></p>
                            <a href="<?= base_url('asset/logo/' . $key->foto) ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $key->nama_vendor ?>"><i class="bx bx-plus"></i></a>
                            <a href="<?= site_url('katering/detail/' . $key->id_vendor) ?>" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </a>
            <?php } ?>


        </div>

    </div>
</section>