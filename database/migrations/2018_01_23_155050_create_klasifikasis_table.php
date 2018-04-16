<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlasifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klasifikasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jenis_item_id')->unsigned();
            $table->string('klasifikasi');
            $table->timestamps();

            $table->foreign('jenis_item_id')->references('id')->on('jenis_items')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klasifikasis');
    }
}
