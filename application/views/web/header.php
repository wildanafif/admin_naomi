
<!doctype html>

<html lang="id"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php
            if (isset($title)) {
                echo $title;
            } else {
                echo $beranda->title;
            }
            ?></title>
        <meta name="description" content="<?php
        if (isset($meta_description)) {
            echo $meta_description;
        } else {
            echo "Naomi beauty skin care";
        }
        ?>">
        <meta name="keywords" content="naomi, naomi beauty skincare, salon, kulit, sehat, kecantikan, perawatan, produk, kosmetik<?php
        if (isset($meta_keyword)) {
            echo ", $meta_keyword";
        }
        ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?= base_url() ?>web/assets/css/bootstrap.min.css">

        <!-- Include Bootstrap Min Css -->
        <link href="<?php echo base_url() ?>assets/dist/css/AdminLTE.css"
              rel="stylesheet" type="text/css" />



        <link rel="stylesheet" href="<?= base_url() ?>web/assets/css/font-awesome.min.css">

        <link href="<?= base_url() ?>web/assets/css/jquery.bxslider.css" rel="stylesheet" />
        <!-- Include Style Css -->
        <link rel="stylesheet" href="<?= base_url() ?>web/assets/css/style.css">
        <!-- Include Responsive Css -->

        <link href="<?= base_url() ?>web/assets/plugins/slider/ninja-slider.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?= base_url() ?>web/assets/css/style.default.css">
        <link rel="stylesheet" href="<?= base_url() ?>web/assets/css/naomi-mobile-version.css">

        <script src="<?= base_url() ?>web/assets/plugins/slider/ninja-slider.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>web/assets/plugins/jquery.min.js"></script>


    </head>
    <body>





        <div class="navbar navbar-default yamm navbar-fixed-top" role="navigation" >
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand home" href="index.html" data-animate-hover="bounce" style="opacity: 1;">
<!--                        <img src="<?php echo base_url() . $beranda->gambar_logo; ?>" alt="Obaju logo" class="hidden-xs">-->
<!--                        <img src="<?php echo base_url() . $beranda->gambar_logo; ?>" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>-->
                    	 Naomi <br> Logo
                    </a>
                    <div class="navbar-buttons">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-align-justify"></i>
                        </button>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                            <span class="sr-only">Toggle search</span>
                            <i class="fa fa-search"></i>
                        </button>

                    </div>
                </div>
                <!--/.navbar-header -->

                <div class="navbar-collapse collapse" id="navigation">

                    <ul class="nav navbar-nav right">
                        <li 
                            class="<?php
                            if ($menu_aktif == 'home') {
                                echo'active';
                            }
                            ?>"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="dropdown yamm-fw <?php
                        if ($menu_aktif == 'service') {
                            echo'active';
                        }
                        ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Service <b class="caret"></b></a>
                            <ul class="dropdown-menu detail-nav">
                                <li class="">
                                    <div class="yamm-content">
                                        <div class="row">
                                            <?php foreach ($layanan AS $key) { ?>
                                                <div class="col-sm-3">
                                                    <a href="<?php echo base_url() ?>service/read/<?php echo $key->url . "/" . $key->id_layanan ?>">
                                                        <h5><?php echo $key->title_layanan ?></h5>
                                                    </a>


                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>

                        <li  class="<?php
                            if ($menu_aktif == 'produk') {
                                echo'active';
                            }
                            ?>"><a href="<?php echo base_url() ?>product">Produk</a></li> 

                        <li class="<?php
                        if ($menu_aktif == 'promotion') {
                            echo'active';
                        }
                        ?>"><a  href="<?= base_url() ?>promotion">Promotion</a></li>  


                        <li class="<?php if ($menu_aktif == 'news') {
    echo'active';
} ?>"><a href="<?php echo base_url() ?>news" >News</a></li>
                           <li  class="<?php if ($menu_aktif == 'galery') {
    echo'active';
} ?>"><a href="<?=base_url()?>galery">Galeri</a></li>

  <li  class="<?php if ($menu_aktif == 'tentang_kami') {
    echo'active';
} ?>"><a href="<?=base_url()?>about">About</a></li>

                    </ul>

                </div>
                <!--/.nav-collapse -->

                <div class="navbar-buttons">


                    <!--/.nav-collapse -->

                    <div class="navbar-collapse collapse right" id="search-not-mobile">
                        <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                            <span class="sr-only">Toggle search</span>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                </div>

                <div class="collapse clearfix" id="search">

                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                            </span>
                        </div>
                    </form>

                </div>
                <!--/.nav-collapse -->

            </div>
            <!-- /.container -->
        </div>