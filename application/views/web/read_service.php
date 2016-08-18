<?php $this->load->view('web/header') ?>
	

  <!-- Main Content Section -->

  <section id="main-content" class="main-content">
  <section id="page-status" class="page-status">
    <div class="container ">
      <ol class="breadcrumb ">
        <li><a href="<?php echo base_url()?>">Home</a></li>
        <li>-></li>
        
      	<li><a href="" ><?php echo $read->title_layanan?></a></li>
      </ol><!-- /.breadcrumb -->
    </div><!-- /.container -->
  </section>
    <div class="container">
      <div class="row">
       <div class="col-md-3">
       		
       		<div class="box box-solid collapsed-box muncul">
                <div class="box-header with-border">
                  <a href="#" data-widget="collapse" class="box-title">Kategori</a>
                  <div class="box-tools">
                    <button class="btn-collapse-navigation btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                  <?php foreach ($layanan as $value) {
                  ?>
                    <li class="<?php if ($value->title_layanan==$read->title_layanan){echo 'active-collapse-navigation';}?>"><a href="<?php echo base_url("service/read/".$value->url."/".$value->id_layanan)?>" <?php if ($value->title_layanan==$read->title_layanan){echo 'style="color:#fff;"';}?>><i class="fa fa-list"></i> <?php echo $value->title_layanan?> </a></li>
                   <?php }?>
                    
                  </ul>
                </div><!-- /.box-body -->
              </div>
       		
       
         	<div class="box box-solid hilang">
                <div class="box-header with-border">
                  <a href="#" data-widget="collapse" class="box-title">Kategori</a>
                  <div class="box-tools">
                    <button class="btn-collapse-navigation btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                  <?php foreach ($layanan as $value) {
                  ?>
                    <li class="<?php if ($value->title_layanan==$read->title_layanan){echo 'active-collapse-navigation';}?>"><a href="<?php echo base_url("service/read/".$value->url."/".$value->id_layanan)?>" <?php if ($value->title_layanan==$read->title_layanan){echo 'style="color:#fff;"';}?>><i class="fa fa-list"></i> <?php echo $value->title_layanan?> </a></li>
                   <?php }?>
                    
                  </ul>
                </div><!-- /.box-body -->
              </div>
        </div>
        <div class="col-md-9">
         	<article class="post type-post">
            <div class="post-head media">
              <div class="entry-date media-left text-center">
              <?php $tgl=explode(" ", $read->tgl_layanan) ?>
                <time datetime="2015-06-10"><?php echo $tgl[1] ?> <span><?php echo $tgl[0]?></span></time>
              </div><!-- /.entry-date -->
              <div class="media-body">
                <h2 class="entry-title"><?php echo $read->title_layanan?></h2><!-- /.entry-title -->
                <div class="share-post pull-right">
                  <ul class="share-list">
                    <li><a target="_BLANK" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("service/read/".$read->url."/".$read->id_layanan)?>"><i class="fa fa-facebook"></i></a></li>
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

            <div class="post-content">
            <?php if ($read->gambar!='layanan_default.jpg'){?>
              <div class="post-thumbnail">
              
                <img src="<?php echo base_url("assets/images/layanan/".$read->gambar	)?>" alt="post Image" class="img-thumbnail">
              </div><!-- /.post-thumbnail -->
              <?php }?>
              <div class="entry-content">
               <?php echo $read->isi_layanan?>

              </div><!-- /.entry-content -->
              <div class="post-tag">
                <ul class="tag-list">
                  <li><a href="#">auto</a></li>
                  <li><a href="#">icecream</a></li>
                  <li><a href="#">lollypop</a></li>
                  <li><a href="#">art</a></li>
                </ul><!-- /.tag-list -->
              </div><!-- /.post-tag -->
            </div><!-- /.post-content -->
          </article>
        </div>

        
       
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /#main-content -->

 
<hr>
<?php $this->load->view('web/footer') ?>
