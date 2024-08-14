<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .gambar-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        max-height: 200px;
        overflow: hidden;
    }

    .gambar-container img {
        max-width: 90%;
        max-height: 100%;
    }

    .card {
        max-width: 400px;
        /* Ganti nilai sesuai keinginan Anda */
        margin: 0 auto;
        /* Untuk mengatur agar kotak berada di tengah layar */
    }

    .small {
        font-size: 14px;
        /* Atur ukuran teks kecil sesuai keinginan Anda */
        margin-top: 10px;
        /* Atur margin top sesuai keinginan Anda */
        display: block;
        /* Membuat tautan menjadi elemen blok */
        text-align: center;
        /* Rata tengah teks */
    }

    .fade-in {
        opacity: 0;
        animation: fadeIn 1s ease-in-out forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-5">
                <div class="card o-hidden border-0 shadow-lg my-5 fade-in">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <div class="gambar-container">
                                            <img src="<?php echo base_url('assets/logo.png'); ?>" alt="Gambar">
                                        </div>
                                        <h1 class="h5 text-gray-900 mb-4">Selamat Datang di Sistem Informasi Bidang
                                            Perdagangan Disperindag
                                            ESDM Garut</h1>
                                        <?php echo $this->session->flashdata('pesan') ?>
                                    </div>
                                    <form method="post"
                                        action="<?php echo base_url('administrator/auth/proses_login') ?>" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username Anda" name="username">
                                            <?php echo form_error('username','<div class="text-danger small ml-3">','</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password Anda" name="password">
                                            <?php echo form_error('password','<div class="text-danger small ml-3">','</div>') ?>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">Login</button>
                                        <a class="small" href="<?php echo base_url(''); ?>">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>