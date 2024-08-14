<?php 
//CONTROLLER DATA JABATAN 
    class L_Agen extends CI_Controller{ 
       public function index() 
       { 
        $data['agen'] = $this->agen_model->get_data(); 
        $data['agen'] = $this->agen_model->getAgenWithPangkalanCount(); 
        $this->load->view('templates_lp/header',$data);
        $this->load->view('administrator/l_agen',$data);
        $this->load->view('templates_lp/footer',$data);

       }
       
       public function cari_data()
       {
           $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL
       
           // Panggil model atau sumber data Anda untuk melakukan pencarian
           $data['agen'] = $this->agen_model->cariData($keyword);
       
           // Load view dengan data hasil pencarian
           $this->load->view('templates_lp/header',$data);
           $this->load->view('administrator/l_agen',$data);
           $this->load->view('templates_lp/footer',$data);
       }
       
       

    }
?>