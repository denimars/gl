<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePtk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptk', function(Blueprint $table){
          $table->increments('id');
          $table->integer('no_ptk');
          $table->string('nama');
          $table->string('lembaga');
          $table->integer('no_pin');
          $table->string('telp');
          $table->string('sts');
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
        Schema::drop('ptk');
    }
}
