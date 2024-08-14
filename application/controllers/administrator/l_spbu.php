<?php 
//CONTROLLER DATA JABATAN 
    class L_Spbu extends CI_Controller{ 
       public function index() 
       { 
        $data['spbu'] = $this->Spbu_model->get_data('spbu')->result();
        $this->load->view('templates_lp/header',$data);
        $this->load->view('administrator/l_spbu',$data);
        $this->load->view('templates_lp/footer',$data);

       }
       
       public function cari_data()
       {
           $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL
       
           // Panggil model atau sumber data Anda untuk melakukan pencarian
           $data['spbu'] = $this->Spbu_model->cariData($keyword);
       
           // Load view dengan data hasil pencarian
           $data['title'] ="Data SPBU";
           $this->load->view('templates_lp/header',$data);
           $this->load->view('administrator/l_spbu',$data);
           $this->load->view('templates_lp/footer',$data);
       }
       
       

    }
?>