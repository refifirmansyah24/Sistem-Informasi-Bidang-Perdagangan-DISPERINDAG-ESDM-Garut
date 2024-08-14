        <?php 
        class Pengajuan_Pensiun_Model extends CI_model{ 

                public function get_data($table) { 
                    return $this->db->get($table);
                }

                public function insert_data($data,$table){
                    $this->db->insert($table,$data);
                }

        //MODEL UPDATE DATA 
                public function update_data($table, $data, $where){ 
                    $this->db->update($table, $data, $where);
                }

        //HAPUS DATA 
                public function delete_data($where, $table) { 
                    $this->db->where($where);
                    $this->db->delete($table);
                }

            }
        ?> 