<?php

include "koneksi/koneksi.php";
include "proses/proses.php";

$db = new database;
$con = $db->koneksi();
$proses = new proses;

session_start();
if (!isset($_SESSION['login'])) {
  header('location:login.php');
}


?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Siswa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

   <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">

  <link rel="stylesheet" href="dist/css/skins/skin-blue-light.min.css">
  <!-- Data Table -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src="plugins/jQuery/upload.js"></script>
  <script src="plugins/jQuery/simplemodal.js"></script>
  <script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/jQueryUI/jquery-ui.min.js"></script>

</head>
<body class="hold-transition skin-blue-light fixed">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI </b> | Siswa</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- /.messages-menu -->

          <!-- Notifications Menu -->

          <!-- Tasks Menu -->

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/avatar04.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['nama'];?>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?f=admin&&page=addadmin&&edit=<?php echo $_SESSION['id']; ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="proses/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama'];?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->

      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">DashBoard</li>
        <!-- Optionally, you can add icons to the links -->
        <?php 
          if ($_SESSION['level'] == 0) {
        ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-laptop"></i> <span>Master Data</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?f=dataguru&&page=dataguru"><i class="fa fa-circle-o"></i> Data Guru</a></li>
            <li><a href="?f=datasiswa&&page=datasiswa"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
            <li><a href="?f=datakelas&&page=datakelas"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
            <li><a href="?f=datamatapelajaran&&page=datamatapelajaran"><i class="fa fa-circle-o"></i> Data Mata Pelajaran</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-file-text"></i><span>Pengaduan</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?f=pengaduan&&page=pengaduan"><i class="fa fa-circle-o"></i> List Pengaduan</a></li>
            </ul>
        </li>
        <?php
            }
        ?>
        <li class="treeview">
          <a href="#"><i class="fa  fa-edit"></i> <span>Modul Pembelajaran</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?f=modul&&page=topicmodul"><i class="fa fa-circle-o"></i> Topic Modul</a></li>
            <li><a href="?f=kuis&&page=topickuis"><i class="fa fa-circle-o"></i> Topic Kuis</a></li>
          </ul>
        </li>
        <?php
          if ($_SESSION['level'] == 0) {
        ?>
        <li class="treeview">
          <a href="#"> <i class="fa fa-user"></i> <span>User Administator</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?f=admin&&page=dataadmin"><i class="fa fa-circle-o"></i> Data Admin</a></li>
          </ul>
        </li>
        <?php
          }
        ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <?php
  if (isset($_GET['page'])) {
    $folder = $_GET['f'];
    include "pages/".$folder."/".$_GET['page'].".php";
  }else{
    include "pages/home.php";
  }
  ?>
  

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->


<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- page script -->

<!-- Bootstrap 3.3.6 -->
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->

<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>



<script>

  $(function () {
    $(".select2").select2();
    $( "#datepicker" ).datepicker({ format: 'yyyy-mm-dd' });
    $( "#datepicker2" ).datepicker({ format: 'yyyy-mm-dd' });
    $('#data').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

  });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
