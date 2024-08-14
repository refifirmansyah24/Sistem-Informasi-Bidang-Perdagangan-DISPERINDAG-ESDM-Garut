<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>

<body>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        </div>

        <div class="card" style="width: 60%">
            <div class="card-body">
                <!-- FORM INPUT DATA -->
                <?php echo form_open('administrator/tdg/tambah_data_aksi') ?>
                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" class="form-control"
                        value="<?php echo set_value('nama_pemilik'); ?>">
                    <?php echo form_error('nama_pemilik', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat Pemilik</label>
                    <input type="text" name="alamat_pemilik" class="form-control"
                        value="<?php echo set_value('alamat_pemilik'); ?>">
                    <?php echo form_error('alamat_pemilik', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control"
                        value="<?php echo set_value('nama_perusahaan'); ?>">
                    <?php echo form_error('nama_perusahaan', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat Perusahaan</label>
                    <input type="text" name="alamat_perusahaan" class="form-control"
                        value="<?php echo set_value('alamat_perusahaan'); ?>">
                    <?php echo form_error('alamat_perusahaan', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat Gudang</label>
                    <input type="text" name="alamat_gudang" class="form-control"
                        value="<?php echo set_value('alamat_gudang'); ?>">
                    <?php echo form_error('alamat_gudang', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Telp/Fax</label>
                    <input type="text" name="telp_fax" class="form-control"
                        value="<?php echo set_value('telp_fax'); ?>">
                    <?php echo form_error('telp_fax', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>NIB</label>
                    <input type="text" name="nib" class="form-control" value="<?php echo set_value('nib'); ?>">
                    <?php echo form_error('nib', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" name="npwp" class="form-control" value="<?php echo set_value('npwp'); ?>">
                    <?php echo form_error('npwp', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                    <?php echo form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Investasi</label>
                    <input type="text" name="investasi" class="form-control"
                        value="<?php echo set_value('investasi'); ?>">
                    <?php echo form_error('investasi', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control" value="<?php echo set_value('website'); ?>">
                    <?php echo form_error('website', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Latitud</label>
                    <input type="text" name="latitud" class="form-control" value="<?php echo set_value('latitud'); ?>">
                    <?php echo form_error('latitud', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Longitud</label>
                    <input type="text" name="longitud" class="form-control"
                        value="<?php echo set_value('longitud'); ?>">
                    <?php echo form_error('longitud', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Luas Lahan</label>
                    <input type="text" name="luas_lahan" class="form-control"
                        value="<?php echo set_value('luas_lahan'); ?>">
                    <?php echo form_error('luas_lahan', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Luas</label>
                    <input type="text" name="luas" class="form-control" value="<?php echo set_value('luas'); ?>">
                    <?php echo form_error('luas', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Kapasitas</label>
                    <input type="text" name="kapasitas" class="form-control"
                        value="<?php echo set_value('kapasitas'); ?>">
                    <?php echo form_error('kapasitas', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nomor Tanggal Bap</label>
                    <input type="date" name="nomor_tgl_bap" class="form-control"
                        value="<?php echo set_value('nomor_tgl_bap'); ?>">
                    <?php echo form_error('nomor_tgl_bap', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nomor Tanggal Pertek</label>
                    <input type="date" name="nomor_tgl_pertek" class="form-control"
                        value="<?php echo set_value('nomor_tgl_pertek'); ?>">
                    <?php echo form_error('nomor_tgl_pertek', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nomor Tanggal Tdg</label>
                    <input type="date" name="nomor_tgl_tdg" class="form-control"
                        value="<?php echo set_value('nomor_tgl_tdg'); ?>">
                    <?php echo form_error('nomor_tgl_tdg', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Komoditas Gudang</label>
                    <input type="text" name="komoditas_gudang" class="form-control"
                        value="<?php echo set_value('komoditas_gudang'); ?>">
                    <?php echo form_error('komoditas_gudang', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>

</html>