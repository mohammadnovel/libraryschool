@extends('admin.dashboard')


@section('content')

<section class="content-header">
  <h1>
    <h>Kelola Data</h>
    <small>Item</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('item.index')}}"><i class="fa fa-dashboard"></i> Kelola</a></li>
    <li class="active">Item</li>
  </ol>
</section>

<div class="content">

  @if($tampil == 'tampil')
    @include('admin.kelola.item.tampil')
  @else
    @yield('input')
    @yield('update')
  @endif

</div>

@endsection
