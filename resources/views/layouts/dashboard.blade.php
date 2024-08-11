<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins') }}/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('../assets/plugins') }}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins') }}/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins') }}/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('../assets/dist') }}/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins') }}/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins') }}/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins') }}/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light mx-3">SPK - Weight Product</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('../assets/dist') }}/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('alternatif.index') }}"
                                    class="nav-link {{ request()->is('alternatif*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>
                                        Alternatif
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kriteria.index') }}"
                                    class="nav-link {{ request()->is('kriteria*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>
                                        Kriteria
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('penilaian.index') }}"
                                    class="nav-link {{ request()->is('penilaian*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-check-square"></i>
                                    <p>
                                        Penilaian
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('perhitungan.index') }}" class="nav-link {{ request()->is('perhitungan*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-calculator"></i>
                                    <p>
                                        Perhitungan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('perhitungan.hasilAkhir')}}" class="nav-link {{ request()->is('hasil-akhir*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-chart-line"></i>
                                    <p>
                                        Hasil Akhir
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index')}}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Data Users
                                    </p>
                                </a>
                            </li>
                          
                        @endif

                        @if (Auth::user()->role == 'pasien')
                            <li class="nav-item">
                                <a href="{{ route('pasien.penilaian.index') }}"
                                    class="nav-link {{ request()->is('pasien/]penilaian*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-check-square"></i>
                                    <p>
                                        Penilaian
                                    </p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                          <form action="{{ route('logout') }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-secondary btn-block">Logout</button>
                          </form>

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
                            <h1 class="m-0">@yield('judul')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('../assets/plugins') }}/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('../assets/plugins') }}/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('../assets/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('../assets/plugins') }}/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('../assets/plugins') }}/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{ asset('../assets/plugins') }}/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('../assets/plugins') }}/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('../assets/plugins') }}/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('../assets/plugins') }}/moment/moment.min.js"></script>
    <script src="{{ asset('../assets/plugins') }}/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('../assets/plugins') }}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{ asset('../assets/plugins') }}/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('../assets/plugins') }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('../assets/dist') }}/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('../assets/dist') }}/js/pages/dashboard.js"></script>
</body>

</html>
