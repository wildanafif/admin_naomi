<?php

class Administrator_naomi extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->library('session');
    }

    function index() {
        $layanan = new Layanan();
        $layanan->get();
        $data['aktif'] = 'beranda';
        $tentang_kami = new Tentang_kami();
        $tentang_kami->where('id_tentang_kami', 0);
        $beranda = new Beranda();
        $beranda->where('id_beranda', 0);
        $pengaturan = new Pengaturan();
        $pengaturan->where('id_pengaturan', 0);
        $data['pengaturan'] = $pengaturan->get();
        $data['beranda'] = $beranda->get();
        $data['tentang_kami'] = $tentang_kami->get();


        $this->load->view('admin/dahboard', $data);
        // redirect(site_url().'search/all');
    }

    function pengaturan() {
        if ($this->input->post('submit')) {
            $pengaturan = new Pengaturan();
            $data_update = array(
                'slider' => $this->input->post('slider'),
                'services' => $this->input->post('services'),
                'promosi' => $this->input->post('promosi'),
                'tentang_kami' => $this->input->post('tentang_kami'),
                'why' => $this->input->post('why'),
                'galeri' => $this->input->post('galeri'),
                'news' => $this->input->post('news'),
                'testimoni' => $this->input->post('testimoni'),
                'kontak' => $this->input->post('kontak'),
                'sosmed' => $this->input->post('sosmed'),
                'navigasi_footer' => $this->input->post('navigasi_footer')
            );
            if ($pengaturan->where('id_pengaturan', 0)->update($data_update)) {
                $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Pengaturan berhasi disimpan    </div>');

                redirect("administrator_naomi/");
            }
        }
    }

    function why() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');


            $this->form_validation->set_rules('deskripsi_why', 'deskripsi_why', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
                redirect("administrator_naomi/");
            } else {
                $beranda = new Beranda();
                $beranda->where("id_beranda", 0);
                $data_gambar = $beranda->get();
                $deskripsi_why = $this->input->post('deskripsi_why');

                $config['upload_path'] = './assets/images/why';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = "mengapa_harus_naomi" . time();
                $config['remove_spaces'] = true;


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $error = $this->upload->display_errors();

                    echo $error;
                    $data_update = array(
                        'deskripsi_why' => $deskripsi_why,
                    );
                } else {
                    $data = $this->upload->data();
                    $new_file_name = "assets/images/why/" . $data['file_name'];
                    $data_update = array(
                        'title' => $title,
                        'why_gambar' => $new_file_name
                    );
                    $this->load->library('image_resize');
                    $this->image_resize->compress_image($new_file_name, $new_file_name, 25);
                    if ($data_gambar->why_gambar != 'layanan_default.jpg') {
                        unlink($data_gambar->why_gambar);
                    }
                }
                if ($beranda->where('id_beranda', 0)->update($data_update)) {
                    $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');

                    redirect("administrator_naomi/");
                }
            }
        }
    }

    function header() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');


            $this->form_validation->set_rules('title', 'title', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
                redirect("administrator_naomi/");
            } else {
                $beranda = new Beranda();
                $beranda->where("id_beranda", 0);
                $data_gambar = $beranda->get();
                $title = $this->input->post('title');

                $config['upload_path'] = './assets/images/beranda';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = "logo" . time();
                $config['remove_spaces'] = true;


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $error = $this->upload->display_errors();

                    echo $error;
                    $data_update = array(
                        'title' => $title,
                    );
                } else {
                    $data = $this->upload->data();
                    $new_file_name = "assets/images/beranda/" . $data['file_name'];
                    $data_update = array(
                        'title' => $title,
                        'gambar_logo' => $new_file_name
                    );
                    $this->load->library('image_resize');
                    $this->image_resize->compress_image($new_file_name, $new_file_name, 25);
                    if ($data_gambar->gambar != 'layanan_default.jpg') {
                        unlink($data_gambar->gambar_logo);
                    }
                }
                if ($beranda->where('id_beranda', 0)->update($data_update)) {
                    $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');

                    redirect("administrator_naomi/");
                }
            }
        }
    }

    function tentang_kami() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');


            $this->form_validation->set_rules('deskripsi_tentang_kami', 'deskripsi_tentang_kami', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
                redirect("administrator_naomi/");
            } else {
                $tentang_kami = new Tentang_kami();
                $tentang_kami->where("id_tentang_kami", 0);
                $data_gambar = $tentang_kami->get();
                date_default_timezone_set("Asia/Jakarta");

                $deskripsi_tentang_kami = $this->input->post('deskripsi_tentang_kami');

                $config['upload_path'] = './assets/images/tentang_kami';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = "tentang_kami" . time();
                $config['remove_spaces'] = true;


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $error = $this->upload->display_errors();

                    echo $error;
                    $data_update = array(
                        'deskripsi_tentang_kami' => $deskripsi_tentang_kami,
                    );
                } else {
                    $data = $this->upload->data();
                    $new_file_name = "assets/images/tentang_kami/" . $data['file_name'];
                    $data_update = array(
                        'deskripsi_tentang_kami' => $deskripsi_tentang_kami,
                        'gambar_tentang_kami' => $new_file_name
                    );
                    $this->load->library('image_resize');
                    $this->image_resize->compress_image($new_file_name, $new_file_name, 25);
                    if ($data_gambar->gambar != 'layanan_default.jpg') {
                        unlink($data_gambar->gambar_tentang_kami);
                    }
                }
                if ($tentang_kami->where('id_tentang_kami', 0)->update($data_update)) {
                    $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');

                    redirect("administrator_naomi/");
                }
            }
        }
    }

    function services() {
        $layanan = new Layanan();
        $layanan->get();
        $data['aktif'] = 'layanan';

        $this->load->view('admin/services', $data);
    }

    function get_json_layanan() {
        $layanan = new Layanan();
        $data = $layanan->get_json();
        echo json_encode($data);
    }

    function add_services() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('judul_layanan', 'judul_layanan', 'required');
            $this->form_validation->set_rules('isi_layanan', 'isi_layanan', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal menambahkan, Sepertinya Masih ada yang kosong</div>');
                redirect("administrator_naomi/services");
            } else {
                $layanan = new layanan();
                date_default_timezone_set("Asia/Jakarta");
                $this->load->library('tanggal');
                $this->load->library('hash');
                $tanggal = date("Y-m-d");
                $tanggal = $this->tanggal->get_tanggal($tanggal);
                $judul_layanan = $this->input->post('judul_layanan');
                $isi_layanan = $this->input->post('isi_layanan');

                $url = $this->hash->get_hash($judul_layanan);
                $config['upload_path'] = './assets/images/layanan';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $judul_layanan;
                $config['remove_spaces'] = true;


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $error = $this->upload->display_errors();

                    echo $error;
                    $layanan->id_layanan = time();
                    $layanan->title_layanan = $judul_layanan;
                    $layanan->isi_layanan = $isi_layanan;
                    $layanan->tgl_layanan = $tanggal;
                    $layanan->url = $url['kata'];
                    $layanan->hash = $url['hash'];


                    echo $error;
                } else {
                    $data = $this->upload->data();

                    $layanan->id_layanan = time();
                    $layanan->title_layanan = $judul_layanan;
                    $layanan->isi_layanan = $isi_layanan;
                    $layanan->gambar = $data['file_name'];
                    $layanan->tgl_layanan = $tanggal;
                    $layanan->url = $url['kata'];
                    $layanan->hash = $url['hash'];

                    echo $data['file_name'];
                }
                if ($layanan->save()) {
                    $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Berhasil menambahkan layanan</div>');
                    redirect("administrator_naomi/services");
                }
            }
        }
    }

    function delete_layanan($id_layanan = null) {
        //echo $id_layanan;
        $layanan = new layanan();

        $data = $layanan->get_where(array('id_layanan' => $id_layanan));
        $hapus_gambar = './assets/images/layanan/' . $data->gambar;
        if ($data->gambar != 'layanan_default.jpg') {
            unlink($hapus_gambar);
        }
        $layanan->delete_layanan($id_layanan);
        $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Berhasil menghapus layanan</div>');


        redirect("administrator_naomi/services");
    }

    function edit_layanan($id = null) {
        $layanan = new Layanan();
        $layanan->where('id_layanan', $id)->get();

        $data['aktif'] = 'layanan';
        $data['title_layanan'] = $layanan->title_layanan;
        $data['isi_layanan'] = $layanan->isi_layanan;
        $data['id_layanan'] = $layanan->id_layanan;


        $this->load->view('admin/edit_layanan', $data);
    }

    function save_edit_layanan() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('judul_layanan', 'judul_layanan', 'required');
            $this->form_validation->set_rules('isi_layanan', 'isi_layanan', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('item', '<div class="alert alert-danger" role="alert">Gagal memperbarui, Sepertinya Masih ada yang kosong</div>');
                redirect("administrator_naomi/services");
            } else {
                $layanan = new Layanan();
                date_default_timezone_set("Asia/Jakarta");
                $this->load->library('tanggal');
                $tanggal = date("Y-m-d");
                $tanggal = $this->tanggal->get_tanggal($tanggal);
                $judul_layanan = $this->input->post('judul_layanan');
                $isi_layanan = $this->input->post('isi_layanan');
                $id_layanan = $this->input->post('id_layanan');
                $data_gambar = $layanan->get_where(array('id_layanan' => $id_layanan));
                $config['upload_path'] = './assets/images/layanan';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $judul_layanan . time();
                $config['remove_spaces'] = true;


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $error = $this->upload->display_errors();

                    echo $error;
                    $data_update = array(
                        'title_layanan' => $judul_layanan,
                        'isi_layanan' => $isi_layanan,
                    );
                } else {
                    $data = $this->upload->data();
                    $new_file_name = $data['file_name'];
                    $data_update = array(
                        'title_layanan' => $judul_layanan,
                        'isi_layanan' => $isi_layanan,
                        'gambar' => $new_file_name
                    );
                    if ($data_gambar->gambar != 'layanan_default.jpg') {
                        unlink('./assets/images/layanan/' . $data_gambar->gambar);
                    }
                }
                if ($layanan->where('id_layanan', $id_layanan)->update($data_update)) {
                    $this->session->set_flashdata('item', '<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');

                    redirect("administrator_naomi/services");
                }
            }
        }
    }

}

?>
