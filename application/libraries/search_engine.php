<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Search_engine {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->database();
    }

    function get_jumlah($kalimat) {
        $CI = & get_instance();
        $cari = $kalimat;
        $explode_cari = explode(" ", $cari);
        $array_temp = 0;
        $construct = "";
        foreach ($explode_cari as $key) {

            if ($key == "") {
                break;
            }
            if ($array_temp == 0) {
                $construct .="judul_iklan LIKE '%$key%'";
            } else {
                $construct .="OR judul_iklan LIKE '%$key%'";
            }


            $array_temp++;
        }
        $construct = "SELECT * FROM iklan WHERE $construct ";
        $query = $CI->db->query($construct);
        $row = $query->result();
        $temp_hasil = null;
        $hasil_semen = null;
        $index = 0;

        foreach ($row as $runrows) {
            $title = $runrows->judul_iklan;
            $explode_title = explode(" ", $title);
            $i = 0;
            $jumnlah_per_judul_yang_ditemukan = 0;
            foreach ($explode_cari as $value) {
                foreach ($explode_title as $hasil) {
                    $lower_hasil = strtolower($hasil);
                    $lower_cari = strtolower($value);
                    if ($lower_hasil == $lower_cari) {
                        $jumnlah_per_judul_yang_ditemukan = $jumnlah_per_judul_yang_ditemukan + 1;
                    }
                }
            }$arrayName = array($jumnlah_per_judul_yang_ditemukan);

            $temp_hasil[$index] = $jumnlah_per_judul_yang_ditemukan;
            $hasil_semen[$index] = $runrows;

            $index++;
        }
        $fix_hasil = null;

        $index_fix = 0;
        if ($temp_hasil == NULL) {
            $jml = null;
        } else {

            arsort($temp_hasil);
            // echo "<br>--------------------------------------<br>";
            foreach ($temp_hasil as $coba => $value) {
                // echo "$coba=$value<br>";
                # code...
                $fix_hasil[$index_fix] = $hasil_semen[$coba];

                $index_fix++;
            }

            $jml = count($fix_hasil);
        }

        return $jml;
    }

    function get_konten($mulai, $akhir, $kalimat) {
        $CI = & get_instance();
        $cari = $kalimat;
        $explode_cari = explode(" ", $cari);
        $array_temp = 0;
        $construct = "";
        foreach ($explode_cari as $key) {
            if ($key == "") {
                break;
            }

            if ($array_temp == 0) {
                $construct .="judul_iklan LIKE '%$key%'";
            } else {
                $construct .="OR judul_iklan LIKE '%$key%'";
            }


            $array_temp++;
        }
        $construct = "SELECT * FROM iklan WHERE $construct ";

        $query = $CI->db->query($construct);
        $row = $query->result();
        $temp_hasil = null;
        $hasil_semen = null;
        $index = 0;
        ;
        foreach ($row as $runrows) {

            $title = $runrows->judul_iklan;
            $explode_title = explode(" ", $title);
            $i = 0;
            $jumnlah_per_judul_yang_ditemukan = 0;
            foreach ($explode_cari as $value) {
                foreach ($explode_title as $hasil) {
                    $lower_hasil = strtolower($hasil);
                    $lower_cari = strtolower($value);
                    if ($lower_hasil == $lower_cari) {
                        $jumnlah_per_judul_yang_ditemukan = $jumnlah_per_judul_yang_ditemukan + 1;
                    }
                }
            }$arrayName = array($jumnlah_per_judul_yang_ditemukan);

            $temp_hasil[$index] = $jumnlah_per_judul_yang_ditemukan;
            $hasil_semen[$index] = $runrows;

            $index++;
        }
        $fix_hasil = null;
        $index_start = $mulai;
        $index_fix = 0;
        $index_stop = $akhir;
        if ($temp_hasil == NULL) {
            $fix_hasil = NULL;
        } else {
            arsort($temp_hasil);
            // echo "<br>--------------------------------------<br>";
            foreach ($temp_hasil as $coba => $value) {
                if ($index_fix >= $mulai && $index_fix <= $akhir) {
                    # code...
                    $fix_hasil[$index_fix] = $hasil_semen[$coba];
                }
                if ($index_fix == $akhir) {
                    break;
                }
                $index_fix++;
            }
        }

        return $fix_hasil;
    }

    function get_jumlah_where($kalimat, $where) {
        $CI = & get_instance();
        $cari = $kalimat;
        $explode_cari = explode(" ", $cari);
        $array_temp = 0;
        $construct = "";
        foreach ($explode_cari as $key) {

            if ($key == "") {
                break;
            }
            if ($array_temp == 0) {
                $construct .="$where AND (judul_iklan LIKE '%$key%'";
            } else {
                $construct .=" OR judul_iklan LIKE '%$key%'";
            }


            $array_temp++;
        }
        $construct.=")";
        $construct = "SELECT * FROM iklan WHERE $construct ";
        $query = $CI->db->query($construct);
        $row = $query->result();
        $temp_hasil = null;
        $hasil_semen = null;
        $index = 0;

        foreach ($row as $runrows) {
            $title = $runrows->judul_iklan;
            $explode_title = explode(" ", $title);
            $i = 0;
            $jumnlah_per_judul_yang_ditemukan = 0;
            foreach ($explode_cari as $value) {
                foreach ($explode_title as $hasil) {
                    $lower_hasil = strtolower($hasil);
                    $lower_cari = strtolower($value);
                    if ($lower_hasil == $lower_cari) {
                        $jumnlah_per_judul_yang_ditemukan = $jumnlah_per_judul_yang_ditemukan + 1;
                    }
                }
            }$arrayName = array($jumnlah_per_judul_yang_ditemukan);

            $temp_hasil[$index] = $jumnlah_per_judul_yang_ditemukan;
            $hasil_semen[$index] = $runrows;

            $index++;
        }
        $fix_hasil = null;

        $index_fix = 0;
        if ($temp_hasil == NULL) {
            $jml = null;
        } else {

            arsort($temp_hasil);
            // echo "<br>--------------------------------------<br>";
            foreach ($temp_hasil as $coba => $value) {
                // echo "$coba=$value<br>";
                # code...
                $fix_hasil[$index_fix] = $hasil_semen[$coba];

                $index_fix++;
            }

            $jml = count($fix_hasil);
        }

        return $jml;
    }
    function get_konten_where($mulai, $akhir, $kalimat , $where) {
        $CI = & get_instance();
        $cari = $kalimat;
        $explode_cari = explode(" ", $cari);
        $array_temp = 0;
        $construct = "";
        foreach ($explode_cari as $key) {
            if ($key == "") {
                break;
            }

            if ($array_temp == 0) {
                $construct .="$where AND (judul_iklan LIKE '%$key%'";
            } else {
                $construct .="OR judul_iklan LIKE '%$key%'";
            }


            $array_temp++;
        }
        $construct.=")";
        $construct = "SELECT * FROM iklan WHERE $construct ";

        $query = $CI->db->query($construct);
        $row = $query->result();
        $temp_hasil = null;
        $hasil_semen = null;
        $index = 0;
        ;
        foreach ($row as $runrows) {

            $title = $runrows->judul_iklan;
            $explode_title = explode(" ", $title);
            $i = 0;
            $jumnlah_per_judul_yang_ditemukan = 0;
            foreach ($explode_cari as $value) {
                foreach ($explode_title as $hasil) {
                    $lower_hasil = strtolower($hasil);
                    $lower_cari = strtolower($value);
                    if ($lower_hasil == $lower_cari) {
                        $jumnlah_per_judul_yang_ditemukan = $jumnlah_per_judul_yang_ditemukan + 1;
                    }
                }
            }$arrayName = array($jumnlah_per_judul_yang_ditemukan);

            $temp_hasil[$index] = $jumnlah_per_judul_yang_ditemukan;
            $hasil_semen[$index] = $runrows;

            $index++;
        }
        $fix_hasil = null;
        $index_start = $mulai;
        $index_fix = 0;
        $index_stop = $akhir;
        if ($temp_hasil == NULL) {
            $fix_hasil = NULL;
        } else {
            arsort($temp_hasil);
            // echo "<br>--------------------------------------<br>";
            foreach ($temp_hasil as $coba => $value) {
                if ($index_fix >= $mulai && $index_fix <= $akhir) {
                    # code...
                    $fix_hasil[$index_fix] = $hasil_semen[$coba];
                }
                if ($index_fix == $akhir) {
                    break;
                }
                $index_fix++;
            }
        }

        return $fix_hasil;
    }

}
