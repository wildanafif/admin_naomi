<?php $this->load->view('web/header') ?>
	

  <!-- Main Content Section -->

  <section id="main-content" class="main-content">
  <section id="page-status" class="page-status">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>">Home</a></li>
        <li>-></li>
        <li><a href="	">Service</a></li>
      
      </ol><!-- /.breadcrumb -->
    </div><!-- /.container -->
  </section>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
         	<div class="box box-primary" style="border-top-color: #eb538c;">
                <div class="box-header with-border">
                  <h3 class="box-title">Service atau layanan di naomi</h3>
                  	
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                  <?php foreach ($layanan as $value) {
                  	
                  ?>
                    <li class="item">
                      <div class="product-img">
                        <img src="<?php echo base_url("assets/images/layanan/".$value->gambar)?>" alt="Service Image">
                      </div>
                      <div class="product-info">
                        <a href="<?php echo base_url("service/read/".$value->url."/".$value->id_layanan)?>" class="product-title"><?php echo $value->title_layanan?> <span class="label label-warning pull-right hilang">Lihat</span></a>
                        <span class="product-description">
                         
                        </span>
                      </div>
                    </li><!-- /.item -->
                   <?php }?>
                    
                  </ul>
                </div><!-- /.box-body -->
         
              </div>
        </div>

        
        <div class="col-md-3">
          <aside id="sidebar" class="sidebar">
           	<div class="box box-primary" style="border-top-color: #eb538c;">
                <div class="box-header with-border">
                  <h3 class="box-title">Search</h3>
                  	
                </div><!-- /.box-header -->
                <div class="box-body">
                     <div class="widget widget_search">
		             
		              <div class="widget-details">
		                <form action="#" class="search-form">
		                  <input type="text" id="search" class="search" placeholder="Search for.." required>
		                  <button type="submit" id="search-submit" class="search-submit"><i class="fa fa-search"></i></button>
		                </form>
		              </div><!-- /.widget-details -->
		            </div><!-- /.widget -->
		                 	
                </div><!-- /.box-body -->
             
              </div>
              
              
          <div class="box box-primary" style="border-top-color: #eb538c;">
                <div class="box-header with-border">
                  <h3 class="box-title">Follow</h3>
                  	
                </div><!-- /.box-header -->
                <div class="box-body">
                         <div class="widget widget_social_follow">
			              <div class="widget-details">
			                <ul class="social-list">
			                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			                  <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			                </ul>
			              </div><!-- /.widget-details -->
			            </div><!-- /.widget -->

		                 	
                </div><!-- /.box-body -->
             
              </div>

        
           


     
          </aside>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /#main-content -->

  <!-- Main Content Section -->
	
<hr>
<?php $this->load->view('web/footer') ?>
