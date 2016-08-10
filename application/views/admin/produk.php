<?php
$this->load->view("admin/header");?>
  <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Produk
            
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <?php echo $this->session->flashdata('item'); ?>
          
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Produk</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div id="toolbar" class="btn-group">
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Produk
            </button>
          </div>
              <table id="all_data_json" data-toggle="table" data-url="<?=base_url()?>admin_produk/get_json_produk"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" data-toolbar="#toolbar">
                        <thead>
                        <tr>
                            <th data-formatter="numberFormatter" >No</th>
                            <th data-field="title_produk" data-sortable="true">Nama Produk</th>
                            <th data-field="gambar_produk"  data-formatter="format_gambar_tabel_produk">Gambar</th>
                           
                            <th data-field="id_produk" data-formatter="product_action" data-sortable="true"></th>
                            
                        </tr>
                        </thead>
                    </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
             
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">


      <form method="POST" action="<?=base_url()?>admin_produk/add_produk" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Produk</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="judul_layanan">Nama Produk</label>
            <input type="text" class="form-control" name="judul_produk" placeholder="Nama Produk" required >
          </div>
          <div class="form-group">
            <label for="isi_layanan">Deskripsi Produk</label>
             <textarea class="ckeditor" name="deskripsi_produk" id="editor1" required ></textarea>
                                    <script type="text/javascript">
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
          <div class="form-group">
            <label for="exampleInputFile">Gambar Produk</label>
            <input type="file" id="exampleInputFile" name="gambar">
           
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Tambah</button>
      </div>

    </form>


    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi hapus</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus ?
      </div>
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