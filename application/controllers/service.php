<?php
class Service extends CI_Controller {

	function __construct() {

		parent::__construct();


	}

	function index(){
		$beranda=new Beranda();
		$pengaturan= new Pengaturan();
		$layanan= new Layanan();

		$pengaturan->where('id_pengaturan',0);
		$artikel=new Artikel();
		$artikel->order_by('id_artikel','DESC');
		$data['artikel']=$artikel->get(4);
		$galeri=new Galeri();
		$galeri->order_by('id_galeri','DESC');
		$data['galeri']=$galeri->get(6);
		$data['title']="Layanan di naomi beauty skin";
		$data['meta_description']="Layanan di naomi beauty skin";
		$data['layanan']=$layanan->get();
		$data['pengaturan']=$pengaturan->get();
		$data['beranda']=$beranda->get();
		$data['menu_aktif']='service';
		$this->load->view('web/service',$data);

	}

	function read($url=null,$id=null){
		$beranda=new Beranda();
		$pengaturan= new Pengaturan();
		$layanan= new Layanan();
		$artikel=new Artikel();
		$artikel->order_by('id_artikel','DESC');
		$data['artikel']=$artikel->get(4);
		$galeri=new Galeri();
		$galeri->order_by('id_galeri','DESC');
		$data['galeri']=$galeri->get(6);
		$pengaturan->where('id_pengaturan',0);

		$data['layanan']=$layanan->get();
		$data['pengaturan']=$pengaturan->get();
		$data['beranda']=$beranda->get();
		$data['menu_aktif']='service';
		$read=new Layanan();
		$hash=md5($url);
		$read->where('hash',$hash);
		$read->or_where('id_layanan',$id);
		$data['read']=$read->get();
		if ($data['read']->id_layanan == "") {
			redirect('error');
		}
		$data['title']=$data['read']->title_layanan." | Naomi bauty skin";
		$data['meta_description']=$data['read']->title_layanan." | Naomi bauty skin";
		$data['meta_keyword']=$data['read']->title_layanan;

		//echo $data['read']->title_layanan;
		$this->load->view('web/read_service',$data);
	}
}