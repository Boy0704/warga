<form action="" method="GET">
     <div class="card border-top border-0 border-4 border-info">
          <div class="card-body">
               <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                         <div><i class="bx bx-edit-alt me-1 font-22 text-info"></i>
                         </div>
                         <h5 class="mb-0 text-info">Pencarian Data Warga</h5>
                    </div>
                    <hr />

                    <div class="row mb-3">
                         <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                         <div class="col-sm-9">
                              <input type="text" class="form-control" name="nik" id="nik"
                                   placeholder="Nik" />
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                         <div class="col-sm-9">
                              <input type="text" class="form-control" name="nama"
                                   id="nama" placeholder="Nama" />
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="tgl_lahir" class="col-sm-3 col-form-label">Tgl Lahir</label>
                         <div class="col-sm-9">
                              <input type="date" class="form-control" name="tgl_lapor" />
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                         <div class="col-sm-9">
                              <select class="form-control" name="jk">
                                   <option value="">Pilih Kelamin</option>
                                   <option value="Laki-laki">Laki-laki</option>
                                   <option value="Perempuan">Perempuan</option>
                              </select>
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="usia" class="col-sm-3 col-form-label">Usia</label>
                         <div class="col-sm-3">
                              <input type="number" class="form-control" name="usia"
                                   id="usia" placeholder="Usia"/>
                         </div>
                         <div class="col-sm-1">
                         	Sampai
                         </div>
                         <div class="col-sm-3">
                              <input type="number" class="form-control" name="usia"
                                   id="usia" placeholder="Usia"/>
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="id_agama" class="col-sm-3 col-form-label">Agama</label>
                         <div class="col-sm-9">
                              <select class="form-control" name="id_agama">
                                   <option value="">Pilih Agama</option>
                                   <?php foreach ($this->db->get('agama')->result() as $rw): ?>
                                   <option value="<?php echo $rw->id_agama ?>">
                                        <?php echo $rw->agama ?></option>
                                   <?php endforeach ?>
                              </select>
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="usia" class="col-sm-3 col-form-label">RT/RW</label>
                         <div class="col-sm-3">
                              <select name="rt" class="form-control">
                                   <option value="">Pilih RT</option>
                              	<?php foreach ($this->db->get('rt')->result() as $rt): ?>
                              		<option value="<?php echo $rt->id_rt ?>"><?php echo $rt->rt ?></option>
                              	<?php endforeach ?>
                              </select>
                         </div>
                         <div class="col-sm-3">
                              <select name="rw" class="form-control">
                                   <option value="">Pilih RW</option>
                              	<?php foreach ($this->db->get('rw')->result() as $rw): ?>
                              		<option value="<?php echo $rw->id_rw ?>"><?php echo $rw->rw ?></option>
                              	<?php endforeach ?>
                              </select>
                         </div>
                    </div>
                    <div class="row mb-3">
                         <label for="alamat" class="col-sm-3 col-form-label">Alamat Sekarang</label>
                         <div class="col-sm-9">
                              <textarea class="form-control"></textarea>
                         </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i>Cari</button>

               </div>
          </div>
     </div>
</form>

<?php if (isset($_GET['nik'])): ?>
     <div class="table-responsive">
          <table id="exampleDataTable" class="table table-striped table-bordered" style="width:100%">
               <thead>
                    <tr>
                         <th>No</th>
                         <th>Foto</th>
                         <th>Nama</th>
                         <th>RT</th>
                         <th>RW</th>
                         <th>Option</th>
                    </tr>
               <tbody><?php
                   $no = 1;

                   $this->db->from('warga a');
                   $this->db->join('lapor_diri b', 'a.nik = b.nik', 'inner');
                   
                   $this->db->group_by('b.nik');
                   $this->db->order_by('b.id_lapor', 'desc');
                   $this->db->where('a.nik', $this->input->get('nik'));
                   $this->db->or_where('a.nama', $this->input->get('nama'));
                   $this->db->or_where('a.tgl_lahir', $this->input->get('tgl_lahir'));
                   $this->db->or_where('a.jk', $this->input->get('jk'));
                   $this->db->or_where('a.usia', $this->input->get('usia'));
                   $this->db->or_where('a.id_agama', $this->input->get('id_agama'));
                   $this->db->or_where('b.rt', $this->input->get('rt'));
                   $this->db->or_where('b.rw', $this->input->get('rw'));
                   $this->db->like('b.alamat', $this->input->get('alamat'));
                   $data = $this->db->get()->result();
                   //log_r($this->db->last_query());
                   foreach ($data as $row)
                   {
                       ?>
                    <tr>
                         <td width="80px"><?php echo $no ?></td>
                         <td>
                              <img src="image/no_image.png" style="width:100px">
                         </td>
                         <td><?php echo $row->nama ?></td>
                         <td><?php echo get_data('rt','id_rt',$row->rt,'rt') ?></td>
                         <td><?php echo get_data('rw','id_rw',$row->rw,'rw') ?></td>
                         <td>
                              <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row->id_warga ?>" class="btn btn-outline-info px-1">Lihat Profil</a>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal<?php echo $row->id_warga ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Profil</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                  <table class="table">
                                                       <tr>
                                                            <td>NIK</td>
                                                            <td>: <?php echo $row->nik ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Nama Lengkap</td>
                                                            <td>: <?php echo $row->nama ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Tempat Lahir</td>
                                                            <td>: <?php echo $row->tempat_lahir ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Tgl Lahir</td>
                                                            <td>: <?php echo $row->tgl_lahir ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Jenis Kelamin</td>
                                                            <td>: <?php echo $row->jk ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Usia</td>
                                                            <td>: <?php echo $row->usia ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Agama</td>
                                                            <td>: <?php echo get_data('agama','id_agama',$row->id_agama,'agama') ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Kewarganegaraan</td>
                                                            <td>: <?php echo $row->kewarganegaraan ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>No Telp</td>
                                                            <td>: <?php echo $row->no_telp ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Email</td>
                                                            <td>: <?php echo $row->email ?></td>
                                                       </tr>

                                                  </table>
                                             </div>
                                             <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                         </td>
                         
                    </tr>
                    <?php
                       $no++;
                   }
                   ?>
               </tbody>
          </table>
     </div>
<?php endif ?>