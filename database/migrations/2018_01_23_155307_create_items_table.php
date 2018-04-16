<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->string('kd_item');
            $table->integer('jenis_item_id')->unsigned();
            $table->integer('klasifikasi_id')->unsigned();
            $table->integer('kategori_id')->unsigned();
            $table->integer('label_rak_id')->unsigned();
            $table->string('judul_item');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('isbn');
            $table->integer('jumlah');
            $table->string('thn_terbit', 4);
            $table->string('kata_kunci');
            $table->text('resensi');
            $table->text('daftar_isi');
            $table->string('status_pinjam');
            $table->text('foto');
            $table->date('tgl_masuk');
            $table->string('kondisi');
            $table->timestamps();

            $table->primary('kd_item');
            $table->foreign('jenis_item_id')->references('id')->on('jenis_items')->onDelete('CASCADE');
            $table->foreign('klasifikasi_id')->references('id')->on('klasifikasis')->onDelete('CASCADE');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('CASCADE');
            $table->foreign('label_rak_id')->references('id')->on('label_raks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
