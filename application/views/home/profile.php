<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Profil</h2>
                <h3>Mengenai perusahaan kami</h3>
                <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
            </div>

            <div class="row">
                <?php if ($profile->video) { ?>
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <iframe src="<?= $profile->video ?>" style="width: 100%; height:400px">
                        </iframe>
                    </div>
                <?php } ?>
                <div class="<?= ($profile->video) ? 'col-lg-6' : 'col-lg-12' ?> pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <!-- Tabs navs -->
                    <div class="container"><?= $profile->profil ?></div>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <ul class="faq-list">
                                <li>
                                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Visi & Misi</div>
                                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                        <div>
                                            <h4>Visi</h4>
                                            <?= $profile->visi ?>
                                            <h4>Misi</h4>
                                            <?= $profile->misi ?>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Core Value</div>
                                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                        <div>
                                            <?= $profile->core_value ?>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Fast Moving</div>
                                    <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                        <div>
                                            <?= $profile->fast_moving ?>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
    </section><!-- End About Section -->
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