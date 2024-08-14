<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load PHPWord Library

require_once APPPATH . '/libraries/IOFactory.php';
require_once APPPATH . '/libraries/Word.php';

class Cetakrekom extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Rekom_solar_model');
        $this->checkUserRole();
    }

        //Cek Session
    private function checkSession() {
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda Belum Login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('administrator/auth');
        }
    }

    private function checkUserRole() {
        $this->checkSession(); // Memanggil fungsi untuk mengecek sesi
        
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $userLevel = $data->level;

        if ($userLevel !== 'Super Admin') {
            // Redirect atau tampilkan pesan jika peran tidak sesuai
            // Anda dapat menyesuaikan tindakan sesuai kebutuhan, seperti tampilkan pesan atau redirect
            echo "Anda tidak memiliki otorisasi untuk mengakses halaman ini";
            exit; // Hentikan eksekusi lebih lanjut
        }
    }

    public function inputNomorSurat($id_rekomendasi) {
        // Kirim ID rekomendasi ke halaman input_nomor_surat.php
        $data['id_rekomendasi'] = $id_rekomendasi;
        $data['title'] = "Masukan Nomor Surat";
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/input_nomor_surat', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function exportRekom($id_rekomendasi) {
        // Ambil data KGB berdasarkan ID dari database
        $nomor_surat = $this->input->post('nomor_surat');
        
        $data = $this->Rekom_solar_model->get_data_by_id2($id_rekomendasi)->row_array();
        $data2 = $this->Rekom_solar_model->get_data_by_id3($id_rekomendasi)->result_array(); 
        
        
        
        usort($data2, function($a, $b) {
            return strtotime($b['tgl_pengajuan']) - strtotime($a['tgl_pengajuan']);
        });
        // Load template Word
        $groupedData = [];
        foreach ($data2 as $row) {
        $tgl_pengajuan = $row['tgl_pengajuan'];
        if (!isset($groupedData[$tgl_pengajuan])) {
            $groupedData[$tgl_pengajuan] = 1; // Inisialisasi dengan 1
            } else {
                $groupedData[$tgl_pengajuan]++; // Tambahkan 1 jika tanggal sudah ada
                }
}

// Cari tgl_pengajuan yang memiliki lebih dari satu entri
$multipleEntriesDates = [];
foreach ($groupedData as $tgl_pengajuan => $count) {
    if ($count > 1) {
        $multipleEntriesDates[] = $tgl_pengajuan;
    }
}

// Cek apakah tgl_pengajuan terbaru ada dalam $multipleEntriesDates
$newestDate = max(array_keys($groupedData)); // Menemukan tgl_pengajuan terbaru

// Cek apakah tgl_pengajuan terbaru memiliki lebih dari 3 entri yang sama
$latestDateCount = isset($groupedData[$newestDate]) ? $groupedData[$newestDate] : 0;
$useCetak4Template = in_array($newestDate, $multipleEntriesDates) && $latestDateCount > 3;

// Set templatePath sesuai dengan hasil pengecekan
if ($useCetak4Template) {
    $templatePath = 'assets/cetak4.docx';
} elseif (in_array($newestDate, $multipleEntriesDates) && $latestDateCount > 2) {
    $templatePath = 'assets/cetak3.docx';
} elseif (in_array($newestDate, $multipleEntriesDates)) {
    $templatePath = 'assets/cetak2.docx';
} else {
    $templatePath = 'assets/cetak.docx';
}

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templatePath);
        // Ganti nilai variabel di template dengan data aktual
        $templateProcessor->setValue('nama_pemilik', $data['nama_pemilik']);
        $templateProcessor->setValue('alamat', $data['alamat']);
        $templateProcessor->setValue('telp', $data['telp']);
        $templateProcessor->setValue('jenis_usaha', $data['jenis_usaha']);
        $templateProcessor->setValue('nomor_surat', $nomor_surat);
        $nama_pemilik= $data['nama_pemilik'];
        
        
        
        // Grouping data berdasarkan tgl_pengajuan
        $groupedData = [];
        foreach ($data2 as $row) {
            $tgl_pengajuan = $row['tgl_pengajuan'];
            $groupedData[$tgl_pengajuan][] = $row;
        }
        
// Calculate the sum of 'konsumsi' values

        // Loop melalui data yang telah dikelompokkan
        foreach ($groupedData as $tgl_pengajuan => $group) {
            $firstRow = $group[0];
            //mengambil data sesuai idspbu
            $id_spbu = $firstRow['id_spbu'];
            $spbu_info = $this->Rekom_solar_model->get_spbu_data_by_id($id_spbu);
            // Mengambil bulan dari tgl_pengajuan
            $bulan = date('n', strtotime($tgl_pengajuan)); // Mengambil angka bulan (01 - 12)
            $bulanRomawi = $this->convertToRoman($bulan); // Mengonversi angka bulan menjadi angka Romawi
             // Mengambil tahun dari tgl_pengajuan
            $tahun = date('Y', strtotime($tgl_pengajuan));
            //menghitung 3 bulan kedepan dari tanggal pengajuan
            $expired_date = date('Y-m-d', strtotime('+1 months', strtotime($tgl_pengajuan)));
            $jumlah = 0;
            foreach ($group as $row) {
            $jumlah += $row['konsumsi'];
            }

            foreach ($group as $index => $row) {
                $templateProcessor->setValue('jenis_alat_' . $index, $row['jenis_alat']);
                $templateProcessor->setValue('jumlah_alat_' . $index, $row['jumlah_alat']);
                $templateProcessor->setValue('fungsi_alat_' . $index, $row['fungsi_alat']);
                $templateProcessor->setValue('konsumsi_' . $index, $row['konsumsi']);
                $templateProcessor->setValue('satuan_kebutuhan_' . $index, $row['satuan_kebutuhan']);
                $templateProcessor->setValue('masa_berlaku_' . $index, date('d F Y', strtotime($expired_date))); // Set nilai masa berlaku dengan nama bulan
                $templateProcessor->setValue('tgl_pengajuan_' . $index, date('d F Y', strtotime($tgl_pengajuan))); // Menggunakan $tgl_pengajuan dari grup
                $templateProcessor->setValue('jumlah_' . $index, $jumlah);
                $templateProcessor->setValue('tahun_' . $index, $tahun);
                $templateProcessor->setValue('bulan_' . $index, $bulanRomawi);
                $templateProcessor->setValue('nama_spbu_' . $index, $spbu_info['nama_spbu']);
                $templateProcessor->setValue('lokasi_spbu_' . $index, $spbu_info['lokasi_spbu']);
                $templateProcessor->setValue('no_spbu_' . $index, $spbu_info['no_spbu']);
            
            }
        }
        
        // Simpan hasil dokumen
        $fileName = 'Surat Rekomendasi Solar_' . $nama_pemilik . '_'. $tgl_pengajuan . '.docx';
        $filePath = FCPATH . $fileName;
        $templateProcessor->saveAs($filePath);
        
        // Set header untuk mengunduh file
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        readfile($filePath);
    }
    private function convertToRoman($number) {
        $romans = array(
            1 => "I", 2 => "II", 3 => "III", 4 => "IV", 5 => "V", 6 => "VI", 7 => "VII", 8 => "VIII", 9 => "IX", 10 => "X",
            11 => "XI", 12 => "XII"
            // Tambahkan nilai romawi hingga 12 sesuai dengan bulan
        );
    
        return $romans[$number];
    }
    
}

?>