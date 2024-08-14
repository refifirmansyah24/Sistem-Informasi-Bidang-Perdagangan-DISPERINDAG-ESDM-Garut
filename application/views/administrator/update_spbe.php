<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <?php foreach ($spbe as $t) : ?>
            <form method="POST" action="<?php echo base_url('administrator/spbe/update_data_aksi') ?>">
                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="hidden" name="id_spbe" class="form-control" value="<?php echo $t->id_spbe ?>">
                    <input type="text" name="nama_pemilik" class="form-control" value="<?php echo $t->nama_pemilik?>">
                    <?php echo form_error('nama_pemilik', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control"
                        value="<?php echo $t->nama_perusahaan ?>">
                    <?php echo form_error('nama_perusahaan', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat SPBE</label>
                    <input type="text" name="alamat_kantor" class="form-control"
                        value="<?php echo $t->alamat_kantor ?>">
                    <?php echo form_error('alamat_kantor', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Telp/HP</label>
                    <input type="text" name="telp" class="form-control" value="<?php echo $t->telp ?>">
                    <?php echo form_error('telp', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $t->email ?>">
                    <?php echo form_error('email', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>