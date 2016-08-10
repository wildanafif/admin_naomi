<?php
class Tanggal {

    private $CI;

    function __construct() {
      
    }

    function get_tanggal($date){
    	$bulan=array(
                '01'=>'Januari',
                '02'=>'Februari',
                '03'=>'Maret',
                '04'=>'April',
                '05'=>'Mei',
                '06'=>'Juni',
                '07'=>'Juli',
                '08'=>'Agustus',
                '09'=>'September',
                '10'=>'Oktober',
                '11'=>'November',
                '12'=>'Desember',
             );
		$pecah=explode('-',$date);
		$tgl=$pecah[2];
		$bln=$pecah[1];
		$thn=$pecah[0];
		return $tgl.' '.$bulan[$bln].' '.$thn;
    }

}