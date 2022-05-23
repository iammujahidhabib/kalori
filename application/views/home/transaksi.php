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
                                            echo "Pembayaran Tidak Valid, Upload Ulang Bukti. ";
                                            echo "<a data-id='" . $key->id_transaksi . "' id='btn_tolak' class='btn btn-secondary'>Upload</a>";
                                        } elseif ($key->status_transaksi == 3) {
                                            echo "Pesanan Diterima <a href='" . site_url('transaksi/jadwal/' . $key->id_transaksi) . "' class='btn btn-secondary btn-sm'>Jadwal</a>";
                                        } elseif ($key->status_transaksi == 4) {
                                            echo "Pesanan Ditolak, alasan " . $note_vendor;
                                        } elseif ($key->status_transaksi == 5) {
                                            echo "Pesanan Selesai";
                                        } ?></td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm text-white" id="btn_lihat" data-id="<?= $key->id_transaksi ?>" data-nama="<?= $key->nama ?>" data-date="<?= $key->date ?>" data-nama_vendor="<?= $key->nama_vendor ?>" data-alamat_vendor="<?= $key->alamat_vendor ?>" data-phone_number="<?= $key->phone_number ?>" data-nama_customer="<?= $key->nama_customer ?>" data-tanggal_pesan="<?= $key->tanggal_pesan ?>" data-qty="<?= $key->qty ?>" data-total="<?= $key->total ?>" data-bukti="<?= $key->bukti ?>" data-nomor_penerima="<?= $key->nomor_penerima ?>" data-alamat_kirim="<?= $key->alamat_kirim ?>" data-durasi="<?= $key->durasi ?>" data-gram="<?= $key->gram ?>" data-sayur="<?= $key->sayur ?>" data-kalori="<?= $key->kalori ?>" data-batas="<?= $key->batas ?>" data-status_transaksi="<?php if ($key->status_transaksi == 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Menunggu Bukti Pembayaran";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } elseif ($key->status_transaksi == 1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Menunggu Validasi Pembayaran oleh Katering";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } elseif ($key->status_transaksi == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Pembayaran Tidak Valid, Upload Ulang Bukti";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } elseif ($key->status_transaksi == 3) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Pesanan Diterima";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } elseif ($key->status_transaksi == 4) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Pesanan Ditolak, alasan " . $key->note_vendor;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } elseif ($key->status_transaksi == 5) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "Pesanan Selesai";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } ?>">Detail</a>
                                        <!-- <a href="<?= site_url(' transaksi/detail/' . $key->id_transaksi) ?>" class='btn btn-secondary'>Detail</a></td> -->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="">Nama Katering</label>
                            <input type="text" disabled class="form-control" id="dnama_vendor">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Katering</label>
                            <input type="text" disabled class="form-control" id="dalamat_katering">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telpon Katering</label>
                            <input type="text" disabled class="form-control" id="dphone_number">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Nama Pemesan</label>
                            <input type="text" disabled class="form-control" id="dnama_customer">
                        </div>
                        <div class="form-group">
                            <label for="">Mulai Katering</label>
                            <input type="text" disabled class="form-control" id="dtanggal_pesan">
                        </div>
                        <div class="form-group">
                            <label for="">Total</label>
                            <input type="text" disabled class="form-control" id="dtotal">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="text" disabled class="form-control" id="dqty">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Penerima</label>
                            <input type="text" disabled class="form-control" id="dnomor_penerima">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Kirim</label>
                            <input type="text" disabled class="form-control" id="dalamat_kirim">
                        </div>
                        <div class="form-group">
                            <label for="">Status Transaksi</label>
                            <input type="text" disabled class="form-control" id="dstatus_transaksi">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="">Nama Menu</label>
                            <input type="text" disabled class="form-control" id="dnama">
                        </div>
                        <div class="form-group">
                            <label for="">Kalori</label>
                            <input type="text" disabled class="form-control" id="dkalori">
                        </div>
                        <div class="form-group">
                            <label for="">Durasi</label>
                            <input type="text" disabled class="form-control" id="ddurasi">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Bukti Pembayaran</label>
                            <img class="img-fluid" id="image_upload">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <p id="ddate"></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="tolakModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakLabel">Upload Ulang Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="form_tolak">
                    <div class="form-group">
                        <label class="" for="exampleCheck1">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= base_url() ?>asset/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", "#btn_tolak", function() {
            event.preventDefault()
            $("#form_tolak").attr("action", "<?= site_url('transaksi/upload_ulang') ?>/" + $(this).data('id'));
            $("#tolakModal").modal("show");
        })
        $(document).on('click', "#btn_lihat", function() {
            event.preventDefault()
            $("#dnama_customer").val($(this).data("nama_customer"));
            $("#ddate").val($(this).data("date"));
            $("#dtotal").val($(this).data("total"));
            $("#dnama_vendor").val($(this).data("nama_vendor"));
            $("#dalamat_katering").val($(this).data("alamat_vendor"));
            $("#dphone_number").val($(this).data("phone_number"));
            $("#dtanggal_pesan").val($(this).data("tanggal_pesan"));
            // $("#dstart").val($(this).data("start"));
            // $("#dend").val($(this).data("end"));
            $("#dqty").val($(this).data("qty"));
            $("#dnomor_penerima").val($(this).data("nomor_penerima"));
            $("#dalamat_kirim").val($(this).data("alamat_kirim"));
            $("#dstatus_transaksi").val($(this).data("status_transaksi"));
            $("#dnama").val($(this).data("nama"));
            $("#ddurasi").val($(this).data("durasi") + " Hari");
            $("#dkalori").val($(this).data("kalori") + "-" + $(this).data("batas") + " kal");
            $("#image_upload").attr("src", "<?= base_url() ?>asset/bukti/" + $(this).data("bukti"));
            $("#exampleModal").modal("show")
        });
    })
</script>