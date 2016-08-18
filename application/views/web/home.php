<?php $this->load->view('web/header') ?>


	<?php
		if ($pengaturan->slider=="on") {
			# code...
		
	?>
     <div id="ninja-slider" class="">
        <div class="slider-inner">
            <ul>

            	<?php 

            		foreach ($slider as $key) {
            		
            	 ?>
                <li style="opaciti:0.5;">
                    <a class="ns-img" href="<?=base_url()?>assets/images/slider/<?php echo $key->gambar_slider ?>"></a>
                    <div class="slider-text" style="text-align:center">
                      <div class="slide-inner active-slide wow animated bounceInRight">

						<div class="caption">Selamat Datang di Naomi Beauty Skin Care</div>                       
                       
                      </div><!-- /.slide-inner -->
                    </div>
                  

                </li>
                <?php 

            		} 


                ?>
               
                
             
            </ul>
            <div class="navsWrapper">
                <div id="ninja-slider-prev"></div>
                <div id="ninja-slider-next"></div>
            </div>
        </div>
    </div>
<?php
	}

?>
  <!-- Main Slider -->

<?php
	if ($pengaturan->services=='on'){

	
		# code...
	
?>
  <!-- Service Section-->

  <section id="services" class="services text-center">
    <div class="section-padding">
      <div class="container">



        <div class="row">
          <div class="section-top" >
            <h2 class="section-title"><span>Naomi Skin Care</span> Services</h2>
            <p class="section-description">
             
            </p><!-- /.section-description -->
          </div><!-- /.section-top -->
          <div class="container-fluid">
         
          	<div class="row">
      
           
            <?php foreach ($layanan as $key) {
            	# code...
             ?>
               <div class="col-xs-12 col-md-3 layanan-home" >
				  <a href="<?php echo base_url('service/read/'.$key->url.'/'.$key->id_layanan)?>">		  	
				  	<div class="col-xs-12 col-md-12 layanan-home-item"  >
				  		<h3><?php echo $key->title_layanan; ?></h3>
				  	</div>
				  </a>
			  </div> 
             
           <?php } ?>
              
           </div> 
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /#services -->

  <!-- Service Section-->

<?php 
} 
?>

<div style="margin-top:70px;" ></div>
<?php if ($pengaturan->produk=='on'){?>
<section id="blog" class="blog text-center" style="background: aliceblue;">
    <div class="section-padding">
      <div class="container">
        <div class="row">
          <div class="section-top wow" >
            <h2 class="section-title"><span>Naomi</span> Produk</h2><!-- /.section-title -->
          </div><!-- /.section-top -->

          
            
            <?php foreach ($produk as $value) {
            	
            ?><a href="<?php echo base_url()?>product/read/<?php echo $value->url?>/<?php echo $value->id_produk?>">
              <div class="col-xs-12 col-md-3 layanan-home">
				  	 
				  	<div style="background-position: center center; background-size: cover;  height: 225px;  background-image: url('<?php echo base_url("assets/images/produk/".$value->gambar_produk)?>');">&nbsp;</div>
				 	<p class="help" ><span class="item-desc-product-home"><?php echo $value->title_produk?></span></p>
			  </div> 
                </a>       	
                       
             <?php }	?>     
               
        </div><!-- /.row -->
          <a class="btn more" href="<?php echo base_url('product')?>" style="margin-top:10px;">Lihat Produk Lainnya</a>
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section>
  <?php }?>

  <!-- promo Section -->

