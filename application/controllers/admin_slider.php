<?php

class Admin_slider extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->library('session');
    }

    function index() {
        $slider = new slider();
        $data['slider'] = $slider->get();
        $data['aktif'] = 'slider';


        $this->load->view('admin/slider', $data);
    }

    function add_slider() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('judul_slider', 'judul_slider', 'required');
            $this->form_validation->set_rules('deskripsi_slider', 'deskripsi_slider', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal menambahkan, Sepertinya Masih ada yang kosong</div>');
                redirect("admin_slider/");
            } else {
                $slider = new Slider();
                date_default_timezone_set("Asia/Jakarta");
                $this->load->library('tanggal');


                $judul_slider = $this->input->post('judul_slider');
                $deskripsi_slider = $this->input->post('deskripsi_slider');


                $config['upload_path'] = './assets/images/slider';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $judul_slider;
                $config['remove_spaces'] = true;


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $error = $this->upload->display_errors();

                    $slider->id_slider = time();
                    $slider->title_slider = $judul_slider;
                    $slider->deskripsi_slider = $deskripsi_slider;
                } else {
                    $data = $this->upload->data();

                    $slider->id_slider = time();
                    $slider->title_slider = $judul_slider;
                    $slider->deskripsi_slider = $deskripsi_slider;

                    $slider->gambar_slider = $data['file_name'];
                    $this->load->library('image_resize');
                    $this->image_resize->compress_image("./assets/images/slider/" . $data['file_name'], "./assets/images/slider/" . $data['file_name'], 25);


                    echo $data['file_name'];
                }
                if ($slider->save()) {
                    $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Berhasil menambahkan slider</div>');
                    redirect("admin_slider/");
                }
            }
        }
    }

    function get_json_slider() {
        $slider = new Artikel();
        $data = $slider->get_json();
        echo json_encode($data);
    }

    function delete_slider($id_slider = null) {
        $slider = new Slider();

        $data = $slider->get_where(array('id_slider' => $id_slider));
        $hapus_gambar = './assets/images/slider/' . $data->gambar_slider;
        if ($data->gambar_slider != 'slider_default.jpg') {
            unlink($hapus_gambar);
        }
        $slider->delete_slider($id_slider);
        $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Berhasil menghapus slider</div>');


        redirect("admin_slider/");
    }

    function getJson_edit($id = null) {
        $slider = new Slider();
        $data = $slider->getJson_edit($id);
        echo json_encode($data);
    }

    function edit_slider($id_slider = null) {
        $slider = new Artikel();
        $slider->where('id_slider', $id_slider)->get();

        $data['aktif'] = 'slider';
        $data['title_slider'] = $slider->title_slider;
        $data['deskripsi_slider'] = $slider->deskripsi_slider;
        $data['id_slider'] = $slider->id_slider;


        $this->load->view('admin/edit_slider', $data);
    }

    function save_edit() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('judul_slider', 'judul_slider', 'required');
            $this->form_validation->set_rules('deskripsi_slider', 'deskripsi_slider', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
                redirect("admin_slider/");
            } else {
                $slider = new Slider();
                $judul_slider = $this->input->post('judul_slider');
                $deskripsi_slider = $this->input->post('deskripsi_slider');
                $id_slider = $this->input->post('id_slider');
                $data_update = array(
                    'title_slider' => $judul_slider,
                    'deskripsi_slider' => $deskripsi_slider
                );

                if ($slider->where('id_slider', $id_slider)->update($data_update)) {
                    $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');
                    redirect("admin_slider/");
                }
            }
        }
    }

}
