<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <?php foreach ($rekomendasi as $r) : ?>
            <form method="POST" action="<?php echo base_url('administrator/pengajuan_rekom/update_data_aksi') ?>">
                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="hidden" name="id_rekomendasi" class="form-control"
                        value="<?php echo $r->id_rekomendasi ?>">
                    <input type="text" name="nama_pemilik" class="form-control" value="<?php echo $r->nama_pemilik ?>">
                    <?php echo form_error('nama_pemilik', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?php echo $r->nik ?>">
                    <?php echo form_error('nik', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $r->alamat ?>">
                    <?php echo form_error('alamat', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class=" form-group">
                    <label>No. Hp</label>
                    <input type="text" name="telp" class="form-control" value="<?php echo $r->telp ?>">
                    <?php echo form_error('telp', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nama Usaha</label>
                    <input type="text" name="nama_usaha" class="form-control" value="<?php echo $r->nama_usaha ?>">
                    <?php echo form_error('nama_usaha', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Jenis Usaha</label>
                    <select name="jenis_usaha" class="form-control" id="jenis_usaha_select">
                        <option value="">Pilih Jenis Usaha</option>
                        <option value="Usaha Mikro"
                            <?php echo ($r->jenis_usaha === 'Usaha Mikro') ? 'selected' : ''; ?>>Usaha Mikro</option>
                        <option value="Pertanian" <?php echo ($r->jenis_usaha === 'Pertanian') ? 'selected' : ''; ?>>
                            Pertanian</option>
                        <option value="Perikanan" <?php echo ($r->jenis_usaha === 'Perikanan') ? 'selected' : ''; ?>>
                            Perikanan</option>
                        <option value="Pelayanan Umum"
                            <?php echo ($r->jenis_usaha === 'Pelayanan Umum') ? 'selected' : ''; ?>>Pelayanan Umum
                        </option>
                        <option value="input_custom"
                            <?php echo ($r->jenis_usaha === 'input_custom') ? 'selected' : ''; ?>>Jenis Usaha Lainnya
                        </option>
                    </select>
                    <?php echo form_error('jenis_usaha', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group" id="input_custom_jenis_usaha"
                    style="<?php echo ($r->jenis_usaha === 'input_custom') ? 'display: block;' : 'display: none;'; ?>">
                    <label>Jenis Usaha Lainnya</label>
                    <input type="text" name="jenis_usaha_custom" class="form-control" id="jenis_usaha_custom_input"
                        value="<?php echo ($r->jenis_usaha === 'input_custom') ? $r->jenis_usaha_custom : ''; ?>">
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
                window.addEventListener('load', function() {
                    var selectedValue = document.getElementById('jenis_usaha_select').value;

                    if (selectedValue === 'input_custom') {
                        document.getElementById('input_custom_jenis_usaha').style.display = 'block';
                    } else {
                        document.getElementById('input_custom_jenis_usaha').style.display = 'none';
                    }

                    // Periksa apakah jenis usaha sebelumnya adalah 'input_custom', jika ya, set 'Jenis Usaha Lainnya' menjadi yang dipilih
                    var previousInputValue = "<?php echo $r->jenis_usaha ?>";
                    if (previousInputValue === 'input_custom') {
                        document.getElementById('jenis_usaha_select').value = 'input_custom';
                        document.getElementById('input_custom_jenis_usaha').style.display =
                            'block'; // Tampilkan input_custom_jenis_usaha
                    }
                });
                </script>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>