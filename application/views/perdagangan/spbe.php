       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
           </div>

           <!-- Form Pencarian -->
           <form action="<?php echo site_url('perdagangan/spbe/cari_data'); ?>" method="get"
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
               <?php if (!empty($spbe)) : ?>
               <a class="btn btn-sm btn-primary mr-2" href="<?php echo base_url('perdagangan/spbe/print_spbe')?>">
                   <i class="fas fa-print"></i> Cetak
               </a>
               <?php endif; ?>
               <!-- Button Tambah Data  -->
               <a class="btn btn-sm btn-success" href="<?php echo base_url('perdagangan/spbe/tambah_spbe/')?>">
                   <i class="fas fa-plus"></i> Tambah Data
               </a>
           </div>

           <div><?php echo $this->session->flashdata('pesan')?></div>

           <!-- Kondisi Jika tidak ada data  -->
           <?php if (isset($_GET['keyword']) && empty($spbe)) : ?>
           <!-- Tampilkan pesan "Tidak Terdapat Data Yang Dicari" jika data yang dicari tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Data Yang Dicari Tidak Ditemukan</p>
           </div>
           <?php elseif (empty($spbe)) : ?>
           <!-- Tampilkan pesan "Tidak terdapat data tanda daftar gudang" jika data tanda daftar gudang kosong atau tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Tidak Terdapat Data SPBE</p>
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
                               <th class="text-center">Nama Perusahaan</th>
                               <th class="text-center">Alamat SPBE</th>
                               <th class="text-center">Telp/HP</th>
                               <th class="text-center">Email</th>
                               <th class="text-center">Action</th>
                           </tr>
                           <?php $no=1;
            //menampiljan data nya menggunakan looping for each 
            foreach($spbe as $t) : ?>
                           <tr>
                               <!-- panggil variabel increment otomatis nya -->
                               <td><?php echo $no++ ?></td>
                               <td> <?php echo $t->nama_pemilik ?> </td>
                               <td> <?php echo $t->nama_perusahaan ?> </td>
                               <td> <?php echo $t->alamat_kantor ?> </td>
                               <td> <?php echo $t->telp ?> </td>
                               <td> <?php echo $t->email ?> </td>
                               <!-- Tombol Update dan Edit Data-->
                               <td>
                                   <div class="btn-group">
                                       <!-- Update Data -->
                                       <a class="btn btn-sm btn-primary"
                                           href="<?php echo base_url('perdagangan/spbe/update_spbe/'.$t->id_spbe)?>">
                                           <i class="fas fa-edit"></i>
                                       </a>
                                       <!-- Delete Data -->
                                       <a onclick="return confirm('Apakah Anda Ingin Menghapusnya??')"
                                           class="btn btn-sm btn-danger"
                                           href="<?php echo base_url('perdagangan/spbe/delete_data/'.$t->id_spbe)?>">
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