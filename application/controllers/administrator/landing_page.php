<?php 
//CONTROLLER DATA JABATAN 
    class LandingPage extends CI_Controller{ 
       public function index() 
       { 
        $data['title'] = "Landing Page";
        //controller navigasi
        $this->load->view('templates_lp/header',$data);
        $this->load->view('administrator/landing_page',$data);
        $this->load->view('templates_lp/footer');
       }

       

    }
?>