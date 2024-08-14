<!DOCTYPE html>
<html>

<head>
    <style>
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
        border: 0.1px solid #000;
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

        font-size: 8px;
        /* Set font size to 11px */
        font-family: "Calibri", Times, serif;

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
        font-size: 9px;
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
        margin-bottom: 50px;
        /* Memberi jarak bawah antara paragraf */
        margin-right: 25px;

    }

    .nip {
        margin-top: 1px;
        /* Atur jarak dalam piksel sesuai kebutuhan */
    }

    .logo {
        max-width: 80px;
        position: absolute;
        top: 80px;
        left: 250px;
    }

    .print-logo {
        max-width: 70px;
        /* Adjust the top and left values as needed */
        top: 90px;
        left: 250px;
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

        /* Set paper size to A1 and landscape orientation for printing */
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
        <h6 class="text-center"><strong>DINAS PERINDUSTRIAN, PERDAGANGAN,</strong></h6>
        <h6 class="text-center"><strong>ENERGI, DAN SUMBER DAYA MINERAL GARUT</strong></h6>
        <h3 class="text-center judul-tanda-daftar">Jalan Merdeka No.219, Garut-Jawa
            Barat</h3>
        <div class="garis-bawah"></div>
        <div class="garis-bawah"></div>
        <h3 class="text-center judul-tanda-daftar"><strong>Data Tanda Daftar Gudang</strong></h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped mt-2">
                <colgroup>
                    <col style="width: 9%" />
                    <col style="width: 15%" />
                    <col style="width: 15%" />
                    <col style="width: 15%" />
                    <col style="width: 18%" />
                    <col style="width: 18%" />
                    <col style="width: 18%" />
                    <col style="width: 18%" />
                    <col style="width: 18%" />
                    <col style="width: 20%" />
                    <col style="width: 13%" />
                    <col style="width: 15%" />

                    <col style="width: 15%" />
                    <col style="width: 15%" />
                    <col style="width: 15%" />
                    <col style="width: 13%" />

                    <col style="width: 15%" />
                    <col style="width: 15%" />
                    <col style="width: 15%" />
                    <col style="width: 15%" />
                    <col style="width: 15%" />

                </colgroup>
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
                    <th class="text-center">Email</th>
                    <th class="text-center">Investasi</th>
                    <th class="text-center">Website</th>
                    <th class="text-center">Latitud</th>
                    <th class="text-center">Longitud</th>
                    <th class="text-center">Luas Lahan</th>
                    <th class="text-center">Luas</th>
                    <th class="text-center">Kapasitas</th>
                    <th class="text-center">Nomor Tanggal BAP</th>
                    <th class="text-center">Nomor Tanggal Pertek</th>
                    <th class="text-center">Nomor Tanggal TDG</th>
                    <th class="text-center">Komoditas Gudang</th>
                </tr>

                <?php $no = 1;
                foreach ($tdg as $t) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $t->nama_pemilik ?></td>
                    <td><?php echo $t->alamat_pemilik ?></td>
                    <td><?php echo $t->nama_perusahaan ?></td>
                    <td><?php echo $t->alamat_perusahaan ?></td>
                    <td><?php echo $t->alamat_gudang ?></td>
                    <td><?php echo $t->telp_fax ?></td>
                    <td><?php echo $t->nib ?></td>
                    <td><?php echo $t->npwp ?></td>
                    <td><?php echo $t->email ?></td>
                    <td><?php echo $t->investasi ?></td>
                    <td><?php echo $t->website ?></td>
                    <td><?php echo $t->latitud ?> </td>
                    <td><?php echo $t->longitud ?> </td>
                    <td><?php echo $t->luas_lahan ?></td>
                    <td><?php echo $t->luas ?></td>
                    <td><?php echo $t->kapasitas ?></td>
                    <td><?php echo $t->nomor_tgl_bap ?></td>
                    <td><?php echo $t->nomor_tgl_pertek ?></td>
                    <td><?php echo $t->nomor_tgl_tdg ?></td>
                    <td><?php echo $t->komoditas_gudang ?></td>
                    <td>
                        <!-- Add actions here if needed -->
                    </td>
                </tr>
                <?php endforeach; ?>
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

    </div>
</body>

</html>