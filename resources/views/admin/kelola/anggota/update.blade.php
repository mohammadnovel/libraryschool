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

            <form class="" action="{{ route('anggota.update', $value->kd_anggota)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field()}}
              {{ method_field('PATCH')}}

              <div class="col-md-6 border-right">
                <div class="form-group col-md-12">
                  <label for="">ID (NIS / NIG)</label>
                  <input type="text" class="form-control " name="kd_anggota" value="{{ $value->kd_anggota }}" placeholder="masukan nis atau nig..">
                </div>
                <div class="form-group col-md-8">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="masukan nama" value="{{ $value->nama }}">
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }} col-md-4">
                  <label for="">Status</label>
                  <select class="form-control select2" name="status_id" style="width: 100%;">
                    <option value="{{ $value->status_id }}">{{ $value->status_id }}</option>
                    @foreach($status as $r)
                      <option value="{{ $r->id}}">{{ $r->id . ' - ' . $r->status}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('status'))
                    <span class="help-block"> input kembali! </span>
                  @endif
                </div>

                <div class="form-group col-md-6">
                  <label for="">Rayon</label>
                  {{-- <input type="text" class="form-control" name="rayon" placeholder="masukan rayon" value="{{ $value->rayon }}"> --}}
                  <select class="form-control select2" name="rayon">
                        <option value="{{ $value->rayon }}">{{ $value->rayon }}</option>
                    @foreach ($rayon as $r)
                        <option value="{{ $r->rayon }} ">{{ $r->rayon }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Rombel </label>
                  {{-- <input type="text" class="form-control" name="rombel" placeholder="masukan rombel" value="{{ $value->rombel }}"> --}}
                  <select class="form-control select2" name="rombel">
                        <option value="{{ $value->rombel }}">{{ $value->rombel }}</option>
                    @foreach ($rombel as $r)
                        <option value="{{ $r->rombel }} ">{{ $r->rombel }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Rombel - Bagian</label>
                  {{-- <input type="text" class="form-control" name="kelas" placeholder="masukan kelas" value="{{ $value->kelas }}"> --}}
                  <select class="form-control" name="kelas">
                    <option value="{{ $value->kelas }}">{{ $value->kelas }}</option>

                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="">No Telepon</label>
                  <input type="text" class="form-control" name="no_telepon" placeholder="masukan No telepon" value="{{ $value->no_telepon }}">
                </div>

                <div class="form-group col-md-6">
                  <label for="">NISN</label>
                  <input type="text" class="form-control" name="nisn" placeholder="masukan nisn" value="{{ $value->nisn }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Tahun Ajaran</label>
                  <input type="text" class="form-control" name="tahun_ajaran" placeholder="masukan tahun ajaran" value="{{ $value->tahun_ajaran }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group col-md-12">
                  <label for="">Jalan</label>
                  <input type="text" class="form-control"  name="jalan" placeholder="masukan jalan" value="{{ $value->jalan }}">
                </div>
                <div class="form-group col-md-8">
                  <label for="">Desa</label>
                  <input type="text" class="form-control"  name="desa" placeholder="masukan desa" value="{{ $value->desa }}">
                </div>
                <div class="form-group col-md-2">
                  <label for="">Rt</label>
                  <input type="text" class="form-control"  name="rt" placeholder="rt" value="{{ $value->rt }}">
                </div>
                <div class="form-group col-md-2">
                  <label for="">Rw</label>
                  <input type="text" class="form-control"  name="rw" placeholder="rw" value="{{ $value->rw }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Kecamatan</label>
                  <input type="text" class="form-control" name="kec" placeholder="masukan kecamatan" value="{{ $value->kec }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Kota/Kab</label>
                  <input type="text" class="form-control" name="kotakab" placeholder="masukan kota/kab" value="{{ $value->kotakab }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" placeholder="masukan provinsi" value="{{ $value->provinsi }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Kode Pos </label>
                  <input type="text" class="form-control" name="kode_pos" placeholder="masukan kode pos" value="{{ $value->kode_pos }}">
                </div>
                <div class="form-group col-md-12">
                  <img src="{{ asset('storage/' . $value->foto)}}" width="100px" height="100px">

                  <label for="">Foto Anggota</label>
                  <input type="file" class="form-control" name="foto">
                  @if ($errors->has('foto'))
                    <span class="help-block"> file harus berbentuk : jpeg, png, jpg, gif, svg </span>
                  @endif

                </div>

              </div>
              <div class="col-md-12">
                <div class="form-group col-md-12">
                  <input type="submit" class="btn btn-primary btn-block btn-flat" value="Simpan">
                </div>
              </div>

            </div>
          </form>

          </div>
        </div><!-- /.box-body -->

      </div><!-- /.box -->


@endsection
