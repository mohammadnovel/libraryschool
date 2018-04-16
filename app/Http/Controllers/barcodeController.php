<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\barcode;
use Illuminate\Http\Request;

class barcodeController extends Controller
{
    public function index()
    {
    	$tampil = DB::table('items')->Paginate();
    	// $bar 	= DB::table('barcodes')->Paginate();
    	$bar = barcode::all();
    	// $y =  barcode::select(DB::raw('RIGHT(`barcode_kode`, 1) as `y`'))->get();

    	// $bar = barcode::where('barcode_kode', )->get();
      	return view('admin.kelola.barcode.barcode', compact('tampil', 'bar'));
    }

    public function simpan(request $req)
    {
    	
    	$this->validate($req,[
    		'kd_item'	=> 'required|unique:barcodes',
    	]);

    	for ($i=1; $i <= $req->jmlh ; $i++) { 
    			$b_c = $req->kd_item . '-' . $i	;

    	barcode::create([
            'barcode_kode'  => $b_c,
    		'kd_item'		=> $req->kd_item,
    		'judul'			=> $req->judul,
    	]);
    		}
    	
    	return redirect()->route('cetak.index', $req->kd_item);
    }

    public function cetak($id)
    {

    	$tampil = barcode::where('kd_item', $id)->get();

    	return view('admin.kelola.barcode.cetak', compact('tampil'));

    }

    public function hapus($id)
    {
    	DB::table('barcodes')->where('kd_item', $id)->delete();

    	return redirect()->back();
    }
}