<?php 
$id_pesan = $this->input->get('id_pesan');
$this->db->where('id_pesan', $id_pesan);
$psn = $this->db->get('pesan')->row();
 ?>
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
                    col-form-label">Dari</label>
                    <div class="col-sm-9">
                         <?php echo ($psn->dari == 'admin') ? $psn->dari : get_data('warga','nik',$psn->dari,'nama');  ?>
                    </div>
               </div>
               <div class="row mb-3">
                    <label for="penerima" class="col-sm-3
                    col-form-label">Kepada</label>
                    <div class="col-sm-9">
                         <?php echo ($psn->ke == 'admin') ? $psn->ke : get_data('warga','nik',$psn->ke,'nama');  ?>
                    </div>
               </div>
               <div class="row mb-3">
                    <label for="keterangan" class="col-sm-3
                    col-form-label">Pesan</label>
                    <div class="col-sm-9">
                         <?php echo $psn->pesan ?>
                    </div>
               </div>
               <div class="row mb-3">
                    <label for="keterangan" class="col-sm-3
                    col-form-label">Waktu</label>
                    <div class="col-sm-9">
                         <?php echo $psn->created_at ?>
                    </div>
               </div>

               <div class="row mb-3">
                    <label for="keterangan" class="col-sm-3
                    col-form-label">Dokumen Terlampir</label>
                    <div class="col-sm-9">
                         
                         <table class="table table-bordered">
                              <tr>
                                   <th>Judul</th>
                                   <th>Link</th>
                              </tr>
                              <?php foreach ($this->db->get_where('dokumen_pesan', ['id_pesan'=>$psn->id_pesan])->result() as $rw): ?>
                                   <tr>
                                        <td><?php echo $rw->ket ?></td>
                                        <td>
                                             <a href="image/file/<?php echo $rw->files ?>">lihat</a>
                                        </td>
                                   </tr>
                              <?php endforeach ?>
                         </table>

                    </div>
               </div>
               
               <a href="pesan" class="btn btn-primary"><i class="bx bx-arrow-to-left"></i>
                    Kembali</a>

          </div>
     </div>
</div>
