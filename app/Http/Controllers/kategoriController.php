<?php

namespace App\Http\Controllers;

use DB;
use App\kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
      $tampil = kategori::with('klasifikasi')->orderBy('id', 'asc')->get();
      $klasifikasi = DB::table('klasifikasis')->paginate();

      return view('admin.kelola.kategori', compact('tampil', 'klasifikasi'));
    }

    public function simpan(request $req)
    {
      DB::table('kategoris')->insert([
        'klasifikasi_id'    => $req->klasifikasi_id,
        'kategori'          => $req->kategori
      ]);

      return redirect()->route('kategori.index');
    }

    public function hapus($id)
    {
      DB::table('kategoris')->where('id', $id)->delete();

      return redirect()->route('kategori.index');

    }

    public function update(request $req)
    {
      DB::table('kategoris')->where('id', $req->id)->update([
        'klasifikasi_id'    => $req->klasifikasi_id,
        'kategori'          => $req->kategori
      ]);

      return redirect()->route('kategori.index');
      
    }
}
