<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategorilembur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorilembur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_lembur')->unique();
            $table->integer('id_jabatan')->unsigned();
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_golongan')->unsigned();
            $table->foreign('id_golongan')->references('id')->on('golongan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('besar_uang');
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
        Schema::dropIfExists('kategorilembur');
    }
}
