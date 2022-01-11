<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <h2>Produk</h2>
            <h3><?= $produk->judul ?></h3>
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                <?php
                $array_foto_produk = json_decode($produk->foto);
                if (count($array_foto_produk) > 0) {
                    $foto_produk = $array_foto_produk[0];
                } else {
                    $foto_produk = "default.png";
                }
                ?>
                <img src="<?= base_url() ?>asset/corporate/produk/<?= $foto_produk ?>" class="img-fluid" id="img-primary" width="90%" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-start aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <?php
                for ($i = 0; $i < count($array_foto_produk); $i++) {
                    if (count($array_foto_produk) > 0) {
                        $foto_produk = $array_foto_produk[0];
                    } else {
                        $foto_produk = "default.png";
                    }
                ?>
                    <section id="clients" class="clients">
                        <div class="container aos-init aos-animate" data-aos="zoom-in">

                            <div class="row">
                                <?php
                                for ($i = 0; $i < count($array_foto_produk); $i++) {
                                ?>
                                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center shadow ">
                                        <img src="<?= base_url() ?>asset/corporate/produk/<?= $array_foto_produk[$i] ?>" style="cursor:pointer;" class="img-fluid img-select" alt="">
                                    </div>
                                <?php } ?>
                                <!-- <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center shadow">
                                    <img src="<?= base_url() ?>asset/corporate/assets/img/clients/client-2.png" style="cursor:pointer;" class="img-fluid img-select" alt="">
                                </div>
                                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center shadow">
                                    <img src="<?= base_url() ?>asset/corporate/assets/img/clients/client-2.png" style="cursor:pointer;" class="img-fluid img-select" alt="">
                                </div> -->

                            </div>

                        </div>
                    </section>
                <?php
                }
                ?>
                <?= $produk->deskripsi ?>
            </div>
        </div>

    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(".img-select").click(function() {
        console.log($(this).attr("src"));
        $("#img-primary").attr("src", $(this).attr("src"));
    });
</script>