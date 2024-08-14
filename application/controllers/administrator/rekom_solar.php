<?php
class Rekom_Solar extends CI_Controller {

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
    
if ($this->session->userdata('level') === 'Super Admin') {
// Load model
$this->load->model('Rekom_solar_model');

// Jika ada request filter tanggal
$start_date = $this->input->get('start_date');
$end_date = $this->input->get('end_date');

if ($start_date && $end_date) {
    // Konversi tanggal ke format database (YYYY-MM-DD)
    $start_date = date('Y-m-d', strtotime($start_date));
    $end_date = date('Y-m-d', strtotime($end_date));

    // Ambil data dengan filter tanggal
    $data['rekomendasi'] = $this->Rekom_solar_model->get_data_by_date_range($start_date, $end_date);
} else {
    // Ambil semua data tanpa filter tanggal
    $data['rekomendasi'] = $this->Rekom_solar_model->get_data()->result();
} 
if ($this->session->userdata('level') === 'Super Admin') {
        $data['title'] = "Riwayat Rekomendasi Solar";
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('Administrator/rekom_solar', $data);
        $this->load->view('templates_administrator/footer');
    } else {
        // Redirect atau tampilkan pesan jika peran tidak sesuai
        // Contoh: Tampilkan p      esan atau redirect ke halaman lain
        echo "Anda tidak memiliki otorisasi untuk mengakses halaman ini";
    }   
    }
}

    //CONTROLLER TAMBAH DATA 
    public function tambah_data_solar()
    {
        $data['title'] = "Tambah Data Solar";
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tambah_data_solar', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_data_aksi()
    { 
        $this->load->model('Rekom_solar_model', 'multi_model', TRUE );
        $rekomendasi_input_data = array();
        $kebutuhan_bbm_input_data = array();
        //Rekomendasi
        $rekomendasi_input_data['nama_pemilik'] = $this->input->post('nama_pemilik');
        $rekomendasi_input_data['nik'] = $this->input->post('nik');
        $rekomendasi_input_data['alamat'] = $this->input->post('alamat');
        $rekomendasi_input_data['telp'] = $this->input->post('telp');
        $rekomendasi_input_data['konsumen'] = $this->input->post('konsumen');
        $rekomendasi_input_data['nama_usaha'] = $this->input->post('nama_usaha');
        $rekomendasi_input_data['jenis_usaha'] = $this->input->post('jenis_usaha');
        $rekomendasi_input_data['satuan_kebutuhan'] = $this->input->post('satuan_kebutuhan');
        $rekomendasi_input_data['no_surat'] = $this->input->post('no_surat');
        $rekomendasi_input_data['jumlah_alokasi'] = $this->input->post('jumlah_alokasi');
        $rekomendasi_input_data['durasi_alokasi'] = $this->input->post('durasi_alokasi');
        $rekomendasi_input_data['masa_berlaku'] = $this->input->post('masa_berlaku');
        $rekomendasi_input_data['no_penyalur'] = $this->input->post('no_penyalur');
        $rekomendasi_input_data['lokasi_penyalur'] = $this->input->post('lokasi_penyalur');
        $rekomendasi_input_data['lembaga_penyalur_tempat_pengambilan'] = $this->input->post('lembaga_penyalur_tempat_pengambilan');
        $rekomendasi_input_data['no_lembaga_penyalur'] = $this->input->post('no_lembaga_penyalur');
        $rekomendasi_input_data['lok_lembaga_penyalur'] = $this->input->post('lok_lembaga_penyalur');
        $rekomendasi_input_data['upload_sku'] = $this->input->post('upload_sku');
        $rekomendasi_input_data['up_mesin_tempat'] = $this->input->post('up_mesin_tempat');
        $rekomendasi_input_data['up_mesin_tempat'] = $this->input->post('up_mesin_tempat');
        $rekomendasi_input_data['up_surat_pengajuan'] = $this->input->post('up_surat_pengajuan');
        //Kebutuhan 

        $num_kebutuhan_sets = count($this->input->post('jumlah_alat'));
        //LOOping tambah data zz
        for ($i = 0; $i < $num_kebutuhan_sets; $i++) {
            $kebutuhan_bbm_input_data[] = array(
                'jumlah_alat' => $this->input->post('jumlah_alat')[$i],
                'jenis_alat' => $this->input->post('jenis_alat')[$i],
                'fungsi_alat' => $this->input->post('fungsi_alat')[$i],
                'jenis_bbm' => $this->input->post('jenis_bbm')[$i],
                'kebutuhan_bbm' => $this->input->post('kebutuhan_bbm')[$i],
                'operasi' => $this->input->post('operasi')[$i],
                'konsumsi' => $this->input->post('konsumsi')[$i],
                'durasi_konsumsi' => $this->input->post('durasi_konsumsi')[$i],

            );
        }

        $checking_insert = $this->multi_model->insert_data($rekomendasi_input_data, $kebutuhan_bbm_input_data);
        if($checking_insert)
        {
            redirect('administrator/rekom_solar');
        }
        else{
            redirect('administrator/rekom_solar');
        }
    }

    //UPDATe DATA 
    
    //DELETE DATA 
    public function delete_data_aksi($id_rekomendasi)
    {
        // Load the model
        $this->load->model('Rekom_solar_model');

        // Call the model method to delete data
        $this->Rekom_solar_model->delete_data($id_rekomendasi);

        // Redirect back to the view
        redirect('administrator/rekom_solar');
    }


    public function print_riwayat()
{
    $this->load->model('Rekom_solar_model');

    $start_date = $this->input->get('start_date');
    $end_date = $this->input->get('end_date');

    if ($start_date && $end_date) {
        // Convert the dates to the database format (YYYY-MM-DD)
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));

        // Get filtered data based on date range
        $data['rekomendasi'] = $this->Rekom_solar_model->get_data_by_date_range($start_date, $end_date);

        // Add start_date and end_date to the data for use in the view
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
    } else {
        // If no date filter, show all data
        $data['rekomendasi'] = $this->Rekom_solar_model->get_data()->result();
    }
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/cetak_riwayat', $data);
            $this->load->view('templates_administrator/footer');
    }
    
    }
?>