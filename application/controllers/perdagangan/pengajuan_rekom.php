<?php

class Pengajuan_rekom extends CI_Controller{
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
    $data['title'] ="Pengajuan Rekomendasi Solar";
    $this->load->model('Peng_rekom_model');
    $data ['rekomendasi']= $this->Peng_rekom_model->get_data()->result();
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/pengajuan_rekom', $data);
    $this->load->view('templates_perdagangan/footer');
}else {
    // Redirect atau tampilkan pesan jika peran tidak sesuai
    // Contoh: Tampilkan p      esan atau redirect ke halaman lain
    echo "Anda tidak memiliki otorisasi untuk mengakses halaman ini";
}
}
//CONTROLLER TAMBAH DATA 
public function tambah_peng_solar()
{
    $data['title'] = "Tambah Pengajuan Solar";
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/tambah_peng_solar', $data);
    $this->load->view('templates_perdagangan/footer');
}
public function tambah_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->tambah_peng_solar();
    } else{
        $nama_pemilik   = $this->input->post('nama_pemilik');
        $nik   = $this->input->post('nik');
        $alamat   = $this->input->post('alamat');
        $telp   = $this->input->post('telp');
        $nama_usaha   = $this->input->post('nama_usaha');
        $jenis_usaha   = $this->input->post('jenis_usaha');
        
        $upload_sku = $_FILES['upload_sku'];
        if (!empty($upload_sku['name'])) {
            $config['upload_path'] = './assets/photo';
            $config['allowed_types'] = 'jpg|png|pdf';
        
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_sku')) {
                echo "Upload Surat Pengajuan Gagal: " . $this->upload->display_errors(); die();
            } else { 
                $upload_sku = $this->upload->data('file_name');
            }
        }


        $up_mesin_tempat = $_FILES['up_mesin_tempat'];
        if (!empty($up_mesin_tempat['name'])) {
            $config['upload_path'] = './assets/photo';
            $config['allowed_types'] = 'jpg|png|pdf';
        
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('up_mesin_tempat')) {
                echo "Upload Surat Pengajuan Gagal: " . $this->upload->display_errors(); die();
            } else { 
                $up_mesin_tempat = $this->upload->data('file_name');
            }
        }

        $up_surat_pengajuan = $_FILES['up_surat_pengajuan'];
        if (!empty($up_surat_pengajuan['name'])) {
            $config['upload_path'] = './assets/photo';
            $config['allowed_types'] = 'jpg|png|pdf';
        
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('up_surat_pengajuan')) {
                echo "Upload Surat Pengajuan Gagal: " . $this->upload->display_errors(); die();
            } else { 
                $up_surat_pengajuan = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_pemilik' => $nama_pemilik,
            'nik' => $nik,
            'alamat' => $alamat,
            'telp' => $telp,
            'nama_usaha' => $nama_usaha,
            'jenis_usaha' => $jenis_usaha,
            'upload_sku' => $upload_sku,
            'up_mesin_tempat' => $up_mesin_tempat,
            'up_surat_pengajuan' => $up_surat_pengajuan,
        );
        $this->peng_rekom_model->insert_data($data, 'rekomendasi');
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Ditambahkan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('perdagangan/pengajuan_rekom');
        

    }
}

//UPDATE DATA 
//UPDATE DTG
public function update_pengajuan($id)
{
    $where = array ('id_rekomendasi' => $id);
    $data['rekomendasi'] = $this->db->query("SELECT * FROM rekomendasi WHERE id_rekomendasi='$id'")->result();
    $data['title'] = "Update Data";
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/update_pengajuan', $data);
    $this->load->view('templates_perdagangan/footer');
}
public function update_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->update_pengajuan();
    } else{
        $id_rekomendasi   = $this->input->post('id_rekomendasi');
        $nama_pemilik   = $this->input->post('nama_pemilik');
        $nik   = $this->input->post('nik');
        $alamat   = $this->input->post('alamat');
        $telp   = $this->input->post('telp');
        $nama_usaha   = $this->input->post('nama_usaha');
        $jenis_usaha   = $this->input->post('jenis_usaha');

        $data = array(
            'nama_pemilik' => $nama_pemilik,
            'nik' => $nik,
            'alamat' => $alamat,
            'telp' => $telp,
            'nama_usaha' => $nama_usaha,
            'jenis_usaha' => $jenis_usaha,
        );

        $where = array(
            'id_rekomendasi' => $id_rekomendasi
        );

        $this->peng_rekom_model->update_data('rekomendasi', $data, $where);
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Diupdate!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('perdagangan/pengajuan_rekom');
        

    }
}

//hapus 
//DELETE DATA 
public function delete_data($id)
       { 
        $where = array ('id_rekomendasi' => $id);
        $this->peng_rekom_model->delete_data($where, 'rekomendasi');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('perdagangan/pengajuan_rekom');
       }



public function _rules()
    {
        $this->form_validation->set_rules('nama_pemilik','Nama Pemilik','required');
        $this->form_validation->set_rules('nik','NIK','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('telp','Telpn/HP','required');
        $this->form_validation->set_rules('nama_usaha','Nama Usaha','required');
        $this->form_validation->set_rules('jenis_usaha','Jenis Usaha','required');
       
       
    }
    
    public function cari_pengajuan()
    {
        $keyword = $this->input->get('keyword'); // Ambil kata kunci dari URL
    
        // Panggil model atau sumber data Anda untuk melakukan pencarian
        $data['rekomendasi'] = $this->peng_rekom_model->cariData($keyword);
    
        // Load view dengan data hasil pencarian
        $data['title'] ="Pengajuan Rekomendasi Solar";
        $this->load->view('templates_perdagangan/header', $data);
        $this->load->view('templates_perdagangan/sidebar');
        $this->load->view('perdagangan/pengajuan_rekom', $data);
        $this->load->view('templates_perdagangan/footer');
    }

    
}

?>