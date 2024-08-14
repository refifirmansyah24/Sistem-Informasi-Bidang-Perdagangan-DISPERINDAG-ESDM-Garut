<?php
class Proses_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tambah_data_riwayat_kgb($data)
    {
        $this->db->insert('riwayat_kgb', $data);
    }

    public function update_data_kgb($data, $where)
    {
        $this->db->update('kgb', $data, $where);
    }
     public function update_data_pangkat($data, $where)
    {
        $this->db->update('pangkat', $data, $where);
    }

    public function get_riwayat_kgb_data($table)
    {
    $this->db->select('riwayat_kgb.*, data_pegawai.nip, data_pegawai.nama');
        $this->db->from('riwayat_kgb');
        $this->db->join('data_pegawai', 'riwayat_kgb.id_pegawai=riwayat_kgb.id_pegawai');
    return $this->db->get();
        return $this->db->get($table);
        }
    public function get_riwayat_kgb_data_with_pegawai()
    {
        $this->db->select('*'); 
            $this->db->from('riwayat_kgb');
            $this->db->join('data_pegawai', 'riwayat_kgb.id_pegawai=riwayat_kgb.id_pegawai');
        return $this->db->get();
    }

       public function get_riwayat_pangkat_data_with_pegawai()
    {
        $this->db->select('*'); 
            $this->db->from('riwayat_pangkat');
            $this->db->join('data_pegawai', 'riwayat_pangkat.id_pegawai=riwayat_pangkat.id_pegawai');
        return $this->db->get();
    }


// Kepangkatan
    public function tambah_data_riwayat_pangkat($data)
        {
            $this->db->insert('riwayat_pangkat',$data);
        }

    public function get_riwayat_pangkat_data($table)
    {
    $this->db->select('riwayat_pangkat.*, data_pegawai.nip, data_pegawai.nama');
        $this->db->from('riwayat_pangkat');
        $this->db->join('data_pegawai', 'riwayat_pangkat.id_pegawai=riwayat_pangkat.id_pegawai');
    return $this->db->get();
    }
  
    // Tambahkan fungsi lain jika diperlukan untuk operasi lainnya pada model "Proses_model"
}
?>
