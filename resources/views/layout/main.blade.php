<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/template') }}/dist/css/adminlte.min.css">

    <!-- jQuery -->
    <script src="{{ asset('/template') }}/plugins/jquery/jquery.min.js"></script>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <script src="{{ asset('/template') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <script src="{{ asset('/template') }}/plugins/select2/js/select2.full.min.js"></script>

    {{-- LIBRARY UNTUK DATEPICKER --}}
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('/template') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('/template') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- InputMask -->
    <script src="{{ asset('/template') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('/template') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('/template') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('/template') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    {{-- END LIBRARY UNTUK DATEPICKER --}}

    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/dropzone/min/dropzone.min.css">
    <script src="{{ asset('/template') }}/plugins/dropzone/min/dropzone.min.js"></script>

    <!-- jquery-validation -->
    <script src="{{ asset('/template') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('/template') }}/plugins/jquery-validation/additional-methods.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
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
            <a href="" class="brand-link">
                <img src="https://biiscorp.com/wp-content/uploads/2022/03/biiscorp-jasa-pembuatan-software-dan-implementasi-erp-orange.png"
                    alt="Logo" class="brand-image" style="opacity: .8">
                <br>
                <span class="brand-text font-weight-light"></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('/template') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">ADMIN</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('jabatan') }}" class="nav-link {{ $menu == 'jabatan' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Daftar Jabatan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pegawai') }}" class="nav-link {{ $menu == 'pegawai' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Daftar Pegawai
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
                            <h1 class="m-0"> {{ $title }} </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                @yield('konten')
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Bootstrap 4 -->
    <script src="{{ asset('/template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/template') }}/dist/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
</body>

</html>
