<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Supplier</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
               <li class="breadcrumb-item active">Supplier</li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <div class="flash-data" data-pesan="<?= ucfirst($menu); ?>" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <div class="flash-error" data-pesan="<?= ucfirst($menu); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
         </div>
      </div>
   </div>
</section>

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <a href="<?= base_url('supplier/add'); ?>" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Add Supplier</a>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="myTable1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Name</th>
                           <th>Telepon</th>
                           <th>Address</th>
                           <th>Description</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $no = 1;
                        foreach ($row as $supp) : ?>
                           <tr>
                              <td><?= $no++; ?>.</td>
                              <td><?= $supp['name']; ?></td>
                              <td><?= $supp['phone']; ?></td>
                              <td><?= $supp['address']; ?></td>
                              <td><?= $supp['description'] ?></td>
                              <td width="160px" class="text-center">
                                 <a href="<?= base_url('supplier/edit/' . $supp['supplier_id']); ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</a>&nbsp;
                                 <a href="<?= base_url('supplier/delete/' . $supp['supplier_id']); ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>