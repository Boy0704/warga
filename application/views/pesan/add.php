<form action="pesan/simpan" method="post" enctype="multipart/form-data">
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
                         <label for="penerima" class="col-sm-3
                         col-form-label">Penerima</label>
                         <div class="col-sm-9">
                              <?php if ($this->session->userdata('level') == 'admin'): ?>
                              <select name="penerima" class="single-select" required>
                                   <option value="">Pilih NIK</option>
                                   <?php foreach ($this->db->get('warga')->result() as $rw) : ?>
                                   <option value="<?php echo $rw->nik ?>"><?php echo $rw->nama ?></option>
                                   <?php endforeach ?>
                              </select>
                              <?php else: ?>
                              <input type="text" class="form-control" name="penerima" id="penerima" value="admin" readonly/>
                              <?php endif ?>
                              
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="keterangan" class="col-sm-3
                         col-form-label">Pesan</label>
                         <div class="col-sm-9">
                              <textarea class="form-control" rows="3" name="pesan" id="pesan" rows="3"
                                   placeholder="Pesan"></textarea>
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
                    
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                         Kirim</button>

               </div>
          </div>
     </div>
</form>

<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
     CKEDITOR.replace('pesan');
</script>
<script type="text/javascript">
     $(document).ready(function() {
          var n = 1;
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