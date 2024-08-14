<?php
class Tdg extends CI_Controller{

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
    $data['title'] ="Tanda Daftar Gudang";
    $data['tdg'] = $this->tdg_model->get_data('tdg')->result();
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('Administrator/tdg', $data);
    $this->load->view('templates_administrator/footer');
}else {
    // Redirect atau tampilkan pesan jika peran tidak sesuai
    // Contoh: Tampilkan p      esan atau redirect ke halaman lain
    echo "Anda tidak memiliki otorisasi untuk mengakses halaman ini";
}
}

//CONTROLLER TAMBAH DATA 
public function tambah_tdg()
{
    $data['title'] = "Tambah Tanda Daftar Gudang";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/tambah_tdg', $data);
    $this->load->view('templates_administrator/footer');
}
public function tambah_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->tambah_tdg();
    } else{
        $nama_pemilik   = $this->input->post('nama_pemilik');
        $alamat_pemilik   = $this->input->post('alamat_pemilik');
        $nama_perusahaan   = $this->input->post('nama_perusahaan');
        $alamat_perusahaan   = $this->input->post('alamat_perusahaan');
        $alamat_gudang   = $this->input->post('alamat_gudang');
        $telp_fax   = $this->input->post('telp_fax');
        $nib   = $this->input->post('nib');
        $npwp   = $this->input->post('npwp');
        $email   = $this->input->post('email');
        $investasi   = $this->input->post('investasi');
        $website   = $this->input->post('website');
        $latitud   = $this->input->post('latitud');
        $longitud   = $this->input->post('longitud');
        $luas_lahan   = $this->input->post('luas_lahan');
        $luas   = $this->input->post('luas');
        $kapasitas   = $this->input->post('kapasitas');
        $nomor_tgl_bap   = $this->input->post('nomor_tgl_bap');
        $nomor_tgl_pertek   = $this->input->post('nomor_tgl_pertek');
        $nomor_tgl_tdg   = $this->input->post('nomor_tgl_tdg');
        $komoditas_gudang   = $this->input->post('komoditas_gudang');

        $data = array(
            'nama_pemilik' => $nama_pemilik,
            'alamat_pemilik' => $alamat_pemilik,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
            'alamat_gudang' => $alamat_gudang,
            'telp_fax' => $telp_fax,
            'nib' => $nib,
            'npwp' => $npwp,
            'email' => $email,
            'investasi' => $investasi,
            'website' => $website,
            'latitud' => $latitud,
            'longitud' => $longitud,
            'luas_lahan' => $luas_lahan,
            'luas' => $luas,
            'kapasitas' => $kapasitas,
            'nomor_tgl_bap' => $nomor_tgl_bap,
            'nomor_tgl_pertek' => $nomor_tgl_pertek,
            'nomor_tgl_tdg' => $nomor_tgl_tdg,
            'komoditas_gudang' => $komoditas_gudang,
        );
        $this->tdg_model->insert_data($data, 'tdg');
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Ditambahkan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('administrator/tdg');
        

    }
}
//UPDATE DTG
public function update_tdg($id)
{
    $where = array ('id_tdg' => $id);
    $data['tdg'] = $this->db->query("SELECT * FROM tdg WHERE id_tdg='$id'")->result();
    $data['title'] = "Update Tanda Daftar Gudang";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/update_tdg', $data);
    $this->load->view('templates_administrator/footer');
}
public function update_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->update_tdg();
    } else{
        $id_tdg             = $this->input->post('id_tdg');
        $nama_pemilik       = $this->input->post('nama_pemilik');
        $alamat_pemilik     = $this->input->post('alamat_pemilik');
        $nama_perusahaan    = $this->input->post('nama_perusahaan');
        $alamat_perusahaan  = $this->input->post('alamat_perusahaan');
        $alamat_gudang      = $this->input->post('alamat_gudang');
        $telp_fax           = $this->input->post('telp_fax');
        $nib                = $this->input->post('nib');
        $npwp               = $this->input->post('npwp');
        $email              = $this->input->post('email');
        $investasi          = $this->input->post('investasi');
        $website            = $this->input->post('website');
        $latitud            = $this->input->post('latitud');
        $longitud           = $this->input->post('longitud');
        $luas_lahan         = $this->input->post('luas_lahan');
        $luas               = $this->input->post('luas');
        $kapasitas          = $this->input->post('kapasitas');
        $nomor_tgl_bap      = $this->input->post('nomor_tgl_bap');
        $nomor_tgl_pertek   = $this->input->post('nomor_tgl_pertek');
        $nomor_tgl_tdg      = $this->input->post('nomor_tgl_tdg');
        $komoditas_gudang   = $this->input->post('komoditas_gudang');

        $data = array(
            'nama_pemilik' => $nama_pemilik,
            'alamat_pemilik' => $alamat_pemilik,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
            'alamat_gudang' => $alamat_gudang,
            'telp_fax' => $telp_fax,
            'nib' => $nib,
            'npwp' => $npwp,
            'email' => $email,
            'investasi' => $investasi,
            'website' => $website,
            'latitud' => $latitud,
            'longitud' => $longitud,
            'luas_lahan' => $luas_lahan,
            'luas' => $luas,
            'kapasitas' => $kapasitas,
            'nomor_tgl_bap' => $nomor_tgl_bap,
            'nomor_tgl_pertek' => $nomor_tgl_pertek,
            'nomor_tgl_tdg' => $nomor_tgl_tdg,
            'komoditas_gudang' => $komoditas_gudang,
        );

        $where = array(
            'id_tdg' => $id_tdg
        );

        $this->tdg_model->update_data('tdg', $data, $where);
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Diupdate!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('administrator/tdg');
        

    }
}

