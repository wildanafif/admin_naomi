<?php $this->load->view('web/header') ?>
	

  <!-- Main Content Section -->

  <section id="main-content" class="main-content">
  <section id="page-status" class="page-status">
    <div class="container hilang">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>">Home</a></li>
        <li>-></li>
        <li><a href="<?php echo base_url()?>about">About</a></li>
    
      </ol><!-- /.breadcrumb -->
    </div><!-- /.container -->
  </section>
    <div class="container">
      <div class="row">
       <div class="col-md-9 panel panel-default panel-body">
         	<article class="post type-post">
            <div class="post-head media">
             
              <div class="media-body">
                <h2 class="entry-title" style="margin-top: 1rem;"><?php echo $read->title_tentang_kami?></h2><!-- /.entry-title -->
                <div class="share-post pull-right">
                  <ul class="share-list">
                    <li><a target="_BLANK" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("about")?>"><i class="fa fa-facebook"></i></a></li>
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
            <?php if ($read->gambar_tentang_kami!='tentang_kami_default.jpg'){?>
              <div class="post-thumbnail">
              
                <img src="<?php echo base_url("$read->gambar_tentang_kami")?>" alt="post Image" class="img-thumbnail">
              </div><!-- /.post-thumbnail -->
              <?php }?>
              <div class="entry-content">
               <?php echo $read->deskripsi_tentang_kami?>

              </div><!-- /.entry-content -->
              
            </div><!-- /.post-content -->
          </article>
        </div>
      
       <div class="col-md-3">
         	
          <div class="box box-primary" style="border-top-color: #eb538c;">
                <div class="box-header with-border">
                  <h3 class="box-title">Berita Populer</h3>
                  	
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                     <?php foreach ($recent as $key){?>
                        <li class="item">
                      <div class="product-img">
                        <img src="<?php echo base_url()?>assets/images/artikel/<?php echo $key->gambar_artikel?>" alt="<?php echo $key->title_artikel;?>">
                      </div>
                      <div class="product-info">
                        <a href="<?php echo base_url()?>news/read/<?php echo $key->url?>/<?php echo $key->id_artikel?>" class="naomi-product-title"><?php echo $key->title_artikel?> </a>
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
