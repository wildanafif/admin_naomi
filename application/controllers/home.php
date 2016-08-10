<?php

class Home extends CI_Controller {

    function __construct() {

        parent::__construct();
        
        
        }

        function index(){
           $layanan=new layanan();
           $layanan->get();
           $data['aktif']='beranda';
        
           $this->load->view('konten',$data);
           // redirect(site_url().'search/all');
            

        }
        function ind(){
            echo "adf";
        }

 


        
}
?>
