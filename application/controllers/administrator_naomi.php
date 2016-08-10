<?php

class Administrator_naomi extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->library('session');

	}

	function index(){
		$layanan=new layanan();
		$layanan->get();
		$data['aktif']='beranda';

		$this->load->view('admin/dahboard',$data);
		// redirect(site_url().'search/all');


	}
	function services(){
		$layanan=new layanan();
		$layanan->get();
		$data['aktif']='layanan';

		$this->load->view('admin/services',$data);
	}

	function get_json_layanan(){
		$layanan=new layanan();
		$data=$layanan->get_json();
		echo json_encode($data) ;
	}

	function add_services(){
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_layanan', 'judul_layanan', 'required');
			$this->form_validation->set_rules('isi_layanan', 'isi_layanan', 'required');


			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('item','<div class="alert alert-danger" role="alert">Gagal menambahkan, Sepertinya Masih ada yang kosong</div>');
				redirect("administrator_naomi/services");
			}
			else
			{
				$layanan=new layanan();
				date_default_timezone_set("Asia/Jakarta");
				$this->load->library('tanggal');
				$this->load->library('hash');
				$tanggal = date("Y-m-d");
				$tanggal = $this->tanggal->get_tanggal($tanggal);
				$judul_layanan=$this->input->post('judul_layanan');
				$isi_layanan=$this->input->post('isi_layanan');

				$url=$this->hash->get_hash($judul_layanan);
				$config['upload_path'] = './assets/images/layanan';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] =$judul_layanan ;
				$config['remove_spaces'] = true ;


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error =  $this->upload->display_errors();

					echo $error;
					$layanan->id_layanan	=	time();
					$layanan->title_layanan	=	$judul_layanan;
					$layanan->isi_layanan	=	$isi_layanan;
					$layanan->tgl_layanan	=	$tanggal;
					$layanan->url 			=	$url['kata'];
					$layanan->hash 			=	$url['hash'];


					echo $error;
				}
				else
				{
					$data =  $this->upload->data();

					$layanan->id_layanan	=	time();
					$layanan->title_layanan	=	$judul_layanan;
					$layanan->isi_layanan	=	$isi_layanan;
					$layanan->gambar		=	$data['file_name'];
					$layanan->tgl_layanan	=	$tanggal;
					$layanan->url 			=	$url['kata'];
					$layanan->hash 			=	$url['hash'];

					echo $data['file_name'];
				}
				if ($layanan->save()) {
					$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Berhasil menambahkan layanan</div>');
					redirect("administrator_naomi/services");
				}
					
			}
		}

	}

	function delete_layanan($id_layanan){
		//echo $id_layanan;
		$layanan=new layanan();
		 
		$data=$layanan->get_where(array('id_layanan' => $id_layanan));
		$hapus_gambar='./assets/images/layanan/'.$data->gambar;
		if ($data->gambar	!=	'layanan_default.jpg'){
			unlink($hapus_gambar);
		}
		$layanan->delete_layanan($id_layanan);
		$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Berhasil menghapus layanan</div>');
			
		 
		redirect("administrator_naomi/services");
	}

	function edit_layanan($id){
		$layanan=new layanan();
		$layanan->where('id_layanan', $id)->get();

		$data['aktif']='layanan';
		$data['title_layanan']=$layanan->title_layanan;
		$data['isi_layanan']=$layanan->isi_layanan;
		$data['id_layanan']=$layanan->id_layanan;
		 

		$this->load->view('admin/edit_layanan',$data);

	}

	function save_edit_layanan(){
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_layanan', 'judul_layanan', 'required');
			$this->form_validation->set_rules('isi_layanan', 'isi_layanan', 'required');


			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('item','<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
				redirect("administrator_naomi/services");
			}
			else
			{
				$layanan=new layanan();
				date_default_timezone_set("Asia/Jakarta");
				$this->load->library('tanggal');
				$tanggal = date("Y-m-d");
				$tanggal = $this->tanggal->get_tanggal($tanggal);
				$judul_layanan=$this->input->post('judul_layanan');
				$isi_layanan=$this->input->post('isi_layanan');
				$id_layanan=$this->input->post('id_layanan');
				$data_gambar=$layanan->get_where(array('id_layanan' => $id_layanan));
				$config['upload_path']		= 	'./assets/images/layanan';
				$config['allowed_types'] 	= 	'gif|jpg|png';
				$config['file_name'] 		=	$judul_layanan.time() ;
				$config['remove_spaces'] 	= 	true ;


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error =  $this->upload->display_errors();

					echo $error;
					$data_update = array(
							'title_layanan' =>	$judul_layanan ,
							'isi_layanan'	=>	$isi_layanan,
					);
						
				}
				else
				{
					$data =  $this->upload->data();
					$new_file_name=$data['file_name'];
					$data_update = array(
							'title_layanan' =>	$judul_layanan ,
							'isi_layanan'	=>	$isi_layanan,
							'gambar'		=>	$new_file_name
					);
					if ($data_gambar->gambar != 'layanan_default.jpg'){
						unlink('./assets/images/layanan/'.$data_gambar->gambar);
					}
				}
				if ($layanan->where('id_layanan', $id_layanan)->update($data_update)) {
					$this->session->set_flashdata('item','<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');

					redirect("administrator_naomi/services");
				}
					
			}
		}
	}





}
?>
