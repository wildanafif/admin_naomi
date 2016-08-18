<?php
class Admin_promosi extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->library(array('ion_auth'));
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth', 'refresh');
		}
		$this->load->library('session');

	}

	function index(){
		$promosi=new Promosi();
		$promosi->get();
		$data['aktif']='promosi';

		$this->load->view('admin/promosi',$data);


	}
	function add_promosi(){
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_promosi', 'judul_promosi', 'required');
			$this->form_validation->set_rules('deskripsi_promosi', 'deskripsi_promosi', 'required');


			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('item','<div class="alert alert-danger" role="alert">Gagal menambahkan, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_promosi/");
			}
			else
			{
				$promosi=new Promosi();
				date_default_timezone_set("Asia/Jakarta");
				$this->load->library('tanggal');
				$this->load->library('hash');
				$tanggal = date("Y-m-d");
				$tanggal = $this->tanggal->get_tanggal($tanggal);
				$judul_promosi=$this->input->post('judul_promosi');
				$deskripsi_promosi=$this->input->post('deskripsi_promosi');

				$url=$this->hash->get_hash($judul_promosi);
				$config['upload_path'] = './assets/images/promosi';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] =$judul_promosi ;
				$config['remove_spaces'] = true ;


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error =  $this->upload->display_errors();

					echo $error;
					$promosi->id_promosi			=	time();
					$promosi->title_promosi		=	$judul_promosi;
					$promosi->deskripsi_promosi	=	$deskripsi_promosi;
					$promosi->tgl_promosi			=	$tanggal;
					$promosi->url 				=	$url['kata'];
					$promosi->hash 				=	$url['hash'];


					echo $error;
				}
				else
				{
					$data =  $this->upload->data();

					$promosi->id_promosi			=	time();
					$promosi->title_promosi		=	$judul_promosi;
					$promosi->deskripsi_promosi	=	$deskripsi_promosi;
					$promosi->tgl_promosi			=	$tanggal;
					$promosi->url 				=	$url['kata'];
					$promosi->hash 				=	$url['hash'];
					$promosi->gambar_promosi		=	$data['file_name'];


					echo $data['file_name'];
				}
				if ($promosi->save()) {
					$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Berhasil menambahkan promosi</div>');
					redirect("admin_promosi/");
				}
					
			}
		}
	}

	function get_json_promosi(){
		$promosi=new Promosi();
		$data=$promosi->get_json();
		echo json_encode($data) ;
	}
	function delete_promosi($id_promosi=null){
		$promosi=new Promosi();
			
		$data=$promosi->get_where(array('id_promosi' => $id_promosi));
		$hapus_gambar='./assets/images/promosi/'.$data->gambar_promosi;
		if ($data->gambar_promosi	!=	'promosi_default.jpg'){
			unlink($hapus_gambar);
		}
		$promosi->delete_promosi($id_promosi);
		$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Berhasil menghapus promosi</div>');
			
			
		redirect("admin_promosi/");
	}

	function edit_promosi($id_promosi=null){
		$promosi=new Promosi();
		$promosi->where('id_promosi', $id_promosi)->get();

		$data['aktif']='promosi';
		$data['title_promosi']=$promosi->title_promosi;
		$data['deskripsi_promosi']=$promosi->deskripsi_promosi;
		$data['id_promosi']=$promosi->id_promosi;
			

		$this->load->view('admin/edit_promosi',$data);
	}

	function save_edit(){
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_promosi', 'judul_promosi', 'required');
			$this->form_validation->set_rules('deskripsi_promosi', 'deskripsi_promosi', 'required');


			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('item','<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_promosi/");
			}
			else
			{
				$promosi=new Promosi();
				date_default_timezone_set("Asia/Jakarta");
				$this->load->library('tanggal');
				$tanggal = date("Y-m-d");
				$tanggal = $this->tanggal->get_tanggal($tanggal);
				$judul_promosi=$this->input->post('judul_promosi');
				$deskripsi_promosi=$this->input->post('deskripsi_promosi');
				$id_promosi=$this->input->post('id_promosi');
				$data_gambar=$promosi->get_where(array('id_promosi' => $id_promosi));
				$config['upload_path']		= 	'./assets/images/promosi';
				$config['allowed_types'] 	= 	'gif|jpg|png';
				$config['file_name'] 		=	$judul_promosi.time() ;
				$config['remove_spaces'] 	= 	true ;


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error =  $this->upload->display_errors();

					echo $error;
					$data_update = array(
							'title_promosi' =>	$judul_promosi ,
							'deskripsi_promosi'	=>	$deskripsi_promosi,
					);

				}
				else
				{
					$data =  $this->upload->data();
					$new_file_name=$data['file_name'];
					$data_update = array(
							'title_promosi' =>	$judul_promosi ,
							'deskripsi_promosi'	=>	$deskripsi_promosi,
							'gambar_promosi'		=>	$new_file_name
					);
					if ($data_gambar->gambar_promosi != 'promosi_default.jpg'){
						unlink('./assets/images/promosi/'.$data_gambar->gambar_promosi);
					}
				}
				if ($promosi->where('id_promosi', $id_promosi)->update($data_update)) {
					$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');

					redirect("admin_promosi/");
				}
					
			}
		}
	}
}