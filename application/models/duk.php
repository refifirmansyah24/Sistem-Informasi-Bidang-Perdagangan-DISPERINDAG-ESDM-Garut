<?php
class Duk extends CI_model
{
 
  public function all_data(){
        $this->db->select('*');
        $this->db->from('data_pegawai');
    return $this->db->get();
}

  public function all_data2(){
        $this->db->select('*');
        $this->db->from('data_pegawai');
    return $this->db->get();
}

    public function getAllDataPegawai() {
          return $this->db->get('data_pegawai')->result();
      }

     public function getAllDataPegawai1() {
          return $this->db->get('jabatan')->result();
      }


   public function getAllNamaPegawai() {
    $query = $this->db->select('id_pegawai, nama')
                      ->from('data_pegawai')
                      ->get();

    return $query->result();
}

      public function duk1()
    {
        $query = $this->db->get('data_pegawai');
    
        if ($query->num_rows() > 0) {
             return $query->result(); // Return SPBU data as an array of objects
        } else {
             return array(); // Return empty array if no SPBU data found
        }
    }
public function insert_data($data, $table)
{
    $inserted = $this->db->insert($table, $data);
    if ($inserted) {
        echo "Data berhasil dimasukkan.";
    } else {
        echo "Terjadi kesalahan saat memasukkan data.";
    }
}







}