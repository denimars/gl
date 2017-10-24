<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNeraca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('neraca', function(Blueprint $table){
        $table->increments('id');
        $table->string('kelompok');
        $table->string('departemen');
        $table->string('noakun');
        $table->string('nama');
        $table->bigInteger('nominal');
        $table->string('bulan');
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
        Schema::drop('neraca');
    }
}
