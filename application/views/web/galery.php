<?php $this->load->view('web/header') ?>


<!-- Main Content Section -->

<section id="main-content" class="main-content">
    <section id="page-status" class="page-status">

        <div class="container">
            <h2 class="section-title-produk" style="text-align: -webkit-center;text-transform: uppercase;margin-bottom: auto;"><span>Naomi</span> Galeri</h2>


        </div><!-- /.container -->
    </section>
    <div class="container">
        <div class="row">

            <div class="col-md-12" >

                <div id="resul_galeri" >

                    <?php foreach ($galeri as $value) { ?>
                        <a class="link-galeri-home" href="<?php echo base_url('galery/read/' . $value->url . '/' . $value->id_galeri) ?>">
                            <div class="col-xs-12 col-md-3 layanan-home" >

                                <div style="box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.1);background-position: center center; background-size: cover;  height: 225px;  background-image: url('<?php echo base_url($value->gambar_galeri) ?>');">&nbsp;</div>
                                <span class="item-desc-galeri"><?php echo $value->title_galeri; ?></span>
                              

                            </div> 
                        </a>
                    <?php } ?> 
                </div>

                <div class="hilang" id="loading" style="display:none;margin-bottom:2rem;" align="center"><img src="<?php echo base_url('assets/images/app/ajax-loader.gif'); ?>"></div>


                <?php $total_groups = ceil($jumlah_galeri / 3); ?>  
                <script type="text/javascript">
                    var track_page = 8; //track user scroll as page number, right now page number is 1
                    var loading = false; //prevents multiple loads

                    //load_more_galeri(track_page); //initial content load

                    $(window).scroll(function () { //detect page scroll
                        if ($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled to bottom of the page
                            //page number increment
                            load_more_galeri(track_page); //load content  
                            track_page = track_page + 4;
                            //console.log(13);
                        }
                    });
                    function load_more_galeri(val1) {
                        var loading = false; //to prevents multipal ajax loads   
                        console.log(val1);
                        loading = true; //prevent further ajax loading
                        $('#loading').show(); //show loading image

                        //load data from the server using a HTTP POST request
                        $.post("<?php echo base_url() ?>galery/load_galery", {'group_no': val1}, function (data) {

                            $("#resul_galeri").append(data); //append received data into the element

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
           
           

            </div>


            
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /#main-content -->

<!-- Main Content Section -->

<hr>
<?php $this->load->view('web/footer') ?>
