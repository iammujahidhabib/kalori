<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Akunku</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-xs-4 col-sm-4">
                <div class="card">
                    <form action="<?= base_url() ?>cms/vendor/update_akunku/" method="POST" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Email</label>
                                <div class="input-group">
                                    <input class="form-control" type="email" name="email" value="<?= $akun->email ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Password</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class=" form-control-label">Role</label>
                                <div class="input-group">
                                    <select class="form-control" name="role" required>
                                        <option value="1" selected>Admin</option>
                                        <option value="2">Katering</option>
                                        <option value="3">Customer</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="form-group">
                                <label class=" form-control-label">Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" required>
                                        <option value="1" selected>Active</option>
                                        <option value="0">Locked</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <button class="btn btn-primary w-100" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-8 col-sm-8">
                <div class="card">
                    <form action="<?= base_url() ?>cms/vendor/update_vendorku/" method="POST" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Nama Katering</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_vendor" value="<?= $vendor->nama_vendor ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nomor Telpon</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="phone_number" value="<?= $vendor->phone_number ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Daftar</label>
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tanggal_daftar" value="<?= $vendor->tanggal_daftar ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kota</label>
                                <div class="input-group">
                                    <select name="id_kota" id="" class="form-control">
                                        <option value="" disabled> -- Pilih Kota -- </option>
                                        <?php foreach ($kota as $key) { ?>
                                            <option value="<?= $key->id_kota ?>" <?= ($key->id_kota == $vendor->id_kota) ? "selected" : "" ?>><?= $key->nama_kota ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Alamat</label>
                                <div class="input-group">
                                    <textarea id="" class="form-control" name="alamat" rows="3" required><?= $vendor->alamat ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Foto</label>
                                <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                        <img class="img-fluid w-100" src="<?=base_url('asset/logo/'.$vendor->foto)?>" alt="">
                                    </div>
                                    <div class="col-lg-8 col-xs-12">
                                        <input type="file" name="foto" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Deskripsi</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="deskripsi" rows="10" required><?= $vendor->deskripsi ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary w-100" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->
</div><!-- .content -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>

<script>
    $(document).ready(function() {
        new FroalaEditor('textarea#inp_visi')
    })
</script>