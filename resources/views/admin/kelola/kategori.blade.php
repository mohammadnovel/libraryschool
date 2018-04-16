@extends('admin.dashboard')

@section('content')

<section class="content-header">
  <h1>
    Kelola Data
    <small>Kategori Item</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Kelola</a></li>
    <li class="active">Kategori Item</li>
  </ol>
</section>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Data Kategori</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('kategori.simpan')}}" method="post">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="" class="control-label col-md-3">Klasifikasi</label>
            <div class="col-md-8">
              <select class="form-control" name="klasifikasi_id">
                @foreach($klasifikasi as $r)
                  <option value="{{ $r->id}}">{{ $r->id . ' - ' . $r->klasifikasi}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Kategori</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="kategori" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="submit" class="btn btn-primary btn-flat btn-block" value="Simpan">
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
          <h3 class="box-title">Data Kategori Item</h3>
          <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <!-- <span class="label label-primary">Label</span> -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <button style="margin-bottom: 10px" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Data</button>

          <button type="button" class="btn btn-info btn-flat" name="button" style="margin-bottom: 10px"><span class="fa fa-plane"></span> <a style="color: white" href="{{ route('item.index')}}"> Lihat Data Item</a></button><br>

          <table id="table" class="table">
            <thead>
              <th>ID</th>
              <th>Klasifikasi</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($tampil as $r)
              <tr>
                <td class="col-md-1">{{ $r->id}}</td>
                <td>{{ $r->klasifikasi->klasifikasi }}</td>
                <td>{{ $r->kategori}}</td>
                <td class="col-md-2">
                  <form class="" action="{{ route('kategori.hapus', $r->id)}}" method="post">
                    {{ csrf_field()}}
                    {{ method_field('DELETE')}}

                    <button type="submit" class="btn btn-danger btn-flat btn-sm" onclick="return confirm('Yakin Hapus Data {{ $r->klasifikasi->klasifikasi .' - ' . $r->kategori}} ?')"><i class="fa fa-trash"></i> Hapus</button>
                    ||
                    <button type="button" class="btn btn-info btn-flat btn-sm edit"
                    data-id="{{ $r->id}}"
                    data-kla="{{ $r->klasifikasi->id}}"
                    data-kat="{{ $r->kategori}}"><i class="fa fa-edit"></i> Edit</button>
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
        <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" action="{{ route('kategori.update')}}" method="post">
          {{ csrf_field() }}
          {{ method_field('PATCH')}}

          <div class="form-group">
            <label for="" class="control-label col-md-3">Klasifikasi</label>
            <div class="col-md-8">
              <input type="hidden" class="form-control" id="id" name="id">
              <select class="form-control" name="klasifikasi_id">
                  <option id="klasifikasi"></option>
                @foreach($klasifikasi as $r)
                  <option value="{{ $r->id}}">{{ $r->id . ' - ' . $r->klasifikasi}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Kategori</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="kategori" name="kategori">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="submit" class="btn btn-primary btn-flat btn-block" value="Update">
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

      $('#kategori').val( $(this).data('kat'));
      $('#klasifikasi').text( $(this).data('kla'));
      $('#id').val( $(this).data('id'));
    });
  });
</script>
@endpush
