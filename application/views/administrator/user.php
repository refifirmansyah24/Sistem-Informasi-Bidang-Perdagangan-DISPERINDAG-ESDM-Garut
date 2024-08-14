       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
           </div>
           <a class="btn btn-sm mb-3 btn-success " href="<?php echo base_url('administrator/user/tambah_user')?>">
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

                       <table class="table table-bordered table-striped mt-2">

                           <tr>
                               <th class="text-center">No</th>
                               <th class="text-center">Username</th>
                               <th class="text-center">Password</th>
                               <th class="text-center">Email</th>
                               <th class="text-center">Level</th>
                               <th class="text-center">Blokir</th>
                               <th class="text-center">Action</th>
                           </tr>
                           <!-- membuat variabel untuk increment -->
                           <?php $no=1;
            //menampiljan data nya menggunakan looping for each 
            foreach($user as $t) : ?>
                           <tr>
                               <!-- panggil variabel increment otomatis nya -->
                               <td><?php echo $no++ ?></td>
                               <td> <?php echo $t->username ?> </td>
                               <!-- Tampilkan kata sandi yang tidak di-hash MD5 -->
                               <td> <?php echo $t->password2 ?> </td>
                               <td> <?php echo $t->email ?> </td>
                               <td> <?php echo $t->level ?> </td>
                               <td> <?php echo $t->blokir ?> </td>

                               <!-- Tombol Update dan Edit Data-->
                               <td>
                                   <div class="btn-group">
                                       <!-- Update Data -->
                                       <a class="btn btn-sm btn-primary"
                                           href="<?php echo base_url('administrator/user/update_user/'.$t->id_user)?>">
                                           <i class="fas fa-edit"></i>
                                       </a>
                                       <!-- Delete Data -->
                                       <a onclick="return confirm('Apakah Anda Ingin Menghapusnya??')"
                                           class="btn btn-sm btn-danger"
                                           href="<?php echo base_url('administrator/user/delete_data/'.$t->id_user)?>">
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