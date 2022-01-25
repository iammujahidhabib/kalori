<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Menu</h1>
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

        <form action="<?= base_url() ?>cms/admin/save_menu/" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?= $this->session->id_vendor ?>" name="id_vendor">
            <div class="row">
                <div class="col-xs-8 col-sm-8">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Nama</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Keterangan</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="keterangan" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Foto <small>*max 3</small></label>
                                <div class="input-group">
                                    <input class="form-control" type="file" name="foto[]" required multiple="multiple">
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
                                    <input class="form-control" type="number" min="1" name="durasi" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Harga</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" min="1" name="harga" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kategori</label>
                                <div class="input-group">
                                    <select name="id_kategori" required class="form-control">
                                        <option selected disabled value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $key) { ?>
                                            <option value="<? $key->id_kategori ?>"><?= $key->nama_kategori ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kalori</label>
                                <div class="input-group">
                                    <select name="id_nutrisi" required class="form-control">
                                        <option selected disabled value="">Pilih Kalori</option>
                                        <?php foreach ($nutrisi as $key) { ?>
                                            <option value="<? $key->id_nutrisi ?>"><?= $key->kalori ?> - <?=$key->batas?></option>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>

<script>
    $(document).ready(function() {
        new FroalaEditor('textarea#inp_visi')
    })
</script>