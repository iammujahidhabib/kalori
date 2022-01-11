<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Artikel</h1>
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

        <form action="<?= base_url() ?>cms/admin/update_porto/<?= $customer->id_customer ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-4 col-sm-4">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Akun</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_akun" required>
                                        <option value="" disabled selected>Pick Account</option>
                                        <?php foreach ($akun as $key) { ?>
                                            <option value="<?= $key->id_akun ?>" <?= ($key->id_akun == $customer->id_akun) ? 'selected' : '' ?>><?= $key->email ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nama</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_customer" value="<?= $customer->nama_customer ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tanggal_lahir" value="<?= $customer->tanggal_lahir ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">No Telpon</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="phone_number" value="<?= $customer->phone_number ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Jenis Kelamin</label>
                                <div class="input-group">
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="Men" <?= ('Men' == $customer->jenis_kelamin) ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="Women" <?= ('Women' == $customer->jenis_kelamin) ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Alamat</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="alamat" rows="10" required>value="<?= $customer->alamat ?>" </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn" type="submit">Save</button>
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