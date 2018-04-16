<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\jenis_item;
use AutoNumberHelper;
use Illuminate\Http\Request;

class jenisController extends Controller
{
  public function index()
  {
    $tampil     = DB::table('jenis_items')->paginate();
    $table      ="jenis_items";
    $primary    ="id";
    $kode       = AutoNumberHelper::autoNumberIn($table,$primary);

    return view('admin.kelola.jenis', compact('tampil', 'kode'));
  }

  public function simpan(request $req)
  {
    $this->validate(request(), [
        'jenis_item' => 'required|unique:jenis_items',
    ]);

    jenis_item::create([
      'id'          => $req->id,
      'jenis_item'  => $req->jenis_item,
    ]);

    Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");
    return redirect()->route('jenis.index');
  }

  public function hapus($id)
  {
    DB::table('jenis_items')->where('id', $id)->delete();

    Alert::success('Data Berhasil Di Hapus!', 'Hapus')->persistent("Tutup");

    return redirect()->route('jenis.index');
  }

  public function update(request $req)
  {

    DB::table('jenis_items')->where('id', $req->id)->update([
      'jenis_item'  => $req->jenis_item,
    ]);

    Alert::info('Data Berhasil Di Update!', 'Info')->persistent("Ok");
    return redirect()->route('jenis.index');
  }
}
