<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>
    <!-- BIKIN FORM NYA DINAMIS SEPERTI DI TAMbAH DATA SOLAR -->
    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <?php foreach ($rekomendasi as $t) : ?>
            <?php echo form_open_multipart('administrator/perpanjangan_rekom/tambah_data_aksi') ?>

            <div class="form-group">
                <label>Jenis Alat</label>
                <input type="hidden" name="id_rekomendasi" class="form-control"
                    value="<?php echo $t->id_rekomendasi ?>">
                <input type="text" name="jenis_alat" class="form-control" required> <!-- Tanda wajib diisi -->
            </div>

            <div class="form-group">
                <label>Jumlah Alat</label>
                <input type="text" name="jumlah_alat" class="form-control" required> <!-- Tanda wajib diisi -->
                <?php echo form_error('jumlah_alat', '<div class="text-small text-danger"></div>'); ?>
            </div>

            <div class="form-group">
                <label>Fungsi Alat</label>
                <input type="text" name="fungsi_alat" class="form-control" required> <!-- Tanda wajib diisi -->
                <?php echo form_error('fungsi_alat', '<div class="text-small text-danger"></div>'); ?>
            </div>

            <div class="form-group">
                <label>Jenis BBM</label>
                <select name="jenis_bbm" class="form-control" required>
                    <option value="" style="display:none;">Pilih Jenis BBM</option>
                    <option value="Solar">Solar</option>
                    <option value="Pertalite">Pertalite</option>
                </select>
                <?php echo form_error('jenis_bbm', '<div class="text-small text-danger"></div>'); ?>
            </div>

            <div class="form-group">
                <label>Kebutuhan BBM (Liter)</label>
                <input type="text" name="kebutuhan_bbm" class="form-control" required>
                <?php echo form_error('kebutuhan_bbm', '<div class="text-small text-danger"></div>'); ?>
            </div>

            <div class="form-group">
                <label>Operasi</label>
                <input type="text" name="operasi" class="form-control" required>
                <?php echo form_error('operasi', '<div class="text-small text-danger"></div>'); ?>
            </div>

            <div class="form-group">
                <label>Konsumsi BBM (Liter)</label>
                <input type="text" name="konsumsi" class="form-control" required>
                <?php echo form_error('konsumsi', '<div class="text-small text-danger"></div>'); ?>
            </div>

            <div class="form-group">
                <label>Durasi Konsumsi</label>
                <input type="text" name="durasi_konsumsi" class="form-control" required>
                <?php echo form_error('durasi_konsumsi', '<div class="text-small text-danger"></div>'); ?>
            </div>

            <div class="form-group">
                <label>Satuan Kebutuhan</label>
                <select name="satuan_kebutuhan" class="form-control" required>
                    <option value="" style="display:none;">Satuan Kebutuhan</option>
                    <option value="Liter" <?php echo set_select('satuan_kebutuhan', 'Liter'); ?>>Liter</option>
                </select>
                <?php echo form_error('satuan_kebutuhan', '<div class="text-small text-danger">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label>Masa Berlaku</label>
                <input type="text" name="masa_berlaku" class="form-control" required>
                <?php echo form_error('masa_berlaku', '<div class="text-small text-danger"></div>'); ?>
            </div>

            <div class="form-group">
                <label>Tanggal Pengajuan</label>
                <input type="date" name="tgl_pengajuan" class="form-control" required>
                <?php echo form_error('tgl_pengajuan', '<div class="text-small text-danger"></div>'); ?>
            </div>

            <div class="form-group">
                <label>Upload Rekomendasi Lama</label>
                <input type="file" name="up_rekom_lama" class="form-control" required>
                <?php echo form_error('up_rekom_lama', '<div class="text-small text-danger"></div>'); ?>
            </div>
            <!-- INGIN MENGAMBIL DATA SELECT DI DATABASE TABEL SPBU -->
            <div class="form-group">
                <label>Lokasi SPBU</label>
                <select name="no_spbu" id="no_spbu" class="form-control">
                    <option value="" style="display:none;">Pilih Lokasi SPBU</option>
                    <?php foreach ($spbu_data as $spbu) : ?>
                    <option value="<?php echo $spbu->id_spbu; ?>"><?php echo $spbu->no_spbu; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>No. SPBU</label>
                <select name="nama_spbu" id="nama_spbu" class="form-control" disabled>
                    <option value="" style="display:none;">Pilih No SPBU</option>
                    <?php foreach ($spbu_data as $spbu) : ?>
                    <option value="<?php echo $spbu->nama_spbu; ?>"><?php echo $spbu->nama_spbu; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Nama Perusahaan (SPBU) </label>
                <select name="lokasi_spbu" id="lokasi_spbu" class="form-control" disabled>
                    <option value="" style="display:none;">Nama Perusahaan</option>
                    <?php foreach ($spbu_data as $spbu) : ?>
                    <option value="<?php echo $spbu->lokasi_spbu; ?>"><?php echo $spbu->lokasi_spbu; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
            <?php  echo form_close(); ?>
            <?php endforeach; ?>


        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#no_spbu').change(function() {
        var selectedSpbuId = $(this).val();

        $.ajax({
            url: '<?php echo base_url('administrator/perpanjangan_rekom/get_spbu_details'); ?>',
            type: 'GET',
            data: {
                spbu_id: selectedSpbuId
            },
            dataType: 'json',
            success: function(data) {
                $('#nama_spbu').prop('value', data.nama_spbu);
                $('#lokasi_spbu').val(data.lokasi_spbu);
                console.log(data.nama_spbu);
            }
        });
    });
});
</script>