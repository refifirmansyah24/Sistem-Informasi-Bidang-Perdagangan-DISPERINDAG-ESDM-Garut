 <!-- TEMPLATE BUAT BIKIN VIEW -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
     </div>

     <!-- Button Tambah Data  -->
     <a class="btn btn-sm mb-3 btn-success "
         href="<?php echo base_url('administrator/pengajuan_rekom/tambah_peng_solar/')?>">
         <i class="fas fa-plus"> Tambah Data</i></a>
     <?php echo $this->session->flashdata('pesan')?>
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
                             <th class="text-center"> No. Surat</th>
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
                             <td><?php echo $r-> no_surat?></td>
                             <td><?php echo $r-> nik?></td>
                             <td><?php echo $r-> nama_pemilik?></td>
                             <td><?php echo $r-> alamat?></td>
                             <td><?php echo $r-> telp?></td>
                             <td><?php echo $r-> nama_usaha?></td>
                             <td><?php echo $r-> jenis_usaha?></td>


                             <td><img src="<?php echo base_url().'assets/photo/'.$r->upload_sku ?>" width="75px"></td>
                             <td><img src="<?php echo base_url().'assets/photo/'.$r->up_mesin_tempat ?>" width="75px">
                             </td>
                             <td><img src="<?php echo base_url().'assets/photo/'.$r->up_surat_pengajuan ?>"
                                     width="75px"></td>


                             <!-- Tombol Update dan Edit Data-->
                             <td>
                                 <div class="btn-group">
                                     <!-- Update Data -->
                                     <a class="btn btn-sm btn-primary"
                                         href="<?php echo base_url('administrator/pengajuan_rekom/tambah_pengajuan_lama/'.$r->id_rekomendasi)?>">
                                         <i class="fas fa-edit"></i>
                                     </a>
                                     <!-- Delete Data -->
                                     <a onclick="return confirm('Apakah Anda Ingin Menghapusnya??')"
                                         class="btn btn-sm btn-danger" href="">
                                         <i class="fas fa-trash"></i>
                                     </a>
                                     <a class="btn btn-sm btn-primary"
                                         href="<?php echo base_url('administrator/Cetakrekom/exportToWord/' . $r->id_rekomendasi) ?>">
                                         <i class="fas fa-print"></i>
                                     </a>
                                     <a class="bt n btn-sm btn-primary" href="">
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