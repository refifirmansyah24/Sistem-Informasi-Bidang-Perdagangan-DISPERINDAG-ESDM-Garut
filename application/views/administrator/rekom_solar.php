<!-- TEMPLATE BUAT BIKIN VIEW -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <form method="get" action="<?php echo base_url('administrator/rekom_solar') ?>">
        <div class="form-group row">

        </div>
    </form>

    <style>
    .table-container {
        overflow-x: auto;
    }

    .table-container table {
        min-width: 100%;
    }
    </style>

    <?php if (empty($rekomendasi)) : ?>
    <!-- Tampilkan pesan jika tidak ada data -->
    <p class="text-center" style="margin-top: 90px; margin-left: 20px;">Tidak Terdapat Riwayat Rekomendasi Solar</p>
    <?php else : ?>
    <!-- Tampilkan tombol "Cetak" jika ada data -->
    <a class="btn btn-sm mb-3 btn-primary" href="<?php echo base_url('administrator/rekom_solar/print_riwayat')?>">
        <i class="fas fa-print"></i> Cetak
    </a>
    <!-- Tampilkan tabel jika ada data -->
    <div class="table-container">
        <table class="table table-bordered table-striped mt-2">
            <tr>
                <th class="text-center"> No</th>
                <th class="text-center"> No. Surat</th>
                <th class="text-center"> NIK</th>
                <th class="text-center"> Nama Pemilik Usaha</th>
                <th class="text-center"> Alamat Pemilik Usaha</th>
                <th class="text-center"> No. HP</th>
                <th class="text-center"> Nama Usaha</th>
                <th class="text-center"> Jenis Usaha/Kegiatan</th>
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
                <th class="text-center"> Upload SKU</th>
                <th class="text-center"> Upload Mesin/Tempat Usaha</th>
                <th class="text-center"> Upload Surat Pengajuan</th>
                <th class="text-center"> Upload Rekomendasi Lama</th>
            </tr>

            <!-- Menampilkan Data Ke Tabel -->
            <?php $no = 1; foreach ($rekomendasi as $r) :?>
            <tr>
                <!-- Data Pegawai -->
                <td><?php echo $no++ ?></td>
                <td><?php echo $r-> no_surat?></td>
                <td><?php echo $r-> nik?></td>
                <td><?php echo $r-> nama_pemilik?></td>
                <td><?php echo $r-> alamat?></td>
                <td><?php echo $r-> telp?></td>
                <td><?php echo $r-> nama_usaha?></td>
                <td><?php echo $r-> jenis_usaha?></td>
                <td><?php echo $r-> satuan_kebutuhan?></td>
                <td><?php echo $r-> tgl_pengajuan?></td>
                <td><?php echo $r-> jenis_alat?></td>
                <td><?php echo $r-> jumlah_alat?></td>
                <td><?php echo $r-> fungsi_alat?></td>
                <td><?php echo $r-> jenis_bbm?></td>
                <td><?php echo $r-> kebutuhan_bbm?></td>
                <td><?php echo $r-> operasi?></td>
                <td><?php echo $r-> konsumsi?></td>
                <td><?php echo $r-> durasi_konsumsi?></td>
                <td><?php echo $r-> masa_berlaku?></td>
                <td>
                    <?php
                        $file_extension = pathinfo($r->upload_sku, PATHINFO_EXTENSION);
                            if (strtolower($file_extension) === 'pdf') {
                                echo '<a href="'.base_url().'assets/photo/'.$r->upload_sku.'" target="_blank">View PDF</a>';
                            } else {
                                echo '<a href="'.base_url().'assets/photo/'.$r->upload_sku.'" target="_blank">
                                        <img src="'.base_url().'assets/photo/'.$r->upload_sku.'" width="75px">
                                    </a>';
                            }
                        ?>
                </td>
                <td>
                    <?php
                        $file_extension = pathinfo($r->up_mesin_tempat, PATHINFO_EXTENSION);
                            if (strtolower($file_extension) === 'pdf') {
                                echo '<a href="'.base_url().'assets/photo/'.$r->up_mesin_tempat.'" target="_blank">View PDF</a>';
                            } else {
                                echo '<a href="'.base_url().'assets/photo/'.$r->up_mesin_tempat.'" target="_blank">
                                        <img src="'.base_url().'assets/photo/'.$r->up_mesin_tempat.'" width="75px">
                                    </a>';
                            }
                        ?>
                </td>
                <td>
                    <?php
                        $file_extension = pathinfo($r->up_surat_pengajuan, PATHINFO_EXTENSION);
                            if (strtolower($file_extension) === 'pdf') {
                                echo '<a href="'.base_url().'assets/photo/'.$r->up_surat_pengajuan.'" target="_blank">View PDF</a>';
                            } else {
                                echo '<a href="'.base_url().'assets/photo/'.$r->up_surat_pengajuan.'" target="_blank">
                                        <img src="'.base_url().'assets/photo/'.$r->up_surat_pengajuan.'" width="75px">
                                    </a>';
                            }
                        ?>
                </td>
                <td>
                    <?php
                        $file_extension = pathinfo($r->up_rekom_lama, PATHINFO_EXTENSION);
                            if (strtolower($file_extension) === 'pdf') {
                                echo '<a href="'.base_url().'assets/photo/'.$r->up_rekom_lama.'" target="_blank">View PDF</a>';
                            } else {
                                echo '<a href="'.base_url().'assets/photo/'.$r->up_rekom_lama.'" target="_blank">
                                        <img src="'.base_url().'assets/photo/'.$r->up_rekom_lama.'" width="75px">
                                    </a>';
                            }
                        ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
</div>
<!-- /.container-fluid -->