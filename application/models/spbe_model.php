<?php

class Spbe_model extends CI_model{

    public function get_spbe_data()
    {
        $query = $this->db->get('spbe');
    
        if ($query->num_rows() > 0) {
             return $query->result(); // Return SPBU data as an array of objects
        } else {
             return array(); // Return empty array if no SPBU data found
        }
    }
    public function get_spbe_details($spbeId)
    {
        // Query to retrieve SPBU details based on $spbuId
        // Replace 'spbu_table' with your actual SPBU table name
        $query = $this->db->get_where('spbe', array('id_spbe' => $spbeId));

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
    public function count_spbe_data()
    {
    return $this->db->count_all_results('spbe');
    }

    public function get_all_spbe_data()
    {
        return $this->db->get('spbe')->result();
    }

           
    public function cariData($keyword)
    {
        $this->db->like('nama_perusahaan', $keyword);
        $this->db->or_like('nama_pemilik', $keyword);
        $this->db->or_like('alamat_kantor', $keyword);
        $this->db->or_like('telp', $keyword);
        // Tambahkan like clause untuk kolom lain yang ingin Anda dukung dalam pencarian
    
        return $this->db->get('spbe')->result();
    }
    
    
}

?>