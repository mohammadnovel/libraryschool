<?php

namespace App\Http\Controllers;

use App\item;
use DB;
use Alert;
use Illuminate\Http\Request;

class dashboardController extends Controller
{


    public function index()
    {
      $item 	= item::all();
      $pinjam 	= DB::table('peminjaman')->get();
      $x 		= DB::table('items')->get()->sum('jumlah');

      return view('admin.team', compact('item', 'pinjam', 'x'));
    }
}
