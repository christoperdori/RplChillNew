<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MailPlus FTI | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashmhs" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto mr-auto mt-auto mb-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <i class="far fa-clock"></i> 
        <b>
          <script>function display_ct7() {
          var x = new Date()
          var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
          hours = x.getHours( ) % 12;
          hours = hours ? hours : 12;
          hours=hours.toString().length==1? 0+hours.toString() : hours;

          var minutes=x.getMinutes().toString()
          minutes=minutes.length==1 ? 0+minutes : minutes;

          var seconds=x.getSeconds().toString()
          seconds=seconds.length==1 ? 0+seconds : seconds;

          var month=(x.getMonth() +1).toString();
          month=month.length==1 ? 0+month : month;

          time =hours + ":" +  minutes + ":" + " " + ampm;
          document.getElementById('ct7').innerHTML = time;
          display_c7();
          }
          function display_c7(){
          var refresh=1000; // Refresh rate in milli seconds
          mytime=setTimeout('display_ct7()',refresh)
          }
          display_c7()
          </script>
          <span id='ct7'></span>
        </b>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     

     
     <!-- Notifications Dropdown Menu -->
     <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 pesan masuk
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 8 pesan keluar
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Tampilkan semua notifikasi</a>
        </div>
      </li>
      <li class="nav-item dropdown">
     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             {{ Auth::user()->name }}
     </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
       <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
     </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
        </form>
        </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashmhs" class="brand-link">
      <img src="{{ asset('') }}assets/dist/img/fti.png" alt="MailPlus FTI Logi" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">MailPlus FTI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/profilemhs" class="d-block">Profile Mahasiswa</a>
        </div>
      </div>

    
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
               <li class="nav-header"><i>Main Menu</i></li>
            </li>
            <li class="nav-item">
              <a href="/dashmhs" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
               <li class="nav-header"><i>Workspace</i></li>
            </li>
            <li class="nav-item">
              <a href="/buatsrtmhs" class="nav-link">
                <i class="nav-icon fas fa-arrow-circle-right"></i>
                <p>
                  Buat Surat
                </p>
              </a>
            </li>

            <li class="nav-item menu-close">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-inbox"></i>
                <p>
                  Jenis Surat
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/smmhs" class="nav-link ml-3">
                    <i class="far fa-envelope nav-icon"></i>
                    <p>Surat Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/skmhs" class="nav-link ml-3">
                    <i class="fas fa-envelope-open-text nav-icon"></i>
                    <p>Surat Keluar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="/arsipmhs" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                  Arsip Surat
                </p>
              </a>
            </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Surat Masuk</h1>
          </div>
    
          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">No Agenda</th>
      <th scope="col">Nama file</th>
      <th scope="col">Tgl diterima</th>
      <th scope="col">Give Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>005/C/FTI/2021</td>
      <td>Surat pengajuan.pdf</td>
      <td>28/11/2021</td>
      <td>
      <a class="btn btn-primary" href="" role="button">Download</a>
      <a class="btn btn-danger" href="" role="button">Hapus</a>
      <a class="btn btn-success" href="" role="button">Arsip</a>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>006/C/FTI/2021</td>
      <td>Surat pengajuan.pdf</td>
      <td>29/11/2021</td>
      <td>
      <a class="btn btn-primary" href="" role="button">Download</a>
      <a class="btn btn-danger" href="" role="button">Hapus</a>
      <a class="btn btn-success" href="" role="button">Arsip</a>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>007/C/FTI/2021</td>
      <td>Surat pengajuan.pdf</td>
      <td>30/11/2021</td>
      <td>
      <a class="btn btn-primary" href="" role="button">Download</a>
      <a class="btn btn-danger" href="" role="button">Hapus</a>
      <a class="btn btn-success" href="" role="button">Arsip</a>
    </tr>
  </tbody>
</table>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('') }}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('') }}assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('') }}assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('') }}assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('') }}assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('') }}assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('') }}assets/plugins/moment/moment.min.js"></script>
<script src="{{ asset('') }}assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('') }}assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('') }}assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('') }}assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('') }}assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('') }}assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('') }}assets/dist/js/pages/dashboard.js"></script>
<script>
 
</script>
</body>
</html>
