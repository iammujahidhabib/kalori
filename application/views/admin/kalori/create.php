<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create kategori</h1>
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

        <form action="<?= base_url() ?>cms/admin/save_kategori/" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-xs-8 col-sm-8">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Sayur</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="sayur" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Gram</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" min="0" name="gram" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kalori</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" min="0" name="kalori" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Batas Kalori</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" min="0" name="batas" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
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