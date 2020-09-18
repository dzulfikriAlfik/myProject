<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Users</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
               <li class="breadcrumb-item active">User</li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <div class="flash-data" data-pesan="<?= ucfirst($menu); ?>" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
         </div>
      </div>
   </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <a href="<?= base_url('user/add'); ?>" class="btn btn-info btn-sm"><i class="fas fa-user-plus"></i> Add User</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="myTable1" class="table table-bordered table-striped">
                  <thead class="text-center">
                     <tr>
                        <th width="50px">No.</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Level</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     foreach ($row as $user) : ?>
                        <tr>
                           <td><?= $no++; ?>.</td>
                           <td><?= $user['username']; ?></td>
                           <td><?= $user['name']; ?></td>
                           <td><?= $user['address']; ?></td>
                           <td><?= $user['level'] == 1 ? "Admin" : "Kasir"; ?></td>
                           <td width="160px">
                              <a href="<?= base_url('user/edit/' . $user['user_id']); ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</a>&nbsp;
                              <a href="<?= base_url('user/delete/' . $user['user_id']); ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
   </div>

</section>