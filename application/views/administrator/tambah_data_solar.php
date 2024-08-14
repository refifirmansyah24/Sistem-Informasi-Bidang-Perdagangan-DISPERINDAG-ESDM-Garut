 <!-- TEMPLATE BUAT BIKIN VIEW -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
     </div>
     <!-- MEMBUAT FORM INPUTAN -->
     <div class="card" style="width: 60%" ; margin-bottom: 100px>
         <div class="card-body">
             <form method="POST" action="<?php echo base_url('administrator/rekom_solar/tambah_data_aksi') ?>"
                 enctype="multiprt/form-data">

                 <!-- Rekomendasi -->
                 <div class="form-group">
                     <label for="nama_pemilik">No.Surat</label>
                     <div>
                         <input type="text" id="no_surat" name="no_surat" class="form-control"
                             placeholder="Masukan No Surat">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="nama_pemilik">Nama Pemilik Usaha</label>
                     <div>
                         <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control"
                             placeholder="Masukan Nama">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="nik">NIK</label>
                     <div>
                         <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukan NIK">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="alamat">Alamat</label>
                     <div>
                         <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukan Alamat">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="telp">No. HP</label>
                     <div>
                         <input type="text" id="telp" name="telp" class="form-control" placeholder="Masukan No. HP">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="konsumen">Konsumen Pengguna</label>
                     <div>
                         <input type="text" id="konsumen" name="konsumen" class="form-control"
                             placeholder="Masukan Konsumen Pengguna">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="nama_usaha">Nama Usaha</label>
                     <div>
                         <input type="text" id="nama_usaha" name="nama_usaha" class="form-control"
                             placeholder="Masukan Nama Usaha">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="jenis_usaha">Jenis Usaha</label>
                     <div>
                         <input type="text" id="jenis_usaha" name="jenis_usaha" class="form-control"
                             placeholder="Masukan Jenis Usaha">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="satuan_kebutuhan">Satuan Kebutuhan</label>
                     <div>
                         <input type="text" id="satuan_kebutuhan" name="satuan_kebutuhan" class="form-control"
                             placeholder="Masukan Satuan Kebutuhan">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="jumlah_alokasi">Jumlah Alokasi</label>
                     <div>
                         <input type="text" id="jumlah_alokasi" name="jumlah_alokasi" class="form-control"
                             placeholder="Masukan Jumlah Alokasi">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="durasi_alokasi">Durasi Alokasi</label>
                     <div>
                         <input type="text" id="durasi_alokasi" name="durasi_alokasi" class="form-control"
                             placeholder="Masukan Jenis Usaha">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="masa_berlaku">Masa Berlaku</label>
                     <div>
                         <input type="text" id="masa_berlaku" name="masa_berlaku" class="form-control"
                             placeholder="Masukan Jenis Usaha">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="no_penyalur">No. Penyalur</label>
                     <div>
                         <input type="text" id="no_penyalur" name="no_penyalur" class="form-control"
                             placeholder="Masukan No Penyalur">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="lokasi_penyalur">Lokasi Penyalur</label>
                     <div>
                         <input type="text" id="lokasi_penyalur" name="lokasi_penyalur" class="form-control"
                             placeholder="Masukan Lokasi Penyalur">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="tgl_pengajuan">Tanggal Pengajuan</label>
                     <div>
                         <input type="date" id="tgl_pengajuan" name="tgl_pengajuan" class="form-control"
                             placeholder="Masukan Tanggal Pengajuan">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="lembaga_penyalur_tempat_pengambilan">Lembaga Penyalur Tempat Pengambilan</label>
                     <div>
                         <input type="text" id="lembaga_penyalur_tempat_pengambilan"
                             name="lembaga_penyalur_tempat_pengambilan" class="form-control"
                             placeholder="Masukan Lembaga Tempat Pengambilan">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="no_lembaga_penyalur">No. Lembaga Penyalur</label>
                     <div>
                         <input type="text" id="no_lembaga_penyalur" name="no_lembaga_penyalur" class="form-control"
                             placeholder="Masukan No Lembaga Penyalur">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="lok_lembaga_penyalur">Lokasi Lembaga Penyalur</label>
                     <div>
                         <input type="text" id="lok_lembaga_penyalur" name="lok_lembaga_penyalur" class="form-control"
                             placeholder="Masukan Lokasi Lembaga Penyalur">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="upload_sku">Upload SKU</label>
                     <div>
                         <input type="file" id="upload_sku" name="upload_sku" class="form-control"
                             placeholder="Upload SKU">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="up_mesin_tempat">Upload Mesin/Tempat Usaha</label>
                     <div>
                         <input type="file" id="up_mesin_tempat" name="up_mesin_tempat" class="form-control"
                             placeholder="Upload Mesin/Tempat Usaha">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="up_surat_pengajuan">Upload Surat Pengajuan</label>
                     <div>
                         <input type="file" id="up_surat_pengajuan" name="up_surat_pengajuan" class="form-control"
                             placeholder="Upload Surat Pengajuan">
                     </div>
                 </div>


                 <!-- Kebutuhan BBM -->
                 <div id="kebutuhan-container">
                     <div class="kebutuhan-set">
                         <div class="form-group">
                             <label for="jenis_alat[]">Jenis Alat</label>
                             <input type="text" name="jenis_alat[]" class="form-control"
                                 placeholder="Masukan Jenis Alat">
                         </div>

                         <div class="form-group">
                             <label for="jumlah_alat[]">Jumlah Alat</label>
                             <input type="text" name="jumlah_alat[]" class="form-control"
                                 placeholder="Masukan Jumlah Alat">
                         </div>

                         <div class="form-group">
                             <label for="fungsi_alat[]">Fungsi Alat</label>
                             <input type="text" name="fungsi_alat[]" class="form-control"
                                 placeholder="Masukan Fungsi Alat">
                         </div>

                         <div class="form-group">
                             <label>Jenis BBM</label>
                             <select name="jenis_bbm[]" class="form-control">
                                 <option value="" style="display:none;">Pilih Jenis BBM</option>
                                 <option value="Solar">Solar</option>
                                 <option value="Pertalite">Pertalite</option>
                             </select>
                             <!-- Error message for jenis_bbm field (if any) -->
                             <?php echo form_error('jenis_bbm[]', '<div class="text-small text-danger">', '</div>'); ?>
                         </div>

                         <div class="form-group">
                             <label for="kebutuhan_bbm[]">Kebutuhan BBM</label>
                             <input type="text" name="kebutuhan_bbm[]" class="form-control"
                                 placeholder="Masukan Kebutuhan BBM">
                         </div>

                         <div class="form-group">
                             <label for="operasi[]">Durasi Operasi</label>
                             <input type="text" name="operasi[]" class="form-control"
                                 placeholder="Masukan Durasi Operasi">
                         </div>

                         <div class="form-group">
                             <label for="konsumsi[]">Konsumsi</label>
                             <input type="text" name="konsumsi[]" class="form-control" placeholder="Masukan Konsumsi">
                         </div>

                         <div class="form-group">
                             <label for="durasi_konsumsi[]">Durasi Konsumsi</label>
                             <input type="text" name="durasi_konsumsi[]" class="form-control"
                                 placeholder="Masukan Durasi Konsumsi">
                         </div>

                         <button type="button" class="remove-btn" onclick="removeKebutuhanSet(this)">Remove</button>
                     </div>
                 </div>
                 <button type="button" onclick="addKebutuhanSet()">Add Kebutuhan</button>

                 <!-- BUTOON SUBMIT INPUTAN DATA -->
                 <button type="submit" class="btn btn-success">Submit</button>

             </form>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->

 <script>
