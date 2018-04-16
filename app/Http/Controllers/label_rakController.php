<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use Illuminate\Http\Request;

class label_rakController extends Controller
{
    public function index()
    {
      $tampil = DB::table('label_raks')->paginate();

      return view('admin.kelola.label_rak', compact('tampil'));
    }

    public function hapus($id)
    {
      DB::table('label_raks')->where('id', $id)->delete();

      Alert::warning('Data Berhasil Di Hapus!', 'Hapus')->persistent("Tutup");

      return redirect()->route('label_rak.index');
    }

    public function simpan(request $req)
    {
      DB::table('label_raks')->insert([
        'no_rak'        => $req->no_rak,
        'bagian_rak'    => $req->bagian_rak,
        'sisi'          => $req->sisi,
        'label'         => $req->label
      ]);

      Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");
      return redirect()->route('label_rak.index');
    }

    public function update(request $req)
    {
      DB::table('label_raks')->where('id', $req->id)->update([
        'no_rak' => $req->no_rak,
        'bagian_rak' => $req->bagian_rak,
        'sisi' => $req->sisi,
        'label' => $req->label,
      ]);

      Alert::success('Data Berhasil Di Update!', 'Update')->persistent("Ok");

      return redirect()->route('label_rak.index');

    }
}
