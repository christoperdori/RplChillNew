
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Surat Keluar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" role="button" onclick="return confirm('Apakah anda yakin ingin logout?');">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      <span class="brand-text font-weight-light">MailPlus FTI-RPLCHILL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a data-toggle="modal" data-target="#modal-secondary" href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="home" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="buatSurat" class="nav-link">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Buat Surat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="suratMasuk" class="nav-link">
                  <i class="fas fa-envelope-open nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="suratKeluar" class="nav-link">
                  <i class="fas fa-envelope nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="arsip" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Arsip Surat
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
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
          @if(Auth::user()->role=='admin')
            <h1 class="m-0">Surat Keluar</h1>
            @else
            <h1 class="m-0">Surat Masuk</h1>
            @endif
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              @if(Auth::user()->role=='admin')
              <li class="breadcrumb-item active">Surat Keluar</li>
              @else
              <li class="breadcrumb-item active">Surat Masuk</li>
              @endif
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Surat</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
              @if(Auth::user()->role!='admin')
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Surat</th>
                      <th>Kepentingan Surat</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @php
                    $no = 1;
                  @endphp
                  <tbody>
                  @foreach($surat as $srt)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $srt->jenis }}</td>
                      <td>{{ $srt->perihal }}</td>
                      <td><span class="tag tag-success">{{ $srt->status }}</span>@if($srt->status=='Denied')<br><p class="text-danger">{{$srt->pesan}}</p>@endif</td>
                      <td>
                        @if($srt->status=='Denied')
                        <a href="ubah{{$srt->id}}" type="button" class="btn btn-success">Edit</a>
                        <a href="hapus{{$srt->id}}" type="button" class="btn btn-danger">Hapus</a>
                        @else
                        <a href="#" type="button" class="btn btn-success disabled">Edit</a>
                        <a href="#" type="button" class="btn btn-danger disabled">Hapus</a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Surat</th>
                      <th>Jenis Surat</th>
                      <th>Kepentingan Surat</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @php
                    $no = 1;
                  @endphp
                  <tbody>
                  @foreach($surat as $srt)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $srt->no_surat }}</td>
                      <td>{{ $srt->suratkeluar->jenis }}</td>
                      <td>{{ $srt->suratkeluar->perihal }}</td>
                      @if($srt->surat==null)
                      <td><span class="tag tag-success">Pending</span></td>
                      @else
                      <td><span class="tag tag-success">Sent</span></td>
                      @endif
                      <td>
                      @if($srt->surat==null)
                      <a data-toggle="modal" data-target="#modal-secondary1" type="button" class="btn btn-info">Upload</a>
                      @else
                      <a href="/surat/{{$srt->surat}}" download="{{$srt->surat}}" type="button" class="btn btn-info">Download</a>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="">Christoper Dori</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

      <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td> : </td>
                        <td>{{ Auth::user()->user_id }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td> : </td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td> : </td>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <th>No Telpon</th>
                        <td> : </td>
                        <td>{{ Auth::user()->no_telpon }}</td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      @if(Auth::user()->role=='admin')
      <div class="modal fade" id="modal-secondary1">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Upload Berkas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="kirim{{$srt->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('PUT')
                <div class="modal-body">
                    <input type="file" name="surat" required>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-outline-light">Save</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      @endif

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
