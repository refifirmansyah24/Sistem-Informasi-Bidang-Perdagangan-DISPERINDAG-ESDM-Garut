       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
           </div>

           <!-- Form Pencarian -->
           <form action="<?php echo site_url('perdagangan/tdg/cari_data'); ?>" method="get"
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
               <?php if (!empty($tdg)) : ?>
               <a class="btn btn-sm btn-primary mr-2" href="<?php echo base_url('perdagangan/tdg/print_tdg')?>">
                   <i class="fas fa-print"></i> Cetak
               </a>
               <?php endif; ?>
               <!-- Button Tambah Data  -->
               <a class="btn btn-sm btn-success" href="<?php echo base_url('perdagangan/tdg/tambah_data_aksi/')?>">
                   <i class="fas fa-plus"></i> Tambah Data
               </a>
           </div>

           <div><?php echo $this->session->flashdata('pesan')?></div>

           <!-- Kondisi Jika tidak ada data  -->
           <?php if (isset($_GET['keyword']) && empty($tdg)) : ?>
           <!-- Tampilkan pesan "Tidak Terdapat Data Yang Dicari" jika data yang dicari tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Data Yang Dicari Tidak Ditemukan</p>
           </div>
           <?php elseif (empty($tdg)) : ?>
           <!-- Tampilkan pesan "Tidak terdapat data tanda daftar gudang" jika data tanda daftar gudang kosong atau tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Tidak Terdapat Data Tanda Daftar Gudang</p>
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
                               <th class="text-center">Nama Pemilik</th>
                               <th class="text-center">Alamat Pemilik</th>
                               <th class="text-center">Nama Perusahaan</th>
                               <th class="text-center">Alamat Perusahaan</th>
                               <th class="text-center">Alamat Gudang</th>
                               <th class="text-center">Telp/Fax</th>
                               <th class="text-center">NIB</th>
                               <th class="text-center">NPWP</th>
                               <th class="text-center">E Mail</th>
                               <th class="text-center">Investasi</th>
                               <th class="text-center">Website</th>
                               <th class="text-center">Latitud</th>
                               <th class="text-center">Longitud</th>
                               <th class="text-center">Luas Lahan (M2)</th>
                               <th class="text-center">Luas (M2)</th>
                               <th class="text-center">Kapasitas (M3/TON)</th>
                               <th class="text-center">Nomor & Tgl BAP</th>
                               <th class="text-center">Nomor & Tgl Pertek</th>
                               <th class="text-center">Nomor & Tgl Tdg</th>
                               <th class="text-center">Komoditas Gudang</th>
                               <th class="text-center">Action</th>
                           </tr>
                           <!-- membuat variabel untuk increment -->
                           <?php $no=1;
            //menampiljan data nya menggunakan looping for each 
            foreach($tdg as $t) : ?>
                           <tr>
                               <!-- panggil variabel increment otomatis nya -->
                               <td><?php echo $no++ ?></td>
                               <td> <?php echo $t->nama_pemilik ?> </td>
                               <td> <?php echo $t->alamat_pemilik ?> </td>
                               <td> <?php echo $t->nama_perusahaan ?> </td>
                               <td> <?php echo $t->alamat_perusahaan ?> </td>
                               <td> <?php echo $t->alamat_gudang ?> </td>
                               <td> <?php echo $t->telp_fax ?> </td>
                               <td> <?php echo $t->nib ?> </td>
                               <td> <?php echo $t->npwp ?> </td>
                               <td> <?php echo $t->email ?> </td>
                               <td> <?php echo $t->investasi ?> </td>
                               <td> <?php echo $t->website ?> </td>
                               <td> <?php echo $t->latitud ?> </td>
                               <td> <?php echo $t->longitud ?> </td>
                               <td> <?php echo $t->luas_lahan ?> </td>
                               <td> <?php echo $t->luas ?> </td>
                               <td> <?php echo $t->kapasitas ?> </td>
                               <td> <?php echo $t->nomor_tgl_bap ?> </td>
                               <td> <?php echo $t->nomor_tgl_pertek ?> </td>
                               <td> <?php echo $t->nomor_tgl_tdg ?> </td>
                               <td> <?php echo $t->komoditas_gudang ?> </td>

                               <!-- Tombol Update dan Edit Data-->
                               <td>
                                   <div class="btn-group">
                                       <!-- Update Data -->
                                       <a class="btn btn-sm btn-primary"
                                           href="<?php echo base_url('perdagangan/tdg/update_tdg/'.$t->id_tdg)?>">
                                           <i class="fas fa-edit"></i>
                                       </a>
                                       <!-- Delete Data -->
                                       <a onclick="return confirm('Apakah Anda Ingin Menghapusnya??')"
                                           class="btn btn-sm btn-danger"
                                           href="<?php echo base_url('perdagangan/tdg/delete_data/'.$t->id_tdg)?>">
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