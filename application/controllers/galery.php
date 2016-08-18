<?php

class Galery extends CI_Controller {

	function __construct() {

		parent::__construct();
	}

	function index() {
		$beranda = new Beranda();
		$pengaturan = new Pengaturan();
		$galeri = new galeri();
		$layanan = new Layanan();
		$artikel=new Artikel();
		$artikel->order_by('id_artikel','DESC');
		$artikel->limit(4);
		$data['artikel']=$artikel->get();
		$data['layanan'] = $layanan->get();
		$galeri->order_by('id_galeri', 'DESC');
		$galeri->limit(8);
		$pengaturan->where('id_pengaturan', 0);
		$data['title'] = "galery | Naomi beauty skin";
		$data['meta_description'] = "galery di naomi beauty skin";
		$data['galeri'] = $galeri->get();
		$data['pengaturan'] = $pengaturan->get();
		$data['beranda'] = $beranda->get();
		$data['menu_aktif'] = 'galery';
		$tmp_galeri = new galeri();
		//$recent = $tmp_galeri;
		$data['jumlah_galeri'] = $tmp_galeri->count();


		$this->load->view('web/galery', $data);
	}

	function read($url = null, $id = null) {
		$beranda = new Beranda();
		$pengaturan = new Pengaturan();
		$galeri = new galeri();
		$layanan = new Layanan();
		$artikel=new Artikel();
		$artikel->order_by('id_artikel','DESC');
		$artikel->limit(4);
		$data['artikel']=$artikel->get();
		$data['layanan'] = $layanan->get();
		$pengaturan->where('id_pengaturan', 0);
		$data['galeri'] = $galeri->get();
		$data['pengaturan'] = $pengaturan->get();
		$data['beranda'] = $beranda->get();
		$data['menu_aktif'] = 'galery';
		$read = new galeri();
		$hash = md5($url);
		$read->where('hash', $hash);
		$read->or_where('id_galeri', $id);
		$data['read'] = $read->get();
		if ($data['read']->id_galeri == "") {
			redirect('error');
		}
		$data['title'] = $data['read']->title_galeri . " | Naomi bauty skin";
		$data['meta_description'] = $data['read']->title_galeri . " | Naomi bauty skin";
		$data['meta_keyword'] = $data['read']->title_galeri;
		$update = new galeri();
		$recent = $galeri;
		$update->where('id_galeri', $data['read']->id_galeri)->update('dilihat', $data['read']->dilihat + 1);
		$recent->order_by('dilihat', 'DESC');
		$recent->limit(8);
		$data['recent'] = $recent->get();

		$foto_galeri=new Foto_galeri();
		$foto_galeri->where('id_galeri',$data['read']->id_galeri);
		$data['foto_galeri']=$foto_galeri->get();
		$this->load->view('web/read_galery', $data);
	}

	function load_galery() {
		if ($_POST) {
			//sanitize post value
			$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

			//throw HTTP error if group number is not valid
			if (!is_numeric($group_number)) {
				header('HTTP/1.1 500 Invalid number!');
				exit();
			}

			//get current starting point of records

			$galeri = new galeri();
			$galeri->order_by('id_galeri', 'DESC');

			$galeri->limit(4, $group_number);

			$data_galeri = $galeri->get();
			foreach ($data_galeri as $key) {
				$jml_kata = strlen($key->title_galeri);
				if ($jml_kata > 85) {
					$title_galeri = substr($key->title_galeri, 0, 80) . "...";
				} else {
					$title_galeri = $key->title_galeri;
				}

				echo '<a class="link-galeri-home" href="' . base_url() . 'galery/read/' . $key->url . '/' . $key->id_galeri . '">
                            <div class="col-xs-12 col-md-3 layanan-home">

                                <div style="box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.1);background-position: center center; background-size: cover;  height: 225px;  background-image: url(' . base_url() . $key->gambar_galeri . ');">&nbsp;</div>
                                <span class="item-desc-galeri">' . $key->title_galeri . '</span>
                              

                            </div> 
                        </a>';
			}

			//Limit our results within a specified range.
		}
	}

