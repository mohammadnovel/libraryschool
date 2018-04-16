@include('layouts.temp')

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard || {{ Auth::user()->nama}}</title>
  <!-- Tell the browser to be responsive to screen width -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>D</b>Pe</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dashboard</b>Perpus</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">{{ Auth::user()->nama }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('images/han.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->nama }}
                  <small>{{ Auth::user()->hak_akses }} Sejak {{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  @if (count($errors) > 0)
    <div id="error" style="display: none">
      @foreach ($errors->all() as $error)
        {{ $error }}
      @endforeach
    </div>
  @endif

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

  @include('admin/sidebar-left')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="https://facebook.com/farhan.r.ii.1">Farhan Team </a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('sweet::alert')
</body>

<script type="text/javascript">
      var err = {{ count($errors) > 0 ? 'true' : 'false' }}
      if (err) {
      swal({
          title: 'Error',
          text: jQuery('#error').html(),
          icon: 'success',
      });
    }
</script>
</html>
