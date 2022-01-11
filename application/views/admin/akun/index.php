<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data akun</h1>
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
                        <a href="<?= base_url() ?>cms/admin/create_akun/" class="btn btn-primary mb-4 align-right">Create</a>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($akun as $key) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $key->email ?></td>
                                        <td><?php if ($key->role == 1) {
                                                echo 'Admin';
                                            } elseif ($key->role == 2) {
                                                echo 'Katering';
                                            } else {
                                                echo 'Customer';
                                            } ?></td>
                                        <td><?= ($key->status == 1) ? 'Active' : 'Locked' ?></td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm text-white" href="<?= base_url() ?>cms/admin/edit_akun/<?= $key->id_akun ?>"><i class="fa fa-eye"></i></a>
                                            <!-- <a class="btn btn-warning btn-sm text-white" href="<?= base_url() ?>admin/edit_akun/<?= $key->id_akun ?>"><i class="fa fa-pencil"></i></a> -->
                                            <a class="btn btn-danger btn-sm text-white" onclick="delete_akun(<?= $key->id_akun ?>)"><i class="fa fa-trash"></i></a>
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
    function delete_akun(id) {
        var conf = confirm("Apakah anda yakin menghapus?")
        if (conf == true) {
            window.location.href = "<?= base_url() ?>cms/admin/delete_akun/" + id
        }
    }
</script>