public function _rules()
    {
        $this->form_validation->set_rules('nama_pemilik','Nama Pemilik','required');
        $this->form_validation->set_rules('alamat_pemilik','Alamat Pemilik','required');
        $this->form_validation->set_rules('nama_perusahaan','Nama Perusahaan','required');
        $this->form_validation->set_rules('alamat_perusahaan','Alamat Perusahaan','required');
        $this->form_validation->set_rules('alamat_gudang','Alamat Gudang','required');
        $this->form_validation->set_rules('telp_fax','Telp/Fax','required');
        $this->form_validation->set_rules('nib','NIB','required');
        $this->form_validation->set_rules('npwp','NPWP','required');
        $this->form_validation->set_rules('email','E-Mail','required');
        $this->form_validation->set_rules('investasi','Investasi','required');
        $this->form_validation->set_rules('website','Website','required');
        $this->form_validation->set_rules('latitud','Latitud','required');
        $this->form_validation->set_rules('longitud','Longitud','required');
        $this->form_validation->set_rules('luas_lahan','Luas Lahan','required');
        $this->form_validation->set_rules('luas','Luas','required');
        $this->form_validation->set_rules('kapasitas','Kapasitas','required');
        $this->form_validation->set_rules('nomor_tgl_bap','No. Tanggal Bap','required');
        $this->form_validation->set_rules('nomor_tgl_pertek','No. Tanggal Pertek','required');
        $this->form_validation->set_rules('nomor_tgl_tdg','No. Tanggal Tdg','required');
        $this->form_validation->set_rules('komoditas_gudang','Komoditas Gudang','required');
    }

//DELETE DATA 
public function delete_data($id)
       { 
        $where = array ('id_tdg' => $id);
        $this->tdg_model->delete_data($where, 'tdg');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('administrator/tdg');
       }
       
       public function print_tdg()
       {
           // Load model and fetch data from both tables
           $this->load->model('Tdg_model');
           $data['tdg'] = $this->Tdg_model->get_all_tdg_data();
           // Load view cetak_data.php and pass the data
           $data['title'] = "Cetak Data Tanda Daftar Gudang";
           $this->load->view('templates_administrator/header', $data);
           $this->load->view('templates_administrator/sidebar');
           $this->load->view('administrator/cetak_tdg', $data);
           $this->load->view('templates_administrator/footer');
       }
       

       public function cari_data()
       {
           $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL
       
           // Panggil model atau sumber data Anda untuk melakukan pencarian
           $data['tdg'] = $this->tdg_model->cariData($keyword);
       
           // Load view dengan data hasil pencarian
           $data['title'] ="Tanda Daftar Gudang";
           $this->load->view('templates_administrator/header', $data);
           $this->load->view('templates_administrator/sidebar');
           $this->load->view('administrator/tdg', $data);
           $this->load->view('templates_administrator/footer');
       }


}

?>