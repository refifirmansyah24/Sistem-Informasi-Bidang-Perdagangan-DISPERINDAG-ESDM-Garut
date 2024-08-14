<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <?php foreach ($spbu as $t) : ?>
            <form method="POST" action="<?php echo base_url('administrator/spbu/update_data_aksi') ?>">
                <div class="form-group">
                    <label>No. SPBU</label>
                    <input type="hidden" name="id_spbu" class="form-control" value="<?php echo $t->id_spbu ?>">
                    <input type="text" name="nama_spbu" class="form-control" value="<?php echo $t->nama_spbu ?>">
                    <?php echo form_error('nama_spbu', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="lokasi_spbu" class="form-control" value="<?php echo $t->lokasi_spbu ?>">
                    <?php echo form_error('lokasi_spbu', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Lokasi SPBU</label>
                    <input type="text" name="no_spbu" class="form-control" value="<?php echo $t->no_spbu ?>">
                    <?php echo form_error('no_spbu', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Telp/HP</label>
                    <input type="text" name="telp" class="form-control" value="<?php echo $t->telp ?>">
                    <?php echo form_error('telp', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Peneraan</label>
                    <input type="text" name="tgl_peneraan" class="form-control" value="<?php echo $t->tgl_peneraan ?>">
                    <?php echo form_error('tgl_peneraan', '<div class="text-small text-danger"></div>'); ?>
                </div>


                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>