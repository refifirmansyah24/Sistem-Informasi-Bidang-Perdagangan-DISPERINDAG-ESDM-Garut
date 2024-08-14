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
                <?php echo form_open_multipart('administrator/pengajuan_rekom/tambah_data_aksi') ?>
                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" class="form-control"
                        value="<?php echo set_value('nama_pemilik'); ?>">
                    <?php echo form_error('nama_pemilik', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?php echo set_value('nik'); ?>">
                    <?php echo form_error('nik', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat'); ?>">
                    <?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>No. Hp</label>
                    <input type="text" name="telp" class="form-control" value="<?php echo set_value('telp'); ?>">
                    <?php echo form_error('telp', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nama Usaha</label>
                    <input type="text" name="nama_usaha" class="form-control"
                        value="<?php echo set_value('nama_usaha'); ?>">
                    <?php echo form_error('nama_usaha', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Jenis Usaha</label>
                    <select name="jenis_usaha" class="form-control" id="jenis_usaha_select">
                        <option value="">Pilih Jenis Usaha</option>
                        <option value="Usaha Mikro" <?php echo set_select('jenis_usaha', 'Usaha Mikro'); ?>>Usaha Mikro
                        </option>
                        <option value="Pelayanan Umum" <?php echo set_select('jenis_usaha', 'Pertanian'); ?>>Pertanian
                        </option>
                        <option value="Pelayanan Umum" <?php echo set_select('jenis_usaha', 'Perikanan'); ?>>Perikanan
                        </option>
                        <option value="Pelayanan Umum" <?php echo set_select('jenis_usaha', 'Pelayanan Umum'); ?>>
                            Pelayanan Umum</option>
                        <option value="input_custom">Jenis Usaha Lainnya</option>
                    </select>
                    <?php echo form_error('jenis_usaha', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group" id="input_custom_jenis_usaha" style="display: none;">
                    <label>Jenis Usaha Lainnya</label>
                    <input type="text" name="jenis_usaha_custom" class="form-control" id="jenis_usaha_custom_input">
                    <?php echo form_error('jenis_usaha_custom', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <script>
                //SCRIPT BUAT KETIKA KLIK JENIS USAHA BARU MAKA DAPAT MENGISI USAHA BARU 
                document.getElementById('jenis_usaha_select').addEventListener('change', function() {
                    var selectBox = this;
                    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

                    if (selectedValue === 'input_custom') {
                        document.getElementById('input_custom_jenis_usaha').style.display = 'block';
                    } else {
                        document.getElementById('input_custom_jenis_usaha').style.display = 'none';
                    }
                });

                document.getElementById('jenis_usaha_custom_input').addEventListener('input', function() {
                    var customInputValue = this.value;
                    var selectBox = document.getElementById('jenis_usaha_select');
                    var customOption = selectBox.options[selectBox.options.length -
                        1]; // Opsi terakhir "Tambahkan Jenis Usaha"

                    if (customInputValue.trim() !== '') {
                        customOption.value = customInputValue; // Set nilai opsi tambahan sesuai input
                    } else {
                        customOption.value = "input_custom"; // Jika input kosong, gunakan nilai "input_custom"
                    }
                });
                </script>


                <div class="form-group">
                    <label>Upload SKU</label>
                    <input type="file" name="upload_sku" class="form-control">
                    <?php echo form_error('upload_sku', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Upload Mesin/ Tempat Usaha</label>
                    <input type="file" name="up_mesin_tempat" class="form-control">
                    <?php echo form_error('up_mesin_tempat', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Upload Surat Pengajuan</label>
                    <input type="file" name="up_surat_pengajuan" class="form-control">
                    <?php echo form_error('up_surat_pengajuan', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>

</html>