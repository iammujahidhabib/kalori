<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Katering</h1>
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

        <form action="<?= base_url() ?>cms/admin/save_customer/" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-xs-8 col-sm-8">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Akun</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_akun" required>
                                        <option value="" disabled selected>Pick Account</option>
                                        <?php foreach ($akun as $key) { ?>
                                            <option value="<?= $key->id_akun ?>"><?= $key->email ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nama</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_customer" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Daftar</label>
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tanggal_daftar" value="<?= date('Y-m-d') ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">No Telpon</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="phone_number" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Deskripsi</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="deskripsi" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Alamat</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="alamat" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Foto <small>*max 3</small></label>
                                <div class="input-group">
                                    <input class="form-control" type="file" name="foto[]" required multiple="multiple">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div><!-- .animated -->
</div><!-- .content -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>

<script>
    $(document).ready(function() {
        new FroalaEditor('textarea#inp_visi')
    })
</script>