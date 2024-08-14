<?php

class Spbe extends CI_Controller{

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
    $data['title'] ="Data SPBE";
    $data['spbe'] = $this->spbe_model->get_data('spbe')->result();
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('Administrator/spbe', $data);
    $this->load->view('templates_administrator/footer');
}else {
    // Redirect atau tampilkan pesan jika peran tidak sesuai
    // Contoh: Tampilkan p      esan atau redirect ke halaman lain
    echo "Anda tidak memiliki otorisasi untuk mengakses halaman ini";
}
}


//CONTROLLER TAMBAH DATA 
public function tambah_spbe()
{
    $data['title'] = "Tambah Data SPBE";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/tambah_spbe', $data);
    $this->load->view('templates_administrator/footer');
}
public function tambah_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->tambah_spbe();
    } else{
        $nama_pemilik   = $this->input->post('nama_pemilik');
        $nama_perusahaan    = $this->input->post('nama_perusahaan');
        $alamat_kantor   = $this->input->post('alamat_kantor');
        $telp   = $this->input->post('telp');
        $email   = $this->input->post('email');

        $data = array(
            'nama_pemilik' => $nama_pemilik,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_kantor' => $alamat_kantor,
            'telp' => $telp,
            'email' => $email,
            
        );
        $this->spbe_model->insert_data($data, 'spbe');
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Ditambahkan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('administrator/spbe');
        

    }
}

//UPDATE SPBE
public function update_spbe($id)
{
    $where = array ('id_spbe' => $id);
    $data['spbe'] = $this->db->query("SELECT * FROM spbe WHERE id_spbe='$id'")->result();
    $data['title'] = "Update Data SPBE";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/update_spbe', $data);
    $this->load->view('templates_administrator/footer');
}
public function update_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->update_spbu();
    } else{
        $id_spbe                = $this->input->post('id_spbe');
        $nama_pemilik   = $this->input->post('nama_pemilik');
        $nama_perusahaan    = $this->input->post('nama_perusahaan');
        $alamat_kantor   = $this->input->post('alamat_kantor');
        $telp   = $this->input->post('telp');
        $email   = $this->input->post('email');

        $data = array(
            'nama_pemilik' => $nama_pemilik,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_kantor' => $alamat_kantor,
            'telp' => $telp,
            'email' => $email,
        );

        $where = array(
            'id_spbe' => $id_spbe
        );

        $this->Spbu_model->update_data('spbe', $data, $where);
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Diupdate!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('administrator/spbe');
        

    }
}

public function _rules()
    {
        $this->form_validation->set_rules('nama_pemilik','Nama Pemilik','required');
        $this->form_validation->set_rules('nama_perusahaan','SPBE','required');
        $this->form_validation->set_rules('alamat_kantor','Alamat SPBE','required');
        $this->form_validation->set_rules('telp','Telp/HP','required');
        $this->form_validation->set_rules('email','Email','required');
    }

//DELETE DATA 
public function delete_data($id)
       { 
        $where = array ('id_spbe' => $id);
        $this->spbe_model->delete_data($where, 'spbe');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('administrator/spbe');
       }
       

       public function print_spbe()
       {
           // Load model and fetch data from both tables
           $this->load->model('Spbe_model');
           $data['spbe'] = $this->Spbe_model->get_all_spbe_data();
           // Load view cetak_data.php and pass the data
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/cetak_spbe', $data);
            $this->load->view('templates_administrator/footer');
       }

       public function cari_data()
{
    $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL

    // Panggil model atau sumber data Anda untuk melakukan pencarian
    $data['spbe'] = $this->spbe_model->cariData($keyword);

    // Load view dengan data hasil pencarian
    $data['title'] ="Data SPBE";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/spbe', $data);
    $this->load->view('templates_administrator/footer');
}
       



}

?>