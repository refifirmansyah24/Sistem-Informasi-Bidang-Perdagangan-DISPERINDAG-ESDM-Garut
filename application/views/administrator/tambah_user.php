<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <form method="POST" action="<?php echo base_url('administrator/user/tambah_data_aksi') ?>">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                    <?php echo form_error('username', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control">
                    <?php echo form_error('password', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Masukan Kembali Password</label>
                    <input type="text" name="password2" class="form-control">
                    <?php echo form_error('password2', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                    <?php echo form_error('email', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="" style="display:none;">Pilih Level</option>
                        <option value="Super Admin">Super Admin</option>
                        <option value="Admin Perdagangan">Admin Perdagangan</option>
                    </select>
                    <?php echo form_error('level', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Blokir</label>
                    <select name="blokir" class="form-control">
                        <option value="" style="display:none;">Pilih Blokir</option>
                        <option value="Y">Y</option>
                        <option value="N">N</option>
                    </select>
                    <?php echo form_error('blokir', '<div class="text-small text-danger"></div>'); ?>
                </div>


                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
    </div>

</div>