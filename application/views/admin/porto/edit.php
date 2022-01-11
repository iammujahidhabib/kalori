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

        <form action="<?= base_url() ?>cms/admin/update_porto/<?= $id ?>" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-xs-4 col-sm-4">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Judul</label>
                                <div class="input-group">
                                    <input class="form-control" type="hidden" name="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>" required>
                                    <input class="form-control" type="text" name="judul" value="<?= $portofolio->judul ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Author</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="author" value="<?= $portofolio->author ?>" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" required>
                                        <option value="1" <?= $portofolio->status == 1 ? 'selected' : '' ?>>Show</option>
                                        <option value="0" <?= $portofolio->status == 0 ? 'selected' : '' ?>>Hide</option>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>

                            <div class="form-group">
                                <label class=" form-control-label">Foto</label>
                                <img src="<?= base_url() ?>asset/corporate/foto/<?= $portofolio->foto ?>" class="img-responsive" alt="">
                            </div>
                            <div class="form-group">
                                <!-- <label class=" form-control-label">Foto</label> -->
                                <div class="input-group">
                                    <input class="form-control" type="file" name="foto">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Text</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="text" rows="10" required><?=$portofolio->text?></textarea>
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