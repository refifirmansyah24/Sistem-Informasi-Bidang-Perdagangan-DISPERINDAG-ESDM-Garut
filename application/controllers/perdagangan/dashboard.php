<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (isset($this->session->userdata['username'])) {
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Login!
					<button type="button" class="close" data-dismis="allert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');

            redirect('administrator/auth');
        }
    }

    public function index()
    {
        $data= $this->user_model->ambil_data($this->session->userdata['username']);
			$data = array(
				'username' => $data->username,
				'level' => $data->level,
			);
        
        // Ambil data user
        $data_user = $this->user_model->ambil_data($this->session->userdata('username'));
        // Menghitung jumlah data agen
        $jumlah_agen = $this->agen_model->count_agen_data();
        // Menghitung jumlah data pangkalan
        $jumlah_pangkalan = $this->pangkalan_model->count_pangkalan_data();
        // Menghitung jumlah data spbe
        $jumlah_spbe = $this->spbe_model->count_spbe_data();
        // Menghitung jumlah data spbu
        $jumlah_spbu = $this->Spbu_model->count_spbu_data();
         // Menghitung jumlah data spbu
         $jumlah_pengajuan = $this->peng_rekom_model->count_pengajuan_data();
          // Menghitung jumlah data spbu
          $jumlah_tdg = $this->tdg_model->count_tdg_data();
           // Menghitung jumlah data spbu
           $jumlah_kpl = $this->kpl_model->count_kpl_data();

    

        // Gabungkan semua data dalam satu variabel $data
        $data = array(
            'username' => $data_user->username,
            'level' => $data_user->level,
            'jumlah_agen' => $jumlah_agen,
            'jumlah_pangkalan' => $jumlah_pangkalan,
            'jumlah_spbe' => $jumlah_spbe,
            'jumlah_spbu' => $jumlah_spbu,
            'jumlah_pengajuan' => $jumlah_pengajuan,
            'jumlah_tdg' => $jumlah_tdg,
            'jumlah_kpl' => $jumlah_kpl,
      
      
        );
        
        $this->load->view('templates_perdagangan/header');
        $this->load->view('templates_perdagangan/sidebar');
        $this->load->view('perdagangan/dashboard', $data);
        $this->load->view('templates_perdagangan/footer');
    }
}