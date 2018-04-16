@extends('admin.dashboard')

@section('content')

<section class="content-header">
  <h1>
    Kelola Data
    <small>Label Rak Item</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Kelola</a></li>
    <li class="active">Label Rak Item</li>
  </ol>
</section>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Data Label Rak</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('label_rak.simpan')}}" method="post">
          {{ csrf_field()}}

          <div class="form-group">
            <label for="" class="control-label col-md-3">No Rak</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="no_rak" id="" placeholder="masukan no rak..">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Bagian Rak</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="bagian_rak" id="" placeholder="masukan bagian rak..">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Sisi</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="sisi" id="" placeholder="masukan sisi..">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Label</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="label" id="" placeholder="masukan label..">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Simpan">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="content">
  <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Label rak</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

          <button style="margin-bottom: 10px" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Data</button>

          <button type="button" class="btn btn-info btn-flat" name="button" style="margin-bottom: 10px"><span class="fa fa-plane"></span> <a style="color: white" href="{{ route('item.index')}}"> Lihat Data Item</a></button><br>

          <table id="table" class="table">
            <thead>
              <th>ID</th>
              <th>No Rak</th>
              <th>Bagian Rak</th>
              <th>Sisi</th>
              <th>Label</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($tampil as $r)
              <tr>
                <td class="col-md-1">{{ $r->id}}</td>
                <td>{{ $r->no_rak }}</td>
                <td>{{ $r->bagian_rak}}</td>
                <td>{{ $r->sisi}}</td>
                <td>{{ $r->label}}</td>
                <td class="col-md-2">
                  <form class="" action="{{ route('label_rak.hapus', $r->id)}}" method="post">
                    {{ csrf_field()}}
                    {{ method_field('DELETE')}}

                    <button type="submit" class="btn btn-danger btn-flat btn-sm" onclick="return confirm('Yakin Hapus Data {{ $r->label}} ?')"><i class="fa fa-trash"></i> Hapus</button>
                    ||
                    <button type="button" class="btn btn-info btn-flat btn-sm edit"
                    data-id="{{ $r->id}}"
                    data-no_rak="{{ $r->no_rak}}"
                    data-bagian_rak="{{ $r->bagian_rak}}"
                    data-sisi="{{ $r->sisi}}"
                    data-label="{{ $r->label}}"><i class="fa fa-edit"></i> Edit</button>
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
        <h4 class="modal-title" id="myModalLabel"> Edit Label Rak</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" action="{{ route('label_rak.update')}}" method="post">
          {{ csrf_field()}}
          {{ method_field('PATCH')}}

          <div class="form-group">
            <label for="" class="control-label col-md-3">No Rak</label>
            <div class="col-md-8">
              <input type="hidden" class="form-control" name="id" id="id">
              <input type="text" class="form-control" name="no_rak" id="no_rak" placeholder="masukan no rak..">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Bagian Rak</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="bagian_rak" id="bagian_rak" placeholder="masukan bagian rak..">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Sisi</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="sisi" id="sisi" placeholder="masukan sisi..">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Label</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="label" id="label" placeholder="masukan label..">
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
@endsection

@push('script')
<script type="text/javascript">

$(document).ready(function() {

  $('.edit').on('click', function() {
    $('#edit').modal('show');

    $('#id').val( $(this).data('id'));
    $('#no_rak').val( $(this).data('no_rak'));
    $('#bagian_rak').val( $(this).data('bagian_rak'));
    $('#sisi').val( $(this).data('sisi'));
    $('#label').val( $(this).data('label'));
  });
});

</script>
@endpush
