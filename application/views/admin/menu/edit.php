<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Katering</h1>
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

        <form action="<?= base_url() ?>cms/admin/update_vendor/<?= $vendor->id_vendor ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-6 col-sm-6">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Akun</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_akun" required>
                                        <option value="" disabled selected>Pick Account</option>
                                        <?php foreach ($akun as $key) { ?>
                                            <option value="<?= $key->id_akun ?>" <?= ($key->id_akun == $vendor->id_akun) ? 'selected' : '' ?>><?= $key->email ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nama</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_vendor" value="<?= $vendor->nama_vendor ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Daftar</label>
                                <div class="input-group">
                                    <input class="form-control" type="date" name="tanggal_daftar" value="<?= $vendor->tanggal_lahir ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">No Telpon</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="phone_number" value="<?= $vendor->phone_number ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Deskripsi</label>
                                <div class="input-group">
                                    <textarea id="inp_deskripsi" class="form-control" name="deskripsi" rows="10" required>value="<?= $vendor->deskripsi ?>" </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Alamat</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="alamat" rows="10" required>value="<?= $vendor->alamat ?>" </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <label class=" form-control-label">Foto</label>
                    <a onclick="open_modal()" class="btn btn-primary">Add</a>
                    <br>
                    <div class="container-fluid">
                        <div class="row img_place">
                        </div>
                    </div>
                    <button class="btn btn-primary btn" type="submit">Save</button>
                </div>
                <button class="btn btn-primary btn" type="submit">Save</button>
            </div>
        </form>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="modal" id="modal_add_foto" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= site_url('cms/admin/add_vendor_foto/' . $vendor->id) ?>">
                <div class="modal-body">
                    <input class="form-control" type="file" name="foto" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= base_url() ?>asset/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    function initFoto() {
        var _json = <?= $vendor->foto ?>;
        var _url_base = "<?= base_url() ?>asset/corporate/vendor/"
        console.log(_json);
        var _html = "";
        for (let index = 0; index < _json.length; index++) {
            _html += `<div class="card col-sm-3">
                            <div class="card-body">
                                <img src="${_url_base}${_json[index]}" class="card-img-top">
                                <div class="card-body">
                                    <a onclick="delete_vendor('<?= $vendor->id ?>',${index})" class="btn btn-primary">Delete</a>
                                </div>
                            </div>
                        </div>`;
        };
        $(".img_place").html(_html);
    }

    function delete_vendor(id, idx) {
        event.preventDefault();
        var conf = confirm("Apakah anda yakin menghapus foto vendor?")
        if (conf == true) {
            var _json = <?= $vendor->foto ?>;
            delete _json[idx];
            console.log(_json);
            var _url = "<?= base_url() ?>cms/admin/delete_vendor_foto/" + id
            $.ajax({
                type: 'POST',
                url: _url,
                data: {
                    'foto': _json,
                },
                success: function(msg) {
                    // initFoto(_json);
                    window.location.href = "<?= base_url() ?>cms/admin/edit_vendor/" + id
                }
            });
        }
    }

    function open_modal() {
        event.preventDefault();
        $("#modal_add_foto").modal("show");
    }
    $(document).ready(function() {
        new FroalaEditor('textarea#inp_visi')
        new FroalaEditor('textarea#inp_deskripsi')
    })
</script>