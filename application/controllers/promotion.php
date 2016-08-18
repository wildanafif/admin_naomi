<?php

class Promotion extends CI_Controller {

	function __construct() {

		parent::__construct();
	}

	function index() {
		$beranda = new Beranda();
		$pengaturan = new Pengaturan();
		$promosi = new Promosi();
		$layanan = new Layanan();
		$artikel=new Artikel();
		$artikel->order_by('id_artikel','DESC');
		$artikel->limit(4);
		$data['artikel']=$artikel->get();
		$galeri=new Galeri();
		$galeri->order_by('id_galeri','DESC');
		$data['galeri']=$galeri->get(6);
		$data['layanan'] = $layanan->get();
		$promosi->order_by('id_promosi', 'DESC');
		$promosi->limit(6);
		$pengaturan->where('id_pengaturan', 0);
		$data['title'] = "promotion | Naomi beauty skin";
		$data['meta_description'] = "Promotion di naomi beauty skin";
		$data['promosi'] = $promosi->get();
		$data['pengaturan'] = $pengaturan->get();
		$data['beranda'] = $beranda->get();
		$data['menu_aktif'] = 'promotion';
		$tmp_promosi = new promosi();
		$recent = $tmp_promosi;
		$data['jumlah_promosi'] = $tmp_promosi->count();

		$recent->order_by('dilihat', 'DESC');
		$recent->limit(8);
		$data['recent'] = $recent->get();
		$this->load->view('web/promotion', $data);
	}

	function read($url = null, $id = null) {
		$beranda = new Beranda();
		$pengaturan = new Pengaturan();
		$promosi = new promosi();
		$layanan = new Layanan();
		$artikel=new Artikel();
		$artikel->order_by('id_artikel','DESC');
		$artikel->limit(4);
		$data['artikel']=$artikel->get();
		$galeri=new Galeri();
		$galeri->order_by('id_galeri','DESC');
		$data['galeri']=$galeri->get(6);
		$data['layanan'] = $layanan->get();
		$pengaturan->where('id_pengaturan', 0);
		$data['promosi'] = $promosi->get();
		$data['pengaturan'] = $pengaturan->get();
		$data['beranda'] = $beranda->get();
		$data['menu_aktif'] = 'promotion';
		$read = new promosi();
		$hash = md5($url);
		$read->where('hash', $hash);
		$read->or_where('id_promosi', $id);
		$data['read'] = $read->get();
		if ($data['read']->id_promosi == "") {
			redirect('error');
		}
		$data['title'] = $data['read']->title_promosi . " | Naomi bauty skin";
		$data['meta_description'] = $data['read']->title_promosi . " | Naomi bauty skin";
		$data['meta_keyword'] = $data['read']->title_promosi;
		$update = new promosi();
		$recent = $promosi;
		$update->where('id_promosi', $data['read']->id_promosi)->update('dilihat', $data['read']->dilihat + 1);
		$recent->order_by('dilihat', 'DESC');
		$recent->limit(8);
		$data['recent'] = $recent->get();
		$this->load->view('web/read_promotion', $data);
	}

	function load_promotion() {
		if ($_POST) {
			//sanitize post value
			$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

			//throw HTTP error if group number is not valid
			if (!is_numeric($group_number)) {
				header('HTTP/1.1 500 Invalid number!');
				exit();
			}

			//get current starting point of records

			$promosi = new promosi();
			$promosi->order_by('id_promosi', 'DESC');

			$promosi->limit(3, $group_number);

			$data_promosi = $promosi->get();
			foreach ($data_promosi as $key) {
				$jml_kata = strlen($key->title_promosi);
				if ($jml_kata > 85) {
					$title_promosi = substr($key->title_promosi, 0, 80) . "...";
				} else {
					$title_promosi = $key->title_promosi;
				}

				echo '<li class="item-large">
                      <div class="product-img">
                          <img src="' . base_url() . 'assets/images/promosi/' . $key->gambar_promosi . '" alt="promotion Image" class="img-promosi">
                      </div>
                      <div class="product-info-promosi">
                          <a href="' . base_url() . 'promotion/read/' . $key->url . '/' . $key->id_promosi . '" class="product-title">' . $title_promosi . ' <span class="label label-warning pull-right">14 Agustus 2016</span></a>
                        <span class="product-description">
                         
                        </span>
                      </div>
                    </li>';
			}

			//Limit our results within a specified range.
		}
	}

	function load_promotion_m() {
		if ($_POST) {
			//sanitize post value
			$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

			//throw HTTP error if group number is not valid
			if (!is_numeric($group_number)) {
				header('HTTP/1.1 500 Invalid number!');
				exit();
			}

			//get current starting point of records

			$promosi = new promosi();
			$promosi->order_by('id_promosi', 'DESC');

			$promosi->limit(3, $group_number);

			$data_promosi = $promosi->get();
			foreach ($data_promosi as $key) {
				$jml_kata = strlen($key->title_promosi);
				echo '
					<li class="item">
                      <div class="product-img">
                        <img src="' . base_url() . '/assets/images/promosi/' . $key->gambar_promosi . '" alt="Service Image">
                      </div>
                      <div class="product-info">
                        <a href="' . base_url() . 'promotion/read/' . $key->url . '/' . $key->id_promosi . '" class="naomi-product-title">' . $key->title_promosi . '</a>
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
