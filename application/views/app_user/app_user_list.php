<div class="card">
     <div class="card-body">
          <div class="row mb-4">
               <div class="col">
                    <a href="app_user/create" class="btn btn-primary"><i class="bx bx-plus mr-1"></i>Tambah</a>
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
                              <th>Nama Lengkap</th>
                              <th>Username</th>
                              <th>Level</th>
                              <th>Foto</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody><?php
                        $no = 1;
                        foreach ($app_user_data as $app_user)
                        {
                            ?>
                         <tr>
                              <td width="80px"><?php echo $no ?></td>
                              <td><?php echo $app_user->nama_lengkap ?></td>
                              <td><?php echo $app_user->username ?></td>
                              <td><?php echo $app_user->level ?></td>
                              <td>
                                   <img src="image/user/<?php echo $app_user->foto ?>"
                                        alt="<?php echo $app_user->foto ?>" style="width:100px">
                              </td>
                              <td style="text-align:center" width="200px">

                                   <a href="app_user/update/<?php echo $app_user->id_user ?>" title="Update Data"
                                        class="btn btn-sm btn-primary"><i class="bx bx-edit me-0"></i>
                                   </a>
                                   <a href="app_user/delete/<?php echo $app_user->id_user ?>" title="Hapus Data"
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