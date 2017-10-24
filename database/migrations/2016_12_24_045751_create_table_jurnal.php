<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJurnal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal', function(Blueprint $table){
          $table->increments('id');
          $table->integer('kelompok');
          $table->integer('departemen');
          $table->integer('noakun');
          $table->integer('reff');
          $table->string('nama');
          $table->date('tgl');
          $table->string('keterangan');
          $table->string('posisi');
          $table->bigInteger('nominal');
          $table->string('user');
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
        Schema::drop('jurnal');
    }
}
