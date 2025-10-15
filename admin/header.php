<?php
// Cek apakah session sudah aktif, jika belum baru start
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../koneksi.php';
include '../tenant_guard.php';

// Cek login
if(!isset($_SESSION['status']) || $_SESSION['status'] != "administrator_logedin"){
    header("location:../index.php?alert=belum_login");
    exit();
}

// Ambil data profil user sekali saja
$id_user = $_SESSION['id'];
$profil = mysqli_query($koneksi,"SELECT * FROM user WHERE user_id='$id_user'");
$profil = mysqli_fetch_assoc($profil);
$foto_user = ($profil['user_foto'] == "") ? "../gambar/sistem/user.png" : "../gambar/user/".$profil['user_foto'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator - Sistem Informasi Keuangan</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    #table-datatable {
      width: 100% !important;
    }
    #table-datatable .sorting_disabled{
      border: 1px solid #f4f4f4;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <!-- HEADER -->
    <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b><i class="fa fa-money"></i></b></span>
        <span class="logo-lg"><b>Keuangan</b>App</span>
      </a>
      
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo $foto_user; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['level']; ?></span>
              </a>
            </li>
            
            <!-- Logout Button -->
            <li>
              <a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </li>
          </ul>
        </div>

        <!-- Tenant Info Panel -->
        <div style="padding:8px 15px;color:#fff;float:right;margin-right:55px;">
          <?php if(isset($_SESSION['impersonating'])){ ?>
            <span class="label label-warning">Impersonating</span>
          <?php } ?>
          <span class="label label-info">Tenant: <?php echo isset($_SESSION['tenant_id']) ? intval($_SESSION['tenant_id']) : 1; ?></span>
          
          <?php if($_SESSION['level'] == 'administrator'){ ?>
            <a href="tenants.php" class="btn btn-xs btn-success">Kelola Tenant</a>
            <?php if(isset($_SESSION['impersonating'])){ ?>
              <a href="impersonate_stop.php" class="btn btn-xs btn-danger">Stop Impersonate</a>
            <?php } ?>
          <?php } ?>
        </div>
      </nav>
    </header>

    <!-- SIDEBAR -->
    <aside class="main-sidebar">
      <section class="sidebar">
        <!-- User Panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo $foto_user; ?>" class="img-circle" style="max-height:45px" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li>
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
            </a>
          </li>

          <li>
            <a href="kategori.php">
              <i class="fa fa-folder"></i> <span>DATA KATEGORI</span>
            </a>
          </li>

          <li>
            <a href="transaksi.php">
              <i class="fa fa-folder"></i> <span>DATA TRANSAKSI</span>
            </a>
          </li>

          <!-- Hutang Piutang Menu -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-hand-paper-o"></i>
              <span>HUTANG PIUTANG</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="hutang.php"><i class="fa fa-circle-o"></i> Catatan Hutang</a></li>
              <li><a href="piutang.php"><i class="fa fa-circle-o"></i> Catatan Piutang</a></li>
            </ul>
          </li>

          <li>
            <a href="bank.php">
              <i class="fa fa-building"></i> <span>REKENING BANK</span>
            </a>
          </li>

          <!-- Data Pengguna Menu -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>DATA PENGGUNA</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="user.php"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>
              <li><a href="user_tambah.php"><i class="fa fa-circle-o"></i> Tambah Pengguna</a></li>
            </ul>
          </li>

          <li>
            <a href="laporan.php">
              <i class="fa fa-file"></i> <span>LAPORAN</span>
            </a>
          </li>

          <li>
            <a href="gantipassword.php">
              <i class="fa fa-lock"></i> <span>GANTI PASSWORD</span>
            </a>
          </li>

          <!-- MODUL BARU SECTION -->
          <li class="header">MODUL BARU</li>
          
          <li><a href="suppliers.php"><i class="fa fa-truck"></i> <span>Supplier</span></a></li>
          <li><a href="materials.php"><i class="fa fa-cubes"></i> <span>Bahan Baku</span></a></li>
          <li><a href="purchases.php"><i class="fa fa-shopping-cart"></i> <span>Pembelian Harian</span></a></li>
          <li><a href="expenses.php"><i class="fa fa-credit-card"></i> <span>Operasional</span></a></li>
          <li><a href="rents.php"><i class="fa fa-building"></i> <span>Sewa</span></a></li>
          <li><a href="employees.php"><i class="fa fa-users"></i> <span>Karyawan</span></a></li>
          <li><a href="officers.php"><i class="fa fa-id-badge"></i> <span>Pengurus Yayasan</span></a></li>
          <li><a href="attendances.php"><i class="fa fa-calendar-check-o"></i> <span>Absensi</span></a></li>
          <li><a href="payrolls.php"><i class="fa fa-money"></i> <span>Gaji Harian</span></a></li>

          <!-- SISTEM -->
          <li class="header">SISTEM</li>

          <li>
            <a href="logout.php">
              <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
            </a>
          </li>
          
        </ul>
      </section>
    </aside>
    <!-- END SIDEBAR -->

    <!-- =====================================
         CONTENT WRAPPER 
         TARUH KONTEN HALAMAN DI SINI
    ===================================== -->
    <div class="content-wrapper">
      <!-- Konten dari halaman asli Anda dimulai dari sini -->