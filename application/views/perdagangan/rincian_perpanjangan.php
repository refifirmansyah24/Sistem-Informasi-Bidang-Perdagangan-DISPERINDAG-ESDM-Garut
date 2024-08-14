<div class="p-3">
    <p class="h3">Rincian Perpanjangan</p>
    <?php $data_rekom=$rincian_perpanjangan ?>
    <div>
        <p><strong>NIK :</strong> <?php echo $data_rekom->nik ?></p>
        <p><strong>Nama :</strong> <?php echo $data_rekom->nama_pemilik ?></p>
        <p><strong>Alamat :</strong> <?php echo $data_rekom->alamat ?></p>
        <p><strong>No. Hp :</strong> <?php echo $data_rekom->telp ?></p>
        <p><strong>Nama Usaha :</strong> <?php echo $data_rekom->nama_usaha ?></p>
        <p><strong>Jenis Usaha/ Kegiatan :</strong> <?php echo $data_rekom->jenis_usaha ?></p>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-2">
            <thead>
                <tr>
                    <th class="text-center"> No</th>
                    <th class="text-center"> Jenis Alat</th>
                    <th class="text-center"> Jumlah Alat (Unit)</th>
                    <th class="text-center"> Fungsi Alat</th>
                    <th class="text-center"> BBM Jenis Tertentu</th>
                    <th class="text-center"> Kebutuhan</th>
                    <th class="text-center"> Durasi Operasi</th>
                    <th class="text-center"> Konsumsi BBM</th>
                    <th class="text-center"> Durasi Konsumsi</th>
                    <th class="text-center"> No. SPBU</th>
                    <th class="text-center"> Nama Perusahaan (SPBU) </th>
                    <th class="text-center"> Lokasi SPBU</th>
                    <th class="text-center"> Tanggal Pengajuan</th>
                    <th class="text-center"> Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping through the second set of data -->
                <?php
            $no=1; 
            foreach ($rincian_perpanjangan2 as $data_perpanjangan) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data_perpanjangan->jenis_alat ?></td>
                    <td><?php echo $data_perpanjangan->jumlah_alat ?></td>
                    <td><?php echo $data_perpanjangan->fungsi_alat ?></td>
                    <td><?php echo $data_perpanjangan->jenis_bbm ?></td>
                    <td><?php echo $data_perpanjangan->kebutuhan_bbm ?></td>
                    <td><?php echo $data_perpanjangan->operasi ?></td>
                    <td><?php echo $data_perpanjangan->konsumsi ?></td>
                    <td><?php echo $data_perpanjangan->durasi_konsumsi ?></td>
                    <td><?php echo $data_perpanjangan->nama_spbu ?></td>
                    <td><?php echo $data_perpanjangan->lokasi_spbu ?></td>
                    <td><?php echo $data_perpanjangan->no_spbu ?></td>
                    <td><?php echo $data_perpanjangan->tgl_pengajuan ?></td>
                    <td>
                        <div class="btn-group">
                            <!-- Delete Data -->
                            <a onclick="return confirm('Apakah Anda Ingin Menghapusnya??')"
                                class="btn btn-sm btn-danger"
                                href="<?php echo base_url('perdagangan/perpanjangan_rekom/delete_data/'.$data_perpanjangan->id_kebutuhan)?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                        <style>
                        .btn-group {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        }

                        .btn-group .btn {
                            margin-right: 5px;
                        }
                        </style>

                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>