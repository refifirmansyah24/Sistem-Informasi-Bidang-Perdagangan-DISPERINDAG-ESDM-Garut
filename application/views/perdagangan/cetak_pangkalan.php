<!DOCTYPE html>
<html>

<head>
    <style>
    .logo {
        max-width: 80px;
        position: absolute;
        top: 80px;
        left: 250px;
    }

    .print-button {
        margin-left: 20px;
        /* Atur jarak sisi kiri di sini */
    }

    /* CSS to center align table content */
    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
        /* Fix table layout */
    }

    th,
    td {
        text-align: center;
        padding: 8px;
        border: 1px solid #000;
        /* Add border to table cells */
        box-sizing: border-box;
        /* Include border in total width/height */
        vertical-align: middle;
        /* Adjust vertical alignment */
        overflow: hidden;
        /* Hide content that exceeds cell width */
        white-space: normal;
        /* Allow text to wrap */

    }

    .head {
        margin-top: 20px;
        /* Sesuaikan margin sesuai kebutuhan */
    }

    .head2 {
        margin-bottom: 20px;
        /* Sesuaikan margin sesuai kebutuhan */
    }

    .judul-tanda-daftar {
        font-size: 15px;
        margin-bottom: 20px;
    }

    .table-container {
        overflow-x: auto;
    }

    .tanda-tangan {
        text-align: right;
        margin-top: 20px;
        margin-right: 20px;
        font-size: 14px;
        /* Sesuaikan margin sesuai kebutuhan */
    }

    .tanda-tangan p:first-child {
        margin-bottom: 50px;
    }

    .tengah-teks {
        display: inline-block;
        text-align: center;
        width: 100%;
    }

    .tanda-tangan p.kepala-dinas {
        text-align: right;
        /* Tetapkan perataan teks ke kanan */
        margin-bottom: 70px;
        /* Memberi jarak bawah antara paragraf */
        margin-right: 40px;

    }

    .table-container {
        padding-left: 20px;
        padding-right: 20px;
    }

    .garis-bawah {
        border-bottom: 2px solid;
        /* Mengatur garis bawah menjadi tebal (2px) */
        width: 97%;
        /* Sesuaikan panjang garis bawah di sini */
        margin: 10px auto;
        margin-bottom: 30px auto;
        margin-top: 30px auto;
        /* Mengatur panjang kiri dan kanan dari garis bawah */
        padding-left: 20%;
        /* Sesuaikan panjang kiri garis bawah */
        padding-right: 20%;
        /* Sesuaikan panjang kanan garis bawah */
        font-weight: bold;
        /* Membuat teks garis bawah menjadi bold */
    }

    .print-logo {
        max-width: 70px;
        /* Adjust the top and left values as needed */
        top: 90px;
        left: 250px;
    }

    .tanda-tangan p.nama {
        margin-bottom: 0;
        /* Atur margin bottom menjadi 0 */
    }

    /* Hide page number and other information when printing */
    @media print {
        .print-logo {
            max-width: 70px;
            /* Adjust the top and left values as needed */
            top: 0.1px;
            left: 30px;
            margin-top: 20px;
        }

        .surat-body {
            margin: 0;
            padding: 0;
        }

        .sidebar,
        .footer,
        .header {
            display: none;
        }

        .table-responsive {
            overflow: visible !important;
        }

        /* Set paper size to A4 and landscape orientation for printing */
        @page {
            size: A4 landscape;
            margin: 5mm;
        }

        /* Hide the print button when printing */
        .print-button {
            display: none;
        }
    }
    </style>
</head>

<body>
    <div class="surat-body">
        <img src="<?php echo base_url('assets/garut.png'); ?>" alt="Logo" class="logo print-logo">
        <h6 class="text-center head"><strong>DINAS PERINDUSTRIAN, PERDAGANGAN,</strong></h6>
        <h6 class="text-center"><strong>ENERGI, DAN SUMBER DAYA MINERAL GARUT</strong></h6>
        <h3 class="text-center judul-tanda-daftar">Jalan Merdeka No.219, Garut-Jawa
            Barat</h3>
        <div class="garis-bawah"></div>
        <div class="garis-bawah"></div>
        <h3 class="text-center judul-tanda-daftar"><strong>Data Pangkalan Gas Elpiji</strong></h3>
        <div class="table-responsive table-container">
            <table class="table table-bordered table-striped mt-2">
                <colgroup>
                    <col style="width: 8%" />
                    <col style="width: 20%" />
                    <col style="width: 28%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                </colgroup>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Agen</th>
                    <th class="text-center">Pangkalan</th>
                    <th class="text-center">Id Registrasi</th>
                    <th class="text-center">Kecamatan</th>
                    <th class="text-center">Kelurahan</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Penyaluran</th>
                </tr>

                <?php
                $no = 1;
                foreach ($pangkalan as $t) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $t->nama_agen ?></td>
                    <td><?php echo $t->pangkalan ?></td>
                    <td><?php echo $t->id_registrasi ?></td>
                    <td><?php echo $t->kecamatan ?></td>
                    <td><?php echo $t->kelurahan ?></td>
                    <td><?php echo $t->alamat_pangkalan ?></td>
                    <td><?php echo $t->penyaluran ?></td>
                    <td><?php echo $t->nama_agen ?></td>
                    <td>
                        <!-- Add actions here if needed -->
                    </td>
                </tr>
                <?php 
                endforeach; ?>
            </table>
        </div>
    </div>

    <!-- Tombol Print -->
    <div class="flex-container">
        <div class="print-button">
            <button type="submit" class="btn btn-success" onclick="window.print()">Print</button>
        </div>

        <!-- Tanda tangan -->
        <div class="tanda-tangan">
            <p class="kepala-dinas">Kepala Dinas</p>
            <p class="nama">Ridwan Effendi.S. STP. M.si</p>
            <p class="nip">NIP.197909161997111001</p>
        </div>
    </div>
</body>


</html>