       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
           </div>

           <!-- Form Pencarian -->
           <form action="<?php echo site_url('perdagangan/spbu/cari_data'); ?>" method="get"
               class="form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
               <div class="input-group">
                   <input type="text" name="keyword" class="form-control bg-light border-1 small" placeholder="Search"
                       aria-label="Search" aria-describedby="basic-addon2">
                   <div class="input-group-append">
                       <button type="submit" class="btn btn-primary">
                           <i class="fas fa-search fa-sm"></i>
                       </button>
                   </div>
               </div>
           </form>

           <!-- Button Print Data  -->
           <div class="d-flex mb-3 align-items-center" style="margin-top: 20px;">
               <!-- Kondisi jika tidak terdapat data maka tombol print tidak ada  -->
               <?php if (!empty($spbu)) : ?>
               <a class="btn btn-sm btn-primary mr-2" href="<?php echo base_url('perdagangan/spbu/print_spbu')?>">
                   <i class="fas fa-print"></i> Cetak
               </a>
               <?php endif; ?>
               <!-- Button Tambah Data  -->
               <a class="btn btn-sm btn-success" href="<?php echo base_url('perdagangan/spbu/tambah_spbu/')?>">
                   <i class="fas fa-plus"></i> Tambah Data
               </a>
           </div>

           <div><?php echo $this->session->flashdata('pesan')?></div>


           <!-- Kondisi Jika tidak ada data  -->
           <?php if (isset($_GET['keyword']) && empty($spbu)) : ?>
           <!-- Tampilkan pesan "Tidak Terdapat Data Yang Dicari" jika data yang dicari tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Data Yang Dicari Tidak Ditemukan</p>
           </div>
           <?php elseif (empty($spbu)) : ?>
           <!-- Tampilkan pesan "Tidak terdapat data tanda daftar gudang" jika data tanda daftar gudang kosong atau tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Tidak Terdapat Data SPBU</p>
           </div>
           <?php else : ?>

           <div class="table-responsive">
               <table class="table table-bordered table-striped mt-2">
                   <tr>


                       <style>
                       .table-container {
                           overflow-x: auto;
                       }

                       .table-container table {
                           min-width: 100%;
                       }
                       </style>

                       <table class="table table-bordered table-striped mt-2">

                           <tr>
                               <th class="text-center">No</th>
                               <th class="text-center">No. SPBU</th>
                               <th class="text-center">Nama Perusahaan</th>
                               <th class="text-center">Lokasi SPBU</th>
                               <th class="text-center">Telp/HP</th>
                               <th class="text-center">Tanggal Peneraan</th>
                               <th class="text-center">Action</th>
                           </tr>

                           <?php
// Fungsi untuk mengubah tanggal ke format yang diinginkan dengan nama hari dan bulan dalam bahasa Indonesia
function formatTanggal($tanggal) {
    $timestamp = strtotime($tanggal);
    
    // Array nama hari dalam bahasa Indonesia
    $namaHari = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
    );
    
    // Array nama bulan dalam bahasa Indonesia
    $namaBulan = array(
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
        7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    );

    $namaHariID = $namaHari[date('w', $timestamp)]; // Mengambil nama hari
    $tanggalHari = str_pad(date('j', $timestamp), 2, '0', STR_PAD_LEFT); // Mengambil tanggal dengan angka 0 sebelumnya jika kurang dari 10
    $bulanID = $namaBulan[date('n', $timestamp)]; // Mengambil nama bulan
    $tahun = date('Y', $timestamp); // Mengambil tahun

    return $namaHariID . ', ' . $tanggalHari . ' ' . $bulanID . ' ' . $tahun;
}
?>

                           <?php $no=1;
            //menampiljan data nya menggunakan looping for each 
            foreach($spbu as $t) : ?>
                           <tr>
                               <!-- panggil variabel increment otomatis nya -->
                               <td><?php echo $no++ ?></td>
                               <td> <?php echo $t->nama_spbu ?> </td>
                               <td> <?php echo $t->lokasi_spbu ?> </td>
                               <td> <?php echo $t->no_spbu ?> </td>
                               <td> <?php echo $t->telp ?> </td>
                               <td><?php echo formatTanggal($t->tgl_peneraan) ?></td>
                               <!-- Tombol Update dan Edit Data-->
                               <td>
                                   <div class="btn-group">
                                       <!-- Update Data -->
                                       <a class="btn btn-sm btn-primary"
                                           href="<?php echo base_url('perdagangan/spbu/update_spbu/'.$t->id_spbu)?>">
                                           <i class="fas fa-edit"></i>
                                       </a>
                                       <!-- Delete Data -->
                                       <a onclick="return confirm('Apakah Anda Ingin Menghapusnya??')"
                                           class="btn btn-sm btn-danger"
                                           href="<?php echo base_url('perdagangan/spbu/delete_data/'.$t->id_spbu)?>">
                                           <i class="fas fa-trash"></i>
                                       </a>
                                   </div>
                                   <style>
                                   .btn-group {
                                       display: flex;
                                       align-items: center;
                                       justify-content: center;
                                   }

                                   .btn-group .btn {
                                       margin-right: 5px;
                                   }
                                   </style>

                               </td>
                           </tr>
                           <?php endforeach; ?>
                       </table>
           </div>
       </div>
       <?php endif; ?>