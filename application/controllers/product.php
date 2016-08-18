<?php

class Product extends CI_Controller {

	function __construct() {

		parent::__construct();
	}

	function index() {
		$beranda = new Beranda();
		$pengaturan = new Pengaturan();
		$produk = new Produk();
		$layanan = new Layanan();
		$data['layanan'] = $layanan->get();
		$artikel=new Artikel();
		$artikel->order_by('id_artikel','DESC');
		$data['artikel']=$artikel->get(4);
		$galeri=new Galeri();
		$galeri->order_by('id_galeri','DESC');
		$data['galeri']=$galeri->get(6);

		$produk->order_by('id_produk', 'DESC');
		$produk->limit(6);
		$pengaturan->where('id_pengaturan', 0);
		$data['title'] = "Produk di naomi beauty skin";
		$data['meta_description'] = "Produk di naomi beauty skin";
		$data['produk'] = $produk->get();
		$data['pengaturan'] = $pengaturan->get();
		$data['beranda'] = $beranda->get();
		$data['menu_aktif'] = 'produk';
		$tmp_produk = new Produk();
		$recent = $tmp_produk;
		$data['jumlah_produk'] = $tmp_produk->count();

		$recent->order_by('dilihat', 'DESC');
		$recent->limit(8);
		$data['recent'] = $recent->get();
		$this->load->view('web/produk', $data);
	}

	function read($url = null, $id = null) {
		$beranda = new Beranda();
		$pengaturan = new Pengaturan();
		$produk = new Produk();
		$layanan = new Layanan();
		$artikel=new Artikel();
		$artikel->order_by('id_artikel','DESC');
		$data['artikel']=$artikel->get(4);
		$galeri=new Galeri();
		$galeri->order_by('id_galeri','DESC');
		$data['galeri']=$galeri->get(6);
		$data['layanan'] = $layanan->get();
		$pengaturan->where('id_pengaturan', 0);
		$data['produk'] = $produk->get();
		$data['pengaturan'] = $pengaturan->get();
		$data['beranda'] = $beranda->get();
		$data['menu_aktif'] = 'produk';
		$read = new Produk();
		$hash = md5($url);
		$read->where('hash', $hash);
		$read->or_where('id_produk', $id);
		$data['read'] = $read->get();
		if ($data['read']->id_produk == "") {
			redirect('error');
		}
		$data['title'] = $data['read']->title_produk . " | Naomi bauty skin";
		$data['meta_description'] = $data['read']->title_produk . " | Naomi bauty skin";
		$data['meta_keyword'] = $data['read']->title_produk;
		$update = new Produk();
		$recent = $produk;
		$update->where('id_produk', $data['read']->id_produk)->update('dilihat', $data['read']->dilihat + 1);
		$recent->order_by('dilihat', 'DESC');
		$recent->limit(8);
		$data['recent'] = $recent->get();

		$layanan = new Layanan();
		$data['layanan'] = $layanan->get();
		$this->load->view('web/read_produk', $data);
	}

	function load_product() {
		if ($_POST) {
			//sanitize post value
			$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

			//throw HTTP error if group number is not valid
			if (!is_numeric($group_number)) {
				header('HTTP/1.1 500 Invalid number!');
				exit();
			}

			//get current starting point of records
			$position = ($group_number * 6);
			$produk = new Produk();
			$produk->order_by('id_produk', 'DESC');

			$produk->limit(3, $group_number);

			$data_produk = $produk->get();
			foreach ($data_produk as $key) {
				$jml_kata = strlen($key->title_produk);
				echo '
					<div class="col-xs-12 col-md-4">
        	  <a class="link-produk" href="' . base_url() . 'product/read/' . $key->url . '/' . $key->id_produk . '">
        	 <div class="box-produk box-primary ">
                <div class="box-header with-border" style="background-position: center center; background-size: cover;  height: 225px;  background-image: url(' . base_url() . 'assets/images/produk/' . $key->gambar_produk . ')">
                 
                  	
                </div><!-- /.box-header -->
                 <div class="box-body"';
				if ($jml_kata < 30) {
					echo ' style="margin-top:1rem"';
				}
				echo '>
		            ' . $key->title_produk . ' 	
                </div><!-- /.box-body -->
             </div>
             </a>
        </div>
				';
			}

			//Limit our results within a specified range.
		}
	}

	function load_product_m() {
		if ($_POST) {
			//sanitize post value
			$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

			//throw HTTP error if group number is not valid
			if (!is_numeric($group_number)) {
				header('HTTP/1.1 500 Invalid number!');
				exit();
			}

			//get current starting point of records
			$position = ($group_number * 6);
			$produk = new Produk();
			$produk->order_by('id_produk', 'DESC');

			$produk->limit(3, $group_number);

			$data_produk = $produk->get();
			foreach ($data_produk as $key) {
				$jml_kata = strlen($key->title_produk);
				echo '
					<li class="item">
                      <div class="product-img">
                        <img src="' . base_url() . '/assets/images/produk/' . $key->gambar_produk . '" alt="Service Image">
                      </div>
                      <div class="product-info">
                        <a href="' . base_url() . 'product/read/' . $key->url . '/' . $key->id_produk . '" class="naomi-product-title">' . $key->title_produk . '</a>
                        <span class="product-description">
                         
                        </span>
                      </div>
                    </li>
				';
			}

			//Limit our results within a specified range.
		}
	}

}
