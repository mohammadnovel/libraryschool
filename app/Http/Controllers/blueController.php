<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\pengarang;
use App\penerbit;
use Illuminate\Http\Request;

class blueController extends Controller
{
    public function indexPengarang()
    {
      $tampil = DB::table('pengarangs')->paginate();
      return view('admin.kelola.blue.pengarang', compact('tampil'));

    }

    public function simpanPengarang(request $req)
    {
      $this->validate(request(), [
          'no_telepon'  => 'required|unique:pengarangs',
      ]);

      pengarang::create([
        'pengarang'   => $req->pengarang,
        'alamat'      => $req->alamat,
        'no_telepon'  => $req->no_telepon
      ]);

      Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");
      return redirect()->route('index.pengarang');
    }

    public function hapusPengarang($id)
    {
      DB::table('pengarangs')->where('id', $id)->delete();

      Alert::warning('Data Berhasil Di Hapus!', 'Hapus')->persistent("Tutup");
      return redirect()->route('index.pengarang');

    }

    public function updatePengarang(request $req)
    {
      DB::table('pengarangs')->where('id', $req->id)->update([
          'pengarang'   => $req->pengarang,
          'alamat'      => $req->alamat,
          'no_telepon'  => $req->no_telepon
      ]);

      Alert::success('Data Berhasil Di Update!', 'success')->persistent("Ok");
      return redirect()->route('index.pengarang');

    }

    // peerbit

    public function indexPenerbit()
    {
      $tampil = DB::table('penerbits')->paginate();
      return view('admin.kelola.blue.penerbit', compact('tampil'));
    }

    public function simpanPenerbit(request $req)
    {
      $this->validate(request(), [
          'no_telepon'  => 'required|unique:penerbits',
      ]);
      penerbit::create([
        'penerbit'   => $req->penerbit,
        'alamat'      => $req->alamat,
        'no_telepon'  => $req->no_telepon
      ]);

      Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");
      return redirect()->route('index.penerbit');
    }

    public function hapusPenerbit($id)
    {
      DB::table('penerbits')->where('id', $id)->delete();

      Alert::warning('Data Berhasil Di Hapus!', 'Hapus')->persistent("Tutup");
      return redirect()->route('index.penerbit');

    }

    public function updatePenerbit(request $req)
    {
      DB::table('penerbits')->where('id', $req->id)->update([
          'penerbit'   => $req->penerbit,
          'alamat'      => $req->alamat,
          'no_telepon'  => $req->no_telepon
      ]);

      Alert::success('Data Berhasil Di Update!', 'success')->persistent("Ok");

      return redirect()->route('index.penerbit');

    }
}
