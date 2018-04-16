<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\klasifikasi;
use AutoNumberHelper;
use Illuminate\Http\Request;

class klasifikasiController extends Controller
{
    public function index()
    {

      $tampil     = klasifikasi::with('jenis_item')->orderBy('id', 'asc')->get();
      $jenis      = DB::table('jenis_items')->paginate();
      $table      ="klasifikasis";
      $primary    ="id";

      $kode       = AutoNumberHelper::autoNumberIn($table,$primary);

      return view('admin.kelola.klasifikasi', compact('tampil', 'jenis', 'kode'));
    }

    public function simpan(request $req)
    {
      $this->validate(request(), [
          'klasifikasi'   => 'required|unique:klasifikasis',
      ]);

      klasifikasi::create([
        'id'            => $req->id,
        'jenis_item_id' => $req->jenis_item_id,
        'klasifikasi'   => $req->klasifikasi
      ]);

      Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");

      return redirect()->route('klasifikasi.index');
    }

    public function hapus($id)
    {
      DB::table('klasifikasis')->where('id', $id)->delete();

      Alert::warning('Data Berhasil Di Hapus!', 'Hapus')->persistent("Tutup");

      return redirect()->route('klasifikasi.index');
    }

    public function update(request $req)
    {
      DB::table('klasifikasis')->where('id', $req->id)->update([
        'klasifikasi'     => $req->klasifikasi
      ]);

      Alert::success('Data Berhasil Di Update!', 'Update')->persistent("Ok");

      return redirect()->route('klasifikasi.index');
    }
}
