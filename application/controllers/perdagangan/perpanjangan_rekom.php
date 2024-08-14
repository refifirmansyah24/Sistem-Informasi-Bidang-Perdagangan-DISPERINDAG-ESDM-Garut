<?php
class Perpanjangan_rekom extends CI_Controller {

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
    
    public function index() {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'level' => $data->level,
        );
        if ($this->session->userdata('level') === 'Admin Perdagangan') {
        $this->load->model('Perpanjangan_rekom_model');
        $data ['rekomendasi']= $this->Perpanjangan_rekom_model->get_data()->result();
        $data['title'] = "Perpanjangan Rekomendasi";
        $this->load->view('templates_perdagangan/header', $data);
        $this->load->view('templates_perdagangan/sidebar');
        $this->load->view('perdagangan/perpanjangan_rekom', $data);
        $this->load->view('templates_perdagangan/footer');
    }else {
        // Redirect atau tampilkan pesan jika peran tidak sesuai
        // Contoh: Tampilkan p      esan atau redirect ke halaman lain
        echo "Anda tidak memiliki otorisasi untuk mengakses halaman ini";
    }
}

    //CONTROLLER TAMBAH DATA 
    public function tambah_perpanjangan($id)
    {
    $this->load->model('Spbu_model');
    $where = array ('id_rekomendasi' => $id);
    $data['rekomendasi'] = $this->db->query("SELECT * FROM rekomendasi WHERE id_rekomendasi='$id'")->result();
    $data['title'] = "Perpanjangan Rekomendasi Solar";
    // Get the list of SPBU data to be used in the dropdown
    $data['spbu_data'] = $this->Spbu_model->get_spbu_data();
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/tambah_perpanjangan', $data);
    $this->load->view('templates_perdagangan/footer');
    }

    public function get_spbu_details()
    {
        $this->load->model('Spbu_model'); // Load the Spbu_model

        $spbuId = $this->input->get('spbu_id');

        $spbuDetails = $this->Spbu_model->get_spbu_details($spbuId);

        echo json_encode($spbuDetails);

    }

    public function tambah_data_aksi()
    {
            $id_rekomendasi = $this->input->post('id_rekomendasi');
            $id_spbu = $this->input->post('no_spbu');
            $jenis_alat = $this->input->post('jenis_alat');
            $jumlah_alat = $this->input->post('jumlah_alat');
            $fungsi_alat = $this->input->post('fungsi_alat');
            $jenis_bbm = $this->input->post('jenis_bbm');
            $operasi = $this->input->post('operasi');
            $konsumsi = $this->input->post('konsumsi');
            $durasi_konsumsi = $this->input->post('durasi_konsumsi');
            $tgl_pengajuan = $this->input->post('tgl_pengajuan');
            $kebutuhan_bbm = $this->input->post('kebutuhan_bbm');
            $satuan_kebutuhan = $this->input->post('satuan_kebutuhan');
            $masa_berlaku = $this->input->post('masa_berlaku');

            $up_rekom_lama = $_FILES['up_rekom_lama'];
            if (!empty($up_rekom_lama['name'])) {
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jpg|png|pdf';
            
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('up_rekom_lama')) {
                    echo "Upload Surat Pengajuan Gagal: " . $this->upload->display_errors(); die();
                } else { 
                    $up_rekom_lama = $this->upload->data('file_name');
                }
            }

            $data = array(
                'jenis_alat' => $jenis_alat,
                'jumlah_alat' => $jumlah_alat,
                'fungsi_alat' => $fungsi_alat,
                'jenis_bbm' => $jenis_bbm,
                'operasi' => $operasi,
                'konsumsi' => $konsumsi,
                'kebutuhan_bbm' => $kebutuhan_bbm,
                'durasi_konsumsi' => $durasi_konsumsi,
                'tgl_pengajuan' => $tgl_pengajuan,
                'up_rekom_lama' => $up_rekom_lama,
                'satuan_kebutuhan' => $satuan_kebutuhan,
                'masa_berlaku' => $masa_berlaku,
                'id_rekomendasi' => $id_rekomendasi,
                'id_spbu' => $id_spbu
            );

            $this->perpanjangan_rekom_model->insert_data2('kebutuhan_bbm', $data);

            // Memunculkan alerts untuk pesan alert, diambil dari Bootstrap
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Disimpan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');

            redirect('perdagangan/pengajuan_rekom');
        }
        

public function rincian_perpanjangan($id){ 
    $this->load->model('perpanjangan_rekom_model');
    $data['title'] = "Rincian Perpanjangan";
    $rincian_perpanjangan = $this->perpanjangan_rekom_model->detail_data($id);
    $data['rincian_perpanjangan'] = $rincian_perpanjangan;
    $rincian_perpanjangan2 = $this->perpanjangan_rekom_model->detail_dataJoin($id);
    $data['rincian_perpanjangan2'] = $rincian_perpanjangan2;
    $this->load->view('templates_perdagangan/header', $data);
    $this->load->view('templates_perdagangan/sidebar');
    $this->load->view('perdagangan/rincian_perpanjangan', $data);
    $this->load->view('templates_perdagangan/footer');

}

public function delete_data($id)
       { 
        $where = array ('id_kebutuhan' => $id);
        $this->peng_rekom_model->delete_data($where, 'kebutuhan_bbm');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('perdagangan/pengajuan_rekom');
       }

    
}

?>