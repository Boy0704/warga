<div class="card">
     <div class="card-body">
          <div class="row mb-4">
               <div class="col">
                    <a href="pesan/add" class="btn btn-primary"><i class="bx bx-plus mr-1"></i>Kirim Pesan</a>
               </div>
          </div>
          <div class="row mb-3">
               <div class="col">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
               </div>
          </div>
          <div class="table-responsive">
               <table id="exampleDataTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                         <tr>
                              <th>No</th>
                              <th>Dari</th>
                              <th>Ke</th>
                              <th>Pesan</th>
                              <th>Created</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php 
                         $no = 1;
                         
                         if ($this->session->userdata('level') == 'user') {
                            $username = $this->session->userdata('username');
                            $this->db->where('dari', $username);
                            $this->db->or_where('ke', $username);
                            $pesan = $this->db->get('pesan');
                         } else {
                              $this->db->order_by('id_pesan', 'desc');
                              $pesan = $this->db->get('pesan');
                         }
                         
                         foreach ($pesan->result() as $psn): ?>
                              <tr>
                                   <td><?php echo $no ?></td>
                                   <td><?php echo ($psn->dari == 'admin') ? $psn->dari : get_data('warga','nik',$psn->dari,'nama'); ?></td>
                                   <td><?php echo ($psn->ke == 'admin') ? $psn->ke : get_data('warga','nik',$psn->ke,'nama') ; ?></td>
                                   <td><?php echo substr($psn->pesan, 0,50).'..' ?></td>
                                   <td><?php echo $psn->created_at ?></td>
                                   
                                   <td>
                                        <a href="pesan/lihat?id_pesan=<?php echo $psn->id_pesan ?>" title="Lihat Data" class="btn btn-sm btn-info">
                                             <i class="bx bx-check-square me-0"></i>
                                        </a>
                                        
                                   </td>
                              </tr>
                         <?php $no++; endforeach ?>
                    </tbody>
               </table>
          </div>
     </div>
</div>