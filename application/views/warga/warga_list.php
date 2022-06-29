
        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col">
                        <?php if ($this->session->userdata('level') == 'admin'): ?>
                        <a href="warga/create" class="btn btn-primary"><i class="bx bx-plus mr-1"></i>Tambah</a>
                        <?php endif ?>
                        <!-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal"><i class="bx bx-upload mr-1"></i>Import Data</button> -->
                        <!-- Modal -->
                        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModal" aria-hidden="true">
                            <div class="modal-dialog">
                            <form action="warga/import_excel" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="importModal">Import Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-9">
                                                <a href="files/excel/import_warga.xlsx" class="badge bg-success">Download Template</a>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label">File</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="file_excel" id="formFile">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
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
		<th>Nama</th>
		<th>Tempat Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Usia</th>
		<th>Agama</th>
		<th>Kewarganegaraan</th>
		<th>No Telp</th>
		<th>Email</th>
		<th>Action</th>
                            </tr>
                        </thead>
                        <tbody><?php
                        $no = 1;
                        if ($this->session->userdata('level') == 'user') {
                            $username = $this->session->userdata('username');
                            $this->db->where('nik', $username);
                            $warga_data = $this->db->get('warga')->result();
                        }
                        foreach ($warga_data as $warga)
                        {
                            ?>
                            <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $warga->nik ?></td>
			<td><?php echo $warga->nama ?></td>
			<td><?php echo $warga->tempat_lahir.', '.$warga->tgl_lahir ?></td>
			<td><?php echo $warga->jk ?></td>
			<td><?php echo $warga->usia ?></td>
			<td><?php echo get_data('agama','id_agama',$warga->id_agama,'agama') ?></td>
			<td><?php echo $warga->kewarganegaraan ?></td>
			<td><?php echo $warga->no_telp ?></td>
			<td><?php echo $warga->email ?></td>
			<td style="text-align:center" width="200px">

                        <a href="warga/update/<?php echo $warga->id_warga ?>" title="Update Data" class="btn btn-sm btn-primary"><i class="bx bx-edit me-0"></i>
                        </a>
                        <?php if ($this->session->userdata('level') == 'admin'): ?>
                        <a href="warga/delete/<?php echo $warga->id_warga ?>" title="Hapus Data" onclick="javasciprt: return confirm('Yakin akan hapus data ini ?')" class="btn btn-sm btn-danger"><i class="bx bx-trash-alt me-0"></i>
                        </a>
                        <?php endif ?>
            
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
        
    