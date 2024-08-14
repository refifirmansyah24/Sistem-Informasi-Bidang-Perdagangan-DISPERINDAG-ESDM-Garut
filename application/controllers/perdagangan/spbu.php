<?php

class Spbu extends CI_Controller{
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
    $data['title'] ="Data SPBU";
    $data['spbu'] = $this->Spbu_model->get_data('spbu')->result();
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/spbu', $data);
    $this->load->view('templates_administrator/footer');
}
}

//CONTROLLER TAMBAH DATA 
public function tambah_spbu()
{
    $data['title'] = "Tambah Data SPBU";
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/tambah_spbu', $data);
    $this->load->view('templates_perdagangan/footer');
}
public function tambah_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->tambah_spbu();
    } else{
        $no_spbu   = $this->input->post('no_spbu');
        $nama_spbu   = $this->input->post('nama_spbu');
        $lokasi_spbu   = $this->input->post('lokasi_spbu');
        $telp   = $this->input->post('telp');
        $tgl_peneraan                = $this->input->post('tgl_peneraan');


        $data = array(
            'no_spbu' => $no_spbu,
            'nama_spbu' => $nama_spbu,
            'lokasi_spbu' => $lokasi_spbu,
            'telp' => $telp,
            'tgl_peneraan' => $tgl_peneraan,
        );
        $this->Spbu_model->insert_data($data, 'spbu');
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Ditambahkan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('perdagangan/spbu');
        

    }
}

//UPDATE SPBU
public function update_spbu($id)
{
    $where = array ('id_spbu' => $id);
    $data['spbu'] = $this->db->query("SELECT * FROM spbu WHERE id_spbu='$id'")->result();
    $data['title'] = "Update Data SPBU";
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/update_spbu', $data);
    $this->load->view('templates_perdagangan/footer');
}
public function update_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->update_spbu();
    } else{
        $id_spbu                = $this->input->post('id_spbu');
        $no_spbu                = $this->input->post('no_spbu');
        $nama_spbu              = $this->input->post('nama_spbu');
        $lokasi_spbu            = $this->input->post('lokasi_spbu');
        $telp                   = $this->input->post('telp');
        $tgl_peneraan                = $this->input->post('tgl_peneraan');

        $data = array(
            'no_spbu' => $no_spbu,
            'nama_spbu' => $nama_spbu,
            'lokasi_spbu' => $lokasi_spbu,
            'telp' => $telp,
            'tgl_peneraan' => $tgl_peneraan,
        );

        $where = array(
            'id_spbu' => $id_spbu
        );

        $this->Spbu_model->update_data('spbu', $data, $where);
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Diupdate!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('perdagangan/spbu');
        

    }
}

public function _rules()
    {
        $this->form_validation->set_rules('nama_spbu','No SPBU','required');
        $this->form_validation->set_rules('no_spbu','Lokasi SPBU','required');
        $this->form_validation->set_rules('lokasi_spbu','Nama Perusahaan','required');
        $this->form_validation->set_rules('telp','Telp/HP','required');
        $this->form_validation->set_rules('tgl_peneraan','Tera','required');
       
    }

//DELETE DATA 
public function delete_data($id)
       { 
        $where = array ('id_spbu' => $id);
        $this->Spbu_model->delete_data($where, 'spbu');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('perdagangan/spbu');
       }

    //Menjumlahkan Data 
    public function count_spbu_data()
    {
    return $this->db->count_all_results('spbu');
    }

    public function print_spbu()
{
    // Load model and fetch data from both tables
    $this->load->model('Spbu_model');
    $data['spbu'] = $this->Spbu_model->get_all_spbu_data();
    // Load view cetak_data.php and pass the data
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/cetak_spbu', $data);
    $this->load->view('templates_perdagangan/footer');
}

public function cari_data()
{
    $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL

    // Panggil model atau sumber data Anda untuk melakukan pencarian
    $data['spbu'] = $this->Spbu_model->cariData($keyword);

    // Load view dengan data hasil pencarian
    $data['title'] ="Data SPBU";
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/spbu', $data);
    $this->load->view('templates_perdagangan/footer');
}



}

?>