<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <?php foreach ($user as $d) : ?>
            <form method="POST" action="<?php echo base_url('administrator/user/update_data_aksi') ?>">
                <div class="form-group">
                    <label>Username</label>
                    <input type="hidden" name="id_user" class="form-control" value="<?php echo $d->id_user?>">
                    <input type="text" name="username" class="form-control" value="<?php echo $d->username ?>">
                    <?php echo form_error('username', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $d->password ?>">
                    <?php echo form_error('password', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Masukan Kembali Password</label>
                    <input type="text" name="password2" class="form-control" value="<?php echo $d->password2 ?>">
                    <?php echo form_error('password2', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $d->email ?>">
                    <?php echo form_error('email', '<div class="text-small text-danger"></div>'); ?>
                </div>


                <div class="form-group">
                    <label>Blokir</label>
                    <select name="blokir" class="form-control">
                        <option value="">Pilih Blokir</option>
                        <option value="Y" <?php echo ($d->blokir == 'Y') ? 'selected' : ''; ?>>
                            Y</option>
                        <option value="N" <?php echo ($d->blokir == 'N') ? 'selected' : ''; ?>>
                            N</option>
                    </select>
                    <?php echo form_error('blokir', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>