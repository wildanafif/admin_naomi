<?php
class Admin_produk extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->library(array('ion_auth'));
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth', 'refresh');
		}
		$this->load->library('session');

	}

	function index(){
		$produk=new Produk();
		$produk->get();
		$data['aktif']='produk';

		$this->load->view('admin/produk',$data);


	}
	function add_produk(){
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_produk', 'judul_produk', 'required');
			$this->form_validation->set_rules('deskripsi_produk', 'deskripsi_produk', 'required');


			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('item','<div class="alert alert-danger" role="alert">Gagal menambahkan, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_produk/");
			}
			else
			{
				$produk=new produk();
				date_default_timezone_set("Asia/Jakarta");
				$this->load->library('tanggal');
				$this->load->library('hash');
				$tanggal = date("Y-m-d");
				$tanggal = $this->tanggal->get_tanggal($tanggal);
				$judul_produk=$this->input->post('judul_produk');
				$deskripsi_produk=$this->input->post('deskripsi_produk');

				$url=$this->hash->get_hash($judul_produk);
				$config['upload_path'] = './assets/images/produk';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] =$judul_produk ;
				$config['remove_spaces'] = true ;


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error =  $this->upload->display_errors();

					echo $error;
					$produk->id_produk			=	time();
					$produk->title_produk		=	$judul_produk;
					$produk->deskripsi_produk	=	$deskripsi_produk;
					$produk->tgl_produk			=	$tanggal;
					$produk->url 				=	$url['kata'];
					$produk->hash 				=	$url['hash'];


					echo $error;
				}
				else
				{
					$data =  $this->upload->data();

					$produk->id_produk			=	time();
					$produk->title_produk		=	$judul_produk;
					$produk->deskripsi_produk	=	$deskripsi_produk;
					$produk->tgl_produk			=	$tanggal;
					$produk->url 				=	$url['kata'];
					$produk->hash 				=	$url['hash'];
					$produk->gambar_produk		=	$data['file_name'];


					echo $data['file_name'];
				}
				if ($produk->save()) {
					$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Berhasil menambahkan produk</div>');
					redirect("admin_produk/");
				}
					
			}
		}
	}

	function get_json_produk(){
		$produk=new produk();
		$data=$produk->get_json();
		echo json_encode($data) ;
	}
	function delete_produk($id_produk){
		$produk=new produk();
			
		$data=$produk->get_where(array('id_produk' => $id_produk));
		$hapus_gambar='./assets/images/produk/'.$data->gambar_produk;
		if ($data->gambar_produk	!=	'produk_default.jpg'){
			unlink($hapus_gambar);
		}
		$produk->delete_produk($id_produk);
		$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Berhasil menghapus produk</div>');
			
			
		redirect("admin_produk/");
	}

	function edit_produk($id_produk=null){
		$produk=new Produk();
		$produk->where('id_produk', $id_produk)->get();

		$data['aktif']='produk';
		$data['title_produk']=$produk->title_produk;
		$data['deskripsi_produk']=$produk->deskripsi_produk;
		$data['id_produk']=$produk->id_produk;
			

		$this->load->view('admin/edit_produk',$data);
	}

	function save_edit(){
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_produk', 'judul_produk', 'required');
			$this->form_validation->set_rules('deskripsi_produk', 'deskripsi_produk', 'required');


			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('item','<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_produk/");
			}
			else
			{
				$produk=new produk();
				date_default_timezone_set("Asia/Jakarta");
				$this->load->library('tanggal');
				$tanggal = date("Y-m-d");
				$tanggal = $this->tanggal->get_tanggal($tanggal);
				$judul_produk=$this->input->post('judul_produk');
				$deskripsi_produk=$this->input->post('deskripsi_produk');
				$id_produk=$this->input->post('id_produk');
				$data_gambar=$produk->get_where(array('id_produk' => $id_produk));
				$config['upload_path']		= 	'./assets/images/produk';
				$config['allowed_types'] 	= 	'gif|jpg|png';
				$config['file_name'] 		=	$judul_produk.time() ;
				$config['remove_spaces'] 	= 	true ;


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error =  $this->upload->display_errors();

					echo $error;
					$data_update = array(
							'title_produk' =>	$judul_produk ,
							'deskripsi_produk'	=>	$deskripsi_produk,
					);

				}
				else
				{
					$data =  $this->upload->data();
					$new_file_name=$data['file_name'];
					$data_update = array(
							'title_produk' =>	$judul_produk ,
							'deskripsi_produk'	=>	$deskripsi_produk,
							'gambar_produk'		=>	$new_file_name
					);
					if ($data_gambar->gambar_produk != 'produk_default.jpg'){
						unlink('./assets/images/produk/'.$data_gambar->gambar_produk);
					}
				}
				if ($produk->where('id_produk', $id_produk)->update($data_update)) {
					$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');

					redirect("admin_produk/");
				}
					
			}
		}
	}
}