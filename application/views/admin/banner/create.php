<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Banner</h1>
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

        <form action="<?= base_url() ?>cms/admin/save_banner/" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-xs-4 col-sm-4">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Sort</label>
                                <div class="input-group">
                                    <select class="form-control" name="sort">
                                        <option value="" selected disabled>Pilih Urutan</option>
                                        <?php for ($o = 1; $o <= 5; $o++) { ?>
                                            <option value="<?= $o ?>"><?= $o ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Banner</label>
                                <div class="input-group">
                                    <input class="form-control" type="file" name="banner" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <button class="btn btn-primary btn" type="submit">Save</button>
                        </div>
                    </div>
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