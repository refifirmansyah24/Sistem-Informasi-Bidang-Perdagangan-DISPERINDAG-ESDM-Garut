<?php

class User_model extends CI_Model{
	public function ambil_data($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('user')->row();
	}

	public function get_data($table) {
        $query = $this->db->get($table);
        return $query;
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
}

?>