<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mypcot</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="shortcut icon" type="image/png" href="{{asset('images/logo.png')}}" />
  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}"> --}}

    <link rel='stylesheet' id='fontawesome-css' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <!-- style css -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- owl carousel css -->
  <link rel="stylesheet" href="{{asset('css/owl.carousel-2/assets/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.carousel-2/assets/owl.theme.default.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('images/logo.png')}}" alt="Logo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> --}}

      <li class="dropdown user user-menu mt-2 mr-2">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {{--   <img src="{{base_url('dist/img/logo1.jpg') }}" class="user-image" alt="User Image"> --}}
          <span class="hidden-xs">{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu mt-3" style="background-color: #343A40;">
          <!-- User image -->
          <li class="user-header">
            {{-- <img src="{{base_url('dist/img/logo1.jpg') }}" class="img-circle" alt="User Image"> --}}
            <h4 style="padding-top: 20px;color: #fff;padding-bottom: 20px;font-weight: 800;font-size: 20px;">

              @if(auth()->user()->role == 0)
                Super Admin
              @elseif(auth()->user()->role == 1)
                User
              @endif
            </h4>
          </li>
          <!-- Menu Body -->

          <!-- Menu Footer-->
          <li class="user-footer d-flex justify-content-between px-3 pb-2">
            @if(auth()->user()->role == 1)
                <a href="{{ route('user.profile') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> Profile
                </a>
            @endif
            <a href="{{ route('logout') }}" class="btn btn-sm btn-danger"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>


        </ul>
      </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
    </ul>
  </nav>
  <!-- /.navbar -->

    @if(session()->has('error'))
    <div class="row mt-1">
      <div class="col-md-7">
      </div>
      <div class="col-md-5">
        <div id="error-alert" class="alert alert-dismissible bg-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('error') }}
        </div>
      </div>
    </div>
    @endif
    @if(session()->has('success'))
      <div class="row mt-1">
        <div class="col-md-7">
        </div>
        <div class="col-md-5">
          <div id="success-alert" class="alert alert-dismissible bg-success">
              <button type="button" class="close close-btn" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true" >&times;</span>
              </button>
              {{ session('success') }}
          </div>
        </div>
      </div>
    @endif

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('images/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Mypcot</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-th-large" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- super admin --}}
          @if(auth()->user()->role == 0)
            <li class="nav-item">
              <a href="{{route('admin.user')}}" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Users
                </p>
              </a>
            </li>

          {{-- user --}}
          @elseif(auth()->user()->role == 1)
            {{-- <li class="nav-item">
              <a href="{{route('user.profile')}}" class="nav-link {{ request()->is('factory/profile*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                <p>
                  Profile
                </p>
              </a>
            </li> --}}

            {{-- blog --}}
            <li class="nav-item">
              <a href="{{route('user.blog')}}" class="nav-link {{ request()->is('user/blog*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-pen"></i>
                <p>
                  Blogs
                </p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@yield('content')



  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2025 <a href="/dashboard">Mypcot</a>.</strong>
    All rights reserved.
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div> --}}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- owl carousel js -->
<script src="{{asset('css/owl.carousel-2/owl.carousel.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="{{ asset('js/simple-datatables/simple-datatables.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    // Function to hide the alert after 3 seconds
    function hideAlert(alertId) {
        var alert = document.getElementById(alertId);
        if (alert) {
            alert.style.display = 'none';
        }
    }

    // Hide alerts after 3 seconds
    setTimeout(function(){
        hideAlert('error-alert');
        hideAlert('success-alert');
    }, 3000);
</script>

    @yield('scripts')
</body>
</html>
