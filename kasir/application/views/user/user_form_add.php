<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Add User Form</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">User</a></li>
               <li class="breadcrumb-item active">Add User</li>
            </ol>
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
               <a href="<?= base_url('user'); ?>" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="" method="post">
                  <div class="row d-flex justify-content-center">
                     <div class="col-md-5 mx-3">
                        <div class="form-group">
                           <label for="fullname">Name <span class="text-red">*</span></label>
                           <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Your Full Name" value="<?= set_value('fullname'); ?>">
                           <?= form_error('fullname'); ?>
                        </div>
                        <div class="form-group">
                           <label for="username">Username <span class="text-red">*</span></label>
                           <input type="text" name="username" id="username" class="form-control" placeholder="Your Username" value="<?= set_value('username'); ?>">
                           <?= form_error('username'); ?>
                        </div>
                        <div class="form-group">
                           <label for="password">Password <span class="text-red">*</span></label>
                           <input type="password" name="password" id="password" class="form-control" placeholder="Your Password">
                           <?= form_error('password'); ?>
                        </div>
                        <div class="form-group">
                           <label for="passconf">Password Confirmation <span class="text-red">*</span></label>
                           <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Password Confirmation">
                           <?= form_error('passconf'); ?>
                        </div>
                     </div>
                     <div class="col-md-5 mx-3">
                        <div class="form-group">
                           <label for="address">Address</label>
                           <textarea name="address" id="address" cols="30" rows="4" class="form-control"><?= set_value('address'); ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="level">Level <span class="text-red">*</span></label>
                           <select name="level" id="level" class="form-control">
                              <option value="">-- Select Level --</option>
                              <option value="1" <?= set_value('level') == 1 ? "selected" : null; ?>>Admin</option>
                              <option value="2" <?= set_value('level') == 2 ? "selected" : null; ?>>Kasir</option>
                           </select>
                           <?= form_error('level'); ?>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-paper-plane"></i> Save</button>
                           <button type="reset" class="btn btn-dark btn-flat"><i class="fas fa-backward"></i> Reset</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
   </div>
</section>