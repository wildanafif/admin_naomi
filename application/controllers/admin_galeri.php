<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_galeri extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->library(array('ion_auth'));
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth', 'refresh');
		}
		$this->load->library('session');
	}

	function index() {
		$galeri = new Galeri();
		$galeri->order_by("id_galeri", "desc");
		$data['aktif'] = 'galeri';
		$data['galeri'] = $galeri->get();
		$this->load->view('admin/galeri', $data);
	}

	function add_galeri() {
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_galeri', 'judul_galeri', 'required');
			$this->form_validation->set_rules('deskripsi_galeri', 'deskripsi_galeri', 'required');


			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal menambahkan, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_galeri");
			}
			$galeri = new Galeri();
			$cek = false;
			$nn = 0;
			$this->load->library('tanggal');
			$this->load->library('hash');
			$tanggal = date("Y-m-d");
			$tanggal = $this->tanggal->get_tanggal($tanggal);
			$judul_galeri = $this->input->post('judul_galeri');
			$deskripsi_galeri = $this->input->post('deskripsi_galeri');
			$url = $this->hash->get_hash($judul_galeri);
			$id_galeri = time();
			foreach ($_FILES['gambar']['name'] as $key => $val) {
				$name = $_FILES['gambar']['name'][$key];
				$tmp = $_FILES['gambar']['tmp_name'][$key];

				echo $name . "<br>";

				if (trim($name) != '') {
					$cek = true;
					$new_name = 'assets/images/galeri_images/' . rand(0, 999999999) . date('YmdHis') . $name;
					if (move_uploaded_file($tmp, $new_name)) {
						$this->load->library('image_resize');
						$this->image_resize->compress_image($new_name, $new_name, 10);
						$foto_galeri = new Foto_galeri();
						$foto_galeri->id_foto_galeri = time() . rand(0, 99);
						$foto_galeri->id_galeri = $id_galeri;
						$foto_galeri->url_foto = $new_name;
						$foto_galeri->save();

						if ($nn == 0) {
							$gambar_utama = $new_name;
						}
						$nn++;
					}
				}
			}
			if (!$cek) {
				echo 'assa';
				$this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal menambahkan, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_galeri");
			} else {
				$galeri->id_galeri = $id_galeri;
				$galeri->title_galeri = $judul_galeri;
				$galeri->deskripsi_galeri = $deskripsi_galeri;
				$galeri->tgl_galeri = $tanggal;
				$galeri->url = $url['kata'];
				$galeri->hash = $url['hash'];
				$galeri->gambar_galeri = $gambar_utama;
				if ($galeri->save()) {
					$this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Berhasil menambahkan galeri</div>');
					redirect("admin_galeri/");
				}
			}
		}
	}

	function delete_galeri($id = null) {
		$galeri = new Galeri();
		//$id = intval($id);
		if ($galeri->delete_galeri($id)) {

			$foto_galeri = new Foto_galeri();
			$foto_galeri->where('id_galeri', $id);
			$foto = $foto_galeri->get();
			foreach ($foto as $key) {
				unlink($key->url_foto);
			}
			if ($foto_galeri->delete_galeri($id)) {
				$this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Berhasil menghapus galeri</div>');
				redirect("admin_galeri");
			}
		}
	}

	function edit_galeri($id = null) {
		$galeri = new Galeri();
		//$id = intval($id);
		$galeri->where('id_galeri', $id);
		$data_galeri = $galeri->get();
		$data['id_galeri'] = $id;
		$data['title_galeri'] = $data_galeri->title_galeri;
		$data['deskripsi_galeri'] = $data_galeri->deskripsi_galeri;
		$data['gambar_galeri'] = $data_galeri->gambar_galeri;
		$foto_galeri = new Foto_galeri();
		$foto_galeri->where('id_galeri', $id);
		$data['aktif'] = 'galeri';
		$data['foto_galeri'] = $foto_galeri->get();
		$this->load->view('admin/edit_galeri', $data);
	}

	function save_edit() {
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('judul_galeri', 'judul_galeri', 'required');
			$this->form_validation->set_rules('deskripsi_galeri', 'deskripsi_galeri', 'required');
			$id_galeri = $this->input->post('id_galeri');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_galeri/edit_galeri/$id_galeri");
			} else {
				$galeri = new Galeri();
				$judul_galeri = $this->input->post('judul_galeri');
				$deskripsi_galeri = $this->input->post('deskripsi_galeri');

				$data_update = array(
                    'title_galeri' => $judul_galeri,
                    'deskripsi_galeri' => $deskripsi_galeri,
				);

				if ($galeri->where('id_galeri', $id_galeri)->update($data_update)) {
					$this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');

					redirect("admin_galeri/edit_galeri/$id_galeri");
				}
			}
		}
	}

	function delete_foto_galeri($id = null) {

		$foto_galeri = new Foto_galeri();
		$foto_galeri->where('id_foto_galeri', $id);
		echo $id;
		$data_foto = $foto_galeri->get();
		$id_galeri = $data_foto->id_galeri;
		$delete = $data_foto->url_foto;
		echo $delete;
		if ($foto_galeri->delete_foto_galeri($id)) {
			unlink($delete);
			$this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Data gambar berhasil di hapus</div>');

			redirect('admin_galeri/edit_galeri/' . $id_galeri);
		}
	}

	function add_foto_galeri() {
		if ($this->input->post('submit')) {
			$cek = false;
			$id_galeri = $this->input->post('id_galeri');
			foreach ($_FILES['gambar']['name'] as $key => $val) {
				$name = $_FILES['gambar']['name'][$key];
				$tmp = $_FILES['gambar']['tmp_name'][$key];

				//echo $name . "<br>";

				if (trim($name) != '') {
					$cek = true;
					$new_name = 'assets/images/galeri_images/' . rand(0, 999999999) . date('YmdHis') . $name;
					if (move_uploaded_file($tmp, $new_name)) {
						$this->load->library('image_resize');
						$this->image_resize->compress_image($new_name, $new_name, 10);
						$foto_galeri = new Foto_galeri();
						$foto_galeri->id_foto_galeri = time() . rand(0, 99);
						$foto_galeri->id_galeri = $id_galeri;
						$foto_galeri->url_foto = $new_name;
						$foto_galeri->save();
					}
				}
			}
			if (!$cek) {
				echo 'assa';
				$this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal menambahkan, Sepertinya Masih ada yang kosong</div>');
				redirect("admin_galeri/edit_galeri/$id_galeri");
			}
			$this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Berhasil menambahkan Gambar galeri</div>');
			redirect("admin_galeri/edit_galeri/$id_galeri");
		}
	}

	function set_gambar_utama() {
		$id_foto_galeri = $this->uri->segment(3);
		$id_galeri = $this->uri->segment(4);
		$foto_galeri = new Foto_galeri();
		$foto_galeri->where('id_foto_galeri', $id_foto_galeri);
		$foto_galeri->get();
		$url_foto = $foto_galeri->url_foto;
		$galeri = new Galeri();
		//        echo $id_galeri;
		echo $url_foto;
		if ($galeri->where('id_galeri', $id_galeri)->update('gambar_galeri', $url_foto)) {
			$this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Berhasil memperbarui Gambar utama galeri</div>');
			redirect("admin_galeri/edit_galeri/$id_galeri");
		}
	}

	function tambah_galeri() {
		$data['aktif'] = 'galeri';

		$this->load->view('admin/tambah_galeri', $data);
	}

}
