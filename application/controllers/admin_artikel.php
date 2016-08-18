<?php
class Admin_artikel extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->library(array('ion_auth'));
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth', 'refresh');
		}
		$this->load->library('session');

	}

	function index(){
		$artikel=new artikel();
		$artikel->get();
		$data['aktif']='artikel';

		$this->load->view('admin/artikel',$data);


	}
	function add_artikel(){
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_artikel', 'judul_artikel', 'required');
			$this->form_validation->set_rules('deskripsi_artikel', 'deskripsi_artikel', 'required');


			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('item','<div class="alert alert-danger" role="alert">Gagal menambahkan, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_artikel/");
			}
			else
			{
				$artikel=new Artikel();
				date_default_timezone_set("Asia/Jakarta");
				$this->load->library('tanggal');
				$this->load->library('hash');
				$tanggal = date("Y-m-d");
				$tanggal = $this->tanggal->get_tanggal($tanggal);
				$judul_artikel=$this->input->post('judul_artikel');
				$deskripsi_artikel=$this->input->post('deskripsi_artikel');

				$url=$this->hash->get_hash($judul_artikel);
				$config['upload_path'] = './assets/images/artikel';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] =$judul_artikel ;
				$config['remove_spaces'] = true ;


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error =  $this->upload->display_errors();

					echo $error;
					$artikel->id_artikel			=	time();
					$artikel->title_artikel		=	$judul_artikel;
					$artikel->deskripsi_artikel	=	$deskripsi_artikel;
					$artikel->tgl_artikel			=	$tanggal;
					$artikel->url 				=	$url['kata'];
					$artikel->hash 				=	$url['hash'];


					echo $error;
				}
				else
				{
					$data =  $this->upload->data();

					$artikel->id_artikel			=	time();
					$artikel->title_artikel		=	$judul_artikel;
					$artikel->deskripsi_artikel	=	$deskripsi_artikel;
					$artikel->tgl_artikel			=	$tanggal;
					$artikel->url 				=	$url['kata'];
					$artikel->hash 				=	$url['hash'];
					$artikel->gambar_artikel		=	$data['file_name'];


					echo $data['file_name'];
				}
				if ($artikel->save()) {
					$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Berhasil menambahkan artikel</div>');
					redirect("admin_artikel/");
				}
					
			}
		}
	}

	function get_json_artikel(){
		$artikel=new Artikel();
		$data=$artikel->get_json();
		echo json_encode($data) ;
	}
	function delete_artikel($id_artikel=null){
		$artikel=new Artikel();
			
		$data=$artikel->get_where(array('id_artikel' => $id_artikel));
		$hapus_gambar='./assets/images/artikel/'.$data->gambar_artikel;
		if ($data->gambar_artikel	!=	'artikel_default.jpg'){
			unlink($hapus_gambar);
		}
		$artikel->delete_artikel($id_artikel);
		$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Berhasil menghapus artikel</div>');
			
			
		redirect("admin_artikel/");
	}

	function edit_artikel($id_artikel=null){
		$artikel=new Artikel();
		$artikel->where('id_artikel', $id_artikel)->get();

		$data['aktif']='artikel';
		$data['title_artikel']=$artikel->title_artikel;
		$data['deskripsi_artikel']=$artikel->deskripsi_artikel;
		$data['id_artikel']=$artikel->id_artikel;
			

		$this->load->view('admin/edit_artikel',$data);
	}

	function save_edit(){
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_artikel', 'judul_artikel', 'required');
			$this->form_validation->set_rules('deskripsi_artikel', 'deskripsi_artikel', 'required');


			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('item','<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_artikel/");
			}
			else
			{
				$artikel=new Artikel();
				date_default_timezone_set("Asia/Jakarta");
				$this->load->library('tanggal');
				$tanggal = date("Y-m-d");
				$tanggal = $this->tanggal->get_tanggal($tanggal);
				$judul_artikel=$this->input->post('judul_artikel');
				$deskripsi_artikel=$this->input->post('deskripsi_artikel');
				$id_artikel=$this->input->post('id_artikel');
				$data_gambar=$artikel->get_where(array('id_artikel' => $id_artikel));
				$config['upload_path']		= 	'./assets/images/artikel';
				$config['allowed_types'] 	= 	'gif|jpg|png';
				$config['file_name'] 		=	$judul_artikel.time() ;
				$config['remove_spaces'] 	= 	true ;


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error =  $this->upload->display_errors();

					echo $error;
					$data_update = array(
							'title_artikel' =>	$judul_artikel ,
							'deskripsi_artikel'	=>	$deskripsi_artikel,
					);

				}
				else
				{
					$data =  $this->upload->data();
					$new_file_name=$data['file_name'];
					$data_update = array(
							'title_artikel' =>	$judul_artikel ,
							'deskripsi_artikel'	=>	$deskripsi_artikel,
							'gambar_artikel'		=>	$new_file_name
					);
					if ($data_gambar->gambar_artikel != 'artikel_default.jpg'){
						unlink('./assets/images/artikel/'.$data_gambar->gambar_artikel);
					}
				}
				if ($artikel->where('id_artikel', $id_artikel)->update($data_update)) {
					$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');

					redirect("admin_artikel/");
				}
					
			}
		}
	}
}