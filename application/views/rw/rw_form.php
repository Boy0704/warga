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
                    <label for="rw" class="col-sm-3
                         col-form-label">Rw
                         <?php echo form_error('rw') ?></label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" name="rw"
                              id="rw" placeholder="Rw"
                              value="<?php echo $rw; ?>" />
                    </div>
               </div>
	 <input type="hidden" name="id_rw" value="<?php echo $id_rw; ?>" /> 
	 <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                    <?php echo $button ?></button> 
	 <a href="<?php echo site_url('rw') ?>" class="btn btn-outline-info"><i
                         class="bx bx-exit"></i> Cancel</a>
	
               </div>
               </div>
               </div>
               </form>
               