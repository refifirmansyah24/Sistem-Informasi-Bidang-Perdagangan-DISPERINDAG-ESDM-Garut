<?php
class Perpanjangan_rekom_model extends CI_Model
{
    public function get_data(){
        $this->db->select('*');
        $this->db->from('rekomendasi');
       return $this->db->get('');
}

    //TAMBAH DATA 
    public function insert_data($table, $data, $where){ 
        $this->db->insert($table, $data, $where);
    }
    public function insert_data2($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function detail_data($id = NULL) { 
        $query = $this->db->get_where('rekomendasi', array('id_rekomendasi' => $id))->row();
        return $query;
    }

    public function detail_data2($id = NULL) { 
        $query = $this->db->get_where('kebutuhan_bbm', array('id_rekomendasi' => $id))->row();
        return $query;
    }
    public function detail_dataJoin($id)
    {
        $this->db->select('r.*, s.no_spbu, s.nama_spbu, s.lokasi_spbu');
        $this->db->from('kebutuhan_bbm r');
        $this->db->join('spbu s', 'r.id_spbu = s.id_spbu');
        $this->db->where('r.id_rekomendasi', $id);
        $query = $this->db->get();
        return $query->result();
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

}

?>