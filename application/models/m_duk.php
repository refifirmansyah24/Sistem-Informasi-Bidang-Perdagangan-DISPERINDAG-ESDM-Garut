<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_duk extends CI_Model {
      public function getAllDataDuk(){
        $this->db->join('data_pegawai', 'data_pegawai.id_pegawai=kgb.id_pegawai');


        return $this->db->get('kgb')->result_array();
    }

     public function getAllDataDuk1(){
        $this->db->join('data_pegawai', 'data_pegawai.id_pegawai=pangkat.id_pegawai');
        return $this->db->get('pangkat')->result_array();
    }

    public function getDataDukById($id){
        return $this->db->get_where('kgb', ['id_kgb'=>$id])->row_array();
    }

          public function getDataDukId($id)
    {
        $this->db->select('nip, nama, pangkat_gol_ruang'); // Pilih kolom 'nip' dan 'nama'
        $this->db->where('id_pegawai', $id); // Berdasarkan 'id_pegawai'
        $query = $this->db->get('data_pegawai');
        
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan data sebagai array
        } else {
            return array(); // Mengembalikan array kosong jika data tidak ditemukan
        }
    }


    public function get_riwayat_kgb_data_with_pegawai()
{
          $this->db->select('*'); 
        $this->db->from('data_pegawai');
        $this->db->join('riwayat_kgb', 'data_pegawai.id_pegawai=riwayat_kgb.id_pegawai');
    
    return $this->db->get()->result();
}

public function get_riwayat_kgb_data_with_pegawai2()
{
    $this->db->select('data_pegawai.*, pangkat.*, jabatan.*, riwayat_pangkat.tmt_pangkat AS tmt_pangkat_riwayat, riwayat_pangkat.tmt_pangkatbaru,jabatan, riwayat_pangkat.tmt_pangkat_selanjutnya'); 
    $this->db->from('data_pegawai');
    $this->db->join('riwayat_pangkat', 'data_pegawai.id_pegawai = riwayat_pangkat.id_pegawai');
    $this->db->join('pangkat', 'data_pegawai.id_pegawai = pangkat.id_pegawai');
    $this->db->join('jabatan', 'data_pegawai.id_jabatan = jabatan.id_jabatan');


    
    $query = $this->db->get()->result();

    // Manually update the dates to maintain the values from riwayat_pangkat
    foreach ($query as $item) {
        $item->tmt_pangkat = $item->tmt_pangkat_riwayat;
    }

    return $query;
}

public function get_riwayat_kgb_data_with_pegawai3()
{
    $this->db->select('*'); 
    $this->db->from('data_pegawai');
    $this->db->join('riwayat_pensiun', 'data_pegawai.id_pegawai = riwayat_pensiun.id_pegawai');
    $this->db->join('jabatan', 'data_pegawai.id_jabatan = jabatan.id_jabatan');    
    
    $query = $this->db->get()->result();

    // Manually update the dates to maintain the values from riwayat_pangka
    return $query;
}




   public function get_data_by_date_range($table, $start_date, $end_date) {
 
        $this->db->where('tmt_pangkat >=', $start_date);
        $this->db->where('tmt_pangkatbaru <=', $end_date);
        return $this->db->get($table);
    }

    // Logika di dalam model
public function ambilDataTersaring($end_date) {
  $this->db->select('rp.*, pangkat.*, dp.nama as nama, dp.nip, dp.pendidikan, dp.pangkat_gol_ruang, jabatan, rp.id_pangkat');

$this->db->select("DATE_FORMAT(rp.tmt_pangkat, '%Y-%m') as tmt_pangkat, DATE_FORMAT(rp.tmt_pangkatbaru, '%Y-%m') as tmt_pangkatbaru");

    $this->db->from('riwayat_pangkat as rp');
    $this->db->join('pangkat as pangkat', 'rp.id_pegawai = pangkat.id_pegawai', 'left');
    $this->db->join('data_pegawai as dp', 'rp.id_pegawai = dp.id_pegawai', 'left');
    $this->db->join('jabatan', 'jabatan.id_jabatan = dp.id_jabatan', 'left');


    $this->db->where('YEAR(rp.tmt_pangkatbaru)', date('Y', strtotime($end_date)));
    $this->db->where('MONTH(rp.tmt_pangkatbaru)', date('m', strtotime($end_date)));

    $query = $this->db->get();
    $result = $query->result();

    return $result;
}


public function ambilDataTersaring2($end_date) {
  $this->db->select('rp.*,dp.nama as nama, dp.nip, dp.tanggal_lahir, dp.pangkat_gol_ruang, rp.id_pensiun,jabatan');

$this->db->select("DATE_FORMAT(rp.tmt_pensiun, '%Y-%m') as tmt_pensiun, DATE_FORMAT(rp.tmt_pensiun, '%Y-%m') as tmt_pensiun");

    $this->db->from('riwayat_pensiun as rp');
    $this->db->join('data_pegawai as dp', 'rp.id_pegawai = dp.id_pegawai', 'left');
    $this->db->join('jabatan', 'jabatan.id_jabatan = dp.id_jabatan', 'left');



    $this->db->where('YEAR(rp.tmt_pensiun)', date('Y', strtotime($end_date)));
    $this->db->where('MONTH(rp.tmt_pensiun)', date('m', strtotime($end_date)));

    $query = $this->db->get();
    $result = $query->result();

    return $result;
}

public function deleteRiwayatPangkat($id_pegawai){
    $this->db->where('id_pegawai', $id_pegawai);
    $this->db->delete('riwayat_pangkat');
}

public function deleteRiwayatPensiun($id_pensiun){
    $this->db->where('id_pensiun', $id_pensiun);
    $this->db->delete('riwayat_pensiun');
}



public function getPangkatDataByPegawaiId($id_pegawai)
{
    return $this->db->where('id_pegawai', $id_pegawai)->get('pangkat')->row();
}







}