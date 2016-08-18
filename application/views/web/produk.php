<?php
 $this->load->view('web/header') ?>
	

  <!-- Main Content Section -->

  <section id="main-content" class="main-content">
  <section id="page-status" class="page-status">
 
    <div class="container">
     <h2 class="section-title-produk"><span>Naomi</span> Produk</h2>
     
      
    </div><!-- /.container -->
  </section>
    <div class="container">
      <div class="row">
      
        <div class="col-md-9" >
       
        <div id="resul_produk" class="hilang">
       
        <?php foreach ($produk as $key){?>
     
        <div class="col-xs-12 col-md-4">
        	  <a class="link-produk" href="<?php echo base_url()?>product/read/<?php echo $key->url?>/<?php echo $key->id_produk?>">
        	 <div class="box-produk box-primary " >
                <div class="box-header with-border" style="background-position: center center; background-size: cover;  height: 225px;  background-image: url('<?php echo base_url("assets/images/produk/".$key->gambar_produk)?>')" id >
                 
                  	
                </div><!-- /.box-header -->
                <?php $jml_kata=strlen($key->title_produk);?>
                <div class="box-body" <?php if ($jml_kata<30){echo  'style="margin-top:1rem"'; }?> > 
		            <?php echo $key->title_produk?>  	
                </div><!-- /.box-body -->
             </div>
             </a>
        </div>
       
        <?php }?> 
       </div>
           <div class="hilang" id="loading" style="display:none;margin-bottom:2rem;" align="center"><img src="<?php echo base_url('assets/images/app/ajax-loader.gif');?>"></div>
          
		<?php $total_groups= ceil($jumlah_produk/6); ?>         
		<script type="text/javascript">

		var track_page = 6; //track user scroll as page number, right now page number is 1
		var loading  = false; //prevents multiple loads

		//load_more_artikel(track_page); //initial content load
		
		$(window).scroll(function() { //detect page scroll
		    if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled to bottom of the page
		         //page number increment
		        load_more_produk(track_page); //load content  
		        track_page=track_page+3;
		        //console.log(13);
		    }
		}); 
		function load_more_produk(val1){
		    var track_load = val1; //total loaded record group(s)
		    var isi_data= track_load+1;
		    var loading  = false; //to prevents multipal ajax loads
		    var total_groups = <?=$total_groups;?>; 
		
						loading = true; //prevent further ajax loading
						$('#loading').show(); //show loading image
						
						//load data from the server using a HTTP POST request
						$.post("<?php echo base_url() ?>product/load_product",{'group_no': val1}, function(data){
											
							$("#resul_produk").append(data); //append received data into the element
		
							//hide loading image
							$('#loading').hide(); //hide loading image once data is received
							
							$('#more').val(isi_data); //loaded group increment
		                                        $('#div_load').html('<button onclick="load_more_artikel('+ isi_data+')" value="1"  type="button" class="load_more" id="more"  >Selanjutnya</button>');
		console.log(isi_data);
		                    					loading = false; 
						
						}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
							
							alert(thrownError); //alert with HTTP error
							$('#loading').hide(); //hide loading image
							loading = false;
						
						});
						
					
		   
		}; 
		
		</script>
		<div class="box box-primary muncul" style="border-top-color: #eb538c;margin-top:-3rem;" >
               
                <div class="box-body">
                  <ul class="products-list product-list-in-box" id="m_produk">
                     <?php foreach ($produk as $key){?>
                        <li class="item">
                      <div class="product-img">
                        <img src="<?php echo base_url()?>assets/images/produk/<?php echo $key->gambar_produk?>" alt="Service Image">
                      </div>
                      <div class="product-info">
                        <a href="<?php echo base_url()?>product/read/<?php echo $key->url?>/<?php echo $key->id_produk?>" class="naomi-product-title"><?php echo $key->title_produk?> </a>
                        <span class="product-description">
                         
                        </span>
                      </div>
                    </li><!-- /.item -->
                     <?php }?>   
                                       
                  </ul>
                </div><!-- /.box-body -->
         
              </div>
                         <div class="muncul" id="loading_m" style="display:none" align="center"><img src="<?php echo base_url('assets/images/app/ajax-loader.gif')?>"></div>
              
              <div class="muncul" style="text-align: center;margin-bottom:2rem;" id="div_load_m">
                <button onclick="load_more_artikel_m(6)" value="1"  type="button" class="load_more" id="more_m"  >Selanjutnya</button>
                
            </div>
            
            <script type="text/javascript">
		function load_more_artikel_m(val1){
		    var track_load = val1; //total loaded record group(s)
		    var isi_data= val1+3;
		    var loading  = false; //to prevents multipal ajax loads
		    var total_groups = <?=$total_groups;?>; 
		
						loading = true; //prevent further ajax loading
						$('#loading_m').show(); //show loading image
						
						//load data from the server using a HTTP POST request
						$.post("<?php echo base_url() ?>product/load_product_m",{'group_no': val1}, function(data){
											
							$("#m_produk").append(data); //append received data into the element
		
							//hide loading image
							$('#loading_m').hide(); //hide loading image once data is received
							
							$('#more_m').val(isi_data); //loaded group increment
		                                        $('#div_load_m').html('<button onclick="load_more_artikel_m('+ isi_data+')" value="1"  type="button" class="load_more" id="more"  >Selanjutnya</button>');
		console.log(isi_data);
		                    					loading = false; 
						
						}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
							
							alert(thrownError); //alert with HTTP error
							$('#loading_m').hide(); //hide loading image
							loading = false;
						
						});
						
					}//total record group(s)
		   
	
		
		</script>
        </div>

     
        <div class="col-md-3">
         	 <div class="box box-primary" style="border-top-color: #eb538c;">
                <div class="box-header with-border">
                  <h3 class="box-title">Produk Populer</h3>
                  	
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                     <?php foreach ($recent as $key){?>
                        <li class="item">
                      <div class="product-img">
                        <img src="<?php echo base_url()?>assets/images/produk/<?php echo $key->gambar_produk?>" alt="Service Image">
                      </div>
                      <div class="product-info">
                        <a href="<?php echo base_url()?>product/read/<?php echo $key->url?>/<?php echo $key->id_produk?>" class="naomi-product-title"><?php echo $key->title_produk?> </a>
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

  <!-- Main Content Section -->
	
<hr>
<?php $this->load->view('web/footer') ?>
