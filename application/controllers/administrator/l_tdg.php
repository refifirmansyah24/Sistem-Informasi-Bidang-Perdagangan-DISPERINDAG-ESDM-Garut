<?php 
//CONTROLLER DATA JABATAN 
    class L_Tdg extends CI_Controller{ 
       public function index() 
       { 
        $data['tdg'] = $this->tdg_model->get_data('tdg')->result();
        $this->load->view('templates_lp/header',$data);
        $this->load->view('administrator/l_tdg',$data);
        $this->load->view('templates_lp/footer',$data);

       }
       
       public function cari_data()
       {
           $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL
       
           // Panggil model atau sumber data Anda untuk melakukan pencarian
           $data['tdg'] = $this->tdg_model->cariData($keyword);
       
           // Load view dengan data hasil pencarian
           $this->load->view('templates_lp/header',$data);
           $this->load->view('administrator/l_tdg',$data);
           $this->load->view('templates_lp/footer',$data);
       }
       
       

    }
?>