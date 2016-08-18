<?php $this->load->view("admin/header"); ?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div
    class="content-wrapper"><!-- Content Header (Page header) --> <section
        class="content-header">
        <h1>Data galeri</h1>

    </section> <!-- Main content --> <section class="content"> <!-- Default box -->
        <?php echo $this->session->flashdata('item'); ?>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Galeri</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"
                            data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"
                            data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                
                    
            <form method="POST" action="<?= base_url() ?>admin_galeri/add_galeri"
                  enctype="multipart/form-data">
               
               
                    <div class="form-group"><label for="judul_layanan">Judul galeri</label>
                        <input type="text" class="form-control" name="judul_galeri"
                               placeholder="Judul galeri" ></div>
                    <div class="form-group"><label for="isi_layanan">Deskripsi galeri</label>
                        <textarea class="ckeditor" name="deskripsi_galeri" id="editor1"
                        ></textarea> <script type="text/javascript">
                            CKEDITOR.replace('editor1',
                                    {
                                        filebrowserBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php',
                                        filebrowserImageBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php?type=Images',
                                        filebrowserFlashBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php?type=Flash',
                                        filebrowserUploadUrl: '<?php echo site_url(); ?>assets/admin/plugins/core/connector/asp/connector.asp?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Flash'
                                    });
                        </script></div>
                    <div class="form-group"><label for="exampleInputFile">Gambar galeri</label>
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
                                            <input id="file-input" type="file" name="gambar[]" accept="image/gif, image/jpeg, image/png" >
                                        </div>      
                                    </div>          
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <a href="javascript:void(0)" onclick="remove_image('#file-input2', '#img2', '#cpt2', '#imagePreview2');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;" class="item-galeri-delete" id="cpt2"><i class="glyphicon glyphicon-trash"></i></a>
                                    <div class="thumbnail" id="imagePreview2" style="border-style: none;background-position: center center;
                                         background-size: cover;">
                                        <label for="file-input2" style="width:115px;">
                                            <img id="img2" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                        </label>
                                        <div class="image-upload">           
                                            <input id="file-input2" type="file" name="gambar[]" accept="image/gif, image/jpeg, image/png">
                                        </div>      
                                    </div>          
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <a href="javascript:void(0)" onclick="remove_image('#file-input3', '#img3', '#cpt3', '#imagePreview3');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;" class="item-galeri-delete" id="cpt3"><i class="glyphicon glyphicon-trash"></i></a>
                                    <div class="thumbnail" id="imagePreview3" style="border-style: none;background-position: center center;
                                         background-size: cover;">
                                        <label for="file-input3" style="width:115px;">
                                            <img id="img3" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                        </label>
                                        <div class="image-upload">           
                                            <input id="file-input3" type="file" name="gambar[]" accept="image/gif, image/jpeg, image/png">
                                        </div>      
                                    </div>          
                                </div>

                                <div class="col-sm-2 col-md-2">
                                    <a href="javascript:void(0)" onclick="remove_image('#file-input4', '#img4', '#cpt4', '#imagePreview4');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;" class="item-galeri-delete" id="cpt4"><i class="glyphicon glyphicon-trash"></i></a>
                                    <div class="thumbnail" id="imagePreview4" style="border-style: none;background-position: center center;
                                         background-size: cover;">
                                        <label for="file-input4" style="width:115px;">
                                            <img id="img4" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                        </label>
                                        <div class="image-upload">           
                                            <input id="file-input4" type="file" name="gambar[]" accept="image/gif, image/jpeg, image/png">
                                        </div>      
                                    </div>          
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2 col-md-2">
                                    <a href="javascript:void(0)" onclick="remove_image('#file-input5', '#img5', '#cpt5', '#imagePreview5');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;" class="item-galeri-delete" id="cpt5"><i class="glyphicon glyphicon-trash"></i></a>
                                    <div class="thumbnail" id="imagePreview5" style="border-style: none;background-position: center center;
                                         background-size: cover;">
                                        <label for="file-input5" style="width:115px;">
                                            <img id="img5" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                        </label>
                                        <div class="image-upload">           
                                            <input id="file-input5" type="file" name="gambar[]" accept="image/gif, image/jpeg, image/png">
                                        </div>      
                                    </div>          
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <a href="javascript:void(0)" onclick="remove_image('#file-input6', '#img6', '#cpt6', '#imagePreview6');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;"class="item-galeri-delete" id="cpt6"><i class="glyphicon glyphicon-trash"></i></a>
                                    <div class="thumbnail" id="imagePreview6" style="border-style: none;background-position: center center;
                                         background-size: cover;">
                                        <label for="file-input6" style="width:116px;">
                                            <img id="img6" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                        </label>
                                        <div class="image-upload">           
                                            <input id="file-input6" type="file" name="gambar[]" accept="image/gif, image/jpeg, image/png">
                                        </div>      
                                    </div>          
                                </div>

                                <div class="col-sm-2 col-md-2">
                                    <a href="javascript:void(0)" onclick="remove_image('#file-input7', '#img7', '#cpt7', '#imagePreview7');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;"class="item-galeri-delete" id="cpt7"><i class="glyphicon glyphicon-trash"></i></a>
                                    <div class="thumbnail" id="imagePreview7" style="border-style: none;background-position: center center;
                                         background-size: cover;">
                                        <label for="file-input7" style="width:117px;">
                                            <img id="img7" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                        </label>
                                        <div class="image-upload">           
                                            <input id="file-input7" type="file" name="gambar[]" accept="image/gif, image/jpeg, image/png">
                                        </div>      
                                    </div>          
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <a href="javascript:void(0)" onclick="remove_image('#file-input8', '#img8', '#cpt8', '#imagePreview8');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;" class="item-galeri-delete"id="cpt8"><i class="glyphicon glyphicon-trash"></i></a>
                                    <div class="thumbnail" id="imagePreview8" style="border-style: none;background-position: center center;
                                         background-size: cover;">
                                        <label for="file-input8" style="width:118px;">
                                            <img id="img8" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                        </label>
                                        <div class="image-upload">           
                                            <input id="file-input8" type="file" name="gambar[]" accept="image/gif, image/jpeg, image/png">
                                        </div>      
                                    </div>          
                                </div>

                            </div>

                        </div> 
                    </div>



                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button  type="" class="btn btn-primary" name="submit"
                            value="submit" data-toggle="modal" data-target="#loading_upload">Tambah</button>
            

            </form>


            </div>
            <!-- /.box-body -->
            <div class="box-footer"></div>
            <!-- /.box-footer--></div>
        <!-- /.box --> </section><!-- /.content --></div>
<!-- /.content-wrapper -->


<!-- Modal -->




     
  

















<!-- Modal -->
<div class="modal fade" id="loading_upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div>
        <div class="box-body" style="text-align: center">
            <h3>Silahkan Tunggu</h3>
                </div><!-- /.box-body -->
                <!-- Loading (remove the following to stop the loading)-->
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
                <!-- end loading -->
              </div>
  </div>
</div>

<?php
$this->load->view('admin/footer');
?>