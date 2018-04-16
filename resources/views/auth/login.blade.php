@include('layouts.temp')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<div class="container">
    <div class="row">
      <body class="hold-transition login-page">
      <div class="login-box">
        <div class="login-logo">
          <a href="{{ url('/') }}"><b>Admin</b>Perpustakaan</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Masuk untuk memulai</p>

          <form action="{{ route('login') }}" method="post">
            {{ csrf_field()}}

            <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
              <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username')}}" required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <div class="row">
              <!-- <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div> -->

              <!-- <div class="checkbox">
                  <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
              </div> -->
              <!-- /.col -->
              <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <a class="btn btn-link" href="{{ route('password.request') }}">
            Lupa Password?
          </a>
          <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

        </div>
        <!-- /.login-box-body -->
      </div>

</body>
</html>