function addKebutuhanSet() {
    const container = document.getElementById('kebutuhan-container');
    const kebutuhanSet = document.createElement('div');
    kebutuhanSet.className = 'kebutuhan-set';

    // Add the fields for Kebutuhan BBM
    kebutuhanSet.innerHTML = `
            <div class="form-group">
                <label for="jenis_alat[]">Jenis Alat</label>
                <input type="text" name="jenis_alat[]" class="form-control" placeholder="Masukan Jenis Alat">
            </div>

            <div class="form-group">
                <label for="jumlah_alat[]">Jumlah Alat</label>
                <input type="text" name="jumlah_alat[]" class="form-control" placeholder="Masukan Jumlah Alat">
            </div>

            <div class="form-group">
                <label for="fungsi_alat[]">Fungsi Alat</label>
                <input type="text" name="fungsi_alat[]" class="form-control" placeholder="Masukan Fungsi Alat">
            </div>

            <div class="form-group">
                <label>Jenis BBM</label>
                <select name="jenis_bbm[]" class="form-control">
                    <option value="" style="display:none;">Pilih Jenis BBM</option>
                    <option value="Solar">Solar</option>
                    <option value="Pertalite">Pertalite</option>
                </select>
                <!-- Error message for jenis_bbm field (if any) -->
                <?php echo form_error('jenis_bbm[]', '<div class="text-small text-danger">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label for="kebutuhan_bbm[]">Kebutuhan BBM</label>
                <input type="text" name="kebutuhan_bbm[]" class="form-control" placeholder="Masukan Kebutuhan BBM">
            </div>

            <div class="form-group">
                <label for="operasi[]">Durasi Operasi</label>
                <input type="text" name="operasi[]" class="form-control" placeholder="Masukan Durasi Operasi">
            </div>

            <div class="form-group">
                <label for="konsumsi[]">Konsumsi</label>
                <input type="text" name="konsumsi[]" class="form-control" placeholder="Masukan Konsumsi">
            </div>

            <div class="form-group">
                <label for="durasi_konsumsi[]">Durasi Konsumsi</label>
                <input type="text" name="durasi_konsumsi[]" class="form-control" placeholder="Masukan Durasi Konsumsi">
            </div>

            <button type="button" class="remove-btn" onclick="removeKebutuhanSet(this)">Remove</button>
        `;

    container.appendChild(kebutuhanSet);
}

function removeKebutuhanSet(btn) {
    const kebutuhanSet = btn.parentNode;
    kebutuhanSet.remove();
}
 </script>