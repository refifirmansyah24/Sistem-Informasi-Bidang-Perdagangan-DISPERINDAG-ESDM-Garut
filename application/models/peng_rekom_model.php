<?php 
//model untuk Read data pada database
    class Peng_rekom_model extends CI_model
        {
            public function get_data(){
                $this->db->select('*');
                $this->db->from('rekomendasi');
               return $this->db->get('');
        }
    //model untuk insert data 
    public function insert_data($data, $table){ 
        $this->db->insert($table, $data);
    }
    //UPDATE DATA
    public function update_data($table, $data, $where){ 
        $this->db->update($table, $data, $where);
    }
    //delete data
    public function delete_data($where,$table){ 
        $this->db->where($where);
        $this->db->delete($table);
    }

    //get data by id 
    public function get_data_by_id($id_rekomendasi)
    { 
        return $this->db->get_where('rekomendasi', array('id_rekomendasi' => $id_rekomendasi));
    }

     //Menjumlahkan Data 
     public function count_pengajuan_data()
     {
     return $this->db->count_all_results('rekomendasi');
     }
     
     public function cariData($keyword)
     {
         $this->db->like('nama_pemilik', $keyword);
         $this->db->or_like('nik', $keyword);
         $this->db->or_like('no_surat', $keyword);
         $this->db->or_like('alamat', $keyword);
         $this->db->or_like('telp', $keyword);
         $this->db->or_like('nama_usaha', $keyword);
         $this->db->or_like('jenis_usaha', $keyword);
         // Tambahkan like clause untuk kolom lain yang ingin Anda dukung dalam pencarian
     
         return $this->db->get('rekomendasi')->result();
     }
}

?>