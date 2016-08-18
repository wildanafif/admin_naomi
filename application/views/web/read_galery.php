<?php $this->load->view('web/header') ?>
	

  <!-- Main Content Section -->

  <section id="main-content" class="main-content">
  <section id="page-status" class="page-status">
    <div class="container hilang">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>">Home</a></li>
        <li>-></li>
        <li><a href="<?php echo base_url()?>galeri">galeri</a></li>
      	<li>-></li>
      	<li><a href="" ><?php echo $read->title_galeri?></a></li>
      </ol><!-- /.breadcrumb -->
    </div><!-- /.container -->
  </section>
    <div class="container">
      <div class="row">
       <div class="col-md-9 panel panel-default panel-body">
         	<article class="post type-post">
            <div class="post-head media">
              <div class="entry-date media-left text-center">
              <?php $tgl=explode(" ", $read->tgl_galeri) ?>
                <time datetime="2015-06-10"><?php echo $tgl[1] ?> <span><?php echo $tgl[0]?></span></time>
              </div><!-- /.entry-date -->
              <div class="media-body">
                <h2 class="entry-title"><?php echo $read->title_galeri?></h2><!-- /.entry-title -->
                <div class="share-post pull-right">
                  <ul class="share-list">
                    <li><a target="_BLANK" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("galeri/read/".$read->url."/".$read->id_galeri)?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                  </ul>
                </div><!-- /.share-post -->
              
                <div class="post-meta">
                  <div class="entry-meta">
                
                  </div><!-- /.entry-meta -->
                </div><!-- /.post-meta -->
              </div>
            </div><!-- /.post-head -->
  <hr>
            <div class="post-content">
            <div class="row" >
            	<div class="col-md-1" >&nbsp;</div>
            	 <div class="col-md-10" >
            	<?php if ($read->gambar_galeri!='galeri_default.jpg'){?>
              <div class="post-thumbnail hilang">
              
                <img id="view_gambar" src="<?php echo base_url($read->gambar_galeri	)?>" alt="post Image" class="img-thumbnail">
              </div><!-- /.post-thumbnail -->
              <?php }?>
              <div class="entry-content">
               <?php echo $read->deskripsi_galeri?>

              </div><!-- /.entry-content -->
              
             
              
              <?php $id=1; foreach ($foto_galeri as $value) {
              	
              ?>	
				  	<a class="hilang" href="javascript:void(0)" onclick="show_images('<?php echo base_url($value->url_foto)?>', 'gambar<?php echo $id?>');">
				  						  	<img id="gambar<?php echo $id?>"  src="<?php echo base_url($value->url_foto)?>" alt="<?php echo $read->title_galeri?>" class="gv_thumbnail"  style="width:75px; height:75px;<?php if ($read->gambar_galeri!=$value->url_foto) {
				  						  		echo 'opacity:0.3;';
				  						  	}?>">
				  		
				  	</a>
				
				   
				  <?php
					if ($id==1){
						$foto_mobile=$value->url_foto;
					}
				  $id++; }?>
				  
				  <center class="muncul">
					<img src="<?=base_url()?><?php echo $foto_mobile; ?>" class="img-responsive" alt="galeri">
					<hr>
					<?php if ($id>2) { ?>
						
						<a href="<?php echo site_url(); ?>galery/show_image/<?php echo $read->url; ?>/<?php echo $read->id_galeri; ?>/1" >Gambar Selanjutnya</a>
					<?php } ?>
				</center>
				
            </div>
            
            <script type="text/javascript">
            	function show_images(img ,id_current){
            		document.getElementById("view_gambar").src = img;

            		console.log('dfgh');
                   
                    $(".gv_thumbnail").css("opacity" ,"0.3");
                    document.getElementById(id_current).style = 'width: 75px; height: 75px; opacity: 100%;';
               }
            	
            </script>
            <div class="col-md-1" >&nbsp;</div>
            </div>
           
            
              
            </div><!-- /.post-content -->
          </article>
        </div>
      
       <div class="col-md-3">
         	
          <div class="box box-primary" style="border-top-color: #eb538c;">
                <div class="box-header with-border">
                  <h3 class="box-title">Galeri Populer</h3>
                  	
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                     <?php foreach ($recent as $key){?>
                        <li class="item">
                      <div class="product-img">
                        <img src="<?php echo base_url()?><?php echo $key->gambar_galeri?>" alt="galeri Image">
                      </div>
                      <div class="product-info">
                        <a href="<?php echo base_url()?>galery/read/<?php echo $key->url?>/<?php echo $key->id_galeri?>" class="naomi-product-title"><?php echo $key->title_galeri?> </a>
                        <span class="product-description">
                         
                        </span>
                      </div>
                    </li><!-- /.item -->
                     <?php }?>   
                                       
                  </ul>
                </div><!-- /.box-body -->
         
              </div>
              
         

        
           


     
         
        </div>
       
        
       
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /#main-content -->

 
<hr>
<?php $this->load->view('web/footer') ?>
