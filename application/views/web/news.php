<?php $this->load->view('web/header') ?>


<!-- Main Content Section -->

<section id="main-content" class="main-content">
    <section id="page-status" class="page-status">

        <div class="container">
            <h2 class="section-title-produk"><span>Naomi</span> News</h2>


        </div><!-- /.container -->
    </section>
    <div class="container">
        <div class="row">

            <div class="col-md-9" >

                <div id="resul_artikel" class="hilang">

                    <?php foreach ($artikel as $value) { ?>
                        <a class="link-artikel-home" href="<?php echo base_url('news/read/' . $value->url . '/' . $value->id_artikel) ?>">
                            <div class="col-xs-12 col-md-4 layanan-home" >

                                <div style="box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.1);background-position: center center; background-size: cover;  height: 225px;  background-image: url('<?php echo base_url("assets/images/artikel/" . $value->gambar_artikel) ?>');">&nbsp;</div>

                                <div class="col-xs-12 col-md-12 artikel-news-item" style="border:none;"  >
                                    <p class="tgl_artikel"><?php echo $value->tgl_artikel ?></p>
                                    <p  class="" ><?php
                    $ttl = strlen($value->title_artikel);
                    $title_artikel = substr($value->title_artikel, 0, 60) . "...";
                    if ($ttl > 65) {
                        echo $title_artikel;
                    } else {
                        echo $value->title_artikel;
                    };
                        ?></p>
                                </div>

                            </div> 
                        </a>
                    <?php } ?> 
                </div>

                <div  id="loading" style="display:none;margin-bottom:2rem;" align="center"><img src="<?php echo base_url('assets/images/app/ajax-loader.gif'); ?>"></div>


                <?php $total_groups = ceil($jumlah_artikel / 3); ?>  
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
                        $.post("<?php echo base_url() ?>news/load_news", {'group_no': val1}, function (data) {

                            $("#resul_artikel").append(data); //append received data into the element

                            //hide loading image
                            $('#loading').hide(); //hide loading image once data is received

                            $('#more').val(isi_data); //loaded group increment

                            loading = false;

                        }).fail(function (xhr, ajaxOptions, thrownError) { //any errors?

                            alert(thrownError); //alert with HTTP error
                            $('#loading').hide(); //hide loading image
                            loading = false;

                        });


                    }
                    ;

                </script>
                <div class="box box-primary muncul" style="border-top-color: #eb538c;margin-top:-3rem;" >

                    <div class="box-body">
                        <ul class="products-list product-list-in-box" id="m_artikel">
                            <?php foreach ($artikel as $key) { ?>
                                <li class="item">
                                    <div class="product-img">
                                        <img src="<?php echo base_url() ?>assets/images/artikel/<?php echo $key->gambar_artikel ?>" alt="Service Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="<?php echo base_url() ?>product/read/<?php echo $key->url ?>/<?php echo $key->id_artikel ?>" class="naomi-product-title"><?php echo $key->title_artikel ?> </a>
                                        <span class="product-description">

                                        </span>
                                    </div>
                                </li><!-- /.item -->
                            <?php } ?>   

                        </ul>
                    </div><!-- /.box-body -->

                </div>
                
                <div class="muncul" style="text-align: center;margin-bottom:2rem;" id="div_load_m">
                    <button onclick="load_more_artikel_m(6)" value="1"  type="button" class="load_more" id="more_m"  >Selanjutnya</button>

                </div>

                <script type="text/javascript">
                    function load_more_artikel_m(val1) {
                        var track_load = val1; //total loaded record group(s)
                        var isi_data = val1 + 3;
                        var loading = false; //to prevents multipal ajax loads
                        var total_groups = <?= $total_groups; ?>;

                        loading = true; //prevent further ajax loading
                        $('#loading_m').show(); //show loading image

                        //load data from the server using a HTTP POST request
                        $.post("<?php echo base_url() ?>news/load_news_m", {'group_no': val1}, function (data) {

                            $("#m_artikel").append(data); //append received data into the element

                            //hide loading image
                            $('#loading_m').hide(); //hide loading image once data is received

                            $('#more_m').val(isi_data); //loaded group increment
                            $('#div_load_m').html('<button onclick="load_more_artikel_m(' + isi_data + ')" value="1"  type="button" class="load_more" id="more"  >Selanjutnya</button>');
                            console.log(isi_data);
                            loading = false;

                        }).fail(function (xhr, ajaxOptions, thrownError) { //any errors?

                            alert(thrownError); //alert with HTTP error
                            $('#loading_m').hide(); //hide loading image
                            loading = false;

                        });

                        //total record group(s)

                    }
                    ;

                </script>
            </div>


            <div class="col-md-3">
                <div class="box box-primary" style="border-top-color: #eb538c;margin-top: 1.5rem;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Berita Populer</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <?php foreach ($recent as $key) { ?>
                                <li class="item">
                                    <div class="product-img">
                                        <img src="<?php echo base_url() ?>assets/images/artikel/<?php echo $key->gambar_artikel ?>" alt="Service Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="<?php echo base_url() ?>news/read/<?php echo $key->url ?>/<?php echo $key->id_artikel ?>" class="naomi-product-title"><?php echo $key->title_artikel ?> </a>
                                        <span class="product-description">

                                        </span>
                                    </div>
                                </li><!-- /.item -->
                            <?php } ?>   

                        </ul>
                    </div><!-- /.box-body -->

                </div>

            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /#main-content -->

<!-- Main Content Section -->

<hr>
<?php $this->load->view('web/footer') ?>
