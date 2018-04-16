<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// item

Route::get('/admin', 'dashboardController@index')->name('admin.index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/kelola/jenis', 'jenisController@index')->name('jenis.index');
Route::post('/kelola/jenis/simpan', 'jenisController@simpan')->name('jenis.simpan');
Route::delete('/kelola/jenis/hapus/{id}', 'jenisController@hapus')->name('jenis.hapus');
Route::patch('/kelola/jenis/update', 'jenisController@update')->name('jenis.update');


Route::get('/kelola/klasifikasi', 'klasifikasiController@index')->name('klasifikasi.index');
Route::post('/kelola/klasifikasi/simpan', 'klasifikasiController@simpan')->name('klasifikasi.simpan');
Route::delete('/kelola/klasifikasi/hapus/{id}', 'klasifikasiController@hapus')->name('klasifikasi.hapus');
Route::patch('/kelola/klasifikasi/update', 'klasifikasiController@update')->name('klasifikasi.update');


Route::get('/kelola/kategori', 'kategoriController@index')->name('kategori.index');
Route::post('/kelola/kategori/simpan', 'kategoriController@simpan')->name('kategori.simpan');
Route::delete('/kelola/kategori/hapus/{id}', 'kategoriController@hapus')->name('kategori.hapus');
Route::patch('/kelola/kategori/update', 'kategoriController@update')->name('kategori.update');


Route::get('/kelola/label_rak', 'label_rakController@index')->name('label_rak.index');
Route::post('/kelola/label_rak/simpan', 'label_rakController@simpan')->name('label_rak.simpan');
Route::delete('/kelola/label_rak/hapus/{id}', 'label_rakController@hapus')->name('label_rak.hapus');
Route::patch('/kelola/label_rak/update', 'label_rakController@update')->name('label_rak.update');


Route::get('/kelola/item', 'itemController@index')->name('item.index');
Route::get('/kelola/item/input', 'itemController@input')->name('item.input');
Route::post('/kelola/item/simpan', 'itemController@simpan')->name('item.simpan');
Route::delete('/kelola/item/hapus/{id}', 'itemController@hapus')->name('item.hapus');

Route::get('/kelola/item/edit/{id}', 'itemController@edit')->name('item.edit');
Route::patch('/kelola/item/update/{id}', 'itemController@update')->name('item.update');

// blue

Route::get('/kelola/pengarang', 'blueController@indexPengarang')->name('index.pengarang');
Route::post('/kelola/pengarang/simpan', 'blueController@simpanPengarang')->name('pengarang.simpan');
Route::delete('/kelola/pengarang/hapus/{id}', 'blueController@hapusPengarang')->name('pengarang.hapus');
Route::patch('/kelola/pengarang/update', 'blueController@updatePengarang')->name('pengarang.update');

Route::get('/kelola/penerbit', 'blueController@indexPenerbit')->name('index.penerbit');
Route::post('/kelola/penerbit/simpan', 'blueController@simpanPenerbit')->name('penerbit.simpan');
Route::delete('/kelola/penerbit/hapus/{id}', 'blueController@hapusPenerbit')->name('penerbit.hapus');
Route::patch('/kelola/penerbit/update', 'blueController@updatePenerbit')->name('penerbit.update');

// more
Route::get('/kelola/rayon','moreController@indexRayon')->name('rayon.index');
Route::post('/kelola/rayon/simpan', 'moreController@simpanRayon')->name('rayon.simpan');
Route::delete('/kelola/rayon/hapus/{id}', 'moreController@hapusRayon')->name('rayon.hapus');
Route::patch('/kelola/rayon/update', 'moreController@updateRayon')->name('rayon.update');

Route::get('/kelola/rombel','moreController@indexRombel')->name('rombel.index');
Route::post('/kelola/rombel/simpan', 'moreController@simpanRombel')->name('rombel.simpan');
Route::delete('/kelola/rombel/hapus/{id}', 'moreController@hapusRombel')->name('rombel.hapus');
Route::patch('/kelola/rombel/update', 'moreController@updateRombel')->name('rombel.update');

Route::get('/kelola/status','moreController@indexStatus')->name('status.index');
Route::post('/kelola/status/simpan', 'moreController@simpanStatus')->name('status.simpan');
Route::delete('/kelola/status/hapus/{id}', 'moreController@hapusStatus')->name('status.hapus');
Route::patch('/kelola/status/update', 'moreController@updateStatus')->name('status.update');

// anggota
Route::get('/kelola/anggota','moreController@index')->name('anggota.index');
Route::get('/kelola/anggota/input', 'moreController@input')->name('anggota.input');
Route::post('/kelola/anggota/simpan', 'moreController@simpan')->name('anggota.simpan');
Route::delete('/kelola/anggota/hapus/{id}', 'moreController@hapus')->name('anggota.hapus');

Route::get('/kelola/anggota/edit/{id}', 'moreController@edit')->name('anggota.edit');
Route::patch('/kelola/anggota/update/{id}', 'moreController@update')->name('anggota.update');

//Barcode
Route::get('/kelola/barcode','barcodeController@index')->name('barcode.index');
Route::post('/kelola/barcode/simpan', 'barcodeController@simpan')->name('barcode.simpan');
Route::get('/kelola/cetak/{id}','barcodeController@cetak')->name('cetak.index');
Route::delete('/kelola/barcode/hapus/{id}', 'barcodeController@hapus')->name('barcode.hapus');

// pinjam
Route::get('/transaksi/pinjam','transaksiController@pinjamIndex')->name('pinjam.index');
Route::post('/transaksi/pinjam/simpan','transaksiController@pinjamSimpan')->name('pinjam.simpan');
Route::get('/transaksi/pinjam/get','transaksiController@getPinjaman')->name('pinjam.get');

// pengembalian
Route::get('/transaksi/kembali','transaksiController@kembaliIndex')->name('kembali.index');
Route::get('/transaksi/kembali/hapus/{id}', 'transaksiController@kembali')->name('kembali.hapus');
Route::get('/transaksi/kembali/get','transaksiController@getPinjaman')->name('kembali.get');

// Route::post('/transaksi/kembali/simpan','transaksiController@kembaliSimpan')->name('kembali.simpan');