<?php if ($pengaturan->promosi=='on') {
	
 ?>
 
  <section id="subscribe-section" class="subscribe-section text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
    <div class="bg-overlay">
      <div class="section-padding">
        <div class="container">
          <div class="wow animated fadeInUp" data-wow-delay=".5s">
            <h2 class="section-title">Promo dari naomi</h2><!-- /.section-title -->
            <div class="section-description">
              <?php echo $promosi->deskripsi_promosi; ?> 
            </div><!-- /.section-description -->
            <a href="<?php echo base_url('promotion')?>"  type="button" id="subscribe-submit" class="btn" style="margin-top:5px;">Lihat Promosi lainnya</a>
           
          </div>
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </div><!-- /.bg-overlay -->
  </section><!-- /#subscribe-section -->

  <!-- promo Section -->

  <?php } ?>

  <!-- About Us Section -->

  <section id="about" class="about">
  
  <?php if ($pengaturan->tentang_kami=='on'){?>
    <div class="about-top">
      <div class="section-padding">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <div class="know-about-us wow animated fadeInLeft" data-wow-delay=".5s">
                <h2 class="section-title"><span>Naomi</span> Siap membantu anda dalam masalah kecantikan</h2><!-- /.section-title -->
                <p class="description">
					<?php $tk=strlen($tentang_kami->deskripsi_tentang_kami); 
					if ($tk>520) {
						echo substr($tentang_kami->deskripsi_tentang_kami, 0,515).". . .";
					}else {
						echo $tentang_kami->deskripsi_tentang_kami;
					}
					?>
                </p><!-- /.description -->
                <?php if ($tk>520){?>
                <div class="btn-container">
                
                  <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div><!-- /.btn-container -->
                <?php }?>
              </div><!-- /.know-about-us -->
            </div>

          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </div><!-- /.about-top -->
<?php }?>

<?php if ($pengaturan->why=='on'){ ?>
    <div class="about-bottom">
      <div class="section-padding">
        <div class="col-sm-6">
          <div class="tab-image wow animated fadeInLeft" data-wow-delay=".5s">
            <img class="img-responsive" src="<?php echo base_url($beranda->why_gambar)?>" alt="Tab Image">
          </div><!-- /.tab-image -->
        </div>
        <div class="col-sm-6">
          <div class="about-work wow animated fadeInRight" data-wow-delay=".5s">
            <h2 class="section-title"><span>Mengapa</span> Harus Kami?</h2><!-- /.section-title -->
           <?php echo $beranda->deskripsi_why; ?>
          </div><!-- /.about-work -->
        </div>
      </div><!-- /.section-padding -->
    </div><!-- /.about-bottom -->
    <?php  }?>
    
  </section><!-- /#about -->

  <!-- About Us Section -->


  <div class="clearfix"></div><!-- /.clearfix -->







<?php if ($pengaturan->galeri=='on'){?>
  <!-- galeri Section -->

  <section id="portfolio" class="portfolio text-center hilang">
    <div class="portfolio-bottom">
      <div class="section-padding">
        <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
          <h2 class="section-title"><span>Galeri</span> Foto</h2><!-- /.section-title -->
       
        </div><!-- /.section-top -->

        <div class="latest-projects wow animated fadeInUp" data-wow-delay=".5s">
       <?php foreach ($galeri as $value) {
       	
       ?>
          <div id="project-items" class="project-items">
            <div class="item cat-1 cat-4">
              <a href="<?php echo base_url($value->gambar_galeri)?>" class="image-popup-vertical-fit">
              <div style="   border: 2px solid #e0908e;  background-position: center center; background-size: cover;  width: 335px; height: 225px;  background-image: url('<?php echo base_url($value->gambar_galeri)?>');">&nbsp;</div>
              </a>
              <div class="item-details">
                <a href="#"> <h3 class="project-title"><?php echo $value->title_galeri?></h3></a>

               <!-- Standard button -->
				<a href="fkdgh" type="button" class="btn btn-default naomi-button-galeri" >Lihat</a>

              </div><!-- /.item-details -->
            </div><!-- /.item -->
           
           
<?php }?>
            

          </div><!-- /#project-items -->

          
        </div><!-- /.latest-projects -->
      
          
        
      </div><!-- /.section-padding -->
    </div><!-- /.portfolio-bottom -->
            <a href="#" class="btn load-more" style="margin-top:25px;">Lihat Galeri lainnya</a>
    
  </section>

  <!-- galer Section -->

<?php }?>

