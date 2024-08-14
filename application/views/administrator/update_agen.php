<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <?php foreach ($agen as $t) : ?>
            <form method="POST" action="<?php echo base_url('administrator/agen/update_data_aksi') ?>">
                <div class="form-group">
                    <label>Nama Agen</label>
                    <input type="hidden" name="id_agen" class="form-control" value="<?php echo $t->id_agen ?>">
                    <input type="text" name="nama_agen" class="form-control" value="<?php echo $t->nama_agen?>">
                    <?php echo form_error('nama_agen', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat Agen</label>
                    <input type="text" name="alamat_agen" class="form-control" value="<?php echo $t->alamat_agen ?>">
                    <?php echo form_error('alamat_agen', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="pso" class="form-control">
                        <option value="" style="display:none;">Pilih Status</option>
                        <option value="PSO" <?php echo ($t->pso == 'PSO') ? 'selected' : ''; ?>>PSO</option>
                        <option value="NPSO" <?php echo ($t->pso == 'NPSO') ? 'selected' : ''; ?>>NPSO</option>
                    </select>
                    <?php echo form_error('pso', '<div class="text-small text-danger"></div>'); ?>
                </div>


                <!-- INGIN MENGAMBIL DATA SELECT DI DATABASE TABEL SPBU -->
                <div class="form-group">
                    <label>Nama SPBE</label>
                    <select name="nama_perusahaan" id="nama_perusahaan" class="form-control">
                        <option value="" style="display:none;">Pilih SPBE</option>
                        <?php foreach ($spbe_data as $spbe) : ?>
                        <option value="<?php echo $spbe->id_spbe; ?>"
                            <?php if ($spbe->id_spbe == $t->id_spbe) echo 'selected'; ?>>
                            <?php echo $spbe->nama_perusahaan; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>