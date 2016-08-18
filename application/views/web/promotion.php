<?php $this->load->view('web/header') ?>
	

  <!-- Main Content Section -->

  <section id="main-content" class="main-content">
  <section id="page-status" class="page-status">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>">Home</a></li>
        <li>-></li>
        <li><a href="	">promotion</a></li>
      
      </ol><!-- /.breadcrumb -->
    </div><!-- /.container -->
  </section>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
         	<div class="box box-primary" style="border-top-color: #eb538c;">
                <div class="box-header with-border">
                  <h3 class="box-title">promosi di naomi</h3>
                  	
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box" id="result_promosi">
                  <?php foreach ($promosi as $value) {
                  	
                  ?>
                    <li class="item-large">
                      <div class="product-img">
                          <img src="<?php echo base_url("assets/images/promosi/".$value->gambar_promosi)?>" alt="promotion Image" class="img-promosi">
                      </div>
                      <div class="product-info-promosi">
                          <a href="<?php echo base_url("promotion/read/".$value->url."/".$value->id_promosi)?>" class="product-title"><?php echo $value->title_promosi?> <span class="label label-warning pull-right"><?php echo $value->tgl_promosi; ?></span></a>
                        <span class="product-description">
                         
                        </span>
                      </div>
                    </li><!-- /.item -->
                   <?php }?>
                    
                  </ul>
                </div><!-- /.box-body -->
         
              </div>
            
                            <div class="hilang" id="loading" style="display:none;margin-bottom:2rem;" align="center"><img src="<?php echo base_url('assets/images/app/ajax-loader.gif'); ?>"></div>

        </div>
          <script type="text/javascript">
                    var track_page = 6; //track user scroll as page number, right now page number is 1
                    var loading = false; //prevents multiple loads

                    //load_more_artikel(track_page); //initial content load

                    $(window).scroll(function () { //detect page scroll
                        if ($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled to bottom of the page
                            //page number increment
                            load_more_artikel(track_page); //load content  
                            track_page = track_page + 3;
                            //console.log(13);
                        }
                    });
                    function load_more_artikel(val1) {
                        var loading = false; //to prevents multipal ajax loads   
                        console.log(val1);
                        loading = true; //prevent further ajax loading
                        $('#loading').show(); //show loading image

                        //load data from the server using a HTTP POST request
                        $.post("<?php echo base_url() ?>promotion/load_promotion", {'group_no': val1}, function (data) {

                            $("#result_promosi").append(data); //append received data into the element

                            //hide loading image
                            $('#loading').hide(); //hide loading image once data is received

                      

                            loading = false;

                        }).fail(function (xhr, ajaxOptions, thrownError) { //any errors?

                            alert(thrownError); //alert with HTTP error
                            $('#loading').hide(); //hide loading image
                            loading = false;

                        });


                    }
                    ;

                </script>
        
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
