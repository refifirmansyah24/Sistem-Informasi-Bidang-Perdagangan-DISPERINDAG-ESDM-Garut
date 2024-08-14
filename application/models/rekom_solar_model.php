<?php
class Rekom_solar_model extends CI_Model
{
    public function get_data(){
        $this->db->select('*');
        $this->db->from('rekomendasi');
        $this->db->join('kebutuhan_bbm', 'rekomendasi.id_rekomendasi = kebutuhan_bbm.id_rekomendasi');
    return $this->db->get('');
}

//Tambah Data Solar Model 
public function insert_data($rekomendasi_input_data, $kebutuhan_bbm_input_data)
{
    // Table Rekomendasi
    $this->db->insert('rekomendasi', $rekomendasi_input_data);
    $id_rekomendasi = $this->db->insert_id();

    // Table Kebutuhan BBM
    foreach ($kebutuhan_bbm_input_data as $kebutuhan_bbm) {
        $kebutuhan_bbm['id_rekomendasi'] = $id_rekomendasi;
        $this->db->insert('kebutuhan_bbm', $kebutuhan_bbm);
    }

    return $id_rekomendasi;
}

 // UPDATE DATA SOLAR MODEL
 

 //DELETE DATA 
 public function delete_data($id_rekomendasi)
 {
     // Delete data from 'kebutuhan_bbm' table first
     $this->db->where('id_rekomendasi', $id_rekomendasi);
     $this->db->delete('kebutuhan_bbm');

     // Delete data from 'rekomendasi' table
     $this->db->where('id_rekomendasi', $id_rekomendasi);
     $this->db->delete('rekomendasi');
 }

 public function get_data_by_date_range($start_date, $end_date) {
    // Sesuaikan dengan struktur tabel dan kolom yang Anda gunakan
    $this->db->select('r.*, k.*'); // Select all columns from both tables
    $this->db->from('rekomendasi r');
    $this->db->join('kebutuhan_bbm k', 'r.id_rekomendasi = k.id_rekomendasi', 'inner');
    $this->db->where('k.tgl_pengajuan >=', $start_date);
    $this->db->where('k.tgl_pengajuan <=', $end_date);
    $query = $this->db->get();
    return $query->result();
}

public function get_data_by_id($id_rekomendasi) {
    // Mengambil data dari database berdasarkan ID
    $query = $this->db->get_where('rekomendasi', array('id_rekomendasi' => $id_rekomendasi));
    return $query->row(); // Mengembalikan satu baris data
}

public function get_data_by_id2($id_rekomendasi)
{
    return $this->db->get_where('rekomendasi', array('id_rekomendasi' => $id_rekomendasi));
}

public function get_data_by_id3($id_rekomendasi)
{
    return $this->db->get_where('kebutuhan_bbm', array('id_rekomendasi' => $id_rekomendasi));
}
//get spbu 
public function get_spbu_data_by_id_rekomendasi($id_rekomendasi)
    {
        // Menggunakan JOIN untuk menghubungkan tabel rekomendasi, kebutuhan_bbm, dan spbu
        $this->db->select('r.*, s.no_spbu, s.nama_spbu, s.lokasi_spbu');
        $this->db->from('kebutuhan_bbm r');
        $this->db->join('spbu s', 'r.id_spbu = s.id_spbu');
        $this->db->where('r.id_rekomendasi', $id_rekomendasi);
        $query = $this->db->get();
        $result = $query->row();
        $spbu_data = [
            'nama_spbu' => isset($result->nama_spbu) ? $result->nama_spbu : 'Nama SPBU tidak ditemukan',
            'lokasi_spbu' => isset($result->lokasi_spbu) ? $result->lokasi_spbu : 'Lokasi SPBU tidak ditemukan',
            'no_spbu' => isset($result->no_spbu) ? $result->no_spbu : 'Lokasi SPBU tidak ditemukan'
        ];
            
        return $spbu_data;
    }

    public function get_spbu_data_by_id($id_spbu) {
        $this->db->where('id_spbu', $id_spbu);
        $query = $this->db->get('spbu');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array(
                'nama_spbu' => 'Nama SPBU tidak ditemukan',
                'lokasi_spbu' => 'Lokasi SPBU tidak ditemukan',
                'no_spbu' => 'Lokasi SPBU tidak ditemukan'
            );
        }
    }

    public function get_filtered_data($start_date, $end_date)
    {
        $this->db->select('r.*, k.*');
        $this->db->from('rekomendasi r');
        $this->db->join('kebutuhan_bbm k', 'r.id_rekomendasi = k.id_rekomendasi', 'inner');
        $this->db->where('k.tgl_pengajuan >=', $start_date);
        $this->db->where('k.tgl_pengajuan <=', $end_date);
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>