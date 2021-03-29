<?php
  $current_controller = $this->uri->segment(1);
  $dashboard_active = ($current_controller == "dashboard") ? "active" : "";
  $employee_active = ($current_controller == "employee") ? "active" : "";
  $demo_active = ($current_controller == "demo") ? "active" : "";
  $user_active = ($current_controller == "user") ? "active" : "";
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url("assets/layout") ?>/dist/img/user.png" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Demo</p>
        <a href="#"><i class="fa fa-building"></i> PMI Kabupaten Gianyar</a>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <!-- <li class="<?= $demo_active  ?>"><a href="<?= site_url("demo") ?>"><i class="fa fa-file"></i> <span>Demo</span></a></li>   -->
      <li class="<?= $dashboard_active  ?>"><a href="<?= site_url("generate") ?>"><i class="fa fa-file"></i> <span>Generate</span></a></li>  
      <!-- <li class="<?= $employee_active  ?>"><a href="<?= site_url("employee") ?>"><i class="fa fa-file"></i> <span>Employee</span></a></li>   -->
      <li class="<?= $employee_active  ?>"><a href="<?= site_url("donor") ?>"><i class="fa fa-file"></i> <span>Donor</span></a></li> 
      <li class="<?= $employee_active  ?>"><a href="<?= site_url("dokter") ?>"><i class="fa fa-file"></i> <span>Dokter</span></a></li> 
      <li class="<?= $employee_active  ?>"><a href="<?= site_url("petugashb") ?>"><i class="fa fa-file"></i> <span>Petugas Hemoglobin</span></a></li> 
      <li class="<?= $employee_active  ?>"><a href="<?= site_url("petugasaftar") ?>"><i class="fa fa-file"></i> <span>Petugas Aftar</span></a></li> 
      <li class="<?= $employee_active  ?>"><a href="<?= site_url("goldar") ?>"><i class="fa fa-file"></i> <span>Golongan Darah</span></a></li> 
      <li class="<?= $employee_active  ?>"><a href="<?= site_url("print") ?>"><i class="fa fa-file"></i> <span>Print</span></a></li> 
      <li class="<?= $user_active  ?>"><a href="<?= site_url("user") ?>"><i class="fa fa-file"></i> <span>User</span></a></li> 
      <li><a href="<?= site_url("login/logout") ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li> 
    </ul>
  </section>
</aside>