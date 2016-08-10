<?php

class Paging {

    private $CI;

    function __construct() {
        
    }

    function pagination($base,$total_data,$potong_data,$per_page) {
        $CI = & get_instance();
        $CI->load->library('pagination');
        $CI->load->library('table');

        $config['base_url'] = $base;
        //jumlah total data
        $config['total_rows'] = $total_data;
        //jumlah data per halaman
        $config['per_page'] = $per_page;
        //jumah link no halaman 
        $config['num_links'] = 5;
        //segment URL yang akan dijadikan pemotongan data
        //baca di http://ozs.web.id/2014/08/membuat-url-dengan-class-url-di-codeigniter/
        $config['uri_segment'] = $potong_data;
        // awal membuka penomoran 
        // menggunakan class bootstrap
        $config['full_tag_open'] = '<ul class="pagination">';
        // akhi membuka penomoran 
        $config['full_tag_close'] = '</ul>';
        //pembuka link ke awal data
        $config['first_tag_open'] = '<li>';
        //penutup link ke akhir data
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        //class untuk halaman aktif
        $config['cur_tag_open'] = '<li class="active"><a href="#"><span class="sr-only">(current)</span>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //class bootstrap untuk awal halaman
        $config['first_link'] = '<span class="glyphicon glyphicon-fast-backward"></span>';
        //class bootstrap untuk akhir halaman
        $config['last_link'] = '<span class="glyphicon glyphicon-fast-forward"></span>';
        //class bootstrap untuk  halaman berikutnya
        $config['next_link'] = '<span class="glyphicon glyphicon-step-forward"></span>';
        //class bootstrap untuk  halaman sebelumnya
        $config['prev_link'] = '<span class="glyphicon glyphicon-step-backward"></span>';
        // inisialisasi paging
        $CI->pagination->initialize($config);
        // membuat paging dan disimpan dalam array $halaman
        $data_return = $CI->pagination->create_links();
        return $data_return;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

