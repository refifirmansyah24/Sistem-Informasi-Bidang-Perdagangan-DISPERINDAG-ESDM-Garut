<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>Dashboard
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat Datang <strong> <?php echo $username; ?> </strong> di Sistem Informasi Bidang Perdagangan Disperindag
            ESDM Kabupaten
            Garut, Anda login Sebagai <strong><?php echo $level; ?></strong></p>
        <hr>



    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <!-- Menggunakan tag <a> untuk membuat tautan ke halaman pengajuan_rekom -->
                                <a href="<?php echo base_url('administrator/tdg'); ?>" class="text-primary">
                                    Tanda Daftar Gudang
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- MEMANGGIL JUMLAH DATA JABATAN DI DATABASE DENGAN CONTROLLER -->
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_tdg; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <!-- Menggunakan tag <a> untuk membuat tautan ke halaman pengajuan_rekom -->
                                <a href="<?php echo base_url('administrator/pengajuan_rekom'); ?>" class="text-primary">
                                    Pengajuan Rekomendasi
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- MEMANGGIL JUMLAH DATA JABATAN DI DATABASE DENGAN CONTROLLER -->
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_pengajuan; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <!-- Menggunakan tag <a> untuk membuat tautan ke halaman pengajuan_rekom -->
                                <a href="<?php echo base_url('administrator/spbu'); ?>" class="text-primary">
                                    SPBU
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- MEMANGGIL JUMLAH DATA JABATAN DI DATABASE DENGAN CONTROLLER -->
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_spbu; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <!-- Menggunakan tag <a> untuk membuat tautan ke halaman pengajuan_rekom -->
                                <a href="<?php echo base_url('administrator/spbe'); ?>" class="text-primary">
                                    SPBE
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- MEMANGGIL JUMLAH DATA JABATAN DI DATABASE DENGAN CONTROLLER -->
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_spbe; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <!-- Menggunakan tag <a> untuk membuat tautan ke halaman pengajuan_rekom -->
                                <a href="<?php echo base_url('administrator/agen'); ?>" class="text-primary">
                                    Agen
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- MEMANGGIL JUMLAH DATA JABATAN DI DATABASE DENGAN CONTROLLER -->
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_agen; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <!-- Menggunakan tag <a> untuk membuat tautan ke halaman pengajuan_rekom -->
                                <a href="<?php echo base_url('administrator/pangkalan'); ?>" class="text-primary">
                                    Pangkalan
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- MEMANGGIL JUMLAH DATA JABATAN DI DATABASE DENGAN CONTROLLER -->
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_pangkalan; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <!-- Menggunakan tag <a> untuk membuat tautan ke halaman pengajuan_rekom -->
                                <a href="<?php echo base_url('administrator/kpl'); ?>" class="text-primary">
                                    Kios Pupuk Lengkap
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- MEMANGGIL JUMLAH DATA JABATAN DI DATABASE DENGAN CONTROLLER -->
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_kpl; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>