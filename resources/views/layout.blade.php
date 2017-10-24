<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('judul')|Abu Hurairah</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  <link rel="stylesheet" href="<%% asset('adminlte/bootstrap/css/bootstrap.min.css') %%>">
  <link rel="icon" href="<%% asset('img/logo.png') %%>">

  <!-- bootstrap datepicker -->
 <link rel="stylesheet" href="<%% asset('adminlte/plugins/datepicker/datepicker3.css') %%>">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="<%%asset('font/css/font-awesome.min.css')%%>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<%%asset('icon/css/ionicons.min.css')%%>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<%% asset('adminlte/dist/css/AdminLTE.min.css') %%>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<%% asset('adminlte/dist/css/skins/_all-skins.min.css') %%>">





  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>bu</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ABU</b>HURAIRAH</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->



      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">ABU HURAIRAH</li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<%%url('jurnal/create')%%>"><i class="fa fa-book"></i> <span>Transaksi</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Akun</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<%%url('/departemen/create')%%>"><i class="fa fa-circle-o"></i>Tambah Kelompok Akun</a></li>
            <li><a href="<%%url('/akun/create')%%>"><i class="fa fa-circle-o"></i>Tambah Akun</a></li>
            <li><a href="<%%url('find_a')%%>"><i class="fa fa-circle-o"></i>Cari Akun</a></li>

          </ul>
        </li>

        <li class="treeview">
                 <a href="#">
                   <i class="fa fa-pie-chart"></i>
                   <span>Tutup Buku</span>
                   <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                   </span>
                 </a>
                 <ul class="treeview-menu">
                   <li><a href="<%% url('neraca')  %%>"><i class="fa fa-circle-o"></i>Bulanan</a></li>
                   <li><a href="#"><i class="fa fa-circle-o"></i>Tahunan</a></li>

                 </ul>
               </li>
               <li><a href="<%%url('jurnal')%%>"><i class="fa fa-book"></i> <span>Jurnal</span></a></li>
               <li><a href="#"><i class="fa fa-book"></i> <span>Persetujuan</span></a></li>
               <li class="treeview">
                        <a href="#">
                          <i class="fa fa-pie-chart"></i>
                          <span>Laporan</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<%% url('show_neraca') %%>"><i class="fa fa-circle-o"></i>Neraca</a></li>
                          <li><a href="<%% url('laba_rugi')  %%>"><i class="fa fa-circle-o"></i>Laba Rugi</a></li>
                          <li><a href="<%% url('bukubesar') %%>"><i class="fa fa-circle-o"></i>Buku Besar</a></i>
                        </ul>
                      </li></li>
                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-dashboard"></i> <span>Pinjaman</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<%%url('ptk/create')%%>"><i class="fa fa-circle-o"></i>Tambah Peminjam</a></li>
                          <li><a href="<%%url('ptk_search')%%>"><i class="fa fa-circle-o"></i>Cari Peminjam</a></li>
                          <li><a href="<%%url('rekappotongan')%%>"><i class="fa fa-circle-o"></i>Rekap Potongan Perbulan</a></li>
                        </ul>
                      </li>

                      <li class="treeview">
                               <a href="#">
                                 <i class="fa fa-pie-chart"></i>
                                 <span><%%Auth::user()->name%%></span>
                                 <span class="pull-right-container">
                                   <i class="fa fa-angle-left pull-right"></i>
                                 </span>
                               </a>
                               <ul class="treeview-menu">
                                 <li><a href="<%%url('logout')%%>"><i class="fa fa-circle-o"></i>Keluar</a></li>
                                 <li><a href="#"><i class="fa fa-circle-o"></i>Ganti kata sandi</a></li>
                                 @if(Auth::user()->status=="admin")
                                  <li><a href="<%%url('register')%%>"><i class="fa fa-circle-o"></i>Tambah pengguna</a></li>
                                 @endif
                               </ul>
                             </li></li>


      </ul>




    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      @yield('konten')
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b></b>
    </div>
    <strong>ABU HURAIRAH MATARAM</strong>
  </footer>
<!-- jQuery 2.2.3 -->

<script src="<%% asset('adminlte/plugins/jQuery/jquery-2.2.3.min.js') %%>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<%% asset('adminlte/bootstrap/js/bootstrap.min.js') %%>"></script>
<!-- FastClick -->
<script src="<%% asset('adminlte/plugins/fastclick/fastclick.js') %%>"></script>
<!-- AdminLTE App -->
<script src="<%% asset('adminlte/dist/js/app.min.js') %%>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<%% asset('adminlte/dist/js/demo.js') %%>"></script>
@yield('script-kode-js')
</body>
</html>
