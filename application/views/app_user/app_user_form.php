<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
     <div class="card border-top border-0 border-4 border-info">
          <div class="card-body">
               <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                         <div><i class="bx bx-edit-alt me-1 font-22 text-info"></i>
                         </div>
                         <h5 class="mb-0 text-info"><?php echo $judul_form ?></h5>
                    </div>
                    <hr />

                    <div class="row mb-3">
                         <label for="nama_lengkap" class="col-sm-3
                         col-form-label">Nama Lengkap
                              <?php echo form_error('nama_lengkap') ?></label>
                         <div class="col-sm-9">
                              <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                   placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="username" class="col-sm-3
                         col-form-label">Username
                              <?php echo form_error('username') ?></label>
                         <div class="col-sm-9">
                              <input type="text" class="form-control" name="username" id="username"
                                   placeholder="Username" value="<?php echo $username; ?>" />
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="password" class="col-sm-3
                         col-form-label">Password
                              <?php echo form_error('password') ?></label>
                         <div class="col-sm-9">
                              <input type="text" class="form-control" name="password" id="password"
                                   placeholder="Password" />
                              <?php if(!empty($password)): ?>
                                   <p>*) Kosongkan password jika tidak diisi.</p>
                                   <input type="hidden" name="password_old" value="<?php echo $password ?>">
                              <?php endif ?>
                              
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="level" class="col-sm-3
                         col-form-label">Level
                              <?php echo form_error('level') ?></label>
                         <div class="col-sm-9">
                              <select name="level" id="level" class="single-select">
                                   <option value="<?php echo $level ?>"><?php echo $level ?></option>
                                   <option value="admin">admin</option>
                              </select>
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="foto" class="col-sm-3
                         col-form-label">Foto
                              <?php echo form_error('foto') ?></label>
                         <div class="col-sm-9">
                              <input class="form-control" type="file" name="foto" id="formFile">
                              <input type="hidden" name="foto_old" value="<?php echo $foto ?>">
                              <div>
                                   <?php if ($foto != ''): ?>
                                        <b>*) Foto Sebelumnya : </b><br>
                                        <img src="image/user/<?php echo $foto ?>" style="width: 100px;">
                                   <?php endif ?>
                              </div>
                         </div>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                         <?php echo $button ?></button>
                    <a href="<?php echo site_url('app_user') ?>" class="btn btn-outline-info"><i class="bx bx-exit"></i>
                         Cancel</a>

               </div>
          </div>
     </div>
</form>