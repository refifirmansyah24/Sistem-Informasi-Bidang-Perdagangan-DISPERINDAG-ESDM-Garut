<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <?php foreach ($pangkalan as $t) : ?>
            <form method="POST" action="<?php echo base_url('administrator/pangkalan/update_data_aksi') ?>">
                <div class="form-group">
                    <label>Pangkalan</label>
                    <input type="hidden" name="id_pangkalan" class="form-control"
                        value="<?php echo $t->id_pangkalan ?>">
                    <input type="text" name="pangkalan" class="form-control" value="<?php echo $t->pangkalan?>">
                    <?php echo form_error('pangkalan', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Id Registrasi</label>
                    <input type="text" name="id_registrasi" class="form-control"
                        value="<?php echo $t->id_registrasi ?>">
                    <?php echo form_error('id_registrasi', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="<?php echo $t->kecamatan ?>">
                    <?php echo form_error('kecamatan', '<div class="text-small text-danger"></div>'); ?>
                </div>


                <div class="form-group">
                    <label>Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control" value="<?php echo $t->kelurahan ?>">
                    <?php echo form_error('kelurahan', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat Pangkalan</label>
                    <input type="text" name="alamat_pangkalan" class="form-control"
                        value="<?php echo $t->alamat_pangkalan ?>">
                    <?php echo form_error('alamat_pangkalan', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Penyaluran</label>
                    <input type="text" name="penyaluran" class="form-control" value="<?php echo $t->penyaluran?>">
                    <?php echo form_error('penyaluran', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <!-- INGIN MENGAMBIL DATA SELECT DI DATABASE TABEL SPBU -->
                <div class="form-group">
                    <label>Nama Agen</label>
                    <select name="nama_agen" id="nama_agen" class="form-control">
                        <option value="" style="display:none;">Pilih Agen</option>
                        <?php foreach ($agen_data as $agen) : ?>
                        <option value="<?php echo $agen->id_agen; ?>"
                            <?php if ($agen->id_agen == $t->id_agen) echo 'selected'; ?>>
                            <?php echo $agen->nama_agen; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>