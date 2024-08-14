<?php 
//CONTROLLER DATA JABATAN 
    class L_Spbe extends CI_Controller{ 
       public function index() 
       { 
        $data['spbe'] = $this->spbe_model->get_data('spbe')->result();
        $this->load->view('templates_lp/header',$data);
        $this->load->view('administrator/l_spbe',$data);
        $this->load->view('templates_lp/footer',$data);

       }
       
       public function cari_data()
       {
           $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL
       
           // Panggil model atau sumber data Anda untuk melakukan pencarian
           $data['spbe'] = $this->spbe_model->cariData($keyword);
       
           // Load view dengan data hasil pencarian
           $this->load->view('templates_lp/header',$data);
           $this->load->view('administrator/l_spbe',$data);
           $this->load->view('templates_lp/footer',$data);
       }
       
       

    }
?>