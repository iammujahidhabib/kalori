<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(https://mnews-wp.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2021/10/29013115/Menu-diet.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2>Selamat Datang di <span>Makan Sehat</span></h2>
                        <p>Kebutuhan kalori per hari penting untuk diketahui agar kita bisa menjaga berat badan ideal. Namun, kebutuhan kalori tiap orang berbeda-beda, tergantung pada usia, jenis kelamin, tinggi badan dan berat badan, serta aktivitas fisik yang dilakukan.</p>
                        <div class="text-center"><a href="#about-us" class="btn-get-started">Hitung Kalori yang Kamu Butuhkan</a></div>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1>Hitung kebutuhan kalori anda</h1>
                    <p>Untuk laki-laki: (88,4 + 13,4 x berat dalam kilogram) + (4,8 x tinggi dalam sentimeter) - (5,68 x usia dalam tahun)</p>
                    <p>Untuk wanita: (447,6 + 9,25 x berat dalam kilogram) + (3,10 x tinggi dalam sentimeter) - (4,33 x usia dalam tahun)</p>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <form method="GET" action="<?= site_url('home/kalori') ?>">
                        <div class="form-group m-2">
                            <input type="text" class="form-control" name="nama" placeholder="Halo, Siapa Nama anda">
                        </div>
                        <div class="form-group m-2">
                            <input type="text" class="form-control" name="usia" placeholder="Berapa Umur anda">
                        </div>
                        <div class="form-group m-2">
                            <input type="text" class="form-control" name="bb" placeholder="Berapa Berat badan anda">
                        </div>
                        <div class="form-group m-2">
                            <input type="text" class="form-control" name="tb" placeholder="Berapa Tinggi badan anda">
                        </div>
                        <div class="form-group m-2">
                            <select class="form-control" name="gender">
                                <option selected disabled value=""> -- Apakah gender anda -- </option>
                                <option value="Men"> Laki-laki </option>
                                <option value="Women"> Perempuan </option>
                            </select>
                        </div>
                        <div class="form-group m-2">
                            <input type="submit" class="btn btn-block btn-primary" value="Hitung">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->
    <?php if (isset($suggest_makanan)) { ?>
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">
                <h1 class="text-center">Menu Makan untuk mencukupi kalori anda</h1>
                <h4 class="text-center">Butuh <?= $kalori ?> kal</h4>
                <div class="row">
                    <?php foreach ($suggest_makanan as $key) { ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box iconbox-blue">
                                <a href="<?= site_url('menu/detail/' . $key->id_menu) ?>">
                                    <div class="icon" style="width: 100% !important; height: auto;">
                                        <?php if ($key->foto_menu) { ?>
                                            <img src="<?= base_url('asset/logo/' . $key->foto_menu) ?>" class="img-fluid" alt="">
                                        <?php } else { ?>
                                            <img src="https://i0.wp.com/f1-styx.imgix.net/article/2021/09/29103622/sepiring-makanan-untuk-diet.jpg?fit=900%2C602&ssl=1" class="img-fluid">
                                        <?php } ?>
                                    </div>
                                    <h4><?= $key->nama ?></h4>
                                </a>
                                <p><?= $key->durasi ?> hari</p>
                                <p>Rp <?= $key->harga ?></p>
                                <a href="<?= site_url('menu/pesan/' . $key->id_menu) ?>" class="btn btn-primary" title="Pesan">Pesan <i class="bx bx-shopping-bag" style="color: white;"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </section><!-- End Services Section -->
    <?php } ?>
    <!-- ======= Portfolio Section ======= -->
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
                <?php foreach ($catering as $key) { ?>
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
    <!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <!-- <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Rekanan Katering Kami</h2>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
                <?php foreach ($catering as $key) { ?>
                    <a href="<?= site_url('home/katering/' . $key->id_vendor) ?>">
                        <div class="col-sm-4">
                            <div class="client-logo" style="width: 100%;">
                                <img src="<?= base_url('asset/logo/' . $key->foto) ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>

        </div>
    </section> -->
    <!-- End Our Clients Section -->

</main><!-- End #main -->