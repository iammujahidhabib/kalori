<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

    </div>
</section>
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Jadwal Makanan Pesanan Anda</h2>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Hari Ke</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Menu</th>
                                <th>Status</th>
                                <th>Gambar Makanan Diterima</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($jadwal as $key) {
                                if ($key->status_jadwal == 0) {
                            ?>
                                    <form action="<?= site_url('transaksi/upload_makanan/' . $key->id_jadwal) ?>" method="POST" enctype="multipart/form-data">
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $key->date_jadwal ?></td>
                                            <td><?= $key->nama ?></td>
                                            <td><?php if ($key->status_jadwal == 0) {
                                                    echo "Belum mengupload makanan diterima";
                                                } elseif ($key->status_jadwal == 1) {
                                                    echo "Sudah mengupload makanan diterima";
                                                } ?>
                                            </td>
                                            <td><input class="form-control" name="gambar" type="file" required></td>
                                            <td><textarea class="form-control" name="remark"></textarea></td>
                                            <td><button type="submit" class="btn btn-primary btn-sm">Upload</button></td>
                                        </tr>
                                    </form>
                                <?php
                                } else { ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $key->date_jadwal ?></td>
                                            <td><?= $key->nama ?></td>
                                            <td><?php if ($key->status_jadwal == 0) {
                                                    echo "Belum mengupload makanan diterima";
                                                } elseif ($key->status_jadwal == 1) {
                                                    echo "Sudah mengupload makanan diterima";
                                                } ?>
                                            </td>
                                            <td><img src="<?=base_url('asset/bukti/'.$key->gambar)?>" class="img-fluid" style="max-width: 300px;"></td>
                                            <td><?=$key->remark?></td>
                                            <td></td>
                                        </tr>
                                <?php
                                } ?>

                            <?php $no++;} ?>
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