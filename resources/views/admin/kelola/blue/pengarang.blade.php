@extends('admin.dashboard')

@section('content')

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Data Pengarang</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" action="{{ route('pengarang.simpan')}}" method="post">
          {{ csrf_field()}}
          <div class="form-group">
            <label for="" class="control-label col-md-3">Pengarang</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="" placeholder="Masukan pengarang.." name="pengarang" required value="{{ old('pengarang')}}">
            </div>
          </div>

          <div class="form-group {{ $errors->has('no_telepon') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-3">No telepon</label>
            <div class="col-md-8">
              <input type="number" class="form-control" id="" placeholder="Masukan no telepon.." name="no_telepon" required value="{{ old('no_telepon')}}">
              @if ($errors->has('no_telepon'))
                <span class="help-block">Data tersebut sudah ada!</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Alamat</label>
            <div class="col-md-8">
              <textarea name="alamat" rows="6" placeholder="masukan alamat.." class="form-control" required>{{ old('alamat')}} </textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="submit" class="btn btn-primary btn-block btn-flat " value="Simpan">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<section class="content-header">
  <h1>
    Kelola Data
    <small>Pengarang</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Kelola</a></li>
    <li class="active">Pengarang</li>
  </ol>
</section>
<div class="content">

<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pengarang</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <button type="button" class="btn btn-success btn-flat" name="button" style="margin-bottom: 10px" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Data</button><br>

          <table class="table table-hover" id="table">
            <thead>
              <th>Nama Pengarang</th>
              <th>No Telepon</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($tampil as $r)
              <tr>
                <td>{{ $r->pengarang}}</td>
                <td>{{ $r->no_telepon}}</td>
                <td>{{ $r->alamat}}</td>
                <td colspan="2">
                  <form class="" action="{{ route('pengarang.hapus', $r->id)}}" method="post">
                    {{ csrf_field()}}
                    {{ method_field('DELETE')}}

                    <button type="submit" onclick="return confirm('Yakih Akan Menghapus data {{ $r->pengarang}}?')" class="btn btn-danger btn-flat "><i class="fa fa-trash"></i></button> ||
                    <button type="button" class="btn btn-info btn-info btn-flat editt"
                    data-id="{{ $r->id}}"
                    data-pengarang="{{ $r->pengarang}}"
                    data-alamat="{{ $r->alamat}}"
                    data-no="{{ $r->no_telepon}}"><i class="fa fa-edit"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->

      </div><!-- /.box -->
</div>


<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Pengarang</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('pengarang.update')}}" method="post">
          {{ csrf_field()}}
          {{ method_field('PATCH')}}
        <div class="form-group">
          <label for="" class="control-label col-md-3">Pengarang</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="pengarang1" placeholder="Masukan pengarang.." name="pengarang" required>
            <input type="hidden" name="id" id="id">
          </div>
        </div>

        <div class="form-group">
          <label for="" class="control-label col-md-3">No telepon</label>
          <div class="col-md-8">
            <input type="number" class="form-control" id="no_telepon1" placeholder="Masukan no telepon.." name="no_telepon" required>
          </div>
        </div>

        <div class="form-group">
          <label for="" class="control-label col-md-3">Alamat</label>
          <div class="col-md-8">
            <textarea name="alamat" id="alamat1" rows="6" placeholder="masukan alamat.." class="form-control" required> </textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-10 col-md-offset-1">
            <input type="submit" class="btn btn-primary btn-block btn-flat" value="Update">

          </div>
        </div>
      </form>
      </div>

    </div>
  </div>
</div>
@include('sweet::alert')

@endsection
@push('script')
<script type="text/javascript">
  $(document).ready(function() {

    $('.editt').on('click', function() {
      $('#edit').modal('show');

      $('#id').val( $(this).data('id'));
      $('#pengarang1').val( $(this).data('pengarang'));
      $('#alamat1').val( $(this).data('alamat'));
      $('#no_telepon1').val( $(this).data('no'));
    });
  });

</script>
@endpush
