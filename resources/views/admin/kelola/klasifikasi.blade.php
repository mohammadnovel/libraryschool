@extends('admin.dashboard')

@section('content')

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Data Klasifikasi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('klasifikasi.simpan')}}" method="post">
          {{ csrf_field()}}

          <div class="form-group {{ $errors->has('jenis_item_id') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-3">Jenis Item</label>
            <div class="col-md-8">
              <input type="hidden" class="form-control" name="id" placeholder="Masukan klasifikasi.." value="{{ $kode }}">

            <select class="form-control" style="width: 100%;" name="jenis_item_id">
              @foreach($jenis as $r)
                <option value="{{ $r->id}}">{{ $r->jenis_item}}</option>
              @endforeach
            </select>
            @if ($errors->has('jenis_item_id'))
              <span class="help-block">Data tersebut sudah ada!</span>
            @endif
          </div>
          </div>

          <div class="form-group {{ $errors->has('klasifikasi') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-3">Klasifikasi</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="klasifikasi" id="" placeholder="Masukan klasifikasi.." value="{{ old('klasifikasi')}}">
              @if ($errors->has('klasifikasi'))
                <span class="help-block">Data tersebut sudah ada!</span>
              @endif
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

<section class="content-header">
  <h1>
    Kelola Data
    <small>Klasifikasi Item</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Kelola</a></li>
    <li class="active">Klasifikasi Item</li>
  </ol>
</section>

<div class="content">

  <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Klasifikasi</h3>
            <div class="box-tools pull-right">
              <!-- Buttons, labels, and many other things can be placed here! -->
              <!-- Here is a label for example -->
              <!-- <span class="label label-primary">Label</span> -->
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <button style="margin-bottom: 10px" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Data</button>

            <button type="button" class="btn btn-info btn-flat" name="button" style="margin-bottom: 10px"><span class="fa fa-plane"></span> <a style="color: white" href="{{ route('item.index')}}"> Lihat Data Item</a></button><br>
            <table id="table" class="table table-hover">
              <thead>
                <th>ID</th>
                <th>Jenis Item</th>
                <th>Klasifikasi</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                @foreach($tampil as $r)
                <tr>
                  <td class="col-md-1">{{$r->id}}</td>
                  <td>{{ $r->jenis_item->id . ' - '.$r->jenis_item->jenis_item}}</td>
                  <td>{{ $r->klasifikasi}}</td>
                  <td class="col-md-2">
                    <form class="" action="{{ route('klasifikasi.hapus', $r->id)}}" method="post">
                      {{ csrf_field()}}
                      {{ method_field('DELETE')}}

                      <button type="submit" class="btn btn-danger btn-flat btn-sm" onclick="return confirm('Yakin Hapus Data {{ $r->klasifikasi}} ?')"><i class="fa fa-trash"></i> Hapus</button>
                      ||
                      <button type="button" class="btn btn-info btn-flat btn-sm edit"
                      data-id="{{ $r->id}}"
                        data-jenis_id="{{ $r->jenis_item->id}}"
                        data-jenis="{{ $r->jenis_item->jenis_item}}"
                          data-klasifikasi="{{ $r->klasifikasi}}">
                        <i class="fa fa-edit"></i> Edit</button>
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
        <h4 class="modal-title" id="myModalLabel">Edit data klasifikasi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('klasifikasi.update')}}" method="post">
          {{ csrf_field()}}
          {{ method_field('PATCH')}}

          <div class="form-group">
            <label for="" class="control-label col-md-3">Jenis Item</label>
            <div class="col-md-8">
              <input type="hidden" class="form-control" id="id" name="id">
              <select class="form-control" name="jenis_item_id">
                <option id="jenis"></option>
                @foreach($jenis as $r)
                  <option value="{{ $r->id}}">{{ $r->id . ' - ' . $r->jenis_item}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-3">Klasifikasi</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="klasifikasi" name="klasifikasi">
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
@include('sweet::alert')
@endsection
@push('script')
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();

    $('.edit').on('click', function() {
      $('#edit').modal('show');

      $('#id').val( $(this).data('id'));
      $('#jenis').text( $(this).data('jenis_id'));
      $('#klasifikasi').val( $(this).data('klasifikasi'));

    });

  });
</script>
@endpush
