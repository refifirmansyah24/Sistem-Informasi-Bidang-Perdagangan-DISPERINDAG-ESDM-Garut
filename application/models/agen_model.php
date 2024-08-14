<?php
class Agen_model extends CI_Model
{
    public function get_data()
    {
        $this->db->select('agen.*, spbe.nama_perusahaan'); // Menambahkan kolom nama_perusahaan
        $this->db->from('agen');
        $this->db->join('spbe', 'agen.id_spbe = spbe.id_spbe');
        return $this->db->get()->result();
    }

public function get_agen_data()
{
    $query = $this->db->get('agen');

    if ($query->num_rows() > 0) {
         return $query->result(); // Return SPBU data as an array of objects
    } else {
         return array(); // Return empty array if no SPBU data found
    }
}

//insertdata
public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

  //UPDATE DATA
public function update_data($table, $data, $where)
    { 
    $this->db->update($table, $data, $where);
    }

//delete data
public function delete_data($where,$table){ 
    $this->db->where($where);
    $this->db->delete($table);
    }

    public function delete_related_data($id)
    {
        $this->db->trans_start(); // Memulai transaksi

        // Hapus data dari tabel riwayat_kgb berdasarkan id_pegawai
        $this->db->where('id_agen', $id);
        $this->db->delete('agen');

        // Hapus data dari tabel kgb berdasarkan id_pegawai
        $this->db->where('id_agen', $id);
        $this->db->delete('pangkalan');

        $this->db->trans_complete(); // Menyelesaikan transaksi

        // Periksa apakah transaksi berhasil
        if ($this->db->trans_status() === FALSE) {
            return false; // Gagal
        }

        return true; // Berhasil
    }

//Menjumlahkan Data 
public function count_agen_data()
    {
        return $this->db->count_all_results('agen');
    }
    
    public function getAgenWithPangkalanCount() {
        $query = $this->db->select('agen.id_agen, agen.nama_agen, agen.alamat_agen, agen.pso, agen.id_spbe, spbe.nama_perusahaan, COUNT(pangkalan.id_pangkalan) as jumlah_pangkalan_memilih')
                          ->from('agen')
                          ->join('pangkalan', 'pangkalan.id_agen = agen.id_agen', 'left')
                          ->join('spbe', 'spbe.id_spbe = agen.id_spbe', 'left')
                          ->group_by('agen.id_agen')
                          ->get();
        return $query->result();
    }
    public function getPangkalanCountForAgen($id_agen) {
        $query = $this->db->select('COUNT(pangkalan.id_pangkalan) as jumlah_pangkalan_memilih, spbe.nama_perusahaan')
                          ->from('pangkalan')
                          ->join('agen', 'agen.id_spbe = pangkalan.id_spbe', 'left')
                          ->join('spbe', 'agen.id_spbe = spbe.id_spbe', 'left')
                          ->where('agen.id_agen', $id_agen)
                          ->get();
        $result = $query->row();
        return $result;
    }
    public function getAllAgenWithSPBE() {
        // SELECT agen.*, spbe.nama_perusahaan FROM agen LEFT JOIN spbe ON agen.id_spbe = spbe.id_spbe;
        $this->db->select('agen.*, spbe.nama_perusahaan');
        $this->db->from('agen');
        $this->db->join('spbe', 'agen.id_spbe = spbe.id_spbe', 'left');
        
        $query = $this->db->get();
        return $query->result(); // Returns an array of objects from the query result
    }

    public function cariData($keyword)
    {
        $this->db->select('agen.*, spbe.nama_perusahaan, COUNT(pangkalan.id_pangkalan) as jumlah_pangkalan_memilih');
        $this->db->from('agen');
        $this->db->join('spbe', 'agen.id_spbe = spbe.id_spbe', 'left');
        $this->db->join('pangkalan', 'pangkalan.id_agen = agen.id_agen', 'left');
        $this->db->group_by('agen.id_agen');
        
        $this->db->like('nama_agen', $keyword);
        $this->db->or_like('alamat_agen', $keyword);
        $this->db->or_like('pso', $keyword);
        // Add more like clauses for other columns you want to support in the search
        
        return $this->db->get()->result();
}
}


?>