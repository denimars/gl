<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDepartemen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departemen', function(Blueprint $table){
          $table->increments('id');
          $table->integer('kelompok');
          $table->integer('no_dep');
          $table->string('nama');
          $table->integer('start');
          $table->integer('end');
          $table->bigInteger('dana_awal');
          $table->bigInteger('dana_akhir');
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
        Schema::drop('departemen');
    }
}
