       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
           </div>

           <!-- Form Pencarian -->
           <form action="<?php echo site_url('administrator/pangkalan/cari_data'); ?>" method="get"
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
               <?php if (!empty($pangkalan)) : ?>
               <a class="btn btn-sm btn-primary mr-2"
                   href="<?php echo base_url('administrator/pangkalan/print_pangkalan')?>">
                   <i class="fas fa-print"></i> Cetak
               </a>
               <?php endif; ?>
               <!-- Button Tambah Data  -->
               <a class="btn btn-sm btn-success"
                   href="<?php echo base_url('administrator/pangkalan/tambah_pangkalan/')?>">
                   <i class="fas fa-plus"></i> Tambah Data
               </a>
           </div>

           <div><?php echo $this->session->flashdata('pesan')?></div>

           <!-- Kondisi Jika tidak ada data  -->
           <?php if (isset($_GET['keyword']) && empty($pangkalan)) : ?>
           <!-- Tampilkan pesan "Tidak Terdapat Data Yang Dicari" jika data yang dicari tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Data Yang Dicari Tidak Ditemukan</p>
           </div>
           <?php elseif (empty($pangkalan)) : ?>
           <!-- Tampilkan pesan "Tidak terdapat data tanda daftar gudang" jika data tanda daftar gudang kosong atau tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Tidak Terdapat Data Pangkalan Gas Elpiji</p>
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
                               <th class="text-center">Pangkalan</th>
                               <th class="text-center">Id Registrasi</th>
                               <th class="text-center">Kecamatan</th>
                               <th class="text-center">Kelurahan</th>
                               <th class="text-center">Alamat </th>
                               <th class="text-center">Penyaluran</th>
                               <th class="text-center">Agen</th>
                               <th class="text-center">Action</th>
                           </tr>

                           <?php $no=1;
            //menampiljan data nya menggunakan looping for each 
            foreach($pangkalan as $t) : ?>
                           <tr>
                               <!-- panggil variabel increment otomatis nya -->
                               <td><?php echo $no++ ?></td>
                               <td> <?php echo $t->pangkalan ?> </td>
                               <td> <?php echo $t->id_registrasi ?> </td>
                               <td> <?php echo $t->kecamatan ?> </td>
                               <td> <?php echo $t->kelurahan ?> </td>
                               <td> <?php echo $t->alamat_pangkalan?> </td>
                               <td> <?php echo $t->penyaluran ?> </td>
                               <td> <?php echo $t->nama_agen?> </td>
                               <!-- Tombol Update dan Edit Data-->
                               <td>
                                   <div class="btn-group">
                                       <!-- Update Data -->
                                       <a class="btn btn-sm btn-primary"
                                           href="<?php echo base_url('administrator/pangkalan/update_pangkalan/'.$t->id_pangkalan)?>">
                                           <i class="fas fa-edit"></i>
                                       </a>
                                       <!-- Delete Data -->
                                       <a onclick="return confirm('Apakah Anda Ingin Menghapusnya??')"
                                           class="btn btn-sm btn-danger"
                                           href="<?php echo base_url('administrator/pangkalan/delete_data/'.$t->id_pangkalan)?>">
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