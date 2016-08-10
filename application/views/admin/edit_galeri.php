<?php $this->load->view("admin/header"); ?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div
    class="content-wrapper"><!-- Content Header (Page header) --> <section
        class="content-header">
        <h1>Detail galeri <?php echo $title_galeri; ?></h1>

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
                <div class="row" >
                    <div class="col-md-4">
                        <h2>Gambar utama</h2>
                        <div class="panel panel-default  " >



                            <div class="panel-body cover-galeri" style="    border: 2px solid #3c8dbc;
                                 background-position: center center;
                                 background-size: cover;
                                 background-image: url('<?php echo base_url() . $gambar_galeri; ?>');">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form method="POST" action="<?= base_url() ?>admin_galeri/save_edit"
                              enctype="multipart/form-data">

                            <div class="modal-body">
                                <div class="form-group"><label for="judul_layanan">Judul galeri</label>
                                    <input type="text" class="form-control" name="judul_galeri"
                                           placeholder="Judul galeri" value="<?php echo $title_galeri ?>" required></div>
                                <div class="form-group"><label for="isi_layanan">Deskripsi galeri</label>
                                    <input type="text" name="id_galeri" value="<?php echo $id_galeri; ?>">
                                    <textarea class="ckeditor" name="deskripsi_galeri" id="editor1"
                                    required><?php echo $deskripsi_galeri; ?></textarea> <script type="text/javascript">
                                        CKEDITOR.replace('editor1',
                                                {
                                                    filebrowserBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php',
                                                    filebrowserImageBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php?type=Images',
                                                    filebrowserFlashBrowseUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/browse.php?type=Flash',
                                                    filebrowserUploadUrl: '<?php echo site_url(); ?>assets/admin/plugins/core/connector/asp/connector.asp?command=QuickUpload&type=Files',
                                                    filebrowserImageUploadUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Images',
                                                    filebrowserFlashUploadUrl: '<?php echo site_url(); ?>assets/plugins/kcfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Flash'
                                                });
                                    </script>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary" style="float:right;" name="submit" value="submit">Simpan Perubahan</button>


                        </form>

                    </div>

                </div>
                <hr style="border-bottom: 6px solid #d8d9d8;">
                <div class="row">
                    <div class="container-fluid" style="" ><h3>Gambar Galeri</h3> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Tambahkan Foto
                    </button></div>

                    <?php
                    $jumlah = 0;
                    foreach ($foto_galeri as $key) {
                        ?>
                        <div  class="col-xs-2 col-md-3"  style="margin-top: 10px;">     
                            <div  style="   border: 2px solid #3c8dbc;  background-position: center center; background-size: cover;    background-image: url('<?php echo base_url() . $key->url_foto ?>');" >
                                <div  class="cover-galeri">&nbsp;</div>
                                <?php if ($key->url_foto != $gambar_galeri) { ?>
                                    <a href="javascript:void(0)" onclick="confirm_hapus_foto_galeri('<?php echo $key->id_foto_galeri; ?>')" title="Hapus Galeri" class="item-galeri-delete">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                                    </a>
                                <a href="<?=base_url();?>admin_galeri/set_gambar_utama/<?php echo $key->id_foto_galeri."/".$key->id_galeri; ?>" class="item-desc">Jadikan Gambar utama galeri</a>
                                <?php } ?>




                            </div>
                        </div>
                        <?php
                        $jumlah++;
                    }
                    ?>


                    <!-- Button trigger modal -->
                    

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


            <form method="POST" action="<?= base_url() ?>admin_galeri/add_foto_galeri"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah foto galeri</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                         <input type="text" name="id_galeri" value="<?php echo $id_galeri; ?>">
                        <label for="exampleInputFile">Gambar galeri</label>
                        <div class="panel panel-default panel-body">
                            <div class="row">
                                <?php
                                $jumlah_upload = 9 - $jumlah;
                                $id_identifier = 1;

                                for ($x = 2; $x <= $jumlah_upload; $x++) {
                                    ?>


                                    <div class="col-sm-2 col-md-2">
                                        <a href="javascript:void(0)" onclick="remove_image('#file-input<?php echo $x; ?>', '#img<?php echo $x; ?>', '#cpt<?php echo $x; ?>', '#imagePreview<?php echo $x; ?>');" style="display:none;float:left;background-color:#ffffff; color:#d9534f;border-style: solid;" class="item-galeri-delete" id="cpt<?php echo $x; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                        <div class="thumbnail" id="imagePreview<?php echo $x; ?>" style="border-style: none;background-position: center center;
                                             background-size: cover;">
                                            <label for="file-input<?php echo $x; ?>" style="width:115px;">
                                                <img id="img<?php echo $x; ?>" title="Upload Foto" src="<?= base_url() ?>assets/images/app/upload_foto.jpg" class="img-responsive" style="cursor:pointer;">
                                            </label>
                                            <div class="image-upload">           
                                                <input id="file-input<?php echo $x; ?>" type="file" name="gambar[]" accept="image/gif, image/jpeg, image/png">
                                            </div>      
                                        </div>          
                                    </div>



                                <?php }
                                ?>

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



<?php
$this->load->view('admin/footer');
?>