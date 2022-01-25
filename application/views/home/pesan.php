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
        <br>
        <div class="row">
            <div class="col-lg"></div>
            <div class="col-lg-8 pt-4 pt-lg-0 content d-flex flex-column aos-init aos-animate card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-header">
                    <h3>Form Pemesanan</h3>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('menu/pesan/'.$menu->id_menu) ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_customer" value="<?= $this->session->id_akun ?>">
                        <input type="hidden" name="id_menu" value="<?= $menu->id_menu ?>">
                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" min="1" name="qty" class="form-control" id="qty" placeholder="1">
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" name="total" class="form-control" readonly id="total" placeholder="0123192">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nomor Telpon</label>
                            <input type="text" name="nomor_penerima" class="form-control" id="exampleFormControlInput1" placeholder="0123192">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tanggal Mulai</label>
                            <input type="date" name="tanggal_pesan" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat Lengkap</label>
                            <textarea name="alamat_kirim" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="mt-2 btn btn-primary" type="submit">Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg"></div>
        </div>
</section>
<script>
    $(document).ready(function() {
        $("#qty").change(function() {
            event.preventDefault();
            if ($("#qty").val() > 0) {
                $("#total").val($("#qty").val() * <?= $menu->harga ?>);
            } else {
                $("#qty").val(1);
                $("#total").val(1 * <?= $menu->harga ?>);
            }
        })
    });
</script>