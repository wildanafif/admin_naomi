<?php $this->load->view("admin/header"); ?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Beranda
            <small>it all starts here</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('item'); ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" >Header</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <p style="border-bottom: 1px solid #3c8dbc;">Gambar Logo</p>
                                <img alt="tentang kami"  class="img-thumbnail" src="<?php echo base_url() . $beranda->gambar_logo ?>" data-holder-rendered="true" >

                            </div>

                            <div class="col-md-9">
                                <p style="border-bottom: 1px solid #3c8dbc;">Title</p>
                                <p><?php echo $beranda->title; ?></p>

                            </div>

                        </div>
                        <p></p>
                        <a href="#" onclick="modal_edit_header()" class="btn btn-primary" style="float: right"><i class="fa fa-edit"></i> Edit</a>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mengapa Harus Naomi</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p style="border-bottom: 1px solid #3c8dbc;">Gambar</p>
                                <img alt="tentang kami"  class="img-thumbnail" src="<?php echo base_url() . $beranda->why_gambar; ?>" data-holder-rendered="true" >

                            </div>
                            <div class="col-md-8">
                                <p style="border-bottom: 1px solid #3c8dbc;">Deskripsi </p>
                                <p><?php echo substr($beranda->deskripsi_why, 0, 255); ?> ...</p>

                            </div>
                            <p></p>

                        </div>
                        <a href="#" onclick="modal_edit_why()" class="btn btn-primary" style="float: right"><i class="fa fa-edit"></i> Edit</a>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" >Tentang Kami</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <p style="border-bottom: 1px solid #3c8dbc;">Gambar</p>
                                <img alt="tentang kami"  class="img-thumbnail" src="<?php echo base_url() . $tentang_kami->gambar_tentang_kami; ?>" data-holder-rendered="true" >
                            </div>
                            <div class="col-md-9">
                                <p style="border-bottom: 1px solid #3c8dbc;">Deskripsi Tentang kami</p>
                                <p><?php echo substr($tentang_kami->deskripsi_tentang_kami, 0, 255); ?> ...</p>
                            </div>

                        </div>
                        <p></p>
                        <a href="#" onclick="modal_tentang_kami()" class="btn btn-primary" style="float: right"><i class="fa fa-edit"></i> Edit</a>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" >Pengaturan tampilan awal (home)</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-info">
                            <h4>Informasi!</h4>
                            <p>Klik simpan untuk menyimpan pengaturan</p>
                        </div>
                        <form class="form-horizontal" action="<?= base_url() ?>administrator_naomi/pengaturan" method="POST">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Slider</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="slider" <?php
                                    if ($pengaturan->slider == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Service atau layanan</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="services" <?php
                                    if ($pengaturan->services == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Produk</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="produk" <?php
                                    if ($pengaturan->produk == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Promosi</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="promosi" <?php
                                    if ($pengaturan->promosi == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Tentang Kami</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="tentang_kami" <?php
                                    if ($pengaturan->tentang_kami == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Mengapa harus naomi</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="why" <?php
                                    if ($pengaturan->why == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">News atau Artikel</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="news" <?php
                                    if ($pengaturan->news == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Testimoni</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="testimoni" <?php
                                    if ($pengaturan->testimoni == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Kontak</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="kontak" <?php
                                    if ($pengaturan->kontak == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Sosial Media</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="sosmed" <?php
                                    if ($pengaturan->sosmed == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 control-label" style="text-align: left ">Navigasi Footer</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="navigasi_footer" <?php
                                    if ($pengaturan->navigasi_footer == 'on') {
                                        echo 'checked';
                                    }
                                    ?> >
                                </div>
                            </div>

                            <hr>
                            <div class="form-group" style="margin-top: 20px;">
                                <div class="col-sm-offset-7 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="submit"  value="submit"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="edit_tentang_kami" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">


            <form method="POST" action="<?= base_url() ?>administrator_naomi/tentang_kami"                 enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Tentang Kami</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group"><label for="isi_layanan">Deskripsi Tentang Kami</label>
                        <textarea class="form-control" name="deskripsi_tentang_kami" id="editor1"
                                  required>
                                      <?php echo $tentang_kami->deskripsi_tentang_kami ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('editor1',
                                    {
                                        filebrowserBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php',
                                        filebrowserImageBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php?type=Images',
                                        filebrowserFlashBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php?type=Flash',
                                        filebrowserUploadUrl: '<?php echo site_url(); ?>assets/admin/plugins/core/connector/asp/connector.asp?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Flash',
                                        height: ['500px']
                                    });
                        </script>
                    </div>
                    <div class="form-group"><label for="exampleInputFile">Ubah Gambar</label>
                        <div class="panel panel-default panel-body">
                            <div class="row">
                                <div class="col-sm-2 col-md-2">
                                    <a href="javascript:void(0)" onclick="remove_image('#file-input', '#img', '#cpt', '#imagePreview');" style="display:none;" class="item-galeri-delete" id="cpt"><i class="glyphicon glyphicon-trash"></i></a>
                                    <div class="thumbnail-fileupload" id="imagePreview" style="border-style: none;background-position: center center;
                                         background-size: cover;">
                                        <label for="file-input" style="width:115px;">
                                            <img id="img" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                        </label>
                                        <div class="image-upload">           
                                            <input id="file-input" type="file" name="gambar" accept="image/gif, image/jpeg, image/png"  >
                                        </div>      
                                    </div>          
                                </div>



                            </div>

                        </div> 
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="submit"  value="submit">Simpan</button>
                </div>

            </form>


        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="edit_header" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">


            <form method="POST" action="<?= base_url() ?>administrator_naomi/header"                 enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Header</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group"><label for="isi_layanan">Title</label>
                        <textarea class="form-control" name="title" id="editor1"required><?php echo $beranda->title ?></textarea>

                    </div>
                    <div class="form-group"><label for="exampleInputFile">Ubah Gambar logo</label>
                        <div class="row">
                            <div class="col-sm-2 col-md-2">
                                <a href="javascript:void(0)" onclick="remove_image('#file-input8', '#img8', '#cpt8', '#imagePreview8');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;" class="item-galeri-delete" id="cpt8"><i class="glyphicon glyphicon-trash"></i></a>
                                <div class="thumbnail" id="imagePreview8" style="border-style: none;background-position: center center;
                                     background-size: cover;">
                                    <label for="file-input8" style="width:118px;">
                                        <img id="img8" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                    </label>
                                    <div class="image-upload">           
                                        <input id="file-input8" type="file" name="gambar" accept="image/gif, image/jpeg, image/png">
                                    </div>      
                                </div>          
                            </div>
                        </div>                         
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="submit"  value="submit">Simpan</button>
                </div>

            </form>


        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modal_why" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">


            <form method="POST" action="<?= base_url() ?>administrator_naomi/why"                 enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Mengapa harus naomi</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group"><label for="isi_layanan">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi_why" id="editor11"
                                  required>
                                      <?php echo $beranda->deskripsi_why ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('editor11',
                                    {
                                        filebrowserBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php',
                                        filebrowserImageBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php?type=Images',
                                        filebrowserFlashBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php?type=Flash',
                                        filebrowserUploadUrl: '<?php echo site_url(); ?>assets/admin/plugins/core/connector/asp/connector.asp?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Flash',
                                        height: ['500px']
                                    });
                        </script>
                    </div>
                    <div class="form-group"><label for="exampleInputFile">Ubah Gambar</label>
                        <div class="panel panel-default panel-body">
                            <div class="row">
                                <div class="col-sm-2 col-md-2">
                                    <a href="javascript:void(0)" onclick="remove_image('#file-input2', '#img2', '#cpt2', '#imagePreview2');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;" class="item-galeri-delete" id="cpt2"><i class="glyphicon glyphicon-trash"></i></a>
                                    <div class="thumbnail" id="imagePreview2" style="border-style: none;background-position: center center;
                                         background-size: cover;">
                                        <label for="file-input2" style="width:115px;">
                                            <img id="img2" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                        </label>
                                        <div class="image-upload">           
                                            <input id="file-input2" type="file" name="gambar" accept="image/gif, image/jpeg, image/png" >
                                        </div>      
                                    </div>          
                                </div>



                            </div>

                        </div> 
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="submit"  value="submit">Simpan</button>
                </div>

            </form>


        </div>
    </div>
</div>

<?php
$this->load->view('admin/footer');
?>