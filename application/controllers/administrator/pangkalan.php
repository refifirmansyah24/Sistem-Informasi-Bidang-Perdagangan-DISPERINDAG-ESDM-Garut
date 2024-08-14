<?php

class Pangkalan extends CI_Controller{
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
    if ($this->session->userdata('level') === 'Super Admin') {
    $data['title'] ="Data Pangkalan";
    $data['pangkalan'] = $this->pangkalan_model->get_data();
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/pangkalan', $data);
    $this->load->view('templates_administrator/footer');
}else {
    // Redirect atau tampilkan pesan jika peran tidak sesuai
    // Contoh: Tampilkan p      esan atau redirect ke halaman lain
    echo "Anda tidak memiliki otorisasi untuk mengakses halaman ini";
}
}

//CONTROLLER TAMBAH DATA 
public function tambah_pangkalan()
{
    $data['title'] = "Tambah Data Pangkalan";
    $data['agen_data'] = $this->agen_model->get_agen_data();
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/tambah_pangkalan', $data);
    $this->load->view('templates_administrator/footer');
}
public function tambah_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->tambah_pangkalan();
    } else{
        $id_agen = $this->input->post('nama_agen');
        $pangkalan   = $this->input->post('pangkalan');
        $id_registrasi   = $this->input->post('id_registrasi');
        $kecamatan   = $this->input->post('kecamatan');
        $kelurahan   = $this->input->post('kelurahan');
        $alamat_pangkalan   = $this->input->post('alamat_pangkalan');
        $penyaluran   = $this->input->post('penyaluran');

        $data = array(
            'pangkalan' => $pangkalan,
            'id_registrasi' => $id_registrasi,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'alamat_pangkalan' => $alamat_pangkalan,
            'penyaluran' => $penyaluran,
            'id_agen' => $id_agen
        );
        $this->Spbu_model->insert_data($data, 'pangkalan');
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Ditambahkan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('administrator/pangkalan');
        

    }
}

//UPDAE PANGKALAN
public function update_pangkalan($id)
{
    $where = array ('id_pangkalan' => $id);
    $data['pangkalan'] = $this->db->query("SELECT * FROM pangkalan WHERE id_pangkalan='$id'")->result();
    $data['agen_data'] = $this->agen_model->get_agen_data();
    $data['title'] = "Update Data Pangkalan";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/update_pangkalan', $data);
    $this->load->view('templates_administrator/footer');
}
public function update_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->update_pangkalan();
    } else{
        $id_pangkalan        = $this->input->post('id_pangkalan');
        $id_agen = $this->input->post('nama_agen');
        $pangkalan   = $this->input->post('pangkalan');
        $id_registrasi   = $this->input->post('id_registrasi');
        $kecamatan   = $this->input->post('kecamatan');
        $kelurahan   = $this->input->post('kelurahan');
        $alamat_pangkalan   = $this->input->post('alamat_pangkalan');
        $penyaluran   = $this->input->post('penyaluran');

        $data = array(
            'pangkalan' => $pangkalan,
            'id_registrasi' => $id_registrasi,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'alamat_pangkalan' => $alamat_pangkalan,
            'penyaluran' => $penyaluran,
            'id_agen' => $id_agen
        );

        $where = array(
            'id_pangkalan' => $id_pangkalan
        );

        $this->Spbu_model->update_data('pangkalan', $data, $where);
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Diupdate!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('administrator/pangkalan');
        

    }
}

public function _rules()
    {
        $this->form_validation->set_rules('pangkalan','pangkalan','required');
        $this->form_validation->set_rules('kecamatan','kecamatan','required');
        $this->form_validation->set_rules('kelurahan','kelurahan','required');
        $this->form_validation->set_rules('alamat_pangkalan','alamat_pangkalan','required');
        $this->form_validation->set_rules('penyaluran','penyaluran','required');
        $this->form_validation->set_rules('nama_agen','nama_agen','required');
        $this->form_validation->set_rules('id_registrasi','id_registrasi','required');
    }

     //DELETE DATA 
public function delete_data($id)
{ 
    $where = array ('id_pangkalan' => $id);
    $this->pangkalan_model->delete_data($where, 'pangkalan');
    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Data Berhasil Dihapus!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>');
    redirect('administrator/pangkalan');
}

public function print_pangkalan()
{
    // Load model and fetch data from both tables
    $this->load->model('Pangkalan_model');
    $data['pangkalan'] = $this->Pangkalan_model->get_all_pangkalan_data();
    // Load view cetak_data.php and pass the data
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/cetak_pangkalan', $data);
    $this->load->view('templates_administrator/footer');
}

public function cari_data()
{
    $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL

    // Panggil model atau sumber data Anda untuk melakukan pencarian
    $data['pangkalan'] = $this->pangkalan_model->cariData($keyword);

    // Load view dengan data hasil pencarian
    $data['title'] ="Data Pangkalan";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/pangkalan', $data);
    $this->load->view('templates_administrator/footer');
}



}


?>