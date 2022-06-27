<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--favicon-->
     <!-- loader-->
     <link href="assets/css/pace.min.css" rel="stylesheet" />
     <script src="assets/js/pace.min.js"></script>
     <!-- Bootstrap CSS -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
     <link href="assets/css/app.css" rel="stylesheet">
     <link href="assets/css/icons.css" rel="stylesheet">
     <title>Sistem Lapor Diri Warga Pulogebang</title>
</head>

<body>
     <!-- wrapper -->
     <div class="wrapper">
          <nav class="navbar navbar-expand-lg navbar-light bg-white rounded rounded-0 shadow-sm">
               <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                         <img src="https://pbs.twimg.com/profile_images/942451224837701632/fDtivusl_400x400.jpg"
                              width="140" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                         data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                         aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                         <h3>Sistem Lapor Diri Pulo Gebang</h3>
                    </div>
               </div>
          </nav>
          <div class="error-404 d-flex align-items-center justify-content-center">
               <div class="container">
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
               </div>
          </div>

     </div>
     <!-- end wrapper -->
     <!-- Bootstrap JS -->
     <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>