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
                         col-form-label">Nik
                              <?php echo form_error('nik') ?></label>
                         <div class="col-sm-9">
                              <select name="nik" class="single-select" required>
                                   <option value="">Pilih NIK</option>
                                   <?php foreach ($this->db->get('warga')->result() as $rw) : ?>
                                   <option value="<?php echo $rw->nik ?>"><?php echo $rw->nama ?></option>
                                   <?php endforeach ?>
                              </select>
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="rt" class="col-sm-3
                         col-form-label">Rt
                              <?php echo form_error('rt') ?></label>
                         <div class="col-sm-9">
                              <select name="rt" class="single-select" required>
                                   <option value="">Pilih RT</option>
                                   <?php foreach ($this->db->get('rt')->result() as $rw) : ?>
                                   <option value="<?php echo $rw->id_rt ?>"><?php echo $rw->rt ?></option>
                                   <?php endforeach ?>
                              </select>
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="rw" class="col-sm-3
                         col-form-label">Rw
                              <?php echo form_error('rw') ?></label>
                         <div class="col-sm-9">
                              <select name="rw" class="single-select" required>
                                   <option value="">Pilih RW</option>
                                   <?php foreach ($this->db->get('rw')->result() as $rw) : ?>
                                   <option value="<?php echo $rw->id_rw ?>"><?php echo $rw->rw ?></option>
                                   <?php endforeach ?>
                              </select>
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="alamat" class="col-sm-3
                         col-form-label">Alamat
                              <?php echo form_error('alamat') ?></label>
                         <div class="col-sm-9">
                              <textarea class="form-control" rows="3" name="alamat" id="alamat" rows="3"
                                   placeholder="Alamat"><?php echo $alamat; ?></textarea>
                         </div>
                    </div>
                    <div class="row mb-3">
                         <hr>

                         <table class="table table-bordered">
                              <thead>
                                   <tr>
                                        <th>Label</th>
                                        <th>File</th>
                                        <th>#</th>
                                   </tr>
                              </thead>
                              <tbody class="upload">
                                   <tr id="br1">
                                        <td>
                                             <input type="text" name="label[]" class="form-control" required>
                                        </td>
                                        <td>
                                             <input type="file" name="files[]" class="form-control" required>
                                        </td>
                                        <td>
                                             <a class="btn btn-xs btn-danger remove" onclick="remove('1')"><i
                                                       class="bx bx-trash-alt me-0"></i></a>
                                        </td>
                                   </tr>
                              </tbody>
                         </table>
                         <div style="text-align: right;">
                              <a id="tambah" class="btn btn-info">Tambah Upload</a>
                         </div>
                    </div>
                    <input type="hidden" name="id_lapor" value="<?php echo $id_lapor; ?>" />
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                         <?php echo $button ?></button>
                    <a href="<?php echo site_url('lapor_diri') ?>" class="btn btn-outline-info"><i
                              class="bx bx-exit"></i> Cancel</a>

               </div>
          </div>
     </div>
</form>

<script type="text/javascript">
     $(document).ready(function() {
          var n = 1;
          $("#id_nasabah").change(function(event) {
               var nik      = $(this).select2().find(":selected").data("nik");
               $('#nik').val(nik);
               var nama      = $(this).select2().find(":selected").data("nama");
               $('#nama').val(nama);
               var alamat      = $(this).select2().find(":selected").data("alamat");
               $('#alamat').val(alamat);
          });

          $("#tambah").click(function(event) {
               event.preventDefault();
               n++;
               $(".upload").append('<tr id="br'+n+'"><td><input type="text" name="label[]" class="form-control" required></td><td><input type="file" name="files[]" class="form-control" required></td><td><a onclick="remove('+n+')" class="btn btn-xs btn-danger remove"><i class="bx bx-trash-alt me-0"></i></a></td></tr>');
          });

     });

     function remove(n) {
          $("#br"+n).remove();
     }

     
</script>