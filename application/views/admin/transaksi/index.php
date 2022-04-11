<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Transaksi</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <!-- <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div> -->
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div> -->
                    <div class="card-body">
                        <!-- <a href="<?= base_url() ?>cms/vendor/create_menu/" class="btn btn-primary mb-4 align-right">Create</a> -->
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Nama Pemesan</th>
                                    <th>Nama Menu</th>
                                    <th>Mulai Katering</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($transaksi as $key) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $key->date ?></td>
                                        <td><?= $key->nama_customer ?></td>
                                        <td><?= $key->nama ?></td>
                                        <td><?= $key->tanggal_pesan ?></td>
                                        <td><?= $key->qty ?></td>
                                        <td><?= $key->total ?></td>
                                        <td>
                                            <?php if ($key->status_transaksi == 0) {
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
                                            } ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm text-white" id="btn_lihat" data-id="<?=$key->id_transaksi?>"
                                            data-nama="<?=$key->nama?>"
                                            data-date="<?=$key->date?>"
                                            data-nama_customer="<?=$key->nama_customer?>"
                                            data-tanggal_pesan="<?=$key->tanggal_pesan?>"
                                            data-qty="<?=$key->qty?>"
                                            data-total="<?=$key->total?>"
                                            data-bukti="<?=$key->bukti?>"
                                            data-nomor_penerima="<?=$key->nomor_penerima?>"
                                            data-alamat_kirim="<?=$key->alamat_kirim?>"
                                            data-durasi="<?=$key->durasi?>"
                                            data-gram="<?=$key->gram?>"
                                            data-sayur="<?=$key->sayur?>"
                                            data-kalori="<?=$key->kalori?>"
                                            data-batas="<?=$key->batas?>"
                                            data-status_transaksi="<?php if ($key->status_transaksi == 0) {
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
                                            } ?>"
                                            >Lihat</a>
                                            <?php if($key->status_transaksi <= 1){?>
                                                <a class="btn btn-success btn-sm text-white" href="<?= base_url() ?>cms/vendor/accept_transaksi/3/<?= $key->id_transaksi ?>">Terima</a>
                                                <a class="btn btn-warning btn-sm text-white" onclick="delete_menu(<?= $key->id_transaksi ?>)">Tidak Valid</a>
                                                <a class="btn btn-danger btn-sm text-white" data-id="<?=$key->id_transaksi?>" id="btn_tolak">Tolak</a>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!-- Modal -->
<div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="tolakModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakLabel">Tolak Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="form_tolak">
                    <div class="form-group">
                        <label class="" for="exampleCheck1">Alasan</label>
                        <textarea class="form-control" name="alasan" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= base_url() ?>asset/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    function delete_menu(id) {
        var conf = confirm("Apakah anda yakin menghapus?")
        if (conf == true) {
            window.location.href = "<?= base_url() ?>cms/vendor/accept_transaksi/2/" + id
        }
    }
    $(document).ready(function() {
        $(document).on("click", "#btn_tolak", function() {
            event.preventDefault()
            $("#form_tolak").attr("action", "<?= site_url('cms/vendor/tolak_transaksi') ?>/" + $(this).data('id'));
            $("#tolakModal").modal("show");
        })
        $(document).on('click', "#btn_lihat", function() {
            event.preventDefault()
            $("#dnama_customer").val($(this).data("nama_customer"));
            $("#dtotal").val($(this).data("total"));
            $("#dtanggal_pesan").val($(this).data("tanggal_pesan"));
            $("#ddate").val($(this).data("date"));
            // $("#dstart").val($(this).data("start"));
            // $("#dend").val($(this).data("end"));
            $("#dqty").val($(this).data("qty"));
            $("#dnomor_penerima").val($(this).data("nomor_penerima"));
            $("#dalamat_kirim").val($(this).data("alamat_kirim"));
            $("#dstatus_transaksi").val($(this).data("status_transaksi"));
            $("#dnama").val($(this).data("nama"));
            $("#ddurasi").val($(this).data("durasi") + " Hari");
            $("#dkalori").val($(this).data("kalori")+"-"+$(this).data("batas")+" kal");
            $("#image_upload").attr("src", "<?= base_url() ?>asset/bukti/" + $(this).data("bukti"));
            $("#exampleModal").modal("show")
        });
    })
</script>