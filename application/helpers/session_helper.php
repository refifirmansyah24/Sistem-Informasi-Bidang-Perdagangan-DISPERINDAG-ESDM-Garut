<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

function check_session() {
    $CI = &get_instance();
    
    if (!isset($CI->session->userdata['username'])) {
        $CI->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
                <button type="button" class="close" data-dismis="allert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('administrator/auth');
    }
}

function check_user_role($requiredRole = 'Super Admin') {
    $CI = &get_instance();
    
    check_session(); // Memanggil fungsi untuk mengecek sesi
    
    $data = $CI->user_model->ambil_data($CI->session->userdata('username'));
    $userLevel = $data->level;
    
    if ($userLevel !== $requiredRole) {
        echo "Anda tidak memiliki otorisasi untuk mengakses halaman ini";
        exit;
    }
}
