<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> {{ucfirst($title)}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('template/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/plugins/sweetalert2/sweetalert2.css')}}">
  <link rel="stylesheet" href="{{asset('template/plugins/select2/css/select2.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('template/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('template/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @stack('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include('template.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('template.menu')

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">{{ucfirst($title)}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
                <li class="breadcrumb-item active">{{ucfirst($title)}}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      @if (session('message'))
      <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <!-- Main content -->
      <section class="content">
        @yield('content')

      </section>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    @include('template.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->

  <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('template/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <script src="{{asset('template/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{asset('template/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('template/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <script src="{{asset('template/plugins/select2/js/select2.full.min.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('template/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('template/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('template/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('template/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('template/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  {{-- <script src="{{asset('template/dist/js/pages/dashboard.js')}}"></script> --}}
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('template/dist/js/demo.js')}}"></script>

  <script src="{{ asset('js/swall.js') }}"></script>
  @stack('script')
</body>

</html>