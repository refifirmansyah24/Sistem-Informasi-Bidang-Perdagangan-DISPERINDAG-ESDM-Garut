<?php
class Pangkalan_model extends CI_Model
{
    public function get_data(){
        $this->db->select('pangkalan.*, agen.nama_agen');
        $this->db->from('pangkalan');
        $this->db->join('agen', 'pangkalan.id_agen = agen.id_agen');
        return $this->db->get()->result();
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
      
//Menjumlahkan Data 
public function count_pangkalan_data()
{
    return $this->db->count_all_results('pangkalan');
}

public function get_all_pangkalan_data()
      {
        $this->db->select('*');
        $this->db->from('pangkalan');
        $this->db->join('agen', 'pangkalan.id_agen = agen.id_agen');
        return $this->db->get('')->result();
      }

      public function cariData($keyword)
      {
          $this->db->select('*');
          $this->db->from('pangkalan');
          $this->db->join('agen', 'pangkalan.id_agen = agen.id_agen');
          $this->db->like('pangkalan', $keyword);
          $this->db->or_like('kecamatan', $keyword);
          $this->db->or_like('kelurahan', $keyword);
          $this->db->or_like('alamat_pangkalan', $keyword);
          $this->db->or_like('id_registrasi', $keyword);
          // Tambahkan like clause untuk kolom lain yang ingin Anda dukung dalam pencarian
          
          return $this->db->get()->result();
      }
}  

?>