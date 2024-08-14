<?php 
//model untuk Read data pada database
    class Tdg_model extends CI_model{ 
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
      public function count_tdg_data()
      {
      return $this->db->count_all_results('tdg');
      }

      public function get_all_tdg_data()
      {
          return $this->db->get('tdg')->result();
      }

      public function cariData($keyword)
      {
          $this->db->like('nama_pemilik', $keyword);
          $this->db->or_like('alamat_pemilik', $keyword);
          $this->db->or_like('nama_perusahaan', $keyword);
          $this->db->or_like('alamat_perusahaan', $keyword);
          $this->db->or_like('alamat_gudang', $keyword);
          $this->db->or_like('telp_fax', $keyword);
          $this->db->or_like('nib', $keyword);
          $this->db->or_like('npwp', $keyword);
          $this->db->or_like('email', $keyword);
          $this->db->or_like('investasi', $keyword);
          $this->db->or_like('luas_lahan', $keyword);
          $this->db->or_like('luas', $keyword);
          $this->db->or_like('kapasitas', $keyword);
          $this->db->or_like('nomor_tgl_bap', $keyword);
          $this->db->or_like('nomor_tgl_pertek', $keyword);
          $this->db->or_like('nomor_tgl_tdg', $keyword);
          $this->db->or_like('longitud', $keyword);
          $this->db->or_like('latitud', $keyword);
          $this->db->or_like('komoditas_gudang', $keyword);
          // Tambahkan like clause untuk kolom lain yang ingin Anda dukung dalam pencarian
      
          return $this->db->get('tdg')->result();
      }

}

?>