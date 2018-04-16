@extends('admin.kelola.item')


@section('input')

<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Item</h3>
          <div class="box-tools pull-left">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->

        <div class="box-body">
          <div class="row">

            <form class="" action="{{ route('item.update', $value->kd_item)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field()}}
              {{ method_field('PATCH')}}

              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" value="{{  $value->kd_item }}" style="text-align: center" name="kd_item" readonly>
                </div>
              </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="">Jenis Item:</label>
                <select class="form-control select2" name="jenis_item_id" style="width: 100%;">
                    <option default value="{{ $value->jenis_item_id }}">{{ $value->jenis_item_id}}</option>
                  @foreach($jenis as $r)
                    <option value="{{ $r->id}}">{{ $r->id . ' - ' . $r->jenis_item}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="">Klasifikasi:</label>
                <select class="form-control select2" name="klasifikasi_id" style="width: 100%;">
                  <option selected value="{{ $value->klasifikasi_id }}">{{ $value->klasifikasi_id }}</option>
                  @foreach($klasifikasi as $r)
                    <option value="{{ $r->id}}">{{ $r->id . ' - ' . $r->klasifikasi}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Label Rak:</label>
                <select class="form-control select2" name="label_rak_id" style="width: 100%;" required>
                  <option value="{{ $value->label_rak_id }}" selected>{{ $value->label_rak_id }}</option>
                  @foreach($label as $r)
                    <option value="{{ $r->id}}">{{ $r->id . ' - ' . $r->no_rak . ' - ' . $r->bagian_rak . ' - '. $r->sisi . ' - ' . $r->label}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="judul_item" placeholder="masukan judul" value="{{ $value->judul_item }}" required>
              </div>
              <div class="form-group">
                <label for="">Pengarang</label>
                <input type="text" class="form-control" name="pengarang" placeholder="masukan pengarang" value="{{ $value->pengarang }}" required>
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" placeholder="masukan penerbit" value="{{ $value->penerbit }}" required>
              </div>
              <div class="form-group">
                <label for="">Tahun Terbit</label>
                <input type="number" class="form-control" name="thn_terbit" placeholder="masukan tahun terbit" value="{{ $value->thn_terbit }}" maxlength="4" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">ISBN</label>
                <input type="text" class="form-control" name="isbn" placeholder="masukan ISBN" value="{{ $value->isbn }}" required>
              </div>
              <div class="form-group">
                <label>Tanggal Masuk:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_masuk" class="form-control pull-right"  value="{{ $value->tgl_masuk }}" required readonly>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" placeholder="masukan jumlah" value="{{ $value->jumlah }}" required>
              </div>
              <div class="form-group">
                <label for="">Kondisi</label>
                <input type="text" class="form-control" name="kondisi" placeholder="masukan kondisi" value="{{ $value->kondisi }}" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="">Kata kunci</label>
                <input type="text" class="form-control" name="kata_kunci" placeholder="masukan kata kunci" value="{{ $value->kata_kunci }}" required>
              </div>
              <div class="form-group">
                <label for="">Resensi</label>
                  <textarea class="form-control" name="resensi" rows="3" placeholder="masukan resensi"  required>{{ $value->resensi }}</textarea>
              </div>
              <div class="form-group">
                <label for="">Daftar isi</label>
                  <textarea class="form-control" name="daftar_isi" placeholder="masukan daftar isi" rows="3" required>{{ $value->daftar_isi }}</textarea>
              </div>
              <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                <label for="">Foto</label>
                <img src="{{ asset('storage/' . $value->foto)}}" width="100px" height="100px">
                <input type="file" class="form-control" name="foto" value="{{ $value->foto}}">
                @if ($errors->has('foto'))
                  <span onload="sweet()" class="help-block"> file harus berbentuk : jpeg, png, jpg, gif, svg </span>
                @endif
              </div>

              <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                <label for="">File</label>
                <?php if ($value->file) { ?>
                  <p style="color: green">-- file tersedia --</p>
                <?php }else {
                  ?>
                    <p style="color: red">-- file tidak tersedia --</p>
                  <?php
                } ?>
                <input type="file" class="form-control" name="file" value="{{ $value->file}}">
                @if ($errors->has('file'))
                  <span onload="sweet()" class="help-block">file harus berbentuk : doc, pdf, docx, zip, html </span>
                @endif
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Update">
              </div>
            </div>
          </form>

          </div>
        </div><!-- /.box-body -->

      </div><!-- /.box -->


@endsection
