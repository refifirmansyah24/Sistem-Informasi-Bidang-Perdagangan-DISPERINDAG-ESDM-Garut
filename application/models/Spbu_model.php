<?php

class Spbu_model extends CI_model{

     public function get_spbu_data()
     {
         $query = $this->db->get('spbu');
     
         if ($query->num_rows() > 0) {
             return $query->result(); // Return SPBU data as an array of objects
         } else {
             return array(); // Return empty array if no SPBU data found
         }
     }
     public function get_spbu_details($spbuId)
    {
        // Query to retrieve SPBU details based on $spbuId
        // Replace 'spbu_table' with your actual SPBU table name
        $query = $this->db->get_where('spbu', array('id_spbu' => $spbuId));

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return SPBU details as an associative array
        } else {
            return array(); // Return empty array if SPBU not found
        }
    }

    //get
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
     public function count_spbu_data()
     {
     return $this->db->count_all_results('spbu');
     }

     public function get_all_spbu_data()
     {
         return $this->db->get('spbu')->result();
     }

        
     public function cariData($keyword)
     {
         $this->db->like('nama_spbu', $keyword);
         $this->db->or_like('no_spbu', $keyword);
         $this->db->or_like('lokasi_spbu', $keyword);
         $this->db->or_like('telp', $keyword);
         $this->db->or_like('tgl_peneraan', $keyword);
         // Tambahkan like clause untuk kolom lain yang ingin Anda dukung dalam pencarian
     
         return $this->db->get('spbu')->result();
     }
     
     
}

?>