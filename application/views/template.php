
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= base_url()?>assets/logo/logo.png" type="image/x-icon">
  <title><?= $title?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/dist/css/adminlte.min.css">

  <!-- jQuery -->
  <script src="<?= base_url()?>assets/admin/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini <?= $this->uri->segment(1) == 'transaction' ? 'sidebar-collapse' : null?>">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="<?= base_url()?>assets/logo/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">App Penjualan</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <a href="<?= base_url('profile_users')?>">
      <div class="user-panel mt-3 py-2 mb-3 d-flex <?= $this->uri->segment(1) == 'profile_users' ? 'bg-primary rounded' : null ?>">
          <div class="image">
            <img src="<?= base_url('assets/upload/users/'.$this->checkusers->users_login()->image)?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <span class="d-block text-white"><?= $this->checkusers->users_login()->nama;?></span>
          </div>
        </div>
      </a>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('dashboard')?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : null ?> <?= $this->uri->segment(1) == '' ? 'active' : null ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($this->checkusers->users_login()->level != 'user' AND $this->checkusers->users_login()->level != 'gudang'):?>
          <li class="nav-item">
            <a href="<?= base_url('dataPenjualan')?>" class="nav-link <?= $this->uri->segment(1) == 'dataPenjualan' ? 'active' : null ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Laporan Data Penjualan
              </p>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->checkusers->users_login()->level != 'user' AND $this->checkusers->users_login()->level != 'gudang'):?>
          <li class="nav-item">
            <a href="<?= base_url('informasi_order')?>" class="nav-link <?= $this->uri->segment(1) == 'informasi_order' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-window-maximize"></i>
              <p>
                Informasi Order
              </p>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->checkusers->users_login()->level != 'user' AND $this->checkusers->users_login()->level != 'gudang'):?>
          <li class="nav-item">
            <a href="<?= base_url('informasi_request')?>" class="nav-link <?= $this->uri->segment(1) == 'informasi_request' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-keyboard"></i>
              <p>
                Informasi Request
              </p>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->checkusers->users_login()->level != 'user' AND $this->checkusers->users_login()->level != 'admin'):?>
          <li class="nav-item">
            <a href="<?= base_url('kategori_barang')?>" class="nav-link <?= $this->uri->segment(1) == 'kategori_barang' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-cube"></i>
              <p>
                Kategori Barang
              </p>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->checkusers->users_login()->level != 'user' AND $this->checkusers->users_login()->level != 'admin'):?>
          <li class="nav-item">
            <a href="<?= base_url('barang')?>" class="nav-link <?= $this->uri->segment(1) == 'barang' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-cubes"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->checkusers->users_login()->level != 'user' AND $this->checkusers->users_login()->level != 'admin'):?>
          <li class="nav-item">
            <a href="<?= base_url('stock_in')?>" class="nav-link <?= $this->uri->segment(1) == 'stock_in' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-pen"></i>
              <p>
                Stock In
              </p>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->checkusers->users_login()->level != 'user' AND $this->checkusers->users_login()->level != 'admin'):?>
          <li class="nav-item">
            <a href="<?= base_url('stock_out')?>" class="nav-link <?= $this->uri->segment(1) == 'stock_out' ? 'active' : null ?>">
              <i class="nav-icon fas fa-solid fa-pen-nib"></i>
              <p>
                Stock Out
              </p>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->checkusers->users_login()->level != 'gudang'):?>
          <li class="nav-item">
            <a href="<?= base_url('transaction')?>" class="nav-link <?= $this->uri->segment(1) == 'transaction' ? 'active' : null ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaction
              </p>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->checkusers->users_login()->level != 'gudang'):?>
          <li class="nav-item">
            <a href="<?= base_url('invoice')?>" class="nav-link <?= $this->uri->segment(1) == 'invoice' ? 'active' : null ?>">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Invoice
              </p>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->checkusers->users_login()->level != 'user' AND $this->checkusers->users_login()->level != 'admin'):?>
          <li class="nav-item <?= $this->uri->segment(1) == 'pengiriman_order' ? 'menu-open' : null ?> <?= $this->uri->segment(1) == 'pengiriman_request' ? 'menu-open' : null ?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'pengiriman_order' ? 'active' : null ?> <?= $this->uri->segment(1) == 'pengiriman_request' ? 'active' : null ?>">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Pengiriman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('pengiriman_order')?>" class="nav-link <?= $this->uri->segment(1) == 'pengiriman_order' ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengiriman Produk Order</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('pengiriman_request')?>" class="nav-link <?= $this->uri->segment(1) == 'pengiriman_request' ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengiriman Produk Request</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif;?>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <?php if($this->checkusers->users_login()->level != 'user' AND $this->checkusers->users_login()->level != 'gudang'):?>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="<?= base_url('users')?>" class="nav-link <?= $this->uri->segment(1) == 'users' ? 'active' : null ?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <?php endif;?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <?= $contents?>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2023 <a href="https://taufikhidytt.github.io/" target="blank">Taufik Hidayat</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
