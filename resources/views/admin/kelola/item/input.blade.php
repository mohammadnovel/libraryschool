@extends('admin.kelola.item')


@section('input')

<div id="pengarang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Pilih Pengarang</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped" id="table">
          <thead>
            <th>Pengarang</th>
            <th>NO Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            @foreach($pengarang as $r)
            <tr>
              <td>{{ $r->pengarang}}</td>
              <td>{{ $r->no_telepon}}</td>
              <td>{{ $r->alamat}}</td>
              <td><button type="button" class="btn btn-info btn-flat ambil1" data-pengarang="{{ $r->pengarang}}">
                <i class="fa fa-check-square-o"></i> Pilih
              </button></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div id="penerbit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Pilih Penerbit</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped" id="table1">
          <thead>
            <th>Penerbit</th>
            <th>NO Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            @foreach($penerbit as $r)
            <tr>
              <td>{{ $r->penerbit}}</td>
              <td>{{ $r->no_telepon}}</td>
              <td>{{ $r->alamat}}</td>
              <td><button type="button" class="btn btn-info btn-flat ambil2" data-penerbit="{{ $r->penerbit}}">
                <i class="fa fa-check-square-o"></i> Pilih
              </button></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Input Item</h3>
          <div class="box-tools pull-left">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->

        <div class="box-body ">
          <div class="row">

            <form class="" action="{{ route('item.simpan')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field()}}
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" value="{{ $kodeBarang }}" style="text-align: center" readonly name="kd_item">
                </div>
              </div>

            <div class="col-md-4">
              <div class="form-group {{ $errors->has('jenis_item_id') ? 'has-error' : '' }}">
                <label for="">Jenis Item:</label>
                <select class="form-control select2" name="jenis_item_id" style="width: 100%;">
                    <option disabled selected>Pilih jenis item</option>
                  @foreach($jenis as $r)
                    <option value="{{ $r->id}}">{{ $r->jenis_item}}</option>
                  @endforeach
                </select>
                @if ($errors->has('jenis_item_id'))
                  <span onload="sweet()" class="help-block"> input kembali! </span>
                @endif
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group {{ $errors->has('klasifikasi_id') ? 'has-error' : '' }}">
                <label for="">Klasifikasi:</label>
                <select class="form-control select2" name="klasifikasi_id" style="width: 100%;">
                  <option disabled selected>Pilih klasifikasi</option>
                  @foreach($klasifikasi as $r)
                    <option value="{{ $r->id}}">{{ $r->klasifikasi}}</option>
                  @endforeach
                </select>
                @if ($errors->has('klasifikasi_id'))
                  <span onload="sweet()" class="help-block"> input kembali! </span>
                @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{ $errors->has('label_rak_id') ? 'has-error' : '' }}">
                <label for="">Label Rak:</label>
                <select class="form-control select2" name="label_rak_id" style="width: 100%;" required>
                  <option disabled selected>Pilih label rak</option>
                  @foreach($label as $r)
                    <option value="{{ $r->id}}">{{ $r->no_rak . ' - ' . $r->bagian_rak . ' - '. $r->sisi . ' - ' . $r->label}}</option>
                  @endforeach
                </select>
                @if ($errors->has('label_rak_id'))
                  <span onload="sweet()" class="help-block"> input kembali! </span>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="judul_item" placeholder="masukan judul" required value="{{ old('judul_item')}}">
              </div>
              <div class="form-group">
                <label for="">Pengarang</label>
                <div class="row">
                  <div class="col-md-10">
                    <input type="text" id="data1" class="form-control" name="pengarang" placeholder="masukan pengarang" required value="{{ old('pengarang')}}">
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-warning btn-flat btn-block" data-toggle="modal" data-target="#pengarang">
                      <i class="fa fa-search"></i> Cari
                    </button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <div class="row">
                  <div class="col-md-10">
                    <input type="text" id="data2" class="form-control" name="penerbit" placeholder="masukan penerbit" required value="{{ old('penerbit')}}">
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-warning btn-flat btn-block" data-toggle="modal" data-target="#penerbit">
                      <i class="fa fa-search"></i> Cari
                    </button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Tahun Terbit</label>
                <input type="number" class="form-control" name="thn_terbit" placeholder="masukan tahun terbit" maxlength="4" required value="{{ old('thn_terbit')}}">
              </div>
              <div class="form-group">
                <label for="">Kata kunci</label>
                <input type="text" class="form-control" name="kata_kunci" placeholder="masukan kata kunci" required value="{{ old('kata_kunci')}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">ISBN</label>
                <input type="text" class="form-control" name="isbn" placeholder="masukan ISBN" required value="{{ old('isbn')}}">
              </div>
              <div class="form-group">
                <label>Tanggal Masuk:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_masuk" class="form-control pull-right" id="datepicker" value="{{ date('Y-m-d')}}" required>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" placeholder="masukan jumlah" required value="{{ old('jumlah')}}">
              </div>
              <div class="form-group">
                <label for="">Kondisi</label>
                <input type="text" class="form-control" name="kondisi" placeholder="masukan kondisi" required value="{{ old('kondisi')}}">
              </div>
              <div class="form-group">
                <label for="">Call Number</label>
                <input type="text" class="form-control" name="call_number" placeholder="masukan call number" required value="{{ old('call_number')}}">
              </div>
            </div>

            <div class="col-md-12">

              <div class="form-group">
                <label for="">Resensi</label>
                  <textarea class="form-control" name="resensi" rows="3" placeholder="masukan resensi" required>{{ old('resensi')}}</textarea>
              </div>
              <div class="form-group">
                <label for="">Daftar isi</label>
                  <textarea class="form-control" name="daftar_isi" placeholder="masukan daftar isi" rows="3"  required>{{ old('daftar_isi')}}</textarea>
              </div>
              <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                <label for="">Foto</label>
                <input type="file" class="form-control" name="foto">
                @if ($errors->has('foto'))
                  <span onload="sweet()" class="help-block"> file harus berbentuk : jpeg, png, jpg, gif, svg </span>
                @endif
              </div>

              <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                <label for="">File</label>
                <input type="file" class="form-control" name="file">
                @if ($errors->has('file'))
                  <span onload="sweet()" class="help-block">file harus berbentuk : doc, pdf, docx, zip, html </span>
                @endif
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Simpan">
              </div>
            </div>
          </form>
          </div>
        </div><!-- /.box-body -->

      </div><!-- /.box -->


@endsection
@push('script')
<script type="text/javascript">

  $(document).ready(function() {

    $('.ambil1').click(function(e) {
      e.preventDefault();

      $('#data1').val( $(this).data('pengarang'));
      $('#pengarang').modal('hide');

    });

    $('.ambil2').click(function(e) {
      e.preventDefault();

      $('#data2').val( $(this).data('penerbit'));
      $('#penerbit').modal('hide');

    });


  });

</script>
@endpush
