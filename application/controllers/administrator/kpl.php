<?php

class Kpl extends CI_Controller{

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
    $data['title'] ="Kios Pupuk Lengkap";
    $data['kpl'] = $this->kpl_model->get_data('kpl')->result();
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/kpl', $data);
    $this->load->view('templates_administrator/footer');
    }
}

//CONTROLLER TAMBAH DATA 
public function tambah_kpl()
{
    $data['title'] = "Tambah Kios Pupuk Lengkap";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/tambah_kpl', $data);
    $this->load->view('templates_administrator/footer');
}
public function tambah_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->tambah_kpl();
    } else{
        $kode_kios   = $this->input->post('kode_kios');
        $nama_kpl   = $this->input->post('nama_kpl');
        $pemilik   = $this->input->post('pemilik');
        $alamat   = $this->input->post('alamat');
        $kecamatan   = $this->input->post('kecamatan');
        $no_hp   = $this->input->post('no_hp');
        $dis_1   = $this->input->post('dis_1');
        $dis_2   = $this->input->post('dis_2');
        $keterangan   = $this->input->post('keterangan');
        $latitud   = $this->input->post('latitud');
        $longitud   = $this->input->post('longitud');
       

        $data = array(
            'kode_kios' => $kode_kios,
            'nama_kpl' => $nama_kpl,
            'pemilik' => $pemilik,
            'alamat' => $alamat,
            'kecamatan' => $kecamatan,
            'no_hp' => $no_hp,
            'dis_1' => $dis_1,
            'dis_2' => $dis_2,
            'keterangan' => $keterangan,
            'latitud' => $latitud,
            'longitud' => $longitud,
           
        );
        $this->kpl_model->insert_data($data, 'kpl');
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Ditambahkan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('administrator/kpl');
        

    }
}
//UPDATE DTG
public function update_kpl($id)
{
    $where = array ('id_kpl' => $id);
    $data['kpl'] = $this->db->query("SELECT * FROM kpl WHERE id_kpl='$id'")->result();
    $data['title'] = "Update Kios Pupuk Lengkap";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/update_kpl', $data);
    $this->load->view('templates_administrator/footer');
}
public function update_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->update_kpl();
    } else{
        $id_kpl             = $this->input->post('id_kpl');
        $kode_kios   = $this->input->post('kode_kios');
        $nama_kpl   = $this->input->post('nama_kpl');
        $pemilik   = $this->input->post('pemilik');
        $alamat   = $this->input->post('alamat');
        $kecamatan   = $this->input->post('kecamatan');
        $no_hp   = $this->input->post('no_hp');
        $dis_1   = $this->input->post('dis_1');
        $dis_2   = $this->input->post('dis_2');
        $keterangan   = $this->input->post('keterangan');
        $latitud   = $this->input->post('latitud');
        $longitud   = $this->input->post('longitud');
        $data = array(
            'kode_kios' => $kode_kios,
            'nama_kpl' => $nama_kpl,
            'pemilik' => $pemilik,
            'alamat' => $alamat,
            'kecamatan' => $kecamatan,
            'no_hp' => $no_hp,
            'dis_1' => $dis_1,
            'dis_2' => $dis_2,
            'keterangan' => $keterangan,
            'latitud' => $latitud,
            'longitud' => $longitud,
        );

        $where = array(
            'id_kpl' => $id_kpl
        );

        $this->kpl_model->update_data('kpl', $data, $where);
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Diupdate!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('administrator/kpl');
        

    }
}

public function _rules()
    {
        $this->form_validation->set_rules('nama_kpl','Nama KPL','required');
        $this->form_validation->set_rules('pemilik','Pemilik','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('kecamatan','Kecamatan','required');
        $this->form_validation->set_rules('no_hp','No. HP','required');
        $this->form_validation->set_rules('dis_1','Distributor','required');
        $this->form_validation->set_rules('dis_2','Distributor','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');
        $this->form_validation->set_rules('longitud','Longitude','required');
        $this->form_validation->set_rules('latitud','Latitude','required');
    }

//DELETE DATA 
public function delete_data($id)
       { 
        $where = array ('id_kpl' => $id);
        $this->kpl_model->delete_data($where, 'kpl');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('administrator/kpl');
       }

       public function print_kpl()
       {
           // Load model and fetch data from both tables
           $this->load->model('Kpl_model');
           $data['kpl'] = $this->Kpl_model->get_all_kpl_data();
           // Load view cetak_data.php and pass the data
           $data['title'] = "Cetak Data Kios Pupuk Lengkap";
           $this->load->view('templates_administrator/header', $data);
           $this->load->view('templates_administrator/sidebar');
           $this->load->view('administrator/cetak_kpl', $data);
           $this->load->view('templates_administrator/footer');
       }
       
       public function cari_data()
       {
           $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL
       
           // Panggil model atau sumber data Anda untuk melakukan pencarian
           $data['kpl'] = $this->kpl_model->cariData($keyword);
       
           // Load view dengan data hasil pencarian
           $data['title'] ="Kios Pupuk Lengkap";
           $this->load->view('templates_administrator/header', $data);
           $this->load->view('templates_administrator/sidebar');
           $this->load->view('administrator/kpl', $data);
           $this->load->view('templates_administrator/footer');
       }




}

?>