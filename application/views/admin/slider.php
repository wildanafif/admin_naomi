<?php $this->load->view("admin/header"); ?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div
    class="content-wrapper"><!-- Content Header (Page header) --> <section
        class="content-header">
        <h1>Data slider</h1>

        <!-- Main content --> <section class="content"> <!-- Default box -->
            <?php echo $this->session->flashdata('item'); ?>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Slider</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"
                                data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"
                                data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="toolbar" class="btn-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#myModal"><span class="glyphicon glyphicon-plus"
                                                     aria-hidden="true"></span> Tambah slider</button>
                    </div>
                    <h3> Gambar Slider</h3>
                    <div class="row">

                        <?php foreach ($slider as $key) { ?>
                            <div  class="col-xs-2 col-md-3"  style="margin-top: 10px;">     
                                <div  style="   border: 2px solid #3c8dbc;  background-position: center center; background-size: cover;    background-image: url('<?php echo base_url() . "assets/images/slider/" . $key->gambar_slider ?>')" >
                                    <div  class="cover-galeri">&nbsp;</div>
                                    <a href="javascript:void(0)" onclick="confirm_hapus_slider('<?php echo $key->id_slider; ?>')" title="Hapus Galeri" class="item-galeri-delete">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                                    </a>
                                    <a href="javascript:void(0)"onclick="confirm_edit_slider('<?php echo $key->id_slider; ?>')" title="Edit Galeri" class="item-galeri-edit">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                                    </a>

                                    <span class="item-desc"><?php echo $key->title_slider; ?></span> 
                                </div>
                            </div>
                        <?php }
                        ?>



                    </div>


                </div>


                <!-- /.box-body -->
                <div class="box-footer"></div>
                <!-- /.box-footer--></div>

            <!-- /.box --> </section><!-- /.content --></div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">


            <form method="POST" action="<?= base_url() ?>admin_slider/add_slider"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah gambar slider</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group"><label for="judul_layanan">Judul slider</label>
                        <input type="text" class="form-control" name="judul_slider"
                               placeholder="Judul slider" required></div>
                    <div class="form-group"><label for="isi_layanan">Deskripsi singkat slider</label>
                        <textarea class="form-control" name="deskripsi_slider" id="editor1"
                                  required></textarea> </div>
                    <div class="form-group"><label for="exampleInputFile">Gambar slider</label>
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
                                            <input id="file-input" type="file" name="gambar" accept="image/gif, image/jpeg, image/png" required="" >
                                        </div>      
                                    </div>          
                                </div>



                            </div>

                        </div> 
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="submit"
                            value="submit">Tambah</button>
                </div>

            </form>


        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi hapus</h4>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus ?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a id="link_hapus" href="#" type="button" class="btn btn-danger">Lanjutkan</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <form method="POST" action="<?= base_url() ?>admin_slider/save_edit"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit slider</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group"><label for="judul_layanan">Judul slider</label>
                        <input type="text" class="form-control" id="judul_slider" name="judul_slider"
                               placeholder="Judul slider" required></div>
                    <input type="hidden" value="" name="id_slider" id="id_slider">
                    <div class="form-group"><label for="isi_layanan">Deskripsi singkat slider</label>
                        <textarea class="form-control" name="deskripsi_slider" id="editor1_edit"
                                  required></textarea> </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="submit"
                            value="submit">Tambah</button>
                </div>

            </form>


        </div>
    </div>
</div>


<?php
$this->load->view('admin/footer');
?>