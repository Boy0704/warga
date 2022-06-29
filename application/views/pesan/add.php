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