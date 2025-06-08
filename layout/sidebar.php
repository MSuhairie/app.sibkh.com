<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
    <div class="sidebar-brand-icon">
      <img src="assets/template-admin/img/logo/logo2.png">
    </div>
    <div class="sidebar-brand-text mx-3">SIBKH</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="./">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Menu
  </div>
  <li class="nav-item">
    <a class="nav-link" href="?page=kegiatan/tambah">
      <i class="fas fa-fw fa-plus"></i>
      <span>Input Kegiatan Harian</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?page=kegiatan/index">
      <i class="fas fa-fw fa-book"></i>
      <span>Data Kegiatan Harian</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?page=absen/index">
      <i class="fas fa-fw fa-book"></i>
      <span>Data Absen</span>
    </a>
  </li>
  <?php
    if ($_SESSION['id_user'] == 1) {
  ?>
  <li class="nav-item">
    <a class="nav-link" href="?page=user/index">
      <i class="fas fa-fw fa-user"></i>
      <span>User</span>
    </a>
  </li>
  <?php } ?>
</ul>
<!-- Sidebar -->