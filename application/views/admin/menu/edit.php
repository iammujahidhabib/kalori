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

        <form action="<?= base_url() ?>cms/vendor/update_menu/<?= $menu->id_menu ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-8 col-sm-8">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Nama</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama" value="<?= $menu->nama ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Keterangan</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="keterangan" rows="10" required><?= $menu->keterangan ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Foto <small>*max 3</small></label>
                                <div class="input-group">
                                    <input class="form-control" type="file" name="foto[]" multiple="multiple">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Durasi (*hari)</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" min="1" value="<?= $menu->durasi ?>" name="durasi" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Harga</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" min="1" value="<?= $menu->harga ?>" name="harga" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kategori</label>
                                <div class="input-group">
                                    <select name="id_kategori" required class="form-control">
                                        <option disabled value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $key) { ?>
                                            <option <?= $menu->id_kategori == $key->id_kategori ? 'selected' : '' ?> value="<?=$key->id_kategori ?>"><?= $key->nama_kategori ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kalori</label>
                                <div class="input-group">
                                    <select name="id_nutrisi" required class="form-control">
                                        <option disabled value="">Pilih Kalori</option>
                                        <?php foreach ($nutrisi as $key) { ?>
                                            <option <?= $menu->id_nutrisi == $key->id_nutrisi ? 'selected' : '' ?> value="<?=$key->id_nutrisi ?>"><?= $key->kalori ?> - <?=$key->batas?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn" type="submit">Save</button>
                </div>
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
            <form method="post" enctype="multipart/form-data" action="<?= site_url('cms/admin/add_menu_foto/' . $menu->id) ?>">
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
<script src="<?= base_url() ?>asset/admin/menus/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    function initFoto() {
        var _json = <?= $menu->foto ?>;
        var _url_base = "<?= base_url() ?>asset/corporate/menu/"
        console.log(_json);
        var _html = "";
        for (let index = 0; index < _json.length; index++) {
            _html += `<div class="card col-sm-3">
                            <div class="card-body">
                                <img src="${_url_base}${_json[index]}" class="card-img-top">
                                <div class="card-body">
                                    <a onclick="delete_menu('<?= $menu->id ?>',${index})" class="btn btn-primary">Delete</a>
                                </div>
                            </div>
                        </div>`;
        };
        $(".img_place").html(_html);
    }

    function delete_menu(id, idx) {
        event.preventDefault();
        var conf = confirm("Apakah anda yakin menghapus foto menu?")
        if (conf == true) {
            var _json = <?= $menu->foto ?>;
            delete _json[idx];
            console.log(_json);
            var _url = "<?= base_url() ?>cms/admin/delete_menu_foto/" + id
            $.ajax({
                type: 'POST',
                url: _url,
                data: {
                    'foto': _json,
                },
                success: function(msg) {
                    // initFoto(_json);
                    window.location.href = "<?= base_url() ?>cms/admin/edit_menu/" + id
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>

<script>
    $(document).ready(function() {
        new FroalaEditor('textarea#inp_visi')
    })
</script>