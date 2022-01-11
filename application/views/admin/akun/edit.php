<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit akun</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <!-- <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Advanced</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">

        <form action="<?= base_url() ?>cms/admin/update_akun/<?= $akun->id ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-4 col-sm-4">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">email</label>
                                <div class="input-group">
                                    <input class="form-control" type="email" name="email" required value="<?= $akun->email ?>">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Password</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" name="password" required value="<?= $akun->password ?>">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" required>
                                        <option value="1" <?= ($akun->status == 1) ? 'selected' : '' ?>>Show</option>
                                        <option value="0" <?= ($akun->status == 0) ? 'selected' : '' ?>>Hide</option>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Role</label>
                                <div class="input-group">
                                    <select class="form-control" name="role" required>
                                        <option value="1" <?= ($akun->status == 1) ? 'selected' : '' ?>>Admin</option>
                                        <option value="2" <?= ($akun->status == 2) ? 'selected' : '' ?>>Katering</option>
                                        <option value="3" <?= ($akun->status == 3) ? 'selected' : '' ?>>Customer</option>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div><!-- .animated -->
</div><!-- .content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function delete_akun(id, idx) {
        event.preventDefault();
        var conf = confirm("Apakah anda yakin menghapus foto akun?")
        if (conf == true) {
            var _json = <?= $akun->foto ?>;
            delete _json[idx];
            console.log(_json);
            var _url = "<?= base_url() ?>cms/admin/delete_akun_foto/" + id
            $.ajax({
                type: 'POST',
                url: _url,
                data: {
                    'foto': _json,
                },
                success: function(msg) {
                    // initFoto(_json);
                    window.location.href = "<?= base_url() ?>cms/admin/edit_akun/" + id
                }
            });
        }
    }
</script>