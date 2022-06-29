<div class="card">
     <div class="card-body">
          <div class="row mb-4">
               <div class="col">
                    <a href="lapor_diri/create" class="btn btn-primary"><i class="bx bx-plus mr-1"></i>Tambah</a>

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
                              <th>Nik</th>
                              <th>Rt</th>
                              <th>Rw</th>
                              <th>Alamat</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody><?php
                        $no = 1;
                        if ($this->session->userdata('level') == 'user') {
                            $username = $this->session->userdata('username');
                            $this->db->where('nik', $username);
                            $lapor_diri_data = $this->db->get('lapor_diri')->result();
                        }
                        foreach ($lapor_diri_data as $lapor_diri)
                        {
                            ?>
                         <tr>
                              <td width="80px"><?php echo $no ?></td>
                              <td><?php echo $lapor_diri->nik ?></td>
                              <td><?php echo get_data('rt','id_rt',$lapor_diri->rt,'rt') ?></td>
                              <td><?php echo get_data('rw','id_rw',$lapor_diri->rw,'rw') ?></td>
                              <td><?php echo $lapor_diri->alamat ?></td>
                              <td style="text-align:center" width="200px">

                                   <!-- <a href="lapor_diri/update/<?php echo $lapor_diri->id_lapor ?>" title="Update Data"
                                        class="btn btn-sm btn-primary"><i class="bx bx-edit me-0"></i>
                                   </a> -->
                                   <a href="lapor_diri/delete/<?php echo $lapor_diri->id_lapor ?>" title="Hapus Data"
                                        onclick="javasciprt: return confirm('Yakin akan hapus data ini ?')"
                                        class="btn btn-sm btn-danger"><i class="bx bx-trash-alt me-0"></i>
                                   </a>

                              </td>
                         </tr>
                         <?php
                            $no++;
                        }
                        ?>
                    </tbody>
               </table>
          </div>
     </div>
</div>