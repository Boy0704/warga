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
                         <label for="rt" class="col-sm-3
                         col-form-label">Rt
                              <?php echo form_error('rt') ?></label>
                         <div class="col-sm-9">
                              <input type="text" class="form-control" name="rt" id="rt" placeholder="Rt"
                                   value="<?php echo $rt; ?>" />
                         </div>
                    </div>
                    <input type="hidden" name="id_rt" value="<?php echo $id_rt; ?>" />
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                         <?php echo $button ?></button>
                    <a href="<?php echo site_url('rt') ?>" class="btn btn-outline-info"><i class="bx bx-exit"></i>
                         Cancel</a>

               </div>
          </div>
     </div>
</form>