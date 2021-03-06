<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  {{--
  <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title></title>
  @include('layouts.css')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link"></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar  sidebar-light-danger elevation-4">
      <a href="#" class="brand-link navbar-danger">
        {{-- <img src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png"
          alt="User" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light text-white text-sm">
          <strong>
            {{Auth::user()->name}}
          </strong>
        </span>
      </a>
      <div class="sidebar">

        @if (Auth::user()->hasRole('superadmin'))
        @include('layouts.menu_superadmin')
        @elseif (Auth::user()->hasRole('alumni'))
        @include('layouts.menu_alumni')
        @elseif (Auth::user()->hasRole('stakeholder'))
        @include('layouts.menu_stakeholder')
        @endif


      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-inline">
      </div>
      <strong>STMIK INDONESIA BANJARMASIN &copy; 2021 </strong>
      <div class="float-right d-none d-sm-inline-block">


      </div>
    </footer>
  </div>

  @include('layouts.js')
</body>

</html>