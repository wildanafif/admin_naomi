<?php

class About extends CI_Controller {

    function __construct() {

        parent::__construct();
    }

    function index() {
        $beranda = new Beranda();
        $pengaturan = new Pengaturan();
        $artikel = new artikel();
        $layanan = new Layanan();
        $galeri=new Galeri();
        $galeri->order_by('id_galeri','DESC');
        $galeri->limit(6);
        $data['galeri']=$galeri->get();
        $data['layanan'] = $layanan->get();
        $pengaturan->where('id_pengaturan', 0);
        $data['artikel'] = $artikel->get();
        $data['pengaturan'] = $pengaturan->get();
        $data['beranda'] = $beranda->get();
        $data['menu_aktif'] = 'tentang_kami';
        $read = new Tentang_kami();
        
        $read->where('id_tentang_kami', 0);
       
        $data['read'] = $read->get();
        if ($data['read']->id_tentang_kami == "") {
            redirect('error');
        }
        $data['title'] =  "About | Naomi bauty skin";
        $data['meta_description'] =  "About | Naomi bauty skin";
        
        $recent = $artikel;
        $recent->order_by('dilihat', 'DESC');
        $recent->limit(8);
        $data['recent'] = $recent->get();
        $this->load->view('web/read_about', $data);
    }

    function read($url = null, $id = null) {
        $beranda = new Beranda();
        $pengaturan = new Pengaturan();
        $artikel = new artikel();
        $layanan = new Layanan();
        $data['layanan'] = $layanan->get();
        $pengaturan->where('id_pengaturan', 0);
        $data['artikel'] = $artikel->get();
        $data['pengaturan'] = $pengaturan->get();
        $data['beranda'] = $beranda->get();
        $data['menu_aktif'] = 'news';
        $read = new artikel();
        $hash = md5($url);
        $read->where('hash', $hash);
        $read->or_where('id_artikel', $id);
        $data['read'] = $read->get();
        if ($data['read']->id_artikel == "") {
            redirect('error');
        }
        $data['title'] = $data['read']->title_artikel . " | Naomi bauty skin";
        $data['meta_description'] = $data['read']->title_artikel . " | Naomi bauty skin";
        $data['meta_keyword'] = $data['read']->title_artikel;
        $update = new artikel();
        $recent = $artikel;
        $update->where('id_artikel', $data['read']->id_artikel)->update('dilihat', $data['read']->dilihat + 1);
        $recent->order_by('dilihat', 'DESC');
        $recent->limit(8);
        $data['recent'] = $recent->get();
        $this->load->view('web/read_news', $data);
    }

    function load_news() {
        if ($_POST) {
            //sanitize post value
            $group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

            //throw HTTP error if group number is not valid
            if (!is_numeric($group_number)) {
                header('HTTP/1.1 500 Invalid number!');
                exit();
            }

            //get current starting point of records

            $artikel = new artikel();
            $artikel->order_by('id_artikel', 'DESC');

            $artikel->limit(3, $group_number);

            $data_artikel = $artikel->get();
            foreach ($data_artikel as $key) {
                $jml_kata = strlen($key->title_artikel);
                if ($jml_kata > 65) {
                    $title_artikel = substr($key->title_artikel, 0, 60) . "...";
                } else {
                    $title_artikel = $key->title_artikel;
                }

                echo '
					<a class="link-artikel-home" href="' . base_url() . 'news/read/' . $key->url . '/' . $key->id_artikel . '">
        <div class="col-xs-12 col-md-4 layanan-home">
				  	 
				  	<div style="box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.1);background-position: center center; background-size: cover;  height: 225px;  background-image: url(' . base_url() . 'assets/images/artikel/' . $key->gambar_artikel . ');">&nbsp;</div>
				   	
				  	<div class="col-xs-12 col-md-12 artikel-news-item" style="border:none;">
				  	<p class="tgl_artikel">11 Agustus 2016</p>
				  		<p class="">' . $title_artikel . '</p>
				  	</div>
				
			  </div> 
       </a>
				';
            }

            //Limit our results within a specified range.
        }
    }

    function load_news_m() {
        if ($_POST) {
            //sanitize post value
            $group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

            //throw HTTP error if group number is not valid
            if (!is_numeric($group_number)) {
                header('HTTP/1.1 500 Invalid number!');
                exit();
            }

            //get current starting point of records

            $artikel = new artikel();
            $artikel->order_by('id_artikel', 'DESC');

            $artikel->limit(3, $group_number);

            $data_artikel = $artikel->get();
            foreach ($data_artikel as $key) {
                $jml_kata = strlen($key->title_artikel);
                echo '
					<li class="item">
                      <div class="product-img">
                        <img src="' . base_url() . '/assets/images/artikel/' . $key->gambar_artikel . '" alt="Service Image">
                      </div>
                      <div class="product-info">
                        <a href="' . base_url() . 'news/read/' . $key->url . '/' . $key->id_artikel . '" class="naomi-product-title">' . $key->title_artikel . '</a>
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
