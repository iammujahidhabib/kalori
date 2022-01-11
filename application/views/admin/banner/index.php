<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data banner</h1>
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
                        <a href="<?= base_url() ?>cms/admin/create_banner/" class="btn btn-primary mb-4 align-right">Create</a>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Urutan</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($banner as $key) { ?>
                                    <tr>
                                        <td><?= $key->sort ?></td>
                                        <td>
                                            <img class="img-fluid" height="auto" style="width:300px" src="<?= base_url() ?>asset/logo/<?= $key->banner ?>">
                                        </td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm text-white" href="<?= base_url() ?>cms/admin/edit_banner/<?= $key->id ?>"><i class="fa fa-eye"></i></a>
                                            <!-- <a class="btn btn-warning btn-sm text-white" href="<?= base_url() ?>admin/edit_banner/<?= $key->id ?>"><i class="fa fa-pencil"></i></a> -->
                                            <a class="btn btn-danger btn-sm text-white" onclick="delete_banner(<?= $key->id ?>)"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
    function delete_banner(id) {
        var conf = confirm("Apakah anda yakin menghapus?")
        if (conf == true) {
            window.location.href = "<?= base_url() ?>cms/admin/delete_banner/" + id
        }
    }
</script>