<?php if ($pengaturan->news=='on') {

?>
  <!-- Latest Blog Post -->

  <section id="blog" class="blog text-center">
    <div class="section-padding">
      <div class="container">
        <div class="row">
          <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
            <h2 class="section-title"><span>Naomi</span> News</h2><!-- /.section-title -->
          </div><!-- /.section-top -->

          <div class="section-details">
            <div class="post-area">
            <?php foreach ($artikel as $value) { ?>
            <a href="<?php base_url()?>news/read/<?php echo $value->url ?>/<?php echo $value->id_artikel?>">
            	 <div class="col-xs-12 col-md-3 layanan-home" >
				  	 
				  	<div style="box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.1);background-position: center center; background-size: cover;  height: 225px;  background-image: url('<?php echo base_url("assets/images/artikel/".$value->gambar_artikel)?>');">&nbsp;</div>
				   	
				  	<div class="col-xs-12 col-md-12 artikel-home-item"  >
				  	<p class="tgl_artikel"><?php echo $value->tgl_artikel?></p>
				  		<p  class="link-artikel-home" ><?php 
				  		$ttl=strlen($value->title_artikel); 
				  		$title_artikel=substr($value->title_artikel, 0,60)."..." ;
				  		if ($ttl>10) {
				  			echo $title_artikel;
				  		}else {
				  			echo $value->title_artikel;
				  		} ; ?></p>
				  	</div>
				
			  </div> 
			  </a>
           <?php  }?>
       
            
             


            </div><!-- /.post-area -->

            
          </div><!-- /.section-details -->
          <div class="btn-container text-center" >
              <a href="<?php echo  base_url('news')?>" class="btn more" href="blog.html" style="margin-top:10px;">Lihat Lainnya</a>
            </div><!-- /.btn-container -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /#blog -->

  <!-- Latest Blog Post -->
<?php }?>


<?php if ($pengaturan->testimoni=='on'){?>
  <!-- Testimonials Section -->

  <section id="testimonial" class="testimonial text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
    <div class="pattern-overlay">
      <div class="section-padding">
        <div class="container">
          <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
            <h2 class="section-title">Our Testimonials</h2><!-- /.section-title -->
          </div><!-- /.section-top -->
          <div class="section-details wow animated fadeInUp" data-wow-delay=".5s">
            <div id="testimonial-slider" class="testimonial-slider carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#testimonial-slider" data-slide-to="0" class="active"></li>
                <li data-target="#testimonial-slider" data-slide-to="1"></li>
                <li data-target="#testimonial-slider" data-slide-to="2"></li>
                <li data-target="#testimonial-slider" data-slide-to="3"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <blockquote class="client-quote">
                    If it were, and it behaved in any degree like atomic structures, it would be found to be denser in the neighbourhood of large bodies like the earth, planets, and the sun.
                  </blockquote><!-- /.client-quote -->
                </div><!-- /.item -->
                <div class="item">
                  <blockquote class="client-quote">
                    The steamship requires to propel it fast, a large amount of coal for its engines, because the water in which it moves offers great friction resistance which must be overcome.
                  </blockquote><!-- /.client-quote -->
                </div><!-- /.item -->
                <div class="item">
                  <blockquote class="client-quote">
                    When surface of matter moved with another it's called friction, the moving body loses rate of motion, and will presently rest unless energy continuously supplied.
                  </blockquote><!-- /.client-quote -->
                </div><!-- /.item -->
                <div class="item">
                  <blockquote class="client-quote">
                    A bullet shot into the air has its velocity continuously reduced by the air, to which its energy is imparted by making it move out of its way
                  </blockquote><!-- /.client-quote -->
                </div><!-- /.item -->
              </div>
            </div><!-- /#testimonial-slider -->
          </div><!-- /.section-details -->
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </div><!-- /.pattern-overlay -->
  </section><!-- /#testimonial -->

  <!-- Testimonials Section -->
<?php }?>


<?php if ($pengaturan->kontak=='on'){?>
  <!-- Contact Section -->

  <section id="contact" class="contact">
    <div class="contact-inner">
	    <div class="row">
	  <div class="col-md-6">
	  	 <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4699.049651454101!2d112.65364132736771!3d-7.95609664655277!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629adbedcffb3%3A0xf697959cedb9c228!2sJl.+Simpang+Sulfat+Utara%2C+Pandanwangi%2C+Blimbing%2C+Kota+Malang%2C+Jawa+Timur%2C+Indonesia!5e0!3m2!1sen!2s!4v1470471258847"  frameborder="0" allowfullscreen="" ></iframe>

                      </div>
      
      
	  </div>
	  <div class="col-md-6">
	  	 <form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nama</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">Message</label>
		    <textarea rows="4" cols="" class="form-control"></textarea>
		  </div>
		  
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	  </div>
	</div>
    

    
    </div><!-- /.contact-inner -->
  </section>

  <!-- Contact Section -->
<?php }?>
<hr>
<?php $this->load->view('web/footer') ?>
