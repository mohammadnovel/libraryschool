@extends('admin.dashboard')

@section('content')

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Data Status</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" action="{{ route('status.simpan')}}" method="post">
          {{ csrf_field()}}
          <div class="form-group">
            <label for="" class="control-label col-md-3">Status</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="" placeholder="Masukan status.." name="status">
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
    <small>Status</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Kelola</a></li>
    <li class="active">Status</li>
  </ol>
</section>
<div class="content">

<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Status</h3>
          <div class="box-tools pull-left">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->

        <div class="box-body">
          <button type="button" class="btn btn-success btn-flat" name="button" style="margin-bottom: 10px" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Data</button>

          <form class="form-horizontal" action="" method="post">
            <table id="table" class="table table-striped">
              <thead>
                <th>Status</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                @foreach($tampil as $r)
                <tr>
                  <td>{{ $r->status}}</td>
                  <td class="col-md-2">
                    <form class="" action="{{ route('status.hapus', $r->id)}}" method="post">
                      {{ csrf_field()}}
                      {{ method_field('DELETE')}}

                      <button type="submit" class="btn btn-danger btn-flat btn-sm" name="button" onclick="return confirm('Yakin hapus data {{$r->status}} ?')"><span class="fa fa-trash"></span> Hapus</button>
                      ||
                      <button type="button" class="btn btn-info btn-flat btn-sm editt" name="button"
                      data-id="{{ $r->id}}"
                      data-status="{{ $r->status}}"><i class="fa fa-edit"></i> Edit</button>
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
        <h4 class="modal-title" id="myModalLabel">Edit Status</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('status.update')}}" method="post">
          {{ csrf_field()}}
          {{ method_field('PATCH')}}

          <div class="form-group">
            <label for="" class="control-label col-md-3">ID</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="id" name="id" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Status</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="status" placeholder="" name="status">
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
      $('#status').val( $(this).data('status'));
    });

  });
</script>
@endpush
