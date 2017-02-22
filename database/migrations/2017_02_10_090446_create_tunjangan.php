<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTunjangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_tunjangan')->unique();
            $table->integer('id_golongan')->unsigned();
            $table->foreign('id_golongan')
                  ->references('id')
                  ->on('golongan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('id_jabatan')->unsigned();
            $table->foreign('id_jabatan')
                  ->references('id')
                  ->on('jabatan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('status');
            $table->integer('jumlah_anak');
            $table->integer('besar_tunjangan');
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
        Schema::dropIfExists('tunjangan');
    }
}
