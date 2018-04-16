@extends('admin.kelola.item')


@section('input')

<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Input Anggota</h3>
          <div class="box-tools pull-left">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->


        <div class="box-body ">
          <div class="row">

            <form class="" action="{{ route('anggota.simpan')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field()}}

              <div class="col-md-6 border-right">
                <div class="form-group col-md-12">
                  <label for="">ID (NIS / NIG)</label>
                  <input type="text" class="form-control " name="kd_anggota" placeholder="masukan nis atau nig..">
                </div>
                <div class="form-group col-md-8">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="masukan nama">
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }} col-md-4">
                  <label for="">Status</label>
                  <select class="form-control select2" name="status_id" style="width: 100%;">
                    <option disabled selected>Pilih status</option>
                    @foreach($status as $r)
                      <option value="{{ $r->id}}">{{ $r->status}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('status'))
                    <span class="help-block"> input kembali! </span>
                  @endif
                </div>

                <div class="form-group col-md-6">
                  <label for="">Rayon</label>
                  <select class="form-control select2" name="rayon">
                    @foreach ($rayon as $r)
                        <option value="{{ $r->rayon }} ">{{ $r->rayon }}</option>
                    @endforeach
                  </select>
                  {{-- <input type="text" class="form-control" name="rayon" placeholder="masukan rayon"> --}}
                </div>
                <div class="form-group col-md-6">
                  <label for="">Rombel </label>
                  <select class="form-control select2" name="rombel">
                    @foreach ($rombel as $r)
                        <option value="{{ $r->rombel }} ">{{ $r->rombel }}</option>
                    @endforeach
                  </select>
                  {{-- <input type="text" class="form-control" name="rombel" placeholder="masukan rombel"> --}}
                </div>
                <div class="form-group col-md-6">
                  <label for="">Rombel - Bagian</label>
                  <select class="form-control" name="kelas">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                  </select>
                  {{-- <input type="text" class="form-control" name="kelas" placeholder="masukan kelas"> --}}
                </div>
                <div class="form-group col-md-6">
                  <label for="">No Telepon</label>
                  <input type="text" class="form-control" name="no_telepon" placeholder="masukan No telepon">
                </div>

                <div class="form-group col-md-6">
                  <label for="">NISN</label>
                  <input type="text" class="form-control" name="nisn" placeholder="masukan nisn">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Tahun Ajaran</label>
                  <input type="text" class="form-control" name="tahun_ajaran" placeholder="masukan tahun ajaran" maxlength="4" value="{{ date('Y')}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group col-md-12">
                  <label for="">Jalan</label>
                  <input type="text" class="form-control"  name="jalan" placeholder="masukan jalan">
                </div>
                <div class="form-group col-md-8">
                  <label for="">Desa</label>
                  <input type="text" class="form-control"  name="desa" placeholder="masukan desa">
                </div>
                <div class="form-group col-md-2">
                  <label for="">Rt</label>
                  <input type="text" class="form-control"  name="rt" placeholder="rt">
                </div>
                <div class="form-group col-md-2">
                  <label for="">Rw</label>
                  <input type="text" class="form-control"  name="rw" placeholder="rw">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Kecamatan</label>
                  <input type="text" class="form-control" name="kec" placeholder="masukan kecamatan">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Kota/Kab</label>
                  <input type="text" class="form-control" name="kotakab" placeholder="masukan kota/kab">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" placeholder="masukan provinsi">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Kode Pos </label>
                  <input type="text" class="form-control" name="kode_pos" placeholder="masukan kode pos">
                </div>
                <div class="form-group col-md-12">
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



@endsection
@push('script')
<script type="text/javascript">

  $(document).ready(function() {

  });

</script>
@endpush
