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
$totalPages = ceil(count($spbu) / $dataPerPage);

// Ambil parameter halaman yang sedang aktif
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung indeks data yang akan ditampilkan pada halaman tertentu
$startIndex = ($currentPage - 1) * $dataPerPage;

// Ambil data yang sesuai dengan halaman yang sedang aktif
$displayData = array_slice($spbu, $startIndex, $dataPerPage);
?>

<body>
    <!-- Isi halaman Anda -->
    <div class="container-fluid">

        <div class="table-responsive table-container fade-in">
            <!-- Form Pencarian -->
            <form action="<?php echo site_url('administrator/l_spbu/cari_data'); ?>" method="get"
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
            <?php if (empty($spbu)) : ?>
            <div class="text-center mt-3">
                <strong>Data SPBU Tidak Ditemukan</strong>
            </div>
            <?php else : ?>
            <h3 class="text-center head-er judul"><strong>List SPBU Kabupaten Garut</strong></h3>
            <p class="text-right">Jumlah Data SPBU: <?php echo count($spbu); ?></p>
            <!-- Tampilkan tabel jika data ditemukan -->
            <table class="table table-bordered table-striped mt-2" style="padding-left: 20px;">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">No. SPBU</th>
                    <th class="text-center">Nama Perusahaan</th>
                    <th class="text-center">Alamat SPBU</th>
                    <th class="text-center">Telp/HP</th>
                    <th class="text-center">Tanggal Peneraan</th>
                </tr>

                <?php
// Fungsi untuk mengubah tanggal ke format yang diinginkan dengan nama hari dan bulan dalam bahasa Indonesia
function formatTanggal($tanggal) {
    $timestamp = strtotime($tanggal);
    
    // Array nama hari dalam bahasa Indonesia
    $namaHari = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
    );
    
    // Array nama bulan dalam bahasa Indonesia
    $namaBulan = array(
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
        7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    );

    $namaHariID = $namaHari[date('w', $timestamp)]; // Mengambil nama hari
    $tanggalHari = str_pad(date('j', $timestamp), 2, '0', STR_PAD_LEFT); // Mengambil tanggal dengan angka 0 sebelumnya jika kurang dari 10
    $bulanID = $namaBulan[date('n', $timestamp)]; // Mengambil nama bulan
    $tahun = date('Y', $timestamp); // Mengambil tahun

    return $namaHariID . ', ' . $tanggalHari . ' ' . $bulanID . ' ' . $tahun;
}
?>

                <?php $no = 1;
                    foreach ($displayData as $t) : ?>
                <tr>
                    <!-- panggil variabel increment otomatis nya -->
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $t->nama_spbu ?></td>
                    <td class="text-center"><?php echo $t->lokasi_spbu ?></td>
                    <td class="text-center"><?php echo $t->no_spbu ?></td>
                    <td class="text-center"><?php echo $t->telp ?></td>
                    <td class="text-center"><?php echo formatTanggal($t->tgl_peneraan) ?></td>
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