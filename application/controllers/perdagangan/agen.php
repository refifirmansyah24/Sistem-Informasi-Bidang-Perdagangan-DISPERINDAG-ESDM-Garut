<?php

class Agen extends CI_Controller{

    public function __construct()
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
    
public function index(){
    $data = $this->user_model->ambil_data($this->session->userdata['username']);
    $data = array(
        'username' => $data->username,
        'level' => $data->level,
    );
    if ($this->session->userdata('level') === 'Admin Perdagangan') {
    $data['title'] ="Data Agen";
    $data['agen'] = $this->agen_model->get_data(); // Ganti dengan metode yang sesuai
    $data['agen'] = $this->agen_model->getAgenWithPangkalanCount(); 
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/agen', $data);
    $this->load->view('templates_perdagangan/footer');
    } else {
        // Redirect atau tampilkan pesan jika peran tidak sesuai
        // Contoh: Tampilkan p      esan atau redirect ke halaman lain
        echo "Anda tidak memiliki otorisasi untuk mengakses halaman ini";
    }
}

//CONTROLLER TAMBAH DATA 
public function tambah_agen()
{
    $data['title'] = "Tambah Data Agen";
    $data['spbe_data'] = $this->spbe_model->get_spbe_data();
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/tambah_agen', $data);
    $this->load->view('templates_perdagangan/footer');
}
public function tambah_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->tambah_agen();
    } else{
        $id_spbe = $this->input->post('nama_perusahaan');
        $nama_agen   = $this->input->post('nama_agen');
        $alamat_agen   = $this->input->post('alamat_agen');
        $pso   = $this->input->post('pso');


        $data = array(
            'nama_agen' => $nama_agen,
            'alamat_agen' => $alamat_agen,
            'pso' => $pso,
            'id_spbe' => $id_spbe
        );
        $this->agen_model->insert_data('agen', $data); 
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Ditambahkan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('perdagangan/agen');
        

    }
}

//UPDATE SPBE
public function update_agen($id)
{
    $where = array ('id_agen' => $id);
    $data['agen'] = $this->db->query("SELECT * FROM agen WHERE id_agen='$id'")->result();
    $data['spbe_data'] = $this->spbe_model->get_spbe_data();
    $data['title'] = "Update Data Agen";
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/update_agen', $data);
    $this->load->view('templates_perdagangan/footer');
}
public function update_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->update_spbu();
    } else{
        $id_agen        = $this->input->post('id_agen');
        $id_spbe        = $this->input->post('nama_perusahaan');
        $nama_agen      = $this->input->post('nama_agen');
        $alamat_agen    = $this->input->post('alamat_agen');
        $pso   = $this->input->post('pso');

        $data = array(
            'nama_agen' => $nama_agen,
            'alamat_agen' => $alamat_agen,
            'pso' => $pso,
            'id_spbe' => $id_spbe
        );

        $where = array(
            'id_agen' => $id_agen
        );

        $this->agen_model->update_data('agen', $data, $where);
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Diupdate!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('perdagangan/agen');
        

    }
}


public function _rules()
    {
        $this->form_validation->set_rules('nama_agen','Nama Agen','required');
        $this->form_validation->set_rules('nama_perusahaan','SPBE','required');
        $this->form_validation->set_rules('alamat_agen','Alamat','required');
        $this->form_validation->set_rules('pso','Status','required');
    }

    //DELETE DATA 
public function delete_data($id)
{ 
 $where = array ('id_agen' => $id);
 $this->agen_model->delete_data($where, 'agen');
 $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong>Data Berhasil Dihapus!</strong>
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 </div>');
 redirect('perdagangan/agen');
}

public function print_data()
{
    // Load model and fetch data from both tables
    $this->load->model('Agen_model');
    $data['agen'] = $this->Agen_model->getAllAgenWithSPBE();
    $data['agen2'] = $this->agen_model->getAgenWithPangkalanCount(); 

    // Load view cetak_data.php and pass the data
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/cetak_data', $data);
    $this->load->view('templates_perdagangan/footer');
}
public function cari_data()
{
    $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL

    // Panggil model atau sumber data Anda untuk melakukan pencarian
    $data['agen'] = $this->agen_model->cariData($keyword);

    // Load view dengan data hasil pencarian
    $data['title'] ="Data Agen";
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/agen', $data);
    $this->load->view('templates_perdagangan/footer');
}

public function delete_data2($id)
{
    if ($this->agen_model->delete_related_data($id)) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
    } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal menghapus data</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
    }

    redirect('perdagangan/agen');
}
}





?>