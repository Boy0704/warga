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
                    <label for="nik" class="col-sm-3
                         col-form-label">NIK
                         <?php echo form_error('nik') ?></label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" name="nik"
                              id="nik" placeholder="Nik"
                              value="<?php echo $nik; ?>" />
                    </div>
               </div>
	 <div class="row mb-3">
                    <label for="nama" class="col-sm-3
                         col-form-label">Nama Lengkap
                         <?php echo form_error('nama') ?></label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" name="nama"
                              id="nama" placeholder="Nama"
                              value="<?php echo $nama; ?>" />
                    </div>
               </div>
	 <div class="row mb-3">
                    <label for="tempat_lahir" class="col-sm-3
                         col-form-label">Tempat Lahir
                         <?php echo form_error('tempat_lahir') ?></label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" name="tempat_lahir"
                              id="tempat_lahir" placeholder="Tempat Lahir"
                              value="<?php echo $tempat_lahir; ?>" />
                    </div>
               </div>
	 <div class="row mb-3">
                    <label for="tgl_lahir" class="col-sm-3
                         col-form-label">Tgl Lahir
                         <?php echo form_error('tgl_lahir') ?></label>
                    <div class="col-sm-9">
                         <input type="date" class="form-control" name="tgl_lahir"
                              id="tgl_lahir" placeholder="Tgl Lahir"
                              value="<?php echo $tgl_lahir; ?>" />
                    </div>
               </div>
	 <div class="row mb-3">
                    <label for="jk" class="col-sm-3
                         col-form-label">Jenis Kelamin
                         <?php echo form_error('jk') ?></label>
                    <div class="col-sm-9">
                         <select class="form-control" name="jk">
                              <option value="<?php echo $jk ?>"><?php echo $jk ?></option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                         </select>
                    </div>
               </div>
	 <div class="row mb-3">
                    <label for="usia" class="col-sm-3
                         col-form-label">Usia
                         <?php echo form_error('usia') ?></label>
                    <div class="col-sm-9">
                         <input type="number" class="form-control" name="usia"
                              id="usia" placeholder="Usia"
                              value="<?php echo $usia; ?>" />
                    </div>
               </div>
	 <div class="row mb-3">
                    <label for="id_agama" class="col-sm-3
                         col-form-label">Agama
                         <?php echo form_error('id_agama') ?></label>
                    <div class="col-sm-9">
                         <select class="form-control" name="id_agama">
                              <option value="<?php echo $id_agama ?>"><?php echo get_data('agama','id_agama',$id_agama,'agama') ?></option>
                              <?php foreach ($this->db->get('agama')->result() as $rw): ?>
                                   <option value="<?php echo $rw->id_agama ?>"><?php echo $rw->agama ?></option>
                              <?php endforeach ?>
                         </select>
                    </div>
               </div>
	 <div class="row mb-3">
                    <label for="kewarganegaraan" class="col-sm-3
                         col-form-label">Kewarganegaraan
                         <?php echo form_error('kewarganegaraan') ?></label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" name="kewarganegaraan"
                              id="kewarganegaraan" placeholder="Kewarganegaraan"
                              value="<?php echo $kewarganegaraan; ?>" />
                    </div>
               </div>
	 <div class="row mb-3">
                    <label for="no_telp" class="col-sm-3
                         col-form-label">No Telp
                         <?php echo form_error('no_telp') ?></label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" name="no_telp"
                              id="no_telp" placeholder="No Telp"
                              value="<?php echo $no_telp; ?>" />
                    </div>
               </div>
	 <div class="row mb-3">
                    <label for="email" class="col-sm-3
                         col-form-label">Email
                         <?php echo form_error('email') ?></label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" name="email"
                              id="email" placeholder="Email"
                              value="<?php echo $email; ?>" />
                    </div>
               </div>
	 <input type="hidden" name="id_warga" value="<?php echo $id_warga; ?>" /> 
	 <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                    <?php echo $button ?></button> 
	 <a href="<?php echo site_url('warga') ?>" class="btn btn-outline-info"><i
                         class="bx bx-exit"></i> Cancel</a>
	
               </div>
               </div>
               </div>
               </form>
               