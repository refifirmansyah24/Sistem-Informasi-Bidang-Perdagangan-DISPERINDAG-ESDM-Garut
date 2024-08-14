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
                <?php echo form_open('perdagangan/spbu/tambah_data_aksi') ?>
                <div class="form-group">
                    <label>No. SPBU</label>
                    <input type="text" name="nama_spbu" class="form-control"
                        value="<?php echo set_value('nama_spbu'); ?>">
                    <?php echo form_error('nama_spbu', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="lokasi_spbu" class="form-control"
                        value="<?php echo set_value('lokasi_spbu'); ?>">
                    <?php echo form_error('lokasi_spbu', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Lokasi SPBU</label>
                    <input type="text" name="no_spbu" class="form-control" value="<?php echo set_value('no_spbu'); ?>">
                    <?php echo form_error('no_spbu', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Telpon/HP</label>
                    <input type="text" name="telp" class="form-control" value="<?php echo set_value('telp'); ?>">
                    <?php echo form_error('telp', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Peneraan</label>
                    <input type="date" name="tgl_peneraan" class="form-control"
                        value="<?php echo set_value('tgl_peneraan'); ?>">
                    <?php echo form_error('tgl_peneraan', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

                <?php echo form_close(); ?>
            </div>
        </div>

    </div>
</body>

</html>