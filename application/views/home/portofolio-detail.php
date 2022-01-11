<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <h2>Portofolio</h2>
            <h3><?= $portofolio->judul ?></h3>
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
            <div class="col-lg-12 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                <img src="<?= base_url() ?>asset/corporate/foto/<?= $portofolio->foto ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-12 pt-4 pt-lg-0 content d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <?= $portofolio->text ?>
            </div>
        </div>

    </div>
</section>