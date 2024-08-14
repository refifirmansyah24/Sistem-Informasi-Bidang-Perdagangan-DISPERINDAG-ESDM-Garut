<?php

class User extends CI_Controller {
    public function index() {
        $data['title'] = "User";
        $data['user'] = $this->user_model->get_data('user')->result();

        // Muat tampilan dengan data yang diambil
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_user()
{
    $data['title'] = "Tambah User";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/tambah_user', $data);
    $this->load->view('templates_administrator/footer');
}
public function tambah_data_aksi() 
{ 
    $this->_rules();
    if($this->form_validation->run() == FALSE) { 
        $this->tambah_user();
    } else{
        $username   = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $password2   = $this->input->post('password2');
        $email   = $this->input->post('email');
        $level   = $this->input->post('level');
        $blokir   = $this->input->post('blokir');

        $data = array(
            'username' => $username,
            'password' => $password,
            'password2' => $password2,
            'level' => $level,
            'email' => $email,
            'blokir' => $blokir,
          
        );
        $this->user_model->insert_data($data, 'user');
         //memunculkan alerts untuk pesan alert nya diambil di bootsstrap
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Ditambahkan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');
         redirect('administrator/user');
        

    }
}

//UPDATE USER 
public function update_user($id)
{
    $where = array ('id_user' => $id);
    $data['user'] = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->result();
    $data['title'] = "Update Data user";
    $this->load->view('templates_administrator/header', $data);
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/update_user', $data);
    $this->load->view('templates_administrator/footer');
}
public function update_data_aksi() 
{ 
    $this->_rules();
    if ($this->form_validation->run() == FALSE) { 
        $this->update_user($this->input->post('id_user')); // Mengirimkan kembali ID user ke fungsi update_user
    } else {
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password'); // Mengambil kata sandi yang belum di-hash
        $password2 = $this->input->post('password2');
        $email = $this->input->post('email');
        $blokir = $this->input->post('blokir');

        // Jika password diubah, kita hash password baru menggunakan MD5
        if (!empty($password)) {
            $password = md5($password);
        }

        $data = array(
            'username' => $username,
            'password' => $password,
            'password2' => $password2,
            'email' => $email,
            'blokir' => $blokir,
        );

        $where = array(
            'id_user' => $id_user
        );

        $this->user_model->update_data('user', $data, $where);

        // Menampilkan pesan alert
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Data Berhasil Diupdate!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>');

        redirect('administrator/user');
    }
}
public function _rules()
    {
        $this->form_validation->set_rules('username','Username','required');
      
    }

//DELETE USER 
public function delete_data($id)
       { 
        $where = array ('id_user' => $id);
        $this->user_model->delete_data($where, 'user');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('administrator/user');
       }


}



?>