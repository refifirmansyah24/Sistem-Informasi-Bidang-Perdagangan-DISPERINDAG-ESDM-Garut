<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
        </h1>
    </div>

    <div class="card" style="width: 60%">
        <div class="card-body">
            <form action="<?php echo base_url('perdagangan/Cetakrekom/exportToWord/' . $id_rekomendasi) ?>"
                method="post">
                <div class="form-group">
                    <input type="text" name="nomor_surat" placeholder="Nomor Surat" required>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">
                    Cetak
                </button>
            </form>
        </div>
    </div>
</div>