	function load_galery_m() {
		if ($_POST) {
			//sanitize post value
			$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

			//throw HTTP error if group number is not valid
			if (!is_numeric($group_number)) {
				header('HTTP/1.1 500 Invalid number!');
				exit();
			}

			//get current starting point of records

			$galeri = new galeri();
			$galeri->order_by('id_galeri', 'DESC');

			$galeri->limit(3, $group_number);

			$data_galeri = $galeri->get();
			foreach ($data_galeri as $key) {
				$jml_kata = strlen($key->title_galeri);
				echo '
					<li class="item">
                      <div class="product-img">
                        <img src="' . base_url() . '/assets/images/galeri/' . $key->gambar_galeri . '" alt="Service Image">
                      </div>
                      <div class="product-info">
                        <a href="' . base_url() . 'galery/read/' . $key->url . '/' . $key->id_galeri . '" class="naomi-product-title">' . $key->title_galeri . '</a>
                        <span class="product-description">
                         
                        </span>
                      </div>
                    </li>
				';
			}

			//Limit our results within a specified range.
		}
	}

	function show_image($url = null, $id = null,$paging=null) {
		$beranda = new Beranda();
		$pengaturan = new Pengaturan();
		$galeri = new galeri();
		$layanan = new Layanan();
		$artikel=new Artikel();
		$artikel->order_by('id_artikel','DESC');
		$artikel->limit(4);
		$data['artikel']=$artikel->get();
		$data['layanan'] = $layanan->get();
		$pengaturan->where('id_pengaturan', 0);
		$data['galeri'] = $galeri->get();
		$data['pengaturan'] = $pengaturan->get();
		$data['beranda'] = $beranda->get();
		$data['menu_aktif'] = 'galery';
		$read = new galeri();
		$hash = md5($url);
		$read->where('hash', $hash);
		$read->or_where('id_galeri', $id);
		$data['read'] = $read->get();
		if ($data['read']->id_galeri == "") {
			redirect('error');
		}
		$data['title'] = $data['read']->title_galeri . " | Naomi bauty skin";
		$data['meta_description'] = $data['read']->title_galeri . " | Naomi bauty skin";
		$data['meta_keyword'] = $data['read']->title_galeri;
		$update = new galeri();
		$recent = $galeri;
		$update->where('id_galeri', $data['read']->id_galeri)->update('dilihat', $data['read']->dilihat + 1);
		$recent->order_by('dilihat', 'DESC');
		$recent->limit(8);
		$data['recent'] = $recent->get();

		$foto_galeri=new Foto_galeri();
		
		//$foto_galeri->where('id_galeri',$data['read']->id_galeri);
		$foto_galeri->where('id_galeri',$id);
		$jml_ft=new Foto_galeri();
		$jml_ft->where('id_galeri',$id);
		//$foto_galeri->limit();
		$data['foto_galeri']=$foto_galeri->get(1,$paging);
		$config['total_rows'] = $jml_ft->count();	
		$this->load->library('pagination');
		$this->load->library('table');
		
		
		$config['base_url'] = base_url() . "galery/show_image/$url/$id";
		//jumlah total data
		
		//jumlah data per halaman
		$config['per_page'] = 1;
		//jumah link no halaman
		$config['num_links'] = 2;
		$config['uri_segment'] = 5;
		$config['first_link'] = '<span  style="display:none;">Gambar Sebelumnya</span>';
		$config['last_link'] = '<span style="display:none;">Gambar Selanjutnya</span>';
		//class bootstrap untuk  halaman berikutnya
		$config['next_link'] = '<span class="">Gambar Selanjutnya</span>';
		//class bootstrap untuk  halaman sebelumnya
		$config['prev_link'] = '<span class="">Gambar Sebelumnya</span>';
		// inisialisasi paging
		$this->pagination->initialize($config);
		// membuat paging dan disimpan dalam array $halaman
		$data['halaman'] = $this->pagination->create_links();
		// mengambil data per halaman
	
		$this->load->view('web/read_galery_m', $data);
	}

}
