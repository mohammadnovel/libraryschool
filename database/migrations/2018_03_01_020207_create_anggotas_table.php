<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->string('kd_anggota', 25);
            $table->primary('kd_anggota');

            $table->string('nama', 55);
            $table->integer('status_is')->unsigned();
            $table->text('jalan');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('desa', 30);
            $table->string('kec', 35);
            $table->string('kotakab', 35);
            $table->string('provinsi', 35);
            $table->string('kode_pos', 25);
            $table->string('no_telepon', 15);
            $table->string('foto');
            $table->string('rayon', 25);
            $table->string('rombel', 25);
            $table->string('kelas', 5);
            $table->string('tahun_ajaran', 5);
            $table->string('nisn', 20);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}
