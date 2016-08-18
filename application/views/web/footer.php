
  <!-- Footer Section -->
<div class="row" >
  <footer id="colophon" class="footer site-footer" role="contentinfo">

<?php if ($pengaturan->sosmed=='on') {?>

    <div class="footer-social text-center">
      <div class="social-contact">
        <div class="col-xs-4">
          <div class="social-item wow animated fadeInRight" data-wow-delay=".75s">
            <div class="section-padding">
              <div class="social-icon">
                <i class="fa fa-facebook"></i>
              </div><!-- /.social-icon -->
              <div class="countdown">
                <span class="count-number counter">1,203</span>
              </div><!-- /.coundown -->
              <span class="about-item">likes</span>
            </div><!-- /.section-padding -->
          </div><!-- /.social-item -->
        </div>

        <div class="col-xs-4">
          <div class="social-item wow animated fadeInRight" data-wow-delay=".55s">
            <div class="section-padding">
              <div class="social-icon">
                <i class="fa fa-twitter"></i>
              </div><!-- /.social-icon -->
              <div class="countdown">
                <span class="count-number counter">2,305</span>
              </div><!-- /.coundown -->
              <span class="about-item">followers</span>
            </div><!-- /.section-padding -->
          </div><!-- /.social-item -->
        </div>

        <div class="col-xs-4">
          <div class="social-item wow animated fadeInRight" data-wow-delay=".35s">
            <div class="section-padding">
              <div class="social-icon">
                <i class="fa  fa-instagram"></i>
              </div><!-- /.social-icon -->
              <div class="countdown">
                <span class="count-number counter">1,101</span>
              </div><!-- /.coundown -->
              <span class="about-item">Followers</span>
            </div><!-- /.section-padding -->
          </div><!-- /.social-item -->
        </div>
      </div><!-- /.social-contact -->
    </div><!-- /.footer-social -->
<?php }?>

    <div class="footer-top">
    <?php if ($pengaturan->navigasi_footer=='on'){?>
      <div class="section-padding">
        <div class="container">
          <div class="row">

            <div class="col-sm-2">
              <div class="widget widget_menu">
                <h3 class="widget-title">Navigate</h3><!-- /.widget-title -->
                <div class="widget-details">
                  <nav>
                    <ul>
                      <li><a href="<?php echo base_url('about')?>">About Us</a></li>
                      <li><a href="<?php echo base_url('service')?>">Services</a></li>
                      <li><a href="<?php echo base_url('product')?>">Product</a></li>
                      <li><a href="<?php echo base_url('news')?>">News</a></li>
                    
                    </ul>
                  </nav>
                </div><!-- /.widget-details -->
              </div><!-- /.widget -->
            </div>

            <div class="col-sm-3">
              <div class="widget widget_latest-blog-post">
                <h3 class="widget-title">Recent News Posts</h3><!-- /.widget-title -->
                <div class="widget-details">
                  <div class="title-list">
                    <ul>
                    <?php foreach ($artikel as $value) { ?>
                    	<li><a href="<?php echo base_url('news/read/'.$value->url.'/'.$value->id_artikel)?>" class="entry-title"><?php echo $value->title_artikel?></a></li>
                    	
                
                     
                      <?php }?>
                    </ul>
                  </div><!-- /.title-list -->
                </div><!-- /.widget-details -->
              </div><!-- /.widget -->
            </div>

            <div class="col-sm-4">
              <div class="widget widget_photo_stream">
                <h3 class="widget-title">Photo Stream</h3><!-- /.widget-title -->
                <div class="widget-details">
                  <div class="photo-list">
                    <ul>
                    <?php foreach ($galeri as $value) { ?>
                    	  <li><a href="<?php echo  base_url()?>galery/read/<?php echo $value->url?>/<?php echo $value->id_galeri?>"><img src="<?php echo base_url($value->gambar_galeri)?>" alt="Stream Photo"></a></li>

                    <?php }?>
                      
                    </ul>
                  </div><!-- /.photo-list -->
                </div><!-- /.widget-details -->
              </div><!-- /.widget -->
            </div>

            <div class="col-sm-3">
             
              <div class="widget widget_subscribe">
                <h3 class="widget-title">Subscribe Us</h3>
                <div class="widget-details">
                  <form class="subscribe" method="post">
                    <p class="alert-success"></p>
                    <p class="alert-warning"></p>

                    <div class="subscribe-hide">
                      <input class="subscribe-email" type="email" id="subscribe-email" name="subscribe-email" required>
                      <button  type="submit" id="subscribe-submit" class="btn"><i class="fa fa-envelope"></i></button>
                      <span id="subscribe-loading" class="btn"> <i class="fa fa-refresh fa-spin"></i> </span>
                      <div class="subscribe-error"></div>
                    </div><!-- /.subscribe-hide -->
                    <div class="subscribe-message"></div>
                  </form><!-- /.subscribe -->
                </div><!-- /.widget-details -->
              </div><!-- /.widget -->
            </div>

          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
      
<?php }?>
    </div><!-- /.footer-top -->



    <div class="footer-bottom">
      <div class="container">
        <div class="footer-menu pull-left">
          <div class="widget widget_menu">
            <nav class="widget-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </nav>
          </div><!-- /.widget -->
        </div><!-- /.footer-menu -->

        <div class="copy-right pull-right"></div>

      </div><!-- /.container -->
    </div><!-- /.footer-bottom -->
  </footer><!-- /#colophon -->
</div>
  <!-- Footer Section -->



  <a href="#" id="scroll-to-top" class="scroll-to-top">
    <span>
      <i class="fa fa-chevron-up"></i>    
    </span>
  </a><!-- /#scroll-to-top -->
<script>
$(document).ready(function(){
	

	
	//Click event to scroll to top
	$('#scroll-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});

</script>




  
  <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>


 <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>



</body>
</html>
