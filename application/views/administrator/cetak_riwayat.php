<!DOCTYPE html>
<html>

<head>
    <style>
    /* CSS to center align table content */
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
        word-wrap: break-word;


        font-size: 9px;
    }

    .judul-tanda-daftar {
        font-size: 15px;
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
        top: 145px;
        left: 250px;
    }

    .tanda-tangan p.nama {
        margin-bottom: 0;
        /* Atur margin bottom menjadi 0 */
    }

    .filter-form {
        margin-bottom: 20px;
        /* Atur jarak bawah sesuai kebutuhan */
    }


    /* Hide page number and other information when printing */
    @media print {
        .print-logo {
            max-width: 70px;
            /* Adjust the top and left values as needed */
            top: 0.1px;
            left: 30px;
        }

        .sidebar,
        .footer,
        .header {
            display: none;
        }

        .surat-body {
            margin: 0;
            /* Remove margin */
            padding: 0;
            /* Remove padding */
        }

        .table-responsive {
            overflow: visible !important;
            /* Ensure table content is not cut off */
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

        /* Hide the filter-form when printing */
        .filter-form {
            display: none;
        }
    }
    </style>
</head>

<body>
    <div class="filter-form">
        <form method="post">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date"
                value="<?php echo isset($start_date) ? $start_date : ''; ?>">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="<?php echo isset($end_date) ? $end_date : ''; ?>">
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
    <div class="surat-body">
        <img src="<?php echo base_url('assets/garut.png'); ?>" alt="Logo" class="logo print-logo">
        <h6 class="text-center"><strong>DINAS PERINDUSTRIAN, PERDAGANGAN,</strong></h6>
        <h6 class="text-center"><strong>ENERGI, DAN SUMBER DAYA MINERAL GARUT</strong></h6>
        <h3 class="text-center judul-tanda-daftar">Jalan Merdeka No.219, Garut-Jawa
            Barat</h3>
        <div class="garis-bawah"></div>
        <div class="garis-bawah"></div>
        <h3 class="text-center judul-tanda-daftar"><strong>Riwayat Pengajuan Surat Rekomendasi Solar</strong></h3>
        <div class="table-responsive table-container">
            <table class="table table-bordered table-striped mt-2">
                <colgroup>
                    <col style="width: 15%" />
                    <col style="width: 15%" />
                    <col style="width: 28%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 25%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 28%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                    <col style="width: 20%" />
                </colgroup>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">No. Surat</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama Pemilik Usaha</th>
                    <th class="text-center">Alamat Pemilik Usaha </th>
                    <th class="text-center">No. HP</th>
                    <th class="text-center">Jenis Usaha/Kegiatan</th>
                    <th class="text-center"> Satuan Kebutuhan</th>
                    <th class="text-center"> Tanggal Pengajuan</th>
                    <th class="text-center"> Jenis Alat</th>
                    <th class="text-center"> Jumlah Alat (Unit)</th>
                    <th class="text-center"> Fungsi Alat</th>
                    <th class="text-center"> BBM Jenis Tertentu</th>
                    <th class="text-center"> Kebutuhan</th>
                    <th class="text-center"> Durasi Operasi</th>
                    <th class="text-center"> Konsumsi BBM</th>
                    <th class="text-center"> Durasi Konsumsi</th>
                    <th class="text-center"> Masa Berlaku</th>

                </tr>


                </tr>
                <!-- Table header here -->
                <?php
            if(isset($_POST['start_date'])) {
                $start_date = $_POST['start_date'];
            } else {
                $start_date = ""; // Or set a default date if not selected
            }

            if(isset($_POST['end_date'])) {
                $end_date = $_POST['end_date'];
            } else {
                $end_date = ""; // Or set a default date if not selected
            }

            // Filter data based on date range
            $filtered_data = array_filter($rekomendasi, function($item) use ($start_date, $end_date) {
                return $item->tgl_pengajuan >= $start_date && $item->tgl_pengajuan <= $end_date;
            });

            
            
            $no = 1;
            foreach ($filtered_data as $t) :
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $t->no_surat ?></td>
                    <td><?php echo $t->nik ?></td>
                    <td><?php echo $t->nama_pemilik ?></td>
                    <td><?php echo $t->alamat ?></td>
                    <td><?php echo $t->telp ?></td>
                    <td><?php echo $t->jenis_usaha ?></td>
                    <td><?php echo $t->satuan_kebutuhan ?></td>
                    <td><?php echo date('d F Y', strtotime($t->tgl_pengajuan)); ?></td>
                    <td><?php echo $t-> jenis_alat?></td>
                    <td><?php echo $t-> jumlah_alat?></td>
                    <td><?php echo $t-> fungsi_alat?></td>
                    <td><?php echo $t-> jenis_bbm?></td>
                    <td><?php echo $t-> kebutuhan_bbm?></td>
                    <td><?php echo $t-> operasi?></td>
                    <td><?php echo $t-> konsumsi?></td>
                    <td><?php echo $t-> durasi_konsumsi?></td>
                    <td><?php echo $t-> masa_berlaku?></td>

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