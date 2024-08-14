 <!-- TEMPLATE BUAT BIKIN VIEW -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
     </div>


     <!-- Form Pencarian -->
     <form action="<?php echo site_url('administrator/pengajuan_rekom/cari_pengajuan'); ?>" method="get"
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
         <!-- Button Tambah Data  -->
         <a class="btn btn-sm btn-success"
             href="<?php echo base_url('administrator/pengajuan_rekom/tambah_peng_solar/')?>">
             <i class="fas fa-plus"></i> Tambah Data
         </a>
     </div>

     <div><?php echo $this->session->flashdata('pesan')?></div>


     <!-- Kondisi Jika tidak ada data  -->
     <?php if (isset($_GET['keyword']) && empty($rekomendasi)) : ?>
     <!-- Tampilkan pesan "Tidak Terdapat Data Yang Dicari" jika data yang dicari tidak ada -->
     <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
         <p>Data Yang Dicari Tidak Ditemukan</p>
     </div>
     <?php elseif (empty($rekomendasi)) : ?>
     <!-- Tampilkan pesan "Tidak terdapat data tanda daftar gudang" jika data tanda daftar gudang kosong atau tidak ada -->
     <div class="text-center" style="margin-top: 90px; margin-left: 20px;">
         <p>Tidak Terdapat Data Pengajuan Surat Rekomendasi Solar</p>
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

                 <div class="table-container">
                     <table class="table table-bordered table-striped mt-2">
                         <tr>

                             <th class="text-center"> No</th>
                             <th class="text-center"> NIK</th>
                             <th class="text-center"> Nama Pemilik Usaha</th>
                             <th class="text-center"> Alamat Pemilik Usaha</th>
                             <th class="text-center"> No. HP</th>
                             <th class="text-center"> Nama Usaha</th>
                             <th class="text-center"> Jenis Usaha/Kegiatan</th>
                             <th class="text-center"> Upload SKU</th>
                             <th class="text-center"> Upload Mesin/Tempat Usaha</th>
                             <th class="text-center"> Upload Surat Pengajuan</th>
                             <!-- Tombol Action -->
                             <th class="text-center">Action</th>

                         </tr>

                         <!-- Menampilkan Data Ke Tabel -->
                         <?php $no=1; foreach($rekomendasi as $r) :?>
                         <tr>
                             <!-- Data Pegawai -->
                             <td><?php echo $no++ ?></td>
                             <td><?php echo $r-> nik?></td>
                             <td><?php echo $r-> nama_pemilik?></td>
                             <td><?php echo $r-> alamat?></td>
                             <td><?php echo $r-> telp?></td>
                             <td><?php echo $r-> nama_usaha?></td>
                             <td><?php echo $r-> jenis_usaha?></td>

                             <td>
                                 <?php
                                    $file_extension = pathinfo($r->upload_sku, PATHINFO_EXTENSION);
                                        if (strtolower($file_extension) === 'pdf') {
                                            echo '<a href="'.base_url().'assets/photo/'.$r->upload_sku.'" target="_blank">View PDF</a>';
                                        } else {
                                            echo '<a href="'.base_url().'assets/photo/'.$r->upload_sku.'" target="_blank">
                                                    <img src="'.base_url().'assets/photo/'.$r->upload_sku.'" width="75px">
                                                </a>';
                                        }
                                    ?>
                             </td>

                             <td>
                                 <?php
                                    $file_extension = pathinfo($r->up_mesin_tempat, PATHINFO_EXTENSION);
                                        if (strtolower($file_extension) === 'pdf') {
                                            echo '<a href="'.base_url().'assets/photo/'.$r->up_mesin_tempat.'" target="_blank">View PDF</a>';
                                        } else {
                                            echo '<a href="'.base_url().'assets/photo/'.$r->up_mesin_tempat.'" target="_blank">
                                                    <img src="'.base_url().'assets/photo/'.$r->up_mesin_tempat.'" width="75px">
                                                </a>';
                                        }
                                    ?>
                             </td>
                             <td>
                                 <?php
                                    $file_extension = pathinfo($r->up_surat_pengajuan, PATHINFO_EXTENSION);
                                        if (strtolower($file_extension) === 'pdf') {
                                            echo '<a href="'.base_url().'assets/photo/'.$r->up_surat_pengajuan.'" target="_blank">View PDF</a>';
                                        } else {
                                            echo '<a href="'.base_url().'assets/photo/'.$r->up_surat_pengajuan.'" target="_blank">
                                                    <img src="'.base_url().'assets/photo/'.$r->up_surat_pengajuan.'" width="75px">
                                                </a>';
                                        }
                                ?>
                             </td>

                             <td>
                                 <div class="btn-group">
                                     <!-- Tambah Perpanjangan -->
                                     <a class="btn btn-sm btn-primary"
                                         href="<?php echo base_url('administrator/perpanjangan_rekom/tambah_perpanjangan/'.$r->id_rekomendasi)?>">
                                         <i class="fas fa-plus"></i>
                                     </a>
                                     <!-- Tambah Perpanjangan -->
                                     <a class="btn btn-sm btn-primary"
                                         href="<?php echo base_url('administrator/pengajuan_rekom/update_pengajuan/'.$r->id_rekomendasi)?>">
                                         <i class="fas fa-edit"></i>
                                     </a>
                                     <!-- Delete Data -->
                                     <a onclick="return confirm('Apakah Anda Ingin Menghapusnya??')"
                                         class="btn btn-sm btn-danger"
                                         href="<?php echo base_url('administrator/pengajuan_rekom/delete_data/'.$r->id_rekomendasi)?>">
                                         <i class="fas fa-trash"></i>
                                     </a>
                                     <a class="btn btn-sm btn-primary"
                                         href="<?php echo base_url('administrator/Cetakrekom/inputNomorSurat/' . $r->id_rekomendasi) ?>">
                                         <i class="fas fa-print"></i>
                                     </a>
                                     <a class="btn btn-sm btn-success"
                                         href="<?php echo base_url('administrator/perpanjangan_rekom/rincian_perpanjangan/'.$r->id_rekomendasi)?>">
                                         <i class="fas fa-info"></i>
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
     <!-- /.container-fluid -->

     <?php endif; ?>