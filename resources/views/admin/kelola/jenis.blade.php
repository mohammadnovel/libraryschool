@extends('admin.dashboard')

@section('content')

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Data Jenis Item</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" action="{{ route('jenis.simpan')}}" method="post">
          {{ csrf_field()}}

          <div class="form-group {{ $errors->has('jenis_item') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-3">Jenis Item</label>
            <div class="col-md-8">
              <input type="hidden" class="form-control" value="{{ $kode }}" name="id" readonly>
              <input type="text" class="form-control" id="" placeholder="Masukan jenis item.." name="jenis_item" value="{{ old('jenis_item')}}" required>
              @if ($errors->has('jenis_item'))
                <span onload="sweet()" class="help-block">Data tersebut sudah ada!</span>
              @endif
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
    <small>Jenis Item</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Kelola</a></li>
    <li class="active">Jenis Item</li>
  </ol>
</section>
<div class="content">

<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Jenis Item</h3>
          <div class="box-tools pull-left">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->

        <div class="box-body">
          <button type="button" class="btn btn-success btn-flat" name="button" style="margin-bottom: 10px" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Data</button>
          <button type="button" class="btn btn-info btn-flat" name="button" style="margin-bottom: 10px"><span class="fa fa-plane"></span> <a style="color: white" href="{{ route('item.index')}}"> Lihat Data Item</a></button><br>

          <form class="form-horizontal" action="" method="post">
            <table id="table" class="table table-striped">
              <thead>
                <th>Jenis Item</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                @foreach($tampil as $r)
                <tr>
                  <td>{{ $r->jenis_item}}</td>
                  <td class="col-md-2">
                    <form class="" action="{{ route('jenis.hapus', $r->id)}}" method="post">
                      {{ csrf_field()}}
                      {{ method_field('DELETE')}}

                      <button type="submit" class="btn btn-danger btn-flat btn-sm" name="button" onclick="return confirm('Yakin hapus data {{$r->jenis_item}} ?')"><span class="fa fa-trash"></span> Hapus</button>
                      ||
                      <button type="button" class="btn btn-info btn-flat btn-sm editt" name="button"
                      data-id="{{ $r->id}}"
                      data-jenis="{{ $r->jenis_item}}"><i class="fa fa-edit"></i> Edit</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </form>
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
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('jenis.update')}}" method="post">
          {{ csrf_field()}}
          {{ method_field('PATCH')}}

          <div class="form-group">
            <label for="" class="control-label col-md-3">ID</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="id" name="id" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Jenis-Item</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="jenis" placeholder="" name="jenis_item">
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
      $('#jenis').val( $(this).data('jenis'));
    });

  });


</script>
@endpush
