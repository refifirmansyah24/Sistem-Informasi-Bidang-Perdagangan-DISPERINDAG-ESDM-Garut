<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('administrator/agen/tambah_data_aksi') ?>">
                <div class="form-group">
                    <label>Nama Agen</label>
                    <input type="text" name="nama_agen" class="form-control"
                        value="<?php echo set_value('nama_agen'); ?>">
                    <?php echo form_error('nama_agen', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat Agen</label>
                    <input type="text" name="alamat_agen" class="form-control"
                        value="<?php echo set_value('alamat_agen'); ?>">
                    <?php echo form_error('alamat_agen', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="pso" class="form-control">
                        <option value="" style="display:none;">Status</option>
                        <option value="PSO" <?php echo set_select('pso', 'PSO'); ?>>PSO</option>
                        <option value="NPSO" <?php echo set_select('pso', 'NPSO'); ?>>NPSO</option>
                    </select>
                    <?php echo form_error('pso', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nama SPBE</label>
                    <select name="nama_perusahaan" id="nama_perusahaan" class="form-control">
                        <option value="" style="display:none;">Pilih SPBE</option>
                        <?php foreach ($spbe_data as $spbe) : ?>
                        <option value="<?php echo $spbe->id_spbe; ?>"
                            <?php echo set_select('nama_perusahaan', $spbe->id_spbe); ?>>
                            <?php echo $spbe->nama_perusahaan; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>