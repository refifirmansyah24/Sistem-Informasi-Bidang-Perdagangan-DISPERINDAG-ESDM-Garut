<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Anda</title>
    <link rel="stylesheet" href="link-ke-file-css-anda.css"> <!-- Sertakan file CSS eksternal Anda jika ada -->
    <style>
    .navbar-search {
        width: 300px;
        /* Sesuaikan lebar yang Anda inginkan */
    }

    .navbar-search .input-group {
        width: 100%;
    }

    .navbar-search .form-control {
        width: 100%;
    }

    /* Gantilah sesuai dengan style yang Anda inginkan */
    .table-container {
        overflow-x: auto;
        padding-left: 80px;
        padding-right: 80px;
        padding-top: 100px;
    }

    .table-container table {
        min-width: 100%;
    }

    .head-er {
        font-size: 20px;
    }

    /* Kode CSS untuk animasi "fade in" */
    .fade-in {
        animation: fadeInAnimation 1s ease-in forwards;
        opacity: 0;
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .navbar-search button {
        margin-top: 15px;
        margin-bottom: 15px;
        margin-left: 5px;
        /* Ubah jarak di sisi kanan sesuai kebutuhan Anda */
        /* Gaya lainnya sesuai keinginan Anda */
    }

    .judul {
        margin-top: 15px;
        margin-bottom: 25px;
    }
    </style>
</head>

<?php
// Tentukan berapa banyak data yang akan ditampilkan per halaman
$dataPerPage = 20;

// Hitung jumlah halaman yang dibutuhkan
$totalPages = ceil(count($tdg) / $dataPerPage);

// Ambil parameter halaman yang sedang aktif
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung indeks data yang akan ditampilkan pada halaman tertentu
$startIndex = ($currentPage - 1) * $dataPerPage;

// Ambil data yang sesuai dengan halaman yang sedang aktif
$displayData = array_slice($tdg, $startIndex, $dataPerPage);
?>

<body>
    <!-- Isi halaman Anda -->
    <div class="container-fluid">

        <div class="table-responsive table-container fade-in">
            <!-- Form Pencarian -->
            <form action="<?php echo site_url('administrator/l_tdg/cari_data'); ?>" method="get"
                class="ml-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group" style="display: flex;">
                    <!-- Letakkan input dan tombol dalam satu div dengan style "display: flex;" -->
                    <input type="text" name="keyword" class="form-control bg-light border-1 small mr-2"
                        placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                    <!-- Tambahkan tombol pencarian di sisi kanan input dengan ikon Font Awesome -->
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="bx bx-search"></i> <!-- Ikon pencarian Font Awesome -->
                            Cari
                        </button>
                    </div>
                </div>
            </form>
            <!-- Tampilkan pesan jika data tidak ditemukan -->
            <?php if (empty($tdg)) : ?>
            <div class="text-center mt-3">
                <strong>Data Tanda Daftar Gudang Tidak Ditemukan</strong>
            </div>
            <?php else : ?>
            <h3 class="text-center head-er judul"><strong>List Tanda Daftar Gudang Garut</strong></h3>
            <p class="text-right">Jumlah Data Tanda Daftar Gudang: <?php echo count($tdg); ?></p>
            <!-- Tampilkan tabel jika data ditemukan -->
            <table class="table table-bordered table-striped mt-2" style="padding-left: 20px;">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pemilik</th>
                    <th class="text-center">Alamat Pemilik</th>
                    <th class="text-center">Nama Perusahaan</th>
                    <th class="text-center">Alamat Perusahaan</th>
                    <th class="text-center">Alamat Gudang</th>
                    <th class="text-center">Telp/Fax</th>
                    <th class="text-center">NIB</th>
                    <th class="text-center">NPWP</th>
                    <th class="text-center">E Mail</th>
                    <th class="text-center">Luas Lahan (M2)</th>
                    <th class="text-center">Luas (M2)</th>
                    <th class="text-center">Kapasitas (M3/TON)</th>
                    <th class="text-center">Komoditas Gudang</th>
                </tr>
                <?php   $no = 1;
                    foreach ($displayData as $t) : ?>
                <tr>
                    <!-- panggil variabel increment otomatis nya -->
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $t->nama_pemilik ?></td>
                    <td class="text-center"><?php echo $t->alamat_pemilik ?></td>
                    <td class="text-center"><?php echo $t->nama_perusahaan ?></td>
                    <td class="text-center"><?php echo $t->alamat_perusahaan ?></td>
                    <td class="text-center"><?php echo $t->alamat_gudang ?></td>
                    <td class="text-center"><?php echo $t->telp_fax ?></td>
                    <td class="text-center"><?php echo $t->nib ?></td>
                    <td class="text-center"><?php echo $t->npwp ?></td>
                    <td class="text-center"><?php echo $t->email ?></td>
                    <td class="text-center"><?php echo $t->luas_lahan ?></td>
                    <td class="text-center"><?php echo $t->luas ?></td>
                    <td class="text-center"><?php echo $t->kapasitas ?></td>
                    <td class="text-center"><?php echo $t->komoditas_gudang ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <!-- Tambahkan navigasi pagination -->
            <div class="text-right">
                <p>Halaman : <?php echo $currentPage; ?></p> <!-- Menampilkan nomor halaman -->

                <ul class="pagination">
                    <!-- Tombol "Halaman Sebelumnya" -->
                    <?php if ($currentPage > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">Halaman Sebelumnya</a>
                    </li>
                    <?php endif; ?>

                    <!-- Tombol halaman -->
                    <?php for ($i = $currentPage; $i <= min($currentPage + 2, $totalPages); $i++) : ?>
                    <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>

                    <!-- Tombol "Halaman Selanjutnya" jika lebih dari 3 halaman -->
                    <?php if ($totalPages > 3 && $currentPage < $totalPages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Halaman Selanjutnya</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".fade-in").css("opacity", "1"); // Mengubah opacity menjadi 1 untuk memulai animasi fade in
    });
    </script>
</body>

</html>
<?php endif; ?>