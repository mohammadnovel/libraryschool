@extends('admin.dashboard')

@section('content')

<section class="content-header">
  <h1>
    <a  href="{{ route('anggota.index')}}">Kelola Data</a>
    <small>Anggota</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('anggota.index')}}"><i class="fa fa-dashboard"></i> Kelola</a></li>
    <li class="active">Anggota</li>
  </ol>
</section>

<div class="content">

  @if($tampil == 'tampil')
    @include('admin.kelola.anggota.tampil')
  @else
    @yield('input')
    @yield('update')
  @endif

@include('sweet::alert')
</div>

@endsection
