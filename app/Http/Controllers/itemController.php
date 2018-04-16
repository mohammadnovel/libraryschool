<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\item;
use App\jenis_item;
use App\klasifikasi;
use Illuminate\Http\Request;
use Alert;
use AutoNumberHelper;

class itemController extends Controller
{


    public function getNumber(){
            $table="items";
            $primary="kd_item";
            $prefix="BRG-";
            $kodeBarang = AutoNumberHelper::AutoNumber($table,$primary,$prefix);
            return $kodeBarang;
    }

    public function index()
    {
      // $item   = DB::table('items')->paginate();
      $item = item::with('jenis_item', 'klasifikasi')->get(); 

      $tampil = 'tampil';
      return view('admin.kelola.item', compact('item', 'tampil', 'pengarang'));
    }

    public function input()
    {
      $item         = DB::table('items')->paginate();
      $tampil       = '';
      $jenis        = DB::table('jenis_items')->paginate();
      $klasifikasi  = DB::table('klasifikasis')->paginate();
      $label        = DB::table('label_raks')->paginate();
      $pengarang    = DB::table('pengarangs')->paginate();
      $penerbit     = DB::table('penerbits')->paginate();

      $table      ="items";
      $primary    ="kd_item";

      $kodeBarang = AutoNumberHelper::autoNumberIn($table,$primary);


      return view('admin.kelola.item.input', compact('item', 'tampil', 'jenis', 'klasifikasi', 'label', 'pengarang', 'kodeBarang', 'penerbit'));
    }

    public function simpan(request $req)
    {

      if ($req->file === "") {

        $this->validate($req, [

         'jenis_item_id'      => 'required',
         'klasifikasi_id'     => 'required',
         'label_rak_id'       => 'required',
         'foto'               => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         'file'               => 'required|file|mimes:doc,pdf,docx,zip,html',
        ]);

        $file = $req->file('file')->store('file');
        $foto = $req->file('foto')->store('image');
        item::create([
          'kd_item'       => $req->jenis_item_id . $req->klasifikasi_id . $req->kd_item,
          'jenis_item_id' => $req->jenis_item_id,
          'klasifikasi_id'=> $req->klasifikasi_id,
          'label_rak_id'  => $req->label_rak_id,
          'judul_item'    => $req->judul_item,
          'pengarang'     => $req->pengarang,
          'penerbit'      => $req->penerbit,
          'isbn'          => $req->isbn,
          'jumlah'        => $req->jumlah,
          'thn_terbit'    => $req->thn_terbit,
          'kata_kunci'    => $req->kata_kunci,
          'call_number'   => $req->call_number,
          'resensi'       => $req->resensi,
          'daftar_isi'    => $req->daftar_isi,
          'status_pinjam' => '0',
          'foto'          => $foto,
          'file'          => $file,
          'tgl_masuk'     => $req->tgl_masuk,
          'kondisi'       => $req->kondisi,
        ]);

      }else{
        $this->validate($req, [
          'jenis_item_id'      => 'required',
          'klasifikasi_id'     => 'required',
          'label_rak_id'       => 'required',
          'foto'               => 'required|image|mimes:jpeg,png,jpg,gif,svg'
      ]);

        $foto = $req->file('foto')->store('image');
        item::create([
          'kd_item'       => $req->jenis_item_id . $req->klasifikasi_id . $req->kd_item,
          'jenis_item_id' => $req->jenis_item_id,
          'klasifikasi_id'=> $req->klasifikasi_id,
          'label_rak_id'  => $req->label_rak_id,
          'judul_item'    => $req->judul_item,
          'pengarang'     => $req->pengarang,
          'penerbit'      => $req->penerbit,
          'isbn'          => $req->isbn,
          'jumlah'        => $req->jumlah,
          'thn_terbit'    => $req->thn_terbit,
          'kata_kunci'    => $req->kata_kunci,
          'call_number'   => $req->call_number,
          'resensi'       => $req->resensi,
          'daftar_isi'    => $req->daftar_isi,
          'status_pinjam' => '0',
          'foto'          => $foto,
          'tgl_masuk'     => $req->tgl_masuk,
          'kondisi'       => $req->kondisi,
        ]);
      }

      Alert::success('Data Berhasil Di Simpan!', 'Simpan')->persistent("Ok");
      return redirect()->back();

    }

