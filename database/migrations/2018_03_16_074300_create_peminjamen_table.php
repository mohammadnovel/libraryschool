<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('kd_pinjam');
            $table->string('kd_anggota');
            $table->string('nama', 55);
            $table->string('rombel', 25);
            $table->string('barcode_kode');
            $table->string('kd_item');
            $table->string('judul');
            $table->date('tanggal_pinjam');
            $table->timestamps();

            $table->foreign('kd_anggota')->references('kd_anggota')->on('anggotas')->onDelete('cascade');
            $table->foreign('barcode_kode')->references('barcode_kode')->on('barcodes')->onDelete('cascade');
            $table->foreign('kd_item')->references('kd_item')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamen');
    }
}
