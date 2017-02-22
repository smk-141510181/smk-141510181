<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaitunjangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawaitunjangan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pegawai')->unsigned();
            $table->foreign('id_pegawai')->references('id')
            ->on('pegawai')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('id_tunjangan')->unsigned();
            $table->foreign('id_tunjangan')->references('id')
            ->on('tunjangan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('pegawaitunjangan');
    }
}
