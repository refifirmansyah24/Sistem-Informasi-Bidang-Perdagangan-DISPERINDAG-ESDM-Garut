<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <!-- FORM INPUT DATA -->
            <?php foreach ($tdg as $t) : ?>
            <form method="POST" action="<?php echo base_url('perdagangan/tdg/update_data_aksi') ?>">
                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="hidden" name="id_tdg" class="form-control" value="<?php echo $t->id_tdg ?>">
                    <input type="text" name="nama_pemilik" class="form-control" value="<?php echo $t->nama_pemilik ?>">
                    <?php echo form_error('nama_pemilik', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat Pemilik</label>
                    <input type="text" name="alamat_pemilik" class="form-control"
                        value="<?php echo $t->alamat_pemilik ?>">
                    <?php echo form_error('alamat_pemilik', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control"
                        value="<?php echo $t->nama_perusahaan ?>">
                    <?php echo form_error('nama_perusahaan', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat Perusahaan</label>
                    <input type="text" name="alamat_perusahaan" class="form-control"
                        value="<?php echo $t->alamat_perusahaan ?>">
                    <?php echo form_error('alamat_perusahaan', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat Gudang</label>
                    <input type="text" name="alamat_gudang" class="form-control"
                        value="<?php echo $t->alamat_gudang ?>">
                    <?php echo form_error('alamat_gudang', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Telp/Fax</label>
                    <input type="text" name="telp_fax" class="form-control" value="<?php echo $t->telp_fax ?>">
                    <?php echo form_error('telp_fax', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>NIB</label>
                    <input type="text" name="nib" class="form-control" value="<?php echo $t->nib ?>">
                    <?php echo form_error('nib', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" name="npwp" class="form-control" value="<?php echo $t->npwp ?>">
                    <?php echo form_error('npwp', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $t->email ?>">
                    <?php echo form_error('email', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Investasi</label>
                    <input type="text" name="investasi" class="form-control" value="<?php echo $t->investasi ?>">
                    <?php echo form_error('investasi', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control" value="<?php echo $t->website?>">
                    <?php echo form_error('website', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Latitud</label>
                    <input type="text" name="latitud" class="form-control" value="<?php echo $t->latitud?>">
                    <?php echo form_error('latitud', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Longitud</label>
                    <input type="text" name="longitud" class="form-control" value="<?php echo $t->longitud?>">
                    <?php echo form_error('longitud', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Luas Lahan</label>
                    <input type="text" name="luas_lahan" class="form-control" value="<?php echo $t->luas_lahan?>">
                    <?php echo form_error('luas_lahan', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Luas</label>
                    <input type="text" name="luas" class="form-control" value="<?php echo $t->luas?>">
                    <?php echo form_error('luas', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Kapasitas</label>
                    <input type="text" name="kapasitas" class="form-control" value="<?php echo $t->kapasitas?>">
                    <?php echo form_error('kapasitas', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>No. Tanggal Bap</label>
                    <input type="text" name="nomor_tgl_bap" class="form-control" value="<?php echo $t->nomor_tgl_bap?>">
                    <?php echo form_error('nomor_tgl_bap', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>No. Tanggal Pertek</label>
                    <input type="text" name="nomor_tgl_pertek" class="form-control"
                        value="<?php echo $t->nomor_tgl_pertek?>">
                    <?php echo form_error('nomor_tgl_pertek', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>No Tanggal Tdg</label>
                    <input type="text" name="nomor_tgl_tdg" class="form-control" value="<?php echo $t->nomor_tgl_tdg?>">
                    <?php echo form_error('nomor_tgl_tdg', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Komoditas Gudang</label>
                    <input type="text" name="komoditas_gudang" class="form-control"
                        value="<?php echo $t->komoditas_gudang?>">
                    <?php echo form_error('komoditas_gudang', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>