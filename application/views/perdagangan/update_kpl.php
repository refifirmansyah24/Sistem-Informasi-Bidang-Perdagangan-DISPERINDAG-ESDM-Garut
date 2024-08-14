<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <?php foreach ($kpl as $t) : ?>
            <form method="POST" action="<?php echo base_url('perdagangan/kpl/update_data_aksi') ?>">
                <div class="form-group">
                    <label>Nama KPL</label>
                    <input type="hidden" name="id_kpl" class="form-control" value="<?php echo $t->id_kpl ?>">
                    <input type="text" name="nama_kpl" class="form-control" value="<?php echo $t->nama_kpl ?>">
                    <?php echo form_error('nama_kpl', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Kode Kios</label>
                    <input type="text" name="kode_kios" class="form-control" value="<?php echo $t->kode_kios ?>">
                    <?php echo form_error('kode_kios', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Pemilik</label>
                    <input type="text" name="pemilik" class="form-control" value="<?php echo $t->pemilik ?>">
                    <?php echo form_error('pemilik', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $t->alamat ?>">
                    <?php echo form_error('alamat', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="<?php echo $t->kecamatan ?>">
                    <?php echo form_error('kecamatan', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?php echo $t->no_hp ?>">
                    <?php echo form_error('no_hp', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Distributor PT. Pupuk Kujang</label>
                    <input type="text" name="dis_1" class="form-control" value="<?php echo $t->dis_1 ?>">
                    <?php echo form_error('dis_1', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Distributor PT. Petro Kimia Gresik</label>
                    <input type="text" name="dis_2" class="form-control" value="<?php echo $t->dis_2 ?>">
                    <?php echo form_error('dis_2', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <select name="keterangan" class="form-control">
                        <option value="" style="display:none;">Pilih Keterangan</option>
                        <option value="Baru" <?php echo ($t->keterangan == 'Baru') ? 'selected' : ''; ?>>Baru</option>
                        <option value="Lama" <?php echo ($t->keterangan == 'Lama') ? 'selected' : ''; ?>>Lama</option>
                        <option value="---" <?php echo ($t->keterangan == '---') ? 'selected' : ''; ?>>---</option>
                    </select>
                    <?php echo form_error('keterangan', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" name="latitud" class="form-control" value="<?php echo $t->latitud ?>">
                    <?php echo form_error('latitud', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Longitude</label>
                    <input type="text" name="longitud" class="form-control" value="<?php echo $t->longitud ?>">
                    <?php echo form_error('longitud', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>