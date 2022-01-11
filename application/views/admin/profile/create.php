<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Change Profile</h1>
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

        <form action="<?= base_url() ?>cms/admin/save/1" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-xs-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Data Profile</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Nama</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama" value="<?php echo $profile->nama; ?>" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Main Title</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="main_title" value="<?php echo $profile->main_title; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tagline</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="tagline" value="<?php echo $profile->tagline; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Quote</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="quote" value="<?php echo $profile->quote; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Email</label>
                                <div class="input-group">
                                    <input class="form-control" type="email" name="email" value="<?php echo $profile->email; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nomor Telpon</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="phone" value="<?php echo $profile->phone; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Alamat</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="alamat" required><?php echo $profile->alamat; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Maps <small><a href="#" id="a_embed_maps">how?</a></small></label>
                                <div class="input-group">
                                    <textarea class="form-control" name="maps" required><?php echo $profile->maps; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Logo</label>
                                <img src="<?= base_url() ?>asset/logo/<?= $profile->logo ?>" class="img-responsive" alt="">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control-file" name="logo" type="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Domain Bisnis</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="domain_bisnis" value="<?php echo $profile->domain_bisnis; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Video <small><a href="#" id="a_embed_youtube">how?</a></small></label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="video" value="<?php echo $profile->video; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Twitter</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="twitter" value="<?php echo $profile->twitter; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Facebook</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="facebook" value="<?php echo $profile->facebook; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Instagram</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="instagram" value="<?php echo $profile->instagram; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">LinkedIn</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="linkedin" value="<?php echo $profile->linkedin; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Profile</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class=" form-control-label">Profile</label>
                                <div class="input-group">
                                    <textarea id="inp_profil" class="form-control" name="profil" required><?php echo $profile->profil; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Visi & Misi</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class=" form-control-label">Visi</label>
                                <div class="input-group">
                                    <textarea id="inp_visi" class="form-control" name="visi" required><?php echo $profile->visi; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Misi</label>
                                <div class="input-group">
                                    <textarea id="inp_misi" class="form-control" name="misi" required><?php echo $profile->misi; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Additional</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class=" form-control-label">Core Value</label>
                                <div class="input-group">
                                    <textarea id="inp_core_value" class="form-control" name="core_value" required><?php echo $profile->core_value; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Fast Moving</label>
                                <div class="input-group">
                                    <textarea id="inp_fast_moving" class="form-control" name="fast_moving" required><?php echo $profile->fast_moving; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button class="btn btn-primary btn-block" type="submit">Save</button>

                </div>
            </div>
        </form>
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal" id="embed_maps" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cara Embed Maps</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul style="padding-left: 10px;">
                    <li>Buka Google Maps</li>
                    <li>Cari Lokasi</li>
                    <li>Klik Share</li>
                    <li>Ikuti Gambar Di bawah</li>
                </ul>
                <img src="<?= base_url() ?>asset/tutorial_embed_maps.png" class="img-fluid" alt="" height="300" style="width:100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="embed_youtube" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cara Embed Youtube</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul style="padding-left: 10px;">
                    <li>Buka Youtube</li>
                    <li>Cari Video</li>
                    <li>Klik Share</li>
                    <li>Copy Link</li>
                <img src="<?= base_url() ?>asset/tutorial_embed_video.png" class="img-fluid" alt="" height="300" style="width:100%">
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>

<script src="<?= base_url() ?>asset/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    function init_visi() {
        CKEDITOR.replace('inp_visi');
    }

    function init_misi() {
        CKEDITOR.replace('inp_misi');
    }

    function init_core_value() {
        CKEDITOR.replace('inp_core_value');
    }

    function init_fast_moving() {
        CKEDITOR.replace('inp_fast_moving');
    }

    function init_profile() {
        CKEDITOR.replace('inp_profil');
    }
    $(document).ready(function() {
        init_visi();
        init_misi();
        init_core_value();
        init_fast_moving();
        init_profile();

        $("#a_embed_maps").click(function(){
            event.preventDefault();
            $("#embed_maps").modal('show');
        })
        $("#a_embed_youtube").click(function(){
            event.preventDefault();
            $("#embed_youtube").modal('show');
        })
    });
</script>