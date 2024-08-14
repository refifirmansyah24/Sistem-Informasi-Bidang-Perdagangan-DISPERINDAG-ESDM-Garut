<?php 
//CONTROLLER DATA JABATAN 
    class L_Pangkalan extends CI_Controller{ 
       public function index() 
       { 
        $data['pangkalan'] = $this->pangkalan_model->get_data(); 
        $this->load->view('templates_lp/header',$data);
        $this->load->view('administrator/l_pangkalan',$data);
        $this->load->view('templates_lp/footer',$data);

       }
       
       public function cari_data()
       {
           $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL
       
           // Panggil model atau sumber data Anda untuk melakukan pencarian
           $data['pangkalan'] = $this->pangkalan_model->cariData($keyword);
       
           // Load view dengan data hasil pencarian
           $this->load->view('templates_lp/header',$data);
           $this->load->view('administrator/l_pangkalan',$data);
           $this->load->view('templates_lp/footer',$data);
       }
       
       

    }
?>