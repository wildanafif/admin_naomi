<?php
class Hash {

    private $CI;

    function __construct() {
      
    }

    function get_hash($kata){
    	$replace=array('`','~','!','@','#','$','^','&','*','(',')','=','+','{','}','[',']',"'",'"','|','?','<','>','.',',','/','%');
    	$hash=$kata;
    	$judul=$kata;

    	foreach ($replace as $key) {
    		$kata=str_replace($key, "", $kata);
    	}
    	$kata=str_replace(" ", "-", $kata);

    	
    	$hash=md5($kata);
    	return array('kata'	=>	$kata,'hash'	=>	$hash);
    }

}