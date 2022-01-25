<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

    </div>
</section>
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Transaksi Anda</h2>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Menu</th>
                                <th>Vendor</th>
                                <th>Tanggal Mulai</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($transaksi as $key) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $key->date ?></td>
                                    <td><?= $key->nama ?></td>
                                    <td><?= $key->nama_vendor ?></td>
                                    <td><?= $key->tanggal_pesan ?></td>
                                    <td><?php if ($key->status_transaksi == 0) {
                                            echo "Menunggu Bukti Pembayaran";
                                            echo "<a href='" . site_url('transaksi/detail/' . $key->id_transaksi) . "' class='btn btn-outline-secondary'>Upload</a>";
                                        } elseif ($key->status_transaksi == 1) {
                                            echo "Menunggu Validasi Pembayaran oleh Katering";
                                        } elseif ($key->status_transaksi == 2) {
                                            echo "Pembayaran Tidak Valid, Upload Ulang Bukti";
                                            echo "<a href='" . site_url('transaksi/detail/' . $key->id_transaksi) . "' class='btn btn-secondary'>Upload</a>";
                                        } elseif ($key->status_transaksi == 3) {
                                            echo "Pesanan Diterima";
                                        } elseif ($key->status_transaksi == 4) {
                                            echo "Pesanan Ditolak, alasan " . $note_vendor;
                                        } elseif ($key->status_transaksi == 5) {
                                            echo "Pesanan Selesai";
                                        } ?></td>
                                    <td><a href="<?= site_url(' transaksi/detail/' . $key->id_transaksi) ?>" class='btn btn-secondary'>Detail</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section>