<div class="sidebar-wrapper" data-simplebar="true">
     <div class="sidebar-header">
          <div>
               <!-- <img src="assets/logo.png" style="widht: 60px;height: 30px;" alt="logo icon"> -->
               <span>APPS</span>
          </div>
          <div>
               <!-- <h4 class="logo-text" style="color: #CC9C27">Zam Zam</h4> -->
          </div>
          <div class="toggle-icon ms-auto" style="color: #CC9C27"><i class='bx bx-arrow-to-left'></i>
          </div>
     </div>
     <!--navigation-->
     <ul class="metismenu" id="menu">
          <li class="menu-label">Main Menu</li>
          <li>
               <a href="app">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
               </a>
          </li>
		
		<?php if($this->session->userdata('level') == 'admin'): ?>
          <li>
               <a href="agama">
                    <div class="parent-icon"><i class='bx bx-file'></i>
                    </div>
                    <div class="menu-title">Data Agama</div>
               </a>
          </li>
          <li>
               <a href="rt">
                    <div class="parent-icon"><i class='bx bx-file'></i>
                    </div>
                    <div class="menu-title">Data RT</div>
               </a>
          </li>
          <li>
               <a href="rw">
                    <div class="parent-icon"><i class='bx bx-file'></i>
                    </div>
                    <div class="menu-title">Data RW</div>
               </a>
          </li>
          <li>
               <a href="warga">
                    <div class="parent-icon"><i class='bx bx-file'></i>
                    </div>
                    <div class="menu-title">Data Warga</div>
               </a>
          </li>
          <li>
               <a href="lapor_diri">
                    <div class="parent-icon"><i class='bx bx-file'></i>
                    </div>
                    <div class="menu-title">Lapor Diri</div>
               </a>
          </li>
		<li>
               <a href="app_user">
                    <div class="parent-icon"><i class='bx bx-user-circle'></i>
                    </div>
                    <div class="menu-title">Management User</div>
               </a>
          </li>
          <li>
               <a href="pesan">
                    <div class="parent-icon"><i class='bx bx-chat'></i>
                    </div>
                    <div class="menu-title">Pesan</div>
               </a>
          </li>
          <?php endif ?>
     </ul>
     <!--end navigation-->
</div>