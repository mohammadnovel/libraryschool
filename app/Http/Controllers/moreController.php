<?php

namespace App\Http\Controllers;

use DB;
use App\anggota;
use App\rayon;
use App\rombel;
use App\status;
use Alert;
use Storage;
use Illuminate\Http\Request;

class moreController extends Controller {

    public function indexRayon () {
      $tampil = DB::table('rayons')->paginate();
      return view('admin.kelola.more.rayon', compact('tampil'));
    }

    public function simpanRayon (request $req) {
      $this->validate(request(), [
          'rayon'  => 'required|unique:rayons',
      ]);

      rayon::create([
        'rayon'   => $req->rayon,
      ]);
      Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");
      return redirect()->route('rayon.index');
    }

    public function hapusRayon ($id) {
      DB::table('rayons')->where('id', $id)->delete();

      Alert::success('Data Berhasil Di Hapus!', 'Hapus')->persistent("Tutup");
      return redirect()->route('rayon.index');
    }

    public function updateRayon (request $req) {
      DB::table('rayons')->where('id', $req->id)->update([
        'rayon'   => $req->rayon,
      ]);

      Alert::info('Data Berhasil Di Update!', 'Info')->persistent("Ok");
      return redirect()->route('rayon.index');
    }

    // rombel

    public function indexRombel () {
      $tampil = DB::table('rombels')->paginate();
      return view('admin.kelola.more.rombel', compact('tampil'));
    }

    public function simpanRombel (request $req) {
      $this->validate(request(), [
          'rombel'  => 'required|unique:rombels',
      ]);

      rombel::create([
        'rombel'   => $req->rombel,
      ]);
      Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");
      return redirect()->route('rombel.index');
    }

    public function hapusRombel ($id) {
      DB::table('rombels')->where('id', $id)->delete();

      Alert::success('Data Berhasil Di Hapus!', 'Hapus')->persistent("Tutup");
      return redirect()->route('rombel.index');
    }

    public function updateRombel (request $req) {
      DB::table('rombels')->where('id', $req->id)->update([
        'rombel'   => $req->rombel,
      ]);

      Alert::info('Data Berhasil Di Update!', 'Info')->persistent("Ok");
      return redirect()->route('rombel.index');
    }

    // status

    public function indexStatus () {
      $tampil = DB::table('statuses')->paginate();
      return view('admin.kelola.more.status', compact('tampil'));
    }

    public function simpanStatus (request $req) {

      $this->validate(request(), [
          'status'  => 'required|unique:statuses',
      ]);

      status::create([
        'status'   => $req->status,
      ]);

      Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");
      return redirect()->route('status.index');
    }

    public function hapusStatus ($id) {
      DB::table('statuses')->where('id', $id)->delete();

      Alert::success('Data Berhasil Di Hapus!', 'Hapus')->persistent("Tutup");
      return redirect()->route('status.index');
    }

    public function updateStatus (request $req) {
      DB::table('statuses')->where('id', $req->id)->update([
        'status'   => $req->status,
      ]);

      Alert::info('Data Berhasil Di Update!', 'Info')->persistent("Ok");
      return redirect()->route('status.index');
    }

    // anggota

    public function index()
    {
      $anggota = DB::table('anggotas')->paginate();
      $tampil = 'tampil';

      return view('admin.kelola.anggota', compact('tampil', 'anggota'));
    }

    public function input()
    {
      $tampil       = '';
      $status       = DB::table('statuses')->paginate();
      $rayon        = DB::table('rayons')->paginate();
      $rombel       = DB::table('rombels')->paginate();

      return view('admin.kelola.anggota.input', compact('tampil', 'status', 'rayon', 'rombel'));
    }

    public function simpan(request $req)
    {

        $this->validate($req, [
          'kd_anggota'         => 'required|unique:anggotas',
          'foto'               => 'required|image|mimes:jpeg,png,jpg,gif,svg'
      ]);

        $foto = $req->file('foto')->store('avatar');
        anggota::create([
          'kd_anggota'    => $req->kd_anggota,
          'nama'          => $req->nama,
          'status_id'     => $req->status_id,
          'jalan'         => $req->jalan,
          'rt'            => $req->rt,
          'rw'            => $req->rw,
          'desa'          => $req->desa,
          'kec'           => $req->kec,
          'kotakab'       => $req->kotakab,
          'provinsi'      => $req->provinsi,
          'kode_pos'      => $req->kode_pos,
          'no_telepon'    => $req->no_telepon,
          'foto'          => $foto,
          'rayon'         => $req->rayon,
          'rombel'        => $req->rombel,
          'kelas'         => $req->kelas,
          'tahun_ajaran'  => $req->tahun_ajaran,
          'nisn'          => $req->nisn,
        ]);

      Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");
      return redirect()->route('anggota.index');

    }

    public function edit($id)
    {
      $value = anggota::find($id);
      $tampil="";
      $status= DB::table('statuses')->paginate();
      $rayon        = DB::table('rayons')->paginate();
      $rombel       = DB::table('rombels')->paginate();

      return view('admin.kelola.anggota.update', compact('tampil', 'status', 'rayon', 'rombel', 'value'));
    }

    public function update(request $req, $id)
    {

        $foto = DB::table('anggotas')->where('kd_anggota', $req->kd_anggota)->first();
        $all = $foto->foto;

        if ($req->foto) {
          Storage::delete($all);
          $foto         = $req->file('foto')->store('avatar');
        }else {
          $foto = $all;
        }
        $tampil           = 'tampil';
        DB::table('anggotas')->where('kd_anggota', $req->kd_anggota)->update([
          'kd_anggota'    => $req->kd_anggota,
          'nama'          => $req->nama,
          'status_id'     => $req->status_id,
          'jalan'         => $req->jalan,
          'rt'            => $req->rt,
          'rw'            => $req->rw,
          'desa'          => $req->desa,
          'kec'           => $req->kec,
          'kotakab'       => $req->kotakab,
          'provinsi'      => $req->provinsi,
          'kode_pos'      => $req->kode_pos,
          'no_telepon'    => $req->no_telepon,
          'foto'          => $foto,
          'rayon'         => $req->rayon,
          'rombel'        => $req->rombel,
          'kelas'         => $req->kelas,
          'tahun_ajaran'  => $req->tahun_ajaran,
          'nisn'          => $req->nisn,
        ]);

      Alert::success('Data Berhasil Di Ubah!', 'Ubah')->persistent("Ok");
      return redirect()->route('anggota.index', compact('tampil'));

    }

}
