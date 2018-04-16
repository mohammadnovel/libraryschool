@extends('layouts.temp')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{ url('/')}}"><b>Admin</b>Perpus</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registrai Member Baru</p>

    <form action="{{ route('register') }}" method="post">
      {{ csrf_field() }}

      <div class="form-group has-feedback {{ $errors->has('nama') ? ' has-error' : '' }}">
        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap" required autofocus>

        @if ($errors->has('nama'))
            <span class="help-block">
                <strong>{{ $errors->first('nama') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>

        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

            <div class="form-group has-feedback">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Tulis ulang password">
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>

      <div class="form-group has-feedback">
        <select class="form-control" name="hak_akses">
          <option value="Admin">Admin</option>
          <option value="Perpustakawan">Perpustakawan</option>
        </select>
        <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
      </div>

      <div class="row">

        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrasi</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
<br>
    <a href="{{ route('login') }}" class="text-center">Sudah Memiliki Akun..</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

</body>
</html>
