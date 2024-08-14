       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
           </div>

           <!-- Form Pencarian -->
           <form action="<?php echo site_url('administrator/kpl/cari_data'); ?>" method="get"
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
               <?php if (!empty($kpl)) : ?>
               <a class="btn btn-sm btn-primary mr-2" href="<?php echo base_url('administrator/kpl/print_kpl')?>">
                   <i class="fas fa-print"></i> Cetak
               </a>
               <?php endif; ?>
               <!-- Button Tambah Data  -->
               <a class="btn btn-sm btn-success" href="<?php echo base_url('administrator/kpl/tambah_kpl/')?>">
                   <i class="fas fa-plus"></i> Tambah Data
               </a>
           </div>

           <div><?php echo $this->session->flashdata('pesan')?></div>

           <!-- Kondisi Jika tidak ada data  -->
           <?php if (isset($_GET['keyword']) && empty($kpl)) : ?>
           <!-- Tampilkan pesan "Tidak Terdapat Data Yang Dicari" jika data yang dicari tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Data Yang Dicari Tidak Ditemukan</p>
           </div>
           <?php elseif (empty($kpl)) : ?>
           <!-- Tampilkan pesan "Tidak terdapat data tanda daftar gudang" jika data tanda daftar gudang kosong atau tidak ada -->
           <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
               <p>Tidak Terdapat Data Kios Pupuk Lengkap</p>
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

                       .center-align {
                           text-align: center;
                       }

                       .data-cell {
                           text-align: center;
                       }
                       </style>

                       <table class="table table-bordered table-striped mt-2">
                           <tr>
                               <th class="center-align">No</th>
                               <th class="center-align">Kode Kios</th>
                               <th class="center-align">Nama KPL</th>
                               <th class="center-align">Pemilik</th>
                               <th class="center-align">Alamat</th>
                               <th class="center-align">Kecamatan</th>
                               <th class="center-align">No. HP</th>
                               <th class="center-align">Distributor PT. Pupuk Kujang</th>
                               <th class="center-align">Distributor PT. Petro Kimia Gresik</th>
                               <th class="center-align">Keterangan</th>
                               <th class="center-align">Latitude</th>
                               <th class="center-align">Longitude</th>
                               <th class="center-align">Action</th>
                           </tr>
                   </tr>
                   <!-- membuat variabel untuk increment -->
                   <?php $no=1;
            //menampiljan data nya menggunakan looping for each 
            foreach($kpl as $t) : ?>
                   <tr>
                       <!-- panggil variabel increment otomatis nya -->
                       <td class="data-cell"><?php echo $no++ ?></td>
                       <td class="data-cell"><?php echo $t->kode_kios ?></td>
                       <td class="data-cell"><?php echo $t->nama_kpl ?></td>
                       <td class="data-cell"><?php echo $t->pemilik ?></td>
                       <td class="data-cell"><?php echo $t->alamat ?></td>
                       <td class="data-cell"><?php echo $t->kecamatan ?></td>
                       <td class="data-cell"><?php echo $t->no_hp ?></td>
                       <td class="data-cell"><?php echo $t->dis_1 ?></td>
                       <td class="data-cell"><?php echo $t->dis_2 ?></td>
                       <td class="data-cell"><?php echo $t->keterangan ?></td>
                       <td class="data-cell"><?php echo $t->latitud ?></td>
                       <td class="data-cell"><?php echo $t->longitud ?></td>

                       <!-- Tombol Update dan Edit Data-->
                       <td>
                           <div class="btn-group">
                               <!-- Update Data -->
                               <a class="btn btn-sm btn-primary"
                                   href="<?php echo base_url('administrator/kpl/update_kpl/'.$t->id_kpl)?>">
                                   <i class="fas fa-edit"></i>
                               </a>
                               <!-- Delete Data -->
                               <a onclick="return confirm('Apakah Anda Ingin Menghapusnya??')"
                                   class="btn btn-sm btn-danger"
                                   href="<?php echo base_url('administrator/kpl/delete_data/'.$t->id_kpl)?>">
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