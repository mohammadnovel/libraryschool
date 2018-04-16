<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function pinjamIndex()
    {
    	return view('admin.transaksi.pinjam');
    }

    public function kembaliIndex()
    {
    	return view('admin.transaksi.kembali');
    }

    public function pinjamSimpan(Request $req)
    {
    	$anggota = DB::table('anggotas')->where('kd_anggota', $req->nis)->get();
    	$barcode = DB::table('barcodes')->where('barcode_kode', $req->barcode)->get();
        $barcode_pin = DB::table('peminjaman')->where('barcode_kode', $req->barcode)->get();

        if ($req->barcode != $barcode_pin[0]->barcode_kode) {
            DB::table('peminjaman')->insert([
                'kd_anggota'        => $anggota[0]->kd_anggota,
                'nama'              => $anggota[0]->nama,
                'rombel'            => $anggota[0]->rombel,
                'barcode_kode'      => $barcode[0]->barcode_kode,
                'kd_item'           => $barcode[0]->kd_item,
                'judul'             => $barcode[0]->judul,
                'tanggal_pinjam'    => date('Y-m-d'),
            ]);
        } else {
            return 'sudah ada';
        }
    }

    public function getPinjaman()
    {
    	$pinjamans = DB::table('peminjaman')->get();

    	foreach ($pinjamans as $r) {
    		echo 	"<tr>".
    						"<td>$r->judul</td>".
    						"<td>$r->barcode_kode</td>".
    						"<td>$r->nama</td>".
    						"<td>$r->tanggal_pinjam</td>".
    						"<td></td>".
    					"</tr>";
    	}

    }

    public function kembali(Request $req)
    {
        $anggota = DB::table('anggotas')->where('kd_anggota', $req->nis)->get();
        $barcode = DB::table('barcodes')->where('barcode_kode', $req->barcode)->get();

        DB::table('pengembalian')->insert([
            'kd_anggota'        => $anggota[0]->kd_anggota,
            'nama'              => $anggota[0]->nama,
            'rombel'            => $anggota[0]->rombel,
            'barcode_kode'      => $barcode[0]->barcode_kode,
            'kd_item'           => $barcode[0]->kd_item,
            'judul'             => $barcode[0]->judul,
            'tanggal_kembali'    => date('Y-m-d'),
        ]);

        DB::table('peminjaman')->where('barcode_kode', $req->barcode)->delete();
        return 'success';
    }

    public function getKembalian()
    {
        $kembalians = DB::table('peminjaman')->get();

        foreach ($kembalians as $r) {
            echo    "<tr>".
                            "<td>$r->judul</td>".
                            "<td>$r->barcode_kode</td>".
                            "<td>$r->nama</td>".
                            "<td>$r->tanggal_kembali</td>".
                            "<td></td>".
                        "</tr>";
        }

    }

    /*public function kembaliSimpan(Request $req)
    {
        $anggota = DB::table('anggotas')->where('kd_anggota', $req->nis)->get();
        $barcode = DB::table('barcodes')->where('barcode_kode', $req->barcode)->get();


        DB::table('pengembalian')->insert([
            'kd_anggota'        => $anggota[0]->kd_anggota,
            'nama'              => $anggota[0]->nama,
            'rombel'            => $anggota[0]->rombel,
            'barcode_kode'      => $barcode[0]->barcode_kode,
            'kd_item'           => $barcode[0]->kd_item,
            'judul'             => $barcode[0]->judul,
            'tanggal_kembali'    => date('Y-m-d'),
        ]);

    }*/

}
