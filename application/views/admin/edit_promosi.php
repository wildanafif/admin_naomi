<?php
$this->load->view("admin/header");?>
  <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit promosi
          
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit promosi</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
               <form method="POST" action="<?=base_url()?>admin_promosi/save_edit" enctype="multipart/form-data">
			      
			   
			          <div class="form-group">
			            <label for="judul_layanan">Judul promosi</label>
			            <input type="text" class="form-control" name="judul_promosi" placeholder="Nama promosi" value="<?php echo $title_promosi; ?>" required >
			          </div>
			          <input type="hidden" name="id_promosi" value="<?php echo $id_promosi; ?>" >
			          <div class="form-group">
			            <label for="isi_layanan">Deskripsi promosi</label>
			             <textarea class="ckeditor" name="deskripsi_promosi" id="editor1" required ><?php echo $deskripsi_promosi; ?></textarea>
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
			            <label for="exampleInputFile">Ubah gambar promosi</label>
			            <input type="file" id="exampleInputFile" name="gambar">
			           
			          </div>
			         
			     
			        
			        <button type="submit" class="btn btn-primary" name="submit" value="submit" style="float:right;">Simpan Perubahan</button>
			     

			    </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
$this->load->view('admin/footer');
?>