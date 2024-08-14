<?php 
//model untuk Read data pada database
    class Kpl_model extends CI_model{ 
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
    //delete data
    public function delete_data($where,$table){ 
        $this->db->where($where);
        $this->db->delete($table);
    }

      //Menjumlahkan Data 
      public function count_kpl_data()
      {
      return $this->db->count_all_results('kpl');
      }

      public function get_all_kpl_data()
      {
          return $this->db->get('kpl')->result();
      }

      public function cariData($keyword)
      {
          $this->db->like('nama_kpl', $keyword);
          $this->db->or_like('pemilik', $keyword);
          $this->db->or_like('alamat', $keyword);
          $this->db->or_like('kecamatan', $keyword);
          $this->db->or_like('no_hp', $keyword);
          $this->db->or_like('dis_1', $keyword);
          $this->db->or_like('dis_2', $keyword);
          $this->db->or_like('keterangan', $keyword);
          // Tambahkan like clause untuk kolom lain yang ingin Anda dukung dalam pencarian
      
          return $this->db->get('kpl')->result();
      }

}

?>