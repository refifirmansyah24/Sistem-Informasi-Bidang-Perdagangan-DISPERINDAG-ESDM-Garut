<?php
class Kgb_model extends CI_model
{
 
  public function all_data(){
        $this->db->select('*'); 
        $this->db->from('kgb');
        $this->db->join('data_pegawai', 'kgb.id_pegawai=data_pegawai.id_pegawai');
    return $this->db->get();
}

 public function all_data2(){
        $this->db->select('*'); 
        $this->db->from('pangkat');
        $this->db->join('data_pegawai', 'pangkat.id_pegawai=data_pegawai.id_pegawai');
    return $this->db->get();
}

 public function all_data3(){
        $this->db->select('*'); 
        $this->db->from('data_pegawai');
        $this->db->join('jabatan', 'data_pegawai.id_jabatan=jabatan.id_jabatan');


    return $this->db->get();
}

 public function all_data4(){
        $this->db->select('*'); 
        $this->db->from('jabatan');
    return $this->db->get();
}


    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_data_by_id($id_kgb)
    {
        return $this->db->get_where('kgb', array('id_kgb' => $id_kgb));
    }
      public function get_data_by_id9($id_pegawai)
    {
        return $this->db->get_where('data_pegawai', array('id_pegawai' => $id_pegawai));
    }
     public function get_data_by_id7($id_pangkat1)
    {
        return $this->db->get_where('pangkat', array('id_pangkat1' => $id_pangkat1));
    }

      public function get_data_by_id2($id_pegawai)
    {

        return $this->db->get_where('data_pegawai', array('id_pegawai' => $id_pegawai));
    }

        public function get_data_by_id0($id_jabatan)
    {
        
        return $this->db->get_where('jabatan', array('id_jabatan' => $id_jabatan));
    }

    public function getKgbDataById($id) {
    return $this->db->where('id_kgb', $id)->get('kgb')->row();
    }

     public function getKgbDataById2($id) {
    return $this->db->where('id_pangkat', $id)->get('pangkat')->row();
    }
     public function get_data_by_id3($table, $id) {

        return $this->db->get_where($table, array('id_pegawai' => $id));
    }


        public function get_data_by_id4($table, $id) {

        return $this->db->get_where($table, array('id_pangkat1' => $id));

    }




       public function get_riwayat_data_with_pegawai() {
        $this->db->select('riwayat_kgb.*, data_pegawai.nip, data_pegawai.nama');
        $this->db->from('riwayat_kgb');
        $this->db->join('data_pegawai', 'riwayat_kgb.id_pegawai = data_pegawai.id_pegawai');
        return $this->db->get();
    }






public function get_data_with_jabatan($id_pegawai) {
    $this->db->select('data_pegawai.*, jabatan.jabatan');
    $this->db->from('data_pegawai');
    $this->db->join('jabatan', 'data_pegawai.id_jabatan = jabatan.id_jabatan');
    $this->db->where('data_pegawai.id_pegawai', $id_pegawai);
    
    return $this->db->get()->row_array();
}

public function get_data_with_pangkat($id_pegawai) {
    $this->db->select('data_pegawai.*, pangkat.pangkatbaru');
    $this->db->from('data_pegawai');
    $this->db->join('pangkat', 'data_pegawai.id_pegawai = pangkat.id_pegawai');
    $this->db->where('data_pegawai.id_pegawai', $id_pegawai);
    
    return $this->db->get()->row_array();
}

public function get_data_with_jabatan2($id_pegawai) {
        $this->db->select('data_pegawai.*, jabatan.jabatan');
        $this->db->from('data_pegawai');
        $this->db->join('jabatan', 'data_pegawai.id_jabatan = jabatan.id_jabatan');
        $this->db->where('data_pegawai.id_pegawai', $id_pegawai);
        
        return $this->db->get()->row_array();
    }


public function get_jabatan_by_id($id_jabatan) {
    return $this->db->get_where('jabatan', array('id_jabatan' => $id_jabatan))->row_array();
}



}
?>
