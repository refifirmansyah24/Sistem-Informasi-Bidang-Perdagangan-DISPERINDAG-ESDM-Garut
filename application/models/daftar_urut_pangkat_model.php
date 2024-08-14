<?php 
//model untuk Read data pada database
    class Daftar_urut_pangkat_model extends CI_model{ 
        public function get_data($table){ 
            return $this->db->get($table);
        }

    //model untuk insert data 
    public function insert_data($data, $table){ 
        $this->db->insert($table, $data);
    }
    //UPDATE DATA
    public function update_data($table, $data, $where){ 
        $this->db->update($table, $data, $where);
    }
    public function delete_related_data($id)
    {
        $this->db->trans_start(); // Memulai transaksi

        // Hapus data dari tabel riwayat_kgb berdasarkan id_pegawai
        $this->db->where('id_pegawai', $id);
        $this->db->delete('riwayat_kgb');

        // Hapus data dari tabel kgb berdasarkan id_pegawai
        $this->db->where('id_pegawai', $id);
        $this->db->delete('kgb');

        

        // Hapus data dari tabel pegawai berdasarkan id_pegawai
        $this->db->where('id_pegawai', $id);
        $this->db->delete('data_pegawai');

        $this->db->where('id_pegawai', $id);
        $this->db->delete('riwayat_pangkat');

        $this->db->where('id_pegawai', $id);
        $this->db->delete('riwayat_pensiun');

        $this->db->where('id_pegawai', $id);
        $this->db->delete('pangkat');

        $this->db->trans_complete(); // Menyelesaikan transaksi

        // Periksa apakah transaksi berhasil
        if ($this->db->trans_status() === FALSE) {
            return false; // Gagal
        }

        return true; // Berhasil
    }


     public function delete_related_data2($id)
    {
        $this->db->trans_start(); // Memulai transaksi

        // Hapus data dari tabel riwayat_kgb berdasarkan id_pegawai
        // $this->db->where('id_jabatan', $id);
        // $this->db->delete('data_pegawai');

        // Hapus data dari tabel kgb berdasarkan id_pegawai
        $this->db->where('id_jabatan', $id);
        $this->db->delete('jabatan');


        $this->db->trans_complete(); // Menyelesaikan transaksi

        // Periksa apakah transaksi berhasil
        if ($this->db->trans_status() === FALSE) {
            return false; // Gagal
        }

        return true; // Berhasil
    }

   public function get_keyword($keyword){
    $this->db->select('*');
    $this->db->from('data_pegawai');
    $this->db->join('jabatan', 'data_pegawai.id_jabatan=jabatan.id_jabatan');
    $this->db->like('nama', $keyword);
    $this->db->or_like('pangkat_gol_ruang', $keyword);
    $this->db->or_like('jabatan', $keyword);
    $this->db->or_like('eselon', $keyword);
    $this->db->or_like('unit_bidang', $keyword);
    $this->db->or_like('bidang', $keyword);
    $this->db->or_like('nip', $keyword);

    return $this->db->get()->result();
}

public function get_keyword2($keyword){
    $this->db->select('*');
    $this->db->from('kgb');
    $this->db->join('data_pegawai', 'data_pegawai.id_pegawai=kgb.id_pegawai');
    $this->db->like('nama', $keyword);
    $this->db->or_like('pejabat_sk', $keyword);
    $this->db->or_like('tgl_sk', $keyword);
    $this->db->or_like('gaji_plama', $keyword);
    $this->db->or_like('gaji_pokok', $keyword);
    $this->db->or_like('ket', $keyword);
    $this->db->or_like('no_sk', $keyword);

    return $this->db->get()->result();
}

public function get_keyword3($keyword){
    $this->db->select('*');
    $this->db->from('pangkat');
    $this->db->join('data_pegawai', 'data_pegawai.id_pegawai=pangkat.id_pegawai');
    $this->db->like('nama', $keyword);
    $this->db->or_like('nip', $keyword);
    $this->db->or_like('pangkatbaru', $keyword);
    $this->db->or_like('tmt_pangkat', $keyword);
    $this->db->or_like('tmt_pangkatbaru', $keyword);
    $this->db->or_like('ms_kerja_baru', $keyword);
    $this->db->or_like('ms_kerja_lama', $keyword);

    return $this->db->get()->result();
}

} 

?>