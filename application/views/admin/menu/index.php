<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Menu</h1>
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
                        <a href="<?= base_url() ?>cms/vendor/create_menu/" class="btn btn-primary mb-4 align-right">Create</a>
                        <table id="bootstrap-data-table-export" class="table small table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <!-- <th>Keterangan</th> -->
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($menu as $key) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $key->nama_kategori ?></td>
                                        <td><?= $key->nama ?></td>
                                        <!-- <td><?= $key->keterangan ?></td> -->
                                        <td><?= $key->durasi ?> Hari</td>
                                        <td>Rp <?= number_format($key->harga,0,",",".") ?></td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm text-white" href="<?= base_url() ?>cms/vendor/menuku/<?= $key->id_menu ?>"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-warning btn-sm text-white" href="<?= base_url() ?>cms/vendor/edit_menu/<?= $key->id_menu ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-sm text-white" onclick="delete_menu(<?= $key->id_menu ?>)"><i class="fa fa-trash"></i></a>
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
<script>
    function delete_menu(id) {
        var conf = confirm("Apakah anda yakin menghapus?")
        if (conf == true) {
            window.location.href = "<?= base_url() ?>cms/vendor/delete_menu/" + id
        }
    }
</script>