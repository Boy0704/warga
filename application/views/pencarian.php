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
                                                       <label for="tgl_lahir" class="col-sm-3 col-form-label">Tgl Lapor</label>
                                                       <div class="col-sm-9">
                                                            <input type="date" class="form-control" name="tgl_lapor" />
                                                       </div>
                                                  </div>
                                                  <div class="row mb-3">
                                                       <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                       <div class="col-sm-9">
                                                            <select class="form-control" name="jk">
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
                                                            	<?php foreach ($this->db->get('rt')->result() as $rt): ?>
                                                            		<option value="<?php echo $rt->id_rt ?>"><?php echo $rt->rt ?></option>
                                                            	<?php endforeach ?>
                                                            </select>
                                                       </div>
                                                       <div class="col-sm-3">
                                                            <select name="rw" class="form-control">
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