    public function hapus($id)
    {

      $foto = DB::table('items')->where('kd_item', $id)->first();
      $all = $foto->foto;
      $all1 = $foto->file;

      Storage::delete($all);
      Storage::delete($all1);
      DB::table('items')->where('kd_item', $id)->delete();

      Alert::success('Data Berhasil Di Hapus!', 'Hapus')->persistent("tutup");
      return redirect()->back();
    }

    public function edit($id)
    {
      $item         = DB::table('items')->paginate();
      $tampil       = '';
      $jenis        = DB::table('jenis_items')->paginate();
      $klasifikasi  = DB::table('klasifikasis')->paginate();
      $label        = DB::table('label_raks')->paginate();

      $value        = item::find($id);
      $tampil       = '';


      return view('admin.kelola.item.update', compact('value', 'item', 'tampil', 'jenis', 'klasifikasi', 'label'));
    }

    public function update(request $req, $id)
    {

      if ($req->file === "") {

        $foto = DB::table('items')->where('kd_item', $req->kd_item)->first();
        $all = $foto->foto;
        
        if ($req->foto) {
          Storage::delete($all);
          $foto         = $req->file('foto')->store('image');
        }else {
          $foto = $all;
        }
        $tampil           = 'tampil';
        DB::table('items')->where('kd_item', $req->kd_item)->update([
          'jenis_item_id' => $req->jenis_item_id,
          'klasifikasi_id'=> $req->klasifikasi_id,
          'label_rak_id'  => $req->label_rak_id,
          'judul_item'    => $req->judul_item,
          'pengarang'     => $req->pengarang,
          'penerbit'      => $req->penerbit,
          'isbn'          => $req->isbn,
          'jumlah'        => $req->jumlah,
          'thn_terbit'    => $req->thn_terbit,
          'kata_kunci'    => $req->kata_kunci,
          'resensi'       => $req->resensi,
          'daftar_isi'    => $req->daftar_isi,
          'status_pinjam' => '0',
          'foto'          => $foto,
          'tgl_masuk'     => $req->tgl_masuk,
          'kondisi'       => $req->kondisi,
        ]);
      }else {

        $foto = DB::table('items')->where('kd_item', $req->kd_item)->first();
        $file = DB::table('items')->where('kd_item', $req->kd_item)->first();
        $all = $foto->foto;
        $all1 = $file->file;

        if ($req->foto) {
          Storage::delete($all);
          $foto         = $req->file('foto')->store('image');
        }else {
          $foto = $all;
        }

        if ($req->file) {
          Storage::delete($all1);
          $file        = $req->file('file')->store('file');
        }else {
          $file= $all1;
        }

        $tampil           = 'tampil';
        DB::table('items')->where('kd_item', $req->kd_item)->update([
          'jenis_item_id' => $req->jenis_item_id,
          'klasifikasi_id'=> $req->klasifikasi_id,
          'label_rak_id'  => $req->label_rak_id,
          'judul_item'    => $req->judul_item,
          'pengarang'     => $req->pengarang,
          'penerbit'      => $req->penerbit,
          'isbn'          => $req->isbn,
          'jumlah'        => $req->jumlah,
          'thn_terbit'    => $req->thn_terbit,
          'kata_kunci'    => $req->kata_kunci,
          'resensi'       => $req->resensi,
          'daftar_isi'    => $req->daftar_isi,
          'status_pinjam' => '0',
          'foto'          => $foto,
          'file'          => $file,
          'tgl_masuk'     => $req->tgl_masuk,
          'kondisi'       => $req->kondisi,
        ]);
      }


      Alert::success('Data Berhasil Di Ubah!', 'Ubah')->persistent("Ok");
      return redirect()->route('item.index', compact('tampil'));

    }
}
