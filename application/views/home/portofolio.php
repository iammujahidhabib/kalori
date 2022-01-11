<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<main id="main">
    <!-- ======= About Section ======= -->
    <section id="team" class="team">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h2>Portofolio</h2>
                <h3>Pekerjaan Kami</h3>
                <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
            </div>

            <div class="row">
                <?php foreach ($portofolio as $key) { ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="member-img">
                                <a href="<?= site_url('portofolio/detail/' . $key->id) ?>">
                                    <img src="<?= base_url() ?>asset/corporate/foto/<?= $key->foto ?>" class="img-fluid" alt="">
                                    <!-- <img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""> -->
                                    <!-- <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div> -->
                                </a>
                            </div>
                            <div class="member-info">
                                <a href="<?= site_url('portofolio/detail/' . $key->id) ?>">
                                    <h4><?= $key->judul ?></h4>
                                </a>
                                <!-- <span>Product Manager</span> -->
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                        </div>
                    </div>
                </div> -->

            </div>

        </div>
    </section>
</main><!-- End #main -->
<script>
    $(document).ready(function() {
        $(".nav-new-link").click(function() {
            event.preventDefault();
            var el = $(this).index();
            $(".nav-new-link").removeClass('active');
            $(".nav-new-link").eq(el).addClass("active");
            console.log(el);
        })
    })
</script>