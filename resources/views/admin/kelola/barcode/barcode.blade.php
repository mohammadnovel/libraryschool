@extends('admin.dashboard')

@section('content')

  <section class="content-header">
    <h1>
      <a  href="{{ route('barcode.index')}}">Cetak Data</a>
      <small>Barcode</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('barcode.index')}}"><i class="fa fa-dashboard"></i> Cetak</a></li>
      <li class="active">Barcode</li>
    </ol>
  </section>



<div class="content">

<div class="modal fade" id="modal-id">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Pilih Item</h4>
      </div>
      <div class="modal-body">
        <table class="table" id="table">
          <thead>
            <th>ID</th>
            <th>Judul</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            @foreach ($tampil as $r)
              <tr>
                <td>{{ $r->kd_item }}</td>
                <td>{{ $r->judul_item }}</td>
                <td>{{ $r->jumlah }}</td>
                <td class="col-md-1">
                  <button class="btn btn-info btn-flat edit" 
                  data-id="{{ $r->kd_item }}"
                  data-judul="{{ $r->judul_item }}"
                  data-jmlh="{{ $r->jumlah }}"><i class="fa fa-check-square-o"></i> Pilih data</button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <div class="row">
    <div class="col-md-4">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Cetak Barcode</h3>
          <div class="box-tools pull-left">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->

        <div class="box-body">

        <form action="{{ route('barcode.simpan') }}" class="form-horizontal" method="post">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="" class="control-label col-md-2">ID:</label>
            <div class="col-md-10">
              <input type="text" id="id" class="form-control" placeholder="Klik Disini!!" readonly="" data-toggle="modal" href='#modal-id' name="kd_item" >
            </div>
          </div>
          
          <div class="form-group">
            <label for="" class="control-label col-md-2">Judul:</label>
            <div class="col-md-7">
              <input type="text" class="form-control" id="judul" placeholder="judul" readonly name="judul">
            </div>
            <div class="col-md-3">
              <input name="jmlh" type="number" class="form-control" id="jmlh" placeholder="jumlah" required>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-md-12">
              <input type="submit" class="btn btn-primary btn-flat btn-block" value="Cetak">
            </div>
          </div>

        </form>
        
        </div><!-- /.box-body -->

      </div><!-- /.box -->
    </div>

    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Barcode</h3>
          <div class="box-tools pull-left">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->

        <div class="box-body table-responsive">
          <table class="table table-hover" id="table1">
            <thead>
              <th>ID</th>
              <th>Barcode ID</th>
              <th>Judul</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach ($bar as $r) 
              <tr>
                <td>{{ $r->kd_item }}</td>
                <td>{{ $r->barcode_kode }} </td>
                <td>{{ $r->judul }}</td>
                <td>
                  <form action="{{ route('barcode.hapus', $r->kd_item) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" style="margin-left: 20px;" class="btn btn-danger btn-flat" onclick="return confirm('Hapus semua data Barcode {{ strtoupper($r->judul) }} ? ')"><i class="fa fa-trash"></i></button>
                  </form> 
                    <a style="float: right; margin-top: -43.5px;" href="{{ route('cetak.index', $r->kd_item) }}"><button class="btn btn-warning btn-flat"><i class="fa fa-print"></i></button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
         </div><!-- /.box-body -->

      </div><!-- /.box -->
    </div>

  </div>
</div>



@endsection
@push('script')
  <script type="text/javascript">
    $(document).ready(function() {

      $('.edit').on('click', function(){
        $('#modal-id').modal('hide');

        $('#id').val( $(this).data('id'));
        $('#judul').val( $(this).data('judul'));
        $('#jmlh').val( $(this).data('jmlh'));


      })
    });
  </script>
@endpush