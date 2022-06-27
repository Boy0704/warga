<?php 
$id_user = $this->session->userdata('id_user');
$this->db->where('id_user', $id_user);
$member = $this->db->get('app_user')->row();

 ?>
<div class="card">
     <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
               <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Foto Profil *</label>
                    <div class="col-sm-9">
                         <div>
                              <?php if ($member->foto != ''): ?>
                                   <b>*) Foto Sebelumnya : </b><br>
                                   <img src="image/user/<?php echo $member->foto ?>" style="width: 100px;">
                              <?php endif ?>
                         </div>
                         <input type="hidden" name="foto_old" value="<?php echo $member->foto ?>">
                         <input type="file" class="form-control" name="foto" required />
                    </div>
               </div>
               <div class="row mb-3">
                    <label for="username" class="col-sm-3
                    col-form-label">Username *</label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" name="username" id="username"
                              placeholder="Username" value="<?php echo $member->username; ?>" readonly/>
                    </div>
               </div>
               <div class="row mb-3">
                    <label for="password" class="col-sm-3
                    col-form-label">Password </label>
                    <div class="col-sm-9">
                         <div class="input-group" id="show_hide_password">
                              <input type="hidden" name="password_old" value="<?php echo $member->password ?>">
                              <input type="password" class="form-control" name="password" id="password" value=""
                              placeholder="Kosongkan Password jika tidak diubah" />
                              <a href="javascript:;" onclick="showPassword()" 
                              class="input-group-text bg-transparent"><i
                                   class='bx bx-hide'></i></a>
                         </div>
                    </div>
               </div>
               
               <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Update</button>
          </form>
     </div>
</div>

<script>

     function showPassword(){
          event.preventDefault();
          if ($('#show_hide_password input').attr("type") == "text") {
               $('#show_hide_password input').attr('type', 'password');
               $('#show_hide_password i').addClass("bx-hide");
               $('#show_hide_password i').removeClass("bx-show");
          } else if ($('#show_hide_password input').attr("type") == "password") {
               $('#show_hide_password input').attr('type', 'text');
               $('#show_hide_password i').removeClass("bx-hide");
               $('#show_hide_password i').addClass("bx-show");
          }
     }
</script>