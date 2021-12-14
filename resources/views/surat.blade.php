
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buat Surat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            <h1 class="m-0">Buat Surat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Buat Surat</li>
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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="simpanSurat" method="post">
              @csrf
                <div class="card-body" id="surat">
                  <div class="form-group">
                    <label>Jenis Surat</label>
                    <select name="jenis" id="jenis" class="form-control">
                        @if(Auth::user()->role=='admin')
                        <option value="1" <?php if("1"==old('jenis')){echo 'selected';} ?>>Surat Personalia</option>
                        <option value="2" <?php if("2"==old('jenis')){echo 'selected';} ?>>Surat Keterangan</option>
                        <option value="3" <?php if("3"==old('jenis')){echo 'selected';} ?>>Surat Undangan</option>
                        <option value="4" <?php if("4"==old('jenis')){echo 'selected';} ?>>Surat Tugas</option>
                        <option value="5" <?php if("5"==old('jenis')){echo 'selected';} ?>>Surat Berita Acara</option>
                        @endif
                        @if(Auth::user()->role!='admin')
                        <option value="2" <?php if("2"==old('jenis')){echo 'selected';} ?>>Surat Keterangan</option>
                        <option value="4" <?php if("4"==old('jenis')){echo 'selected';} ?>>Surat Tugas</option>
                        @endif
                    </select>
                  </div>
                  @if(Auth::user()->role=='admin')
                  <div class="form-group">
                    <label>Pemohon</label>
                    <select name="user" id="user" class="form-control">
                        @foreach($user as $pengguna)
                        <option value="{{ $pengguna->id }}" <?php if($pengguna->id==old('user')){echo 'selected';} ?>>{{ $pengguna->user_id }} - {{ $pengguna->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  @else
                  <input type="hidden" name="user" value="{{Auth::id()}}">
                  @endif
                  <div class="form-group">
                    <label>Perihal</label>
                    <input type="text" class="form-control" name="perihal" placeholder="Enter perihal" required>
                  </div>
                  @if(Auth::user()->role=='admin')
                  <div class="form-group hapus">
                    <label>Kepada</label>
                    <input type="text" class="form-control" name="kepada" placeholder="Enter kepada" required>
                  </div>
                  <div class="form-group hapus">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  @else
                  <div class="form-group hapus">
                    <label>Kepada</label>
                    <input type="text" class="form-control" name="kepada" placeholder="Enter kepada" required>
                  </div>
                  <div class="form-group hapus">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  <div class="form-group hapus">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" required>
                  </div>
                  <div class="form-group hapus">
                    <label>Waktu</label>
                    <input type="time" class="form-control" name="waktu" required>
                  </div>
                  <div class="form-group hapus">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" placeholder="Enter lokasi" required>
                  </div>
                  @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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

<!-- REQUIRED SCRIPTS -->
    <script>
        $(document).ready(function(){
            $('#jenis').on('change', function () {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                if(valueSelected == 1){
                $('.hapus').remove();
                $("#surat").append('<div class="form-group hapus"><label>Kepada</label><input type="text" class="form-control" name="kepada" placeholder="Enter kepada" required></div><div class="form-group hapus"><label>Keterangan</label><textarea class="form-control" rows="3" name="keterangan" placeholder="Enter ..."></textarea></div>');
                }if(valueSelected == 2){
                $('.hapus').remove();
                $("#surat").append('<div class="form-group hapus"><label>Kepada</label><input type="text" class="form-control" name="kepada" placeholder="Enter kepada" required></div><div class="form-group hapus"><label>Keterangan</label><textarea class="form-control" name="keterangan" rows="3" placeholder="Enter ..."></textarea></div><div class="form-group hapus"><label>Tanggal</label><input type="date" class="form-control" name="tanggal" required></div><div class="form-group hapus"><label>Waktu</label><input type="time" class="form-control" name="waktu" required></div><div class="form-group hapus"><label>Lokasi</label><input type="text" class="form-control" name="lokasi" placeholder="Enter lokasi kegiatan" required></div>');
                }if (valueSelected == 3) {
                $('.hapus').remove();
                $("#surat").append('<div class="form-group hapus"><label>Kepada</label><input type="text" class="form-control" name="kepada" placeholder="Enter kepada" required></div><div class="form-group hapus"><label>Keterangan</label><textarea class="form-control" name="keterangan" rows="3" placeholder="Enter ..."></textarea></div><div class="form-group hapus"><label>Tanggal</label><input type="date" class="form-control" name="tanggal" required></div><div class="form-group hapus"><label>Waktu</label><input type="time" class="form-control" name="waktu" required></div><div class="form-group hapus"><label>Lokasi</label><input type="text" class="form-control" name="lokasi" placeholder="Enter lokasi kegiatan" required></div>');
                }if (valueSelected == 4) {
                $('.hapus').remove();
                $("#surat").append('<div class="form-group hapus"><table id="table"><tbody><tr><td><label>ID</label></td><td width="25px"></td><td width="515px"><label>Nama</label></td><td width="25px"></td><td>&nbsp;</td></tr><tr id="baris_1"><td width="300px"><input type="text" class="form-control" name="userid" placeholder="Enter id" required></td><td width="25px"></td><td width="600px"><input type="text" class="form-control" name="nama" placeholder="Enter nama" required></td></tr></tbody></table></div><div class="form-group hapus"><label>Penyelenggara</label><input type="text" class="form-control" name="penyelenggara" placeholder="Enter penyelenggara" required></div><div class="form-group hapus"><label>Tanggal</label><input type="date" class="form-control" name="tanggal" required></div><div class="form-group hapus"><label>Lokasi</label><input type="text" class="form-control" name="lokasi" placeholder="Enter lokasi kegiatan" required></div>');
                }if (valueSelected == 5) {
                $('.hapus').remove();
                $("#surat").append('<div class="form-group hapus"><label>Pembicara</label><input type="text" class="form-control" name="pembicara" placeholder="Enter pembicara" required></div><div class="form-group hapus"><label>Target Peserta</label><input type="text" class="form-control" name="target" placeholder="Enter target peserta" required></div><div class="form-group hapus"><label>Tanggal</label><input type="date" class="form-control" name="tanggal" required></div><div class="form-group hapus"><label>Waktu</label><input type="time" class="form-control" name="waktu" required></div><div class="form-group hapus"><label>Lokasi</label><input type="text" class="form-control" name="lokasi" placeholder="Enter lokasi" required></div>');
                }
            });
        });
    </script